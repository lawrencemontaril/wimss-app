<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Faculty;
use App\Models\Hei;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Faculty::class);

        /** @var \App\Models\User */
        $authUser = Auth::user();

        $search = request()->input('search');
        $query = User::search($search)->whereHasMorph('profile', [Faculty::class]);

        if (!$authUser->isAdmin()) {
            $query->whereHasMorph('profile', [Faculty::class], function ($q) use ($authUser) {
                $q->where('hei_id', $authUser->profile->hei_id);
            });
        }

        $faculties = $query->paginate(10);

        return view('pages.faculties.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Faculty::class);

        $heis = Hei::all();
        $courses = Course::all();

        return view('pages.faculties.create', compact('heis', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Faculty::class);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'contact_number' => 'required|string|min:11|max:24',
            'sex' => 'required|string|in:male,female',
            'username' => 'required|string|min:6|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'hei_id' => 'required|exists:heis,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        DB::beginTransaction();

        try {
            $faculty = Faculty::create([
                'hei_id' => $request->hei_id,
                'course_id' => $request->course_id,
            ]);

            User::create([
                'first_name' => Str::title($request->first_name),
                'last_name' => Str::title($request->last_name),
                'contact_number' => $request->contact_number,
                'sex' => $request->sex,
                'username' => $request->username,
                'password' => $request->password,
                'profile_type' => Faculty::class,
                'profile_id' => $faculty->id,
            ]);

            DB::commit();

            return redirect()
                ->route('faculties.index')
                ->with('success', 'Faculty created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Failed to create Faculty. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        Gate::authorize('view', $faculty);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        Gate::authorize('update', $faculty);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faculty $faculty)
    {
        Gate::authorize('update', $faculty);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        Gate::authorize('delete', $faculty);
        $faculty->user->delete();

        return redirect()
            ->route('faculties.index')
            ->with('success', 'Faculty deleted successfully.');
    }
}
