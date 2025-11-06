@extends('layouts.dashboard-layout')

@section('title')
    - Create a Student
@endsection

@section('content')
    @php
        $breadcrumbs = [
            ['name' => 'Students', 'url' => route('students.index')],
            ['name' => $student->user->full_name, 'url' => route('users.show', $student->user->username)],
            ['name' => 'Grades', 'url' => ''],
            ['name' => 'Create', 'url' => route('students.create')],
        ];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <h1 class="mb-2 text-2xl font-bold tracking-tight sm:text-3xl">
        Grade {{ $student->user->full_name }}
    </h1>
    <p class="mb-4 text-xs uppercase text-zinc-600">
        {{ $student->course->name }}
    </p>

    @if (!$read)
        <form
            action=""
            method="GET"
        >
            @role('hte')
                @include('partials.hte-grading-rubrics')
                @elserole('faculty')
                @include('partials.faculty-grading-rubrics')
            @endrole

            <div class="mt-4 flex gap-2">
                <button
                    class="max-w-fit text-nowrap rounded-full bg-sky-500 p-3 px-6 text-sm font-semibold text-sky-50 outline-none ring-sky-500/50 transition-all duration-150 ease-in-out hover:bg-sky-600 focus:ring-4"
                    name="read"
                    type="submit"
                    value="true"
                >
                    I have read the rubrics
                </button>
                <a
                    class="max-w-fit text-nowrap rounded-full border border-zinc-200 bg-white p-3 px-6 text-sm font-semibold outline-none ring-zinc-200/50 transition-all duration-150 ease-in-out hover:bg-zinc-50 focus:ring-4"
                    href="{{ route('dashboard') }}"
                >
                    Cancel
                </a>
            </div>
        </form>
    @else
        @role('hte')
            @include('partials.hte-grading-form')
            @elserole('faculty')

            <form
                action="{{ route('students.grades-update', $student) }}"
                method="POST"
            >
                @csrf
                @method('PUT')
                <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
                    <div>
                        <x-likert-field
                            name="adviser_rating"
                            labelText="Adviser Rating"
                            :ratings="[
                                10 => ['label' => 'Excellent', 'bg' => 'bg-green-500', 'border' => 'border-green-500', 'text' => 'text-green-50'],
                                8 => ['label' => 'Very Good', 'bg' => 'bg-lime-500', 'border' => 'border-lime-500', 'text' => 'text-lime-50'],
                                6 => ['label' => 'Good', 'bg' => 'bg-sky-500', 'border' => 'border-sky-500', 'text' => 'text-sky-50'],
                                4 => ['label' => 'Fair', 'bg' => 'bg-yellow-500', 'border' => 'border-yellow-500', 'text' => 'text-yellow-50'],
                                2 => ['label' => 'Needs Improvement', 'bg' => 'bg-red-500', 'border' => 'border-red-500', 'text' => 'text-red-50'],
                            ]"
                        />
                    </div>
                </div>

                <div class="mt-4 flex gap-2">
                    <button
                        class="max-w-fit text-nowrap rounded-full bg-sky-500 p-3 px-6 text-sm font-semibold text-sky-50 outline-none ring-sky-500/50 transition-all duration-150 ease-in-out hover:bg-sky-600 focus:ring-4"
                        type="submit"
                    >
                        Mark grade
                    </button>
                    <a
                        class="max-w-fit text-nowrap rounded-full border border-zinc-200 bg-white p-3 px-6 text-sm font-semibold outline-none ring-zinc-200/50 transition-all duration-150 ease-in-out hover:bg-zinc-50 focus:ring-4"
                        href="{{ route('dashboard') }}"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        @endrole
    @endif
@endsection

