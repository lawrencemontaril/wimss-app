@extends('layouts.dashboard-layout')

@section('title', ' - HEIs')

@section('content')

    <x-breadcrumb :items="[['name' => 'HEIs', 'url' => route('heis.index')], ['name' => 'List', 'url' => route('heis.index')]]" />

    <header class="mb-4">
        <h1 class="mb-2 text-2xl font-bold tracking-tight sm:text-3xl">HEIs</h1>
        <p class="hidden text-sm text-zinc-600 lg:inline">
            An educational organization that provides tertiary education, including
            universities, colleges, and specialized institutes, offering advanced
            academic and professional programs.
        </p>
    </header>

    <div class="mb-4 flex items-center justify-between gap-1 rounded-xl border border-zinc-200 bg-white p-1">
        <div class="flex items-center gap-1">
            @can('create', \App\Models\Hei::class)
                <a
                    class="flex items-center gap-2 rounded-lg bg-sky-500 px-3 py-2 text-xs text-sky-50 hover:bg-sky-400"
                    href="{{ route('heis.create') }}"
                >
                    <x-heroicon-o-plus class="size-4" />
                    New HEI
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
            <x-table.th>Action</x-table.th>
        </x-slot:header>

        <x-slot:body>
            @if ($heis->isNotEmpty())
                @foreach ($heis as $hei)
                    <x-table.row href="{{ route('heis.show', $hei->id) }}">
                        <x-table.th>
                            {{ ($heis->currentPage() - 1) * $heis->perPage() + $loop->iteration }}
                        </x-table.th>

                        <x-table.cell>
                            {{ $hei->name }}
                        </x-table.cell>

                        <x-table.cell>
                            <div class="flex items-center gap-4">
                                <a
                                    class="group inline-flex items-center justify-center gap-1 text-yellow-600"
                                    href="{{ route('heis.edit', $hei->id) }}"
                                >
                                    <x-heroicon-m-pencil-square />
                                    <span class="font-bold group-hover:underline">
                                        Edit
                                    </span>
                                </a>
                                <button
                                    class="delete-btn group inline-flex items-center justify-center gap-1 text-red-600"
                                    data-modal-target="delete-modal"
                                    data-modal-toggle="delete-modal"
                                    data-url="{{ route('heis.destroy', $hei->id) }}"
                                    type="button"
                                >
                                    <x-heroicon-s-trash />
                                    <span class="font-bold group-hover:underline">
                                        Delete
                                    </span>
                                </button>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            @else
                <tr>
                    <td colspan="3">
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
        {{ $heis->onEachSide(1)->links('vendor.pagination.tailwind') }}
    </div>
@endsection

