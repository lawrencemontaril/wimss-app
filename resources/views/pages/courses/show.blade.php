@extends('layouts.dashboard-layout')

@section('title')
    - {{ $course->name }}
@endsection

@section('content')
    @php
        $breadcrumbs = [
            ['name' => 'Courses', 'url' => route('courses.index')],
            ['name' => $course->name, 'url' => route('courses.show', $course->id)],
        ];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <header class="mb-4">
        <div class="text-red-sky flex h-40 items-end justify-center rounded-xl bg-yellow-500 p-4 md:justify-start">
            <div>
                <h1 class="text-2xl font-semibold">
                    {{ $course->name }}
                </h1>
                <span class="text-xs">Course/Department</span>
            </div>
        </div>
    </header>
@endsection

