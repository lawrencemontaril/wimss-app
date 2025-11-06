@extends('layouts.home-layout')

@section('title', ' - Sign in')

@section('content')
    <div class="flex min-h-dvh items-center justify-center">
        <div class="flex h-dvh overflow-hidden md:max-h-[32rem] md:rounded-xl md:border md:border-zinc-200">
            <div class="hidden p-2 md:block">
                <img
                    class="block h-full object-contain"
                    src="{{ asset('images/sign_in_banner.png') }}"
                    alt="Sign in banner"
                />
            </div>

            <form
                class="flex flex-col justify-center p-8 py-12 md:max-w-96 md:p-12"
                method="POST"
                action="{{ route('sign_in.post') }}"
            >
                @csrf
                <a href="{{ route('index') }}">
                    <img
                        class="mx-auto mb-4 h-12 w-12"
                        src="{{ asset('images/wimss-icon.png') }}"
                        alt="WIMSS Icon"
                    />
                </a>

                <h1 class="mb-8 text-center text-2xl font-semibold">
                    Sign in to WIMSS
                </h1>

                @error('wrong_credential')
                    <div class="mb-2 rounded-md bg-red-500 p-2 py-1 text-red-50">
                        <span class="text-sm">{{ $message }}</span>
                    </div>
                @enderror

                <div class="mb-4 grid grid-cols-1">
                    <x-text-input
                        name="username"
                        type="text"
                        value="{{ old('username') }}"
                        labelText="Username"
                    />
                </div>

                <div class="mb-4 grid grid-cols-1">
                    <x-text-input
                        name="password"
                        type="password"
                        value=""
                        labelText="Password"
                    />
                </div>

                <div class="mb-8 flex gap-2">
                    <input
                        class="h-4 w-4 rounded border-zinc-400 text-sky-600 focus:ring-2 focus:ring-sky-500/50"
                        id="remember"
                        name="remember"
                        type="checkbox"
                        {{ old('remember') ? 'checked' : '' }}
                    />
                    <label
                        class="text-xs text-zinc-600"
                        for="remember"
                    >
                        Keep me signed in
                    </label>
                </div>

                <button
                    class="rounded-full bg-sky-500 p-3 text-sm text-sky-50 hover:bg-sky-400"
                    type="submit"
                >
                    Sign in
                </button>
            </form>
        </div>
    </div>
@endsection

