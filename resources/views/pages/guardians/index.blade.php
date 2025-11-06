@extends('layouts.dashboard-layout')

@section('title')
    - Guardians
@endsection

@section('content')
    @php
        $breadcrumbs = [['name' => 'Guardians', 'url' => route('guardians.index')], ['name' => 'List', 'url' => route('guardians.index')]];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <header class="mb-4">
        <h1 class="mb-2 text-2xl font-bold tracking-tight sm:text-3xl">
            Guardians
        </h1>
        <p class="hidden text-sm text-zinc-600 lg:inline">
            Are individuals who are responsible for a student’s well-being and
            support, typically a parent or legal guardian, involved in coordinating
            with the faculty and monitoring the student's academic and professional
            progress.
        </p>
    </header>

    <div class="mb-4 flex items-center justify-between gap-1 rounded-xl border border-zinc-200 bg-white p-1">
        <div class="flex items-center gap-1">
            @can('create', \App\Models\Guardian::class)
                <a
                    class="flex items-center gap-2 rounded-lg bg-sky-500 px-3 py-2 text-xs text-sky-50 hover:bg-sky-400"
                    href="{{ route('guardians.create') }}"
                >
                    <x-heroicon-o-plus class="size-4" />
                    New guardian
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
            <x-table.th>Child</x-table.th>
            @can('create', \App\Models\Guardian::class)
                <x-table.th>Action</x-table.th>
            @endcan
        </x-slot:header>

        <x-slot:body>
            @if ($guardians->isNotEmpty())
                @foreach ($guardians as $guardian)
                    <x-table.row href="{{ route('users.show', $guardian->username) }}">
                        <x-table.cell>
                            {{ $loop->index + 1 }}
                        </x-table.cell>

                        <x-table.cell>
                            {{ $guardian->full_name }}
                        </x-table.cell>

                        <x-table.cell>
                            <div class="flex items-center gap-2">
                                <a
                                    class="inline-block h-full max-w-32 overflow-hidden text-ellipsis text-nowrap rounded-md bg-zinc-100 px-2 py-1 hover:bg-zinc-200 md:max-w-full"
                                    href="{{ route('users.show', $guardian->profile->child->user->username) }}"
                                >
                                    {{ $guardian->profile->child->user->full_name }}
                                </a>
                            </div>
                        </x-table.cell>

                        @can('create', \App\Models\Guardian::class)
                            <x-table.cell>
                                <div class="flex items-center gap-2">
                                    @can('update', $guardian->profile)
                                        <a
                                            class="group inline-flex items-center justify-center gap-1 text-yellow-600"
                                            href="{{ route('users.edit', $guardian->username) }}"
                                        >
                                            <x-heroicon-m-pencil-square />
                                            <span class="font-bold group-hover:underline">
                                                Edit
                                            </span>
                                        </a>
                                    @endcan

                                    @can('delete', $guardian->profile)
                                        <button
                                            class="delete-btn group inline-flex items-center justify-center gap-1 text-red-600"
                                            data-modal-target="delete-modal"
                                            data-modal-toggle="delete-modal"
                                            data-url="{{ route('guardians.destroy', $guardian->profile) }}"
                                            type="button"
                                        >
                                            <x-heroicon-s-trash />
                                            <span class="font-bold group-hover:underline">
                                                Delete
                                            </span>
                                            </butt>
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
        {{ $guardians->onEachSide(1)->links('vendor.pagination.tailwind') }}
    </div>
@endsection

