@extends('layouts.dashboard-layout')

@section('title')
    - Create a Guardian
@endsection

@section('content')
    @php
        $breadcrumbs = [
            ['name' => 'Guardians', 'url' => route('guardians.index')],
            ['name' => 'Create', 'url' => route('guardians.create')],
        ];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <h1 class="mb-4 text-2xl font-bold tracking-tight sm:text-3xl">
        Create Guardian
    </h1>

    <form
        action="{{ route('guardians.store') }}"
        method="POST"
    >
        @csrf

        <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
            <h4 class="mb-4 text-lg font-semibold">Guardian Information</h4>

            <div class="@role('admin') lg:grid-cols-2 @endrole mb-4 grid grid-cols-1 gap-4">
                @role('admin')
                    {{-- HEI ID --}}
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
                            <option {{ old('hei_id') ? '' : 'selected' }}>---</option>

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

                {{-- Child: Student ID --}}
                <div>
                    <label
                        class="text-sm font-semibold"
                        for="student_id"
                    >
                        Associated Children
                        <span class="text-red-500">*</span>
                    </label>
                    <select
                        class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm shadow-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-4 focus:ring-sky-500/50"
                        id="student_id"
                        name="student_id"
                    >
                        <option
                            value=""
                            {{ old('student_id') ? '' : 'selected' }}
                        >
                            ---
                        </option>

                        @foreach ($students as $student)
                            <option
                                value="{{ $student->id }}"
                                {{ old('faculty_id') == $student->id ? 'selected' : '' }}
                            >
                                {{ $student->user->full_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('student_id')
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
                href="{{ route('guardians.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
@endsection

