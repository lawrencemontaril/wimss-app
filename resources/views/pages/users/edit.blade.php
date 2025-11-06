@extends('layouts.dashboard-layout')

@section('title-prefix')
@endsection

@section('title')
    Edit {{ $user->full_name }}
@endsection

@section('content')
    @php
        $types = [
            'admins' => 'Users',
            'deans' => 'Deans',
            'faculties' => 'Faculties',
            'htes' => 'HTEs',
            'students' => 'Students',
            'guardians' => 'Guardians',
        ];

        $type = Str::plural($user->role);

        $breadcrumbs = [
            ['name' => $types[$type], 'url' => $type != 'admins' ? route($type . '.index') : ''],
            ['name' => '@' . $user->username, 'url' => route('users.show', $user)],
            ['name' => 'Edit', 'url' => route('users.edit', $user)],
        ];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <h1 class="mb-4 text-2xl font-bold tracking-tight sm:text-3xl">
        Edit {{ $user->full_name }}
    </h1>

    @if (session('success'))
        <div class="mb-4 rounded-xl border border-yellow-600 bg-yellow-500 p-2 px-4 text-sm text-yellow-50">
            {{ session('success') }}
        </div>
    @endif

    <form
        action="{{ route('users.update', ['user' => $user->username]) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
            <h4 class="mb-4 text-lg font-semibold">User Information</h4>
            <div class="mb-4 grid grid-cols-1 gap-4 lg:grid-cols-2">
                <div>
                    <x-text-input
                        name="first_name"
                        type="text"
                        value="{{ old('first_name', $user->first_name) }}"
                        labelText="First Name"
                    />
                </div>

                <div>
                    <x-text-input
                        name="last_name"
                        type="text"
                        value="{{ old('last_name', $user->last_name) }}"
                        labelText="Last Name"
                    />
                </div>
            </div>

            <div class="mb-4">
                <x-text-input
                    name="contact_number"
                    type="text"
                    value="{{ old('contact_number', $user->contact_number) }}"
                    labelText="Contact Number"
                />
            </div>

            <div class="mb-4">
                <label
                    class="text-sm font-semibold"
                    for="sex"
                >
                    Sex
                    <span class="text-red-500">*</span>
                </label>

                <select
                    class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm shadow-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-4 focus:ring-sky-500/50"
                    id="sex"
                    name="sex"
                >
                    <option
                        value=""
                        {{ old('sex', $user->sex) ? '' : 'selected' }}
                    >---</option>

                    <option
                        value="male"
                        {{ old('sex', $user->sex) == 'male' ? 'selected' : '' }}
                    >
                        Male
                    </option>

                    <option
                        value="female"
                        {{ old('sex', $user->sex) == 'female' ? 'selected' : '' }}
                    >
                        Female
                    </option>
                </select>
                @error('sex')
                    <p class="my-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <x-text-input
                    name="username"
                    type="text"
                    value="{{ old('username', $user->username) }}"
                    labelText="Username"
                />
            </div>

            <div class="mb-4">
                <x-text-input
                    name="password"
                    type="password"
                    value="{{ old('password') }}"
                    labelText="New Password"
                    :required="false"
                />
            </div>

            <div>
                <x-text-input
                    name="password_confirmation"
                    type="password"
                    value="{{ old('password_confirmation') }}"
                    labelText="Confirm New Password"
                    :required="false"
                />
            </div>
        </div>

        <div class="mt-4 flex gap-2">
            <button
                class="max-w-fit text-nowrap rounded-full bg-yellow-500 p-3 px-6 text-sm font-semibold text-yellow-50 outline-none ring-yellow-500/50 transition-all duration-150 ease-in-out hover:bg-yellow-400 focus:ring-4"
                type="submit"
            >
                Update
            </button>
            <a
                class="max-w-fit text-nowrap rounded-full border border-zinc-200 bg-white p-3 px-6 text-sm font-semibold outline-none ring-zinc-200/50 transition-all duration-150 ease-in-out hover:bg-zinc-50 focus:ring-4"
                href="{{ $type != 'admins' ? route($type . '.index') : 'index' }}"
            >
                Cancel
            </a>
        </div>
    </form>
@endsection

