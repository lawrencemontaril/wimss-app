<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class GradeStudentController extends Controller
{
    public function show(Student $student) {
        Gate::authorize('view', $student);

        return view('pages.students.grades.show', compact('student'));
    }

    public function create(Request $request, Student $student) {
        Gate::authorize('grade', $student);
        $read = $request->query('read', false);

        return view('pages.students.grades.create', compact('student', 'read'));
    }

    public function update(Request $request, Student $student) {
        Gate::authorize('grade', $student);

        /** @var \App\Models\User */
        $user = Auth::user();

        $validatedData = [];

        if ($user->isHte()) {
            $hteValidatedData = $request->validate([
                'per1' => 'required|integer|min:1|max:5',
                'per2' => 'required|integer|min:1|max:5',
                'per3' => 'required|integer|min:1|max:5',
                'per4' => 'required|integer|min:1|max:5',
                'per5' => 'required|integer|min:1|max:5',
                'tech1' => 'required|integer|min:1|max:5',
                'tech2' => 'required|integer|min:1|max:5',
                'tech3' => 'required|integer|min:1|max:5',
                'tech4' => 'required|integer|min:1|max:5',
                'tech5' => 'required|integer|min:1|max:5',
                'tech6' => 'required|integer|min:1|max:5',
                'office1' => 'required|integer|min:1|max:5',
                'office2' => 'required|integer|min:1|max:5',
                'office3' => 'required|integer|min:1|max:5',
                'office4' => 'required|integer|min:1|max:5',
                'office5' => 'required|integer|min:1|max:5',
                'office6' => 'required|integer|min:1|max:5',
                'office7' => 'required|integer|min:1|max:5',
                'recom' => 'nullable|string'
            ]);

            $hteValidatedData['per_total'] = $request->per1 + $request->per2 + $request->per3 + $request->per4 + $request->per5;
            $hteValidatedData['tech_total'] = $request->tech1 + $request->tech2 + $request->tech3 + $request->tech4 + $request->tech5 + $request->tech6;
            $hteValidatedData['office_total'] = $request->office1 + $request->office2 + $request->office3 + $request->office4 + $request->office5 + $request->office6 + $request->office7;
            $hteValidatedData['likert_total'] = $hteValidatedData['per_total'] + $hteValidatedData['tech_total'] + $hteValidatedData['office_total'];

            $validatedData = array_merge($validatedData, $hteValidatedData);
        }

        if ($user->isFaculty()) {
            $facultyValidatedData = $request->validate([
                'adviser_rating' => 'required|integer|min:1|max:10'
            ]);

            $validatedData = array_merge($validatedData, $facultyValidatedData);
        }

        // Update the current student instance.
        $student->update($validatedData);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Student graded successfully.');
    }
}
