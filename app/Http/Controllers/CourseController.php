<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    /*
    | ------------------------------------
    |  Display a listing of the resource.
    | ------------------------------------
    */
    public function index(Request $request)
    {
        Gate::authorize('viewAny', Course::class);

        $courses = Course::search(request('search'))
            ->paginate(10)
            ->withQueryString();

        return view('pages.courses.index', compact('courses'));
    }

    /*
    | --------------------------------------------
    |  Show the form for creating a new resource.
    | --------------------------------------------
    */
    public function create()
    {
        Gate::authorize('create', Course::class);

        return view('pages.courses.create');
    }

    /*
    | --------------------------------------------
    |  Store a newly created resource in storage.
    | --------------------------------------------
    */
    public function store(StoreCourseRequest $request)
    {
        Course::create($request->validated());

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    /*
    | ---------------------------------
    |  Display the specified resource.
    | ---------------------------------
    */
    public function show(Course $course)
    {
        Gate::authorize('view', $course);

        return view('pages.courses.show', compact('course'));
    }

    /*
    | ---------------------------------------------------
    |  Show the form for editing the specified resource.
    | ---------------------------------------------------
    */
    public function edit(Course $course)
    {
        Gate::authorize('update', $course);

        return view('pages.courses.edit', compact('course'));
    }

    /*
    | -------------------------------------------
    |  Update the specified resource in storage.
    | -------------------------------------------
    */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        return redirect()
            ->route('courses.edit', $course)
            ->with('success', 'Course updated successfully.');
    }

    /*
    | ---------------------------------------------
    |  Remove the specified resource from storage.
    | ---------------------------------------------
    */
    public function destroy(Course $course)
    {
        Gate::authorize('delete', $course);

        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
