@extends('layouts.dashboard-layout')

@section('title', '- Create a Student')

@section('content')
    @php
        $breadcrumbs = [['name' => 'Students', 'url' => route('students.index')], ['name' => 'Create', 'url' => route('students.create')]];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <h1 class="mb-4 text-2xl font-bold tracking-tight sm:text-3xl">
        Create Student
    </h1>
    <form
        action="{{ route('students.store') }}"
        method="POST"
    >
        @csrf

        <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
            <h4 class="mb-4 text-lg font-semibold">Student Information</h4>

            <div class="@notrole('faculty') @endnotrole @role('admin') lg:grid-cols-2 @endrole mb-4 grid grid-cols-1 gap-4">
                @role('admin')
                    <div>
                        <label
                            class="text-sm font-semibold"
                            for="hei_id"
                        >
                            Associated HEI
                            <span class="text-red-500">*</span>
                        </label>
                        <select
                            class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm shadow-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-4 focus:ring-sky-500/50"
                            id="hei_id"
                            name="hei_id"
                        >
                            <option
                                value=""
                                {{ old('hei_id') ? '' : 'selected' }}
                            >---</option>

                            @foreach ($heis as $hei)
                                <option
                                    value="{{ $hei->id }}"
                                    {{ old('hei_id') == $hei->id ? 'selected' : '' }}
                                >
                                    {{ $hei->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('hei_id')
                            <p class="my-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                @else
                    <input
                        name="hei_id"
                        type="hidden"
                        value="{{ auth()->user()->profile->hei->id }}"
                    />
                @endrole

                @notrole('faculty')
                    {{-- Faculty ID --}}
                    <div>
                        <label
                            class="text-sm font-semibold"
                            for="faculty_id"
                        >
                            Associated Faculty Coordinator
                            <span class="text-red-500">*</span>
                        </label>
                        <select
                            class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm shadow-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-4 focus:ring-sky-500/50"
                            id="faculty_id"
                            name="faculty_id"
                            value="{{ old('faculty_id') }}"
                        >
                            <option
                                value=""
                                {{ old('hei_id') ? '' : 'selected' }}
                            >---</option>

                            @foreach ($faculties as $faculty)
                                <option
                                    value="{{ $faculty->id }}"
                                    {{ old('faculty_id') == $faculty->id ? 'selected' : '' }}
                                >
                                    {{ $faculty->user->first_name }} {{ $faculty->user->last_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('faculty_id')
                            <p class="my-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                @else
                    <input
                        name="faculty_id"
                        type="hidden"
                        value="{{ auth()->user()->profile->id }}"
                    />
                @endnotrole
            </div>

            <div class="mb-4">
                <label
                    class="text-sm font-semibold"
                    for="hte_id"
                >
                    Associated HTE
                    <span class="text-red-500">*</span>
                </label>
                <select
                    class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm shadow-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-4 focus:ring-sky-500/50"
                    id="hte_id"
                    name="hte_id"
                >
                    <option
                        value=""
                        {{ old('hte_id') ? '' : 'selected' }}
                    >---</option>

                    @foreach ($htes as $hte)
                        <option
                            value="{{ $hte->id }}"
                            {{ old('hte_id') == $hte->id ? 'selected' : '' }}
                        >
                            {{ $hte->name }}: {{ $hte->user->full_name }}
                        </option>
                    @endforeach
                </select>
                @error('hte_id')
                    <p class="my-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 grid grid-cols-1 gap-4 lg:grid-cols-2">
                {{-- Course ID --}}
                <div>
                    <label
                        class="text-sm font-semibold"
                        for="course_id"
                    >
                        Course
                        <span class="text-red-500">*</span>
                    </label>
                    <select
                        class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm shadow-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-4 focus:ring-sky-500/50"
                        id="course_id"
                        name="course_id"
                    >
                        <option
                            value=""
                            {{ old('course_id') ? '' : 'selected' }}
                        >
                            ---
                        </option>

                        @foreach ($courses as $course)
                            <option
                                value="{{ $course->id }}"
                                {{ old('course_id') == $course->id ? 'selected' : '' }}
                            >
                                {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <p class="my-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- School Year --}}
                <div>
                    <label
                        class="text-sm font-semibold"
                        for="school_year"
                    >
                        School Year
                        <span class="text-red-500">*</span>
                    </label>
                    <select
                        class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm shadow-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-4 focus:ring-sky-500/50"
                        id="school_year"
                        name="school_year"
                    >
                        <option
                            value=""
                            {{ old('school_year') ? '' : 'selected' }}
                        >
                            ---
                        </option>

                        @foreach ($school_years as $school_year)
                            <option
                                value="{{ $school_year }}"
                                {{ old('school_year') == $school_year ? 'selected' : '' }}
                            >
                                {{ $school_year }} - {{ $school_year + 1 }}
                            </option>
                        @endforeach
                    </select>
                    @error('school_year')
                        <p class="my-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <hr class="my-6 border-zinc-100" />

            @include('components.user-form')
        </div>

        <div class="mt-4 flex gap-2">
            <button
                class="max-w-fit text-nowrap rounded-full bg-sky-500 p-3 px-6 text-sm font-semibold text-sky-50 outline-none ring-sky-500/50 transition-all duration-150 ease-in-out hover:bg-sky-600 focus:ring-4"
                type="submit"
            >
                Create
            </button>
            <a
                class="max-w-fit text-nowrap rounded-full border border-zinc-200 bg-white p-3 px-6 text-sm font-semibold outline-none ring-zinc-200/50 transition-all duration-150 ease-in-out hover:bg-zinc-50 focus:ring-4"
                href="{{ route('students.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
@endsection

