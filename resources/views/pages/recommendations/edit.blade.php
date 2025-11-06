@extends('layouts.dashboard-layout')

@section('title-prefix')
@endsection

@section('title')
    Edit {{ $recommendation->name }}
@endsection

@section('content')
    @php
        $breadcrumbs = [
            ['name' => 'Recommendations', 'url' => route('recommendations.index')],
            ['name' => $recommendation->label, 'url' => '#'],
            ['name' => 'Edit', 'url' => route('recommendations.edit', $recommendation)],
        ];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <h1 class="mb-4 text-2xl font-bold tracking-tight sm:text-3xl">
        Edit {{ $recommendation->label }}
    </h1>

    @if (session('success'))
        <div class="mb-4 rounded-xl border border-yellow-600 bg-yellow-500 p-2 px-4 text-sm text-yellow-50">
            {{ session('success') }}
        </div>
    @endif

    <form
        action="{{ route('recommendations.update', $recommendation) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
            <div class="mb-4 grid grid-cols-1 gap-4 lg:grid-cols-2">
                <div>
                    <x-text-input
                        name="label"
                        type="text"
                        value="{{ old('name', $recommendation->label) }}"
                        labelText="Label"
                    />
                </div>

                <div>
                    <x-text-input
                        name="code"
                        type="text"
                        value="{{ old('code', $recommendation->code) }}"
                        labelText="Code"
                    />
                </div>
            </div>

            <div class="mb-4">
                <label
                    class="block text-sm font-semibold"
                    for="message"
                >
                    Message
                </label>

                <textarea
                    class="my-1 block w-full rounded-md border border-zinc-200 bg-white p-3 text-sm text-zinc-800 shadow-sm focus:border-sky-500 focus:outline-offset-0 focus:outline-sky-500"
                    id="description"
                    name="message"
                    rows="3"
                >{{ old('message', $recommendation->message) }}</textarea>
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
                href="{{ route('recommendations.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
@endsection

