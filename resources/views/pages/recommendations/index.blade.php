@extends('layouts.dashboard-layout')

@section('title', ' - Recommendations')

@section('content')
    @php
        $breadcrumbs = [['name' => 'Recommendations', 'url' => route('recommendations.index')], ['name' => 'List', 'url' => route('recommendations.index')]];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <header class="mb-4">
        <h1 class="mb-2 text-2xl font-bold tracking-tight sm:text-3xl">Recommendations</h1>
    </header>

    {{-- <div class="mb-4 flex items-center justify-between gap-1 rounded-xl border border-zinc-200 bg-white p-1">
        <div class="flex items-center gap-1">
            @can('create', \App\Models\Recommendation::class)
                <a
                    class="flex items-center gap-2 rounded-lg bg-sky-500 px-3 py-2 text-xs text-sky-50 hover:bg-sky-400"
                    href="{{ route('recommendations.create') }}"
                >
                    <x-heroicon-o-plus class="size-4" />
                    New recommendation
                </a>
            @endcan
        </div>
    </div> --}}

    <x-table.table>
        @include('components.search-bar')

        <x-slot:header>
            <x-table.th>#</x-table.th>
            <x-table.th>Label</x-table.th>
            <x-table.th>Code</x-table.th>
            <x-table.th>Action</x-table.th>
        </x-slot:header>

        <x-slot:body>
            @if ($recommendations->isNotEmpty())
                @foreach ($recommendations as $recommendation)
                    <x-table.row>
                        <x-table.cell>
                            {{ $loop->index + 1 }}
                        </x-table.cell>

                        <x-table.cell>
                            {{ $recommendation->label }}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            {{ $recommendation->code }}
                        </x-table.cell>

                        <x-table.cell>
                            @can('update', $recommendation)
                                <div class="flex items-center gap-4">
                                    <a
                                        class="group inline-flex items-center justify-center gap-1 text-yellow-600"
                                        href="{{ route('recommendations.edit', $recommendation->id) }}"
                                    >
                                        <x-heroicon-m-pencil-square />
                                        <span class="font-bold group-hover:underline">
                                            Edit
                                        </span>
                                    </a>
                                </div>
                            @endcan
                        </x-table.cell>
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
        {{ $recommendations->onEachSide(1)->links('vendor.pagination.tailwind') }}
    </div>
@endsection

