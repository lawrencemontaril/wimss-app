@extends('layouts.dashboard-layout')

@section('title', '- Create Course')

@section('content')
    @php
        $breadcrumbs = [['name' => 'Courses', 'url' => route('courses.index')], ['name' => 'Create', 'url' => route('courses.create')]];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <h1 class="mb-4 text-2xl font-bold tracking-tight sm:text-3xl">
        Create Course
    </h1>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
            <div class="mb-4 grid grid-cols-1 gap-4 lg:grid-cols-2">
                <div>
                    <x-text-input name="name" type="text" value="{{ old('name') }}" labelText="Course Name" />
                </div>

                <div>
                    <x-text-input name="code" type="text" value="{{ old('code') }}" labelText="Course Code" />
                </div>
            </div>

            <div class="mb-4">
                <x-text-input name="accreditation" type="text" value="{{ old('accreditation') }}" labelText="CHED Accreditation" />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold" for="description">
                    Description
                </label>
                <textarea
                    class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm shadow-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-4 focus:ring-sky-500/50"
                    id="description" name="description" value="{{ old('description') }}" rows="3"></textarea>
            </div>
        </div>

        <div class="mt-4 flex gap-2">
            <button
                class="max-w-fit text-nowrap rounded-full bg-sky-500 p-3 px-6 text-sm font-semibold text-sky-50 outline-none ring-sky-500/50 transition-all duration-150 ease-in-out hover:bg-sky-600 focus:ring-4"
                type="submit">
                Create
            </button>
            <a class="max-w-fit text-nowrap rounded-full border border-zinc-200 bg-white p-3 px-6 text-sm font-semibold outline-none ring-zinc-200/50 transition-all duration-150 ease-in-out hover:bg-zinc-50 focus:ring-4"
                href="{{ route('courses.index') }}">
                Cancel
            </a>
        </div>
    </form>
@endsection

