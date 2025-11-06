@extends('layouts.dashboard-layout')

@section('title')
    - Create an HTE
@endsection

@section('content')
    @php
        $breadcrumbs = [['name' => 'HTEs', 'url' => route('htes.index')], ['name' => 'Create', 'url' => route('htes.create')]];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <h1 class="mb-4 text-2xl font-bold tracking-tight sm:text-3xl">Create HTE</h1>
    <form
        action="{{ route('htes.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
            <h4 class="mb-4 text-lg font-semibold">HTE Information</h4>

            <div class="@role('admin') lg:grid-cols-2 @endrole @role('faculty') hidden @else grid @endrole mb-4 grid-cols-1 gap-4">
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
                            >
                                ---
                            </option>

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
                            >
                                ---
                            </option>

                            @foreach ($faculties as $faculty)
                                <option
                                    value="{{ $faculty->id }}"
                                    {{ old('faculty_id') == $faculty->id ? 'selected' : '' }}
                                >
                                    {{ $faculty->user->first_name }}
                                    {{ $faculty->user->last_name }}
                                    @role('admin')
                                        - {{ $faculty->hei->name }}
                                    @endrole
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

            <div class="mb-4 grid grid-cols-1 gap-4 lg:grid-cols-2">
                <div>
                    <x-text-input
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        labelText="Company Name"
                    />
                </div>

                <div>
                    <x-text-input
                        name="nature"
                        type="text"
                        value="{{ old('nature') }}"
                        labelText="Nature of Company"
                    />
                </div>
            </div>

            <div class="mb-4 grid grid-cols-1 gap-4 lg:grid-cols-2">
                <div>
                    <x-text-input
                        name="company_number"
                        type="text"
                        value="{{ old('company_number') }}"
                        labelText="Company Contact Number"
                    />
                </div>

                <div>
                    <x-text-input
                        name="president"
                        type="text"
                        value="{{ old('president') }}"
                        labelText="Company President"
                    />
                </div>
            </div>

            <div class="mb-4">
                <x-text-input
                    name="address"
                    type="text"
                    value="{{ old('address') }}"
                    labelText="Company Address"
                />
            </div>

            <div class="mb-4">
                <label
                    class="text-sm font-semibold"
                    for="memorandum"
                >
                    Memorandum of Agreement
                    <span class="text-red-500">*</span>
                </label>
                <input
                    class="my-1 block w-full cursor-pointer rounded-lg border border-zinc-200 bg-white text-sm shadow-sm outline-none transition-all duration-150 ease-in-out file:border-none file:bg-zinc-200 file:p-2 focus:border-sky-500 focus:ring-4 focus:ring-sky-500/50"
                    id="memorandum"
                    name="memorandum"
                    type="file"
                    value="{{ old('memorandum') }}"
                />
                <p class="text-xs text-zinc-600">
                    Acceptable format: PDF, JPG, or PNG. Max file size: 8MB.
                </p>
                @error('memorandum')
                    <p class="my-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
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
                href="{{ route('htes.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
@endsection

