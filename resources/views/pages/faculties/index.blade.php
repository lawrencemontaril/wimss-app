@extends('layouts.dashboard-layout')

@section('title')
    - Faculties
@endsection

@section('content')
    @php
        $breadcrumbs = [['name' => 'Faculties', 'url' => route('faculties.index')], ['name' => 'List', 'url' => route('faculties.index')]];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <header class="mb-4">
        <h1 class="mb-2 text-2xl font-bold tracking-tight sm:text-3xl">
            SIP/Faculty Coordinators
        </h1>
        <p class="text-sm text-zinc-600 lg:inline">
            Faculty members manage Host Training Establishments (HTEs), guide
            students, and coordinate with their parents to ensure effective academic
            and professional training.
        </p>
    </header>

    <div class="mb-4 flex items-center justify-between gap-1 rounded-xl border border-zinc-200 bg-white p-1">
        <div class="flex items-center gap-1">
            @can('create', \App\Models\Faculty::class)
                <a
                    class="flex items-center gap-2 rounded-lg bg-sky-500 px-3 py-2 text-xs text-sky-50 hover:bg-sky-400"
                    href="{{ route('faculties.create') }}"
                >
                    <x-heroicon-o-plus class="size-4" />
                    New faculty
                </a>
            @endcan
        </div>
    </div>

    @include('partials.delete-modal')

    <x-table.table>
        @include('components.search-bar')

        <x-slot:header>
            <x-table.th>#</x-table.th>
            <x-table.th>Name</x-table.th>
            @role('admin')
                <x-table.th>HEI</x-table.th>
            @endrole
            @can('create', \App\Models\Faculty::class)
                <x-table.th>Action</x-table.th>
            @endcan
        </x-slot:header>

        <x-slot:body>
            @if ($faculties->isNotEmpty())
                @foreach ($faculties as $faculty)
                    <x-table.row href="{{ route('users.show', $faculty->username) }}">
                        <x-table.cell>
                            {{ $loop->index + 1 }}
                        </x-table.cell>

                        <x-table.cell>
                            {{ $faculty->full_name }}
                        </x-table.cell>

                        @role('admin')
                            <x-table.cell>
                                <div class="flex items-center gap-2">
                                    <a
                                        class="inline-block h-full max-w-32 overflow-hidden text-ellipsis text-nowrap rounded-md bg-zinc-100 px-2 py-1 hover:bg-zinc-200 md:max-w-full"
                                        href="{{ route('heis.show', $faculty->profile->hei->id) }}"
                                    >
                                        {{ $faculty->profile->hei->name }}
                                    </a>
                                </div>
                            </x-table.cell>
                        @endrole

                        @can('create', \App\Models\Faculty::class)
                            <x-table.cell>
                                <div class="flex items-center gap-4">
                                    @can('update', $faculty->profile)
                                        <a
                                            class="group inline-flex items-center justify-center gap-1 text-yellow-600"
                                            href="{{ route('users.edit', $faculty->username) }}"
                                        >
                                            <x-heroicon-m-pencil-square />
                                            <span class="font-bold group-hover:underline">
                                                Edit
                                            </span>
                                        </a>
                                    @endcan

                                    @can('delete', $faculty->profile)
                                        <button
                                            class="delete-btn group inline-flex items-center justify-center gap-1 text-red-600"
                                            data-modal-target="delete-modal"
                                            data-modal-toggle="delete-modal"
                                            data-url="{{ route('faculties.destroy', $faculty->profile) }}"
                                            type="button"
                                        >
                                            <x-heroicon-s-trash />
                                            <span class="font-bold group-hover:underline">
                                                Delete
                                            </span>
                                        </button>
                                    @endcan
                                </div>
                            </x-table.cell>
                        @endcan
                    </x-table.row>
                @endforeach
            @else
                <tr>
                    <td colspan="4">
                        <div class="flex min-h-96 flex-col items-center justify-center gap-8">
                            <img
                                class="w-32"
                                src="{{ asset('images/empty-data.svg') }}"
                                alt="Empty data"
                            />
                            <h4 class="text-xl font-semibold text-zinc-500">No data</h4>
                        </div>
                    </td>
                </tr>
            @endif
        </x-slot:body>
    </x-table.table>

    <div>
        {{ $faculties->onEachSide(1)->links('vendor.pagination.tailwind') }}
    </div>

@endsection

