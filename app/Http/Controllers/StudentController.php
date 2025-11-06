<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Faculty;
use App\Models\Hei;
use App\Models\Hte;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Student::class);

        /** @var \App\Models\User */
        $authUser = Auth::user();

        $search = request()->input('search');
        $query = User::search($search)->whereHasMorph('profile', [Student::class]);

        if ($authUser->isDean()) {
            $query->whereHasMorph('profile', [Student::class], function ($q) use ($authUser) {
                $q->where('hei_id', $authUser->profile->hei_id);
            });
        }

        if ($authUser->isFaculty()) {
            $query->whereHasMorph('profile', [Student::class], function ($q) use ($authUser) {
                $q->where('faculty_id', $authUser->profile->id);
            });
        }

        if ($authUser->isHte()) {
            $query->whereHasMorph('profile', [Student::class], function ($q) use ($authUser) {
                $q->where('hte_id', $authUser->profile->id);
            });
        }

        $students = $query->paginate(10);

        return view('pages.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Student::class);

        /** @var \App\Models\User */
        $user = Auth::user();

        if ($user->isAdmin()) {
            $faculties = Faculty::all();
            $htes = Hte::all();
        } else {
            $faculties = $user->profile->hei->faculties;
            $htes = $user->profile->hei->htes;
        }

        if ($user->isFaculty()) {
            $htes = $user->profile->htes;
        }

        $heis = Hei::all();
        $courses = Course::all();
        $school_years = range(2020, date('Y')+1);

        return view('pages.students.create', compact('heis', 'faculties', 'htes', 'courses', 'school_years'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Student::class);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'contact_number' => 'required|string|min:11|max:24',
            'sex' => 'required|string|in:male,female',
            'username' => 'required|string|min:6|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'hei_id' => 'required|exists:heis,id',
            'hte_id' => 'required|exists:htes,id',
            'faculty_id' => 'required|exists:faculties,id',
            'course_id' => 'required|exists:courses,id',
            'school_year' => 'required|integer|digits:4|between:2020,' . date('Y') + 1,
        ]);

        DB::beginTransaction();

        try {
            $student = Student::create([
                'hei_id' => $request->hei_id,
                'hte_id' => $request->hte_id,
                'faculty_id' => $request->faculty_id,
                'course_id' => $request->course_id,
                'school_year' => $request->school_year,
            ]);

            User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'contact_number' => $request->contact_number,
                'sex'=> $request -> sex,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'profile_type' => Student::class,
                'profile_id' => $student->id,
            ]);

            DB::commit();

            return redirect()
                ->route('students.index')
                ->with('success', 'Student created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Failed to create student. Please try again.');
        }
    }

    public function import() {

        /** @var \App\Models\User */
        $user = Auth::user();

        if ($user->isAdmin()) {
            $faculties = Faculty::all();
            $htes = Hte::all();
        } else {
            $faculties = $user->profile->hei->faculties;
            $htes = $user->profile->hei->htes;
        }

        if ($user->isFaculty()) {
            $htes = $user->profile->htes;
        }

        $heis = Hei::all();
        $courses = Course::all();
        $school_years = range(2020, date('Y')+1);

        return view('pages.students.import', compact('heis', 'faculties', 'htes', 'courses', 'school_years'));
    }

    public function importStore(Request $request)
    {
        Gate::authorize('create', Student::class);

        $request->validate([
            'hei_id' => 'required|exists:heis,id',
            'hte_id' => 'required|exists:htes,id',
            'faculty_id' => 'required|exists:faculties,id',
            'course_id' => 'required|exists:courses,id',
            'school_year' => 'required|integer|digits:4|between:2020,' . (date('Y') + 1),
            'student-csv' => 'required|mimes:csv,txt',
        ]);

        // Read the file
        $file = $request->file('student-csv');
        $filePath = $file->getRealPath();

        // Open and read the file
        $file = fopen($filePath, 'r');
        $header = fgetcsv($file);

        // Expected headers (order does not matter)
        $expectedHeader = ['first_name', 'last_name', 'contact_number', 'sex', 'username', 'password'];

        // Check if all expected headers are present
        if (count(array_diff($expectedHeader, $header)) > 0) {
            return redirect()
                ->back()
                ->withErrors(['student-csv' => 'CSV headers do not match expected format.'])
                ->withInput();
        }

        // Create a header map to reference columns by their names
        $headerMap = array_flip($header);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Process each row
            while ($row = fgetcsv($file)) {
                $data = [
                    'first_name' => $row[$headerMap['first_name']],
                    'last_name' => $row[$headerMap['last_name']],
                    'contact_number' => $row[$headerMap['contact_number']],
                    'sex' => $row[$headerMap['sex']],
                    'username' => $row[$headerMap['username']],
                    'password' => $row[$headerMap['password']],
                ];

                // Validate each row
                $validator = Validator::make($data, [
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'contact_number' => 'required|string|min:11|max:24',
                    'username' => 'required|string|min:6|max:255|unique:users',
                    'password' => 'required|string|min:8',
                ]);

                if ($validator->fails()) {
                    // Rollback the transaction and return the errors
                    DB::rollBack();
                    return redirect()
                        ->back()
                        ->with('error', 'A row failed validation. Aborting all operations.')
                        ->withInput();
                }

                // Create Student user
                $student = Student::create([
                    'hei_id' => $request->hei_id,
                    'hte_id' => $request->hte_id,
                    'faculty_id' => $request->faculty_id,
                    'course_id' => $request->course_id,
                    'school_year' => $request->school_year,
                ]);

                // Create user
                User::create([
                    'first_name' => Str::title($data['first_name']),
                    'last_name' => Str::title($data['last_name']),
                    'username' => $data['username'],
                    'contact_number' => $data['contact_number'],
                    'sex' => $data['sex'],
                    'password' => Hash::make($data['password']),
                    'profile_type' => Student::class,
                    'profile_id' => $student->id,
                    'role' => 'student',
                ]);
            }

            // Commit the transaction
            DB::commit();

            // Close the file
            fclose($file);

            return redirect()
                ->route('students.index')
                ->with('success', 'Students imported successfully.');

        } catch (\Exception $e) {
            // Rollback the transaction in case of any error
            DB::rollBack();

            // Close the file
            fclose($file);

            // Optionally log the error or handle it
            return redirect()
                ->back()
                ->withErrors(['student-csv' => 'An error occurred during import. Please try again.'])
                ->withInput();
        }
    }

    public function export() {
        Gate::authorize('export', Student::class);

        /** @var App\Models\User */
        $user = Auth::user();

        if ($user->isAdmin()) {
            $filePrefix = 'admin_';
            $data = Student::NoScope()->get();
        }

        if ($user->isDean()) {
            $filePrefix = Str::slug($user->profile->hei->name) . '_';
            $data = Student::ByHei($user->profile->hei->id)->get();
        }

        if ($user->isFaculty()) {
            $filePrefix = $user->username . '_';
            $data = Student::ByHeiAndFaculty($user->profile->hei->id, $user->profile->id)->get();
        }

        if ($user->isHte()) {
            $filePrefix = Str::slug($user->profile->name) . '_';
            $data = Student::ByHeiAndHte($user->profile->hei->id, $user->profile->id)->get();
        }

        // Generate CSV content
        $csvData = $this->arrayToCsv($data->toArray());

        // Create CSV file
        $fileName = $filePrefix . 'students_data.csv';

        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        );

        return Response::make($csvData, 200, $headers);
    }

    private function arrayToCsv(array $array)
    {
        if (empty($array)) {
            return null;
        }

        $stream = fopen('php://temp', 'r+');

        // Define the header mapping
        $headers = [
            'student_first_name' => 'First Name',
            'student_last_name' => 'Last Name',
            'final_grade' => 'Final Grade',
            'rating' => 'Rating',
            'hei_name' => 'HEI Name',
            'faculty_full_name' => 'Faculty Adviser',
            'hte_name' => 'Company',
        ];

        // Write custom CSV headers
        fputcsv($stream, array_values($headers));

        // Write CSV rows
        foreach ($array as $row) {
            $rowArray = [];
            foreach ($headers as $key => $value) {
                $rowArray[] = $row[$key];
            }
            fputcsv($stream, $rowArray);
        }

        rewind($stream);

        // Get CSV content
        $csvData = stream_get_contents($stream);

        fclose($stream);

        return $csvData;
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        Gate::authorize('view', $student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        Gate::authorize('update', $student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        Gate::authorize('update', $student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        Gate::authorize('delete', $student);

        $student->user->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
