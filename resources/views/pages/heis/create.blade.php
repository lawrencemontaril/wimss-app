@extends('layouts.dashboard-layout')

@section('title', '- Create an HEI')

@section('content')
    @php
        $breadcrumbs = [['name' => 'HEIs', 'url' => route('heis.index')], ['name' => 'Create', 'url' => route('heis.create')]];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <h1 class="mb-4 text-2xl font-bold tracking-tight sm:text-3xl">Create HEI</h1>
    <form
        action="{{ route('heis.store') }}"
        method="POST"
    >
        @csrf

        <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
            <div class="mb-4">
                <x-text-input
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    labelText="Name"
                />
            </div>

            <div class="mb-4">
                <x-text-input
                    name="address"
                    type="text"
                    value="{{ old('address') }}"
                    labelText="Address"
                />
            </div>
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
                href="{{ route('heis.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
@endsection

