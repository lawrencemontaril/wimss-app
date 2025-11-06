@extends('layouts.dashboard-layout')

@section('title')
    - Create a Dean
@endsection

@section('content')
    @php
        $breadcrumbs = [['name' => 'Deans', 'url' => route('deans.index')], ['name' => 'Create', 'url' => route('deans.create')]];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <h1 class="mb-4 text-2xl font-bold tracking-tight sm:text-3xl">
        Create Dean
    </h1>

    <form
        action="{{ route('deans.store') }}"
        method="POST"
    >
        @csrf
        <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
            @role('admin')
                <h4 class="mb-4 text-lg font-semibold">HEI Information</h4>

                <div class="mb-4">
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

                <hr class="my-6 border-zinc-100" />
            @else
                <input
                    name="hei_id"
                    type="hidden"
                    value="{{ auth()->user()->profile->hei->id }}"
                />
            @endrole

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
                href="{{ route('deans.index') }}"
            >
                Cancel
            </a>
        </div>
    </form>
@endsection

