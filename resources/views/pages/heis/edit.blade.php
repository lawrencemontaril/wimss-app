@extends('layouts.dashboard-layout')

@section('title', '- Update ' . $hei->name)

@section('content')
    @php
        $breadcrumbs = [
            ['name' => 'HEIs', 'url' => route('heis.index')],
            ['name' => $hei->name, 'url' => route('heis.show', $hei)],
            ['name' => 'Edit', 'url' => route('heis.edit', $hei)],
        ];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <h1 class="mb-4 text-2xl font-bold tracking-tight sm:text-3xl">
        Edit {{ $hei->name }}
    </h1>

    @if (session('success'))
        <div class="mb-4 rounded-xl border border-yellow-600 bg-yellow-500 p-2 px-4 text-sm text-yellow-50">
            {{ session('success') }}
        </div>
    @endif

    <form
        action="{{ route('heis.update', $hei) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
            <div class="mb-4">
                <x-text-input
                    name="name"
                    type="text"
                    value="{{ old('name', $hei->name) }}"
                    labelText="Name"
                />
            </div>

            <div class="mb-4">
                <x-text-input
                    name="address"
                    type="text"
                    value="{{ old('address', $hei->address) }}"
                    labelText="Address"
                />
            </div>
        </div>

        <div class="mt-4 flex gap-2">
            <button
                class="max-w-fit text-nowrap rounded-full bg-yellow-500 p-3 px-6 text-sm font-semibold text-yellow-50 outline-offset-2 outline-yellow-500 hover:bg-yellow-400"
                type="submit"
            >
                Update
            </button>
            <a
                class="max-w-fit text-nowrap rounded-full border border-zinc-200 bg-white p-3 px-6 text-sm font-semibold outline-offset-2 outline-zinc-800 hover:bg-zinc-50"
                href="{{ route('heis.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
@endsection

