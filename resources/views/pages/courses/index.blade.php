@extends('layouts.dashboard-layout')

@section('title', ' - Courses')

@section('content')
    @php
        $breadcrumbs = [['name' => 'Courses', 'url' => route('courses.index')], ['name' => 'List', 'url' => route('courses.index')]];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <header class="mb-4">
        <h1 class="mb-2 text-2xl font-bold tracking-tight sm:text-3xl">Courses</h1>
        <p class="hidden text-sm text-zinc-600 lg:inline">
            A tertiary program or department within a Higher Education Institution
            (HEI) that offers specialized education and training in a particular
            field
            of study.
        </p>
    </header>

    <div class="mb-4 flex items-center justify-between gap-1 rounded-xl border border-zinc-200 bg-white p-1">
        <div class="flex items-center gap-1">
            @can('create', \App\Models\Course::class)
                <a class="flex items-center gap-2 rounded-lg bg-sky-500 px-3 py-2 text-xs text-sky-50 hover:bg-sky-400" href="{{ route('courses.create') }}">
                    <x-heroicon-o-plus class="size-4" />
                    New course
                </a>
            @endcan
        </div>
    </div>

    <x-table.table>
        @include('components.search-bar')

        <x-slot:header>
            <x-table.th>#</x-table.th>
            <x-table.th>Name</x-table.th>
            <x-table.th>Code</x-table.th>
            <x-table.th>Action</x-table.th>
        </x-slot:header>

        <x-slot:body>
            @if ($courses->isNotEmpty())
                @foreach ($courses as $course)
                    <x-table.row href="{{ route('courses.show', $course->id) }}">
                        <x-table.cell>
                            {{ $loop->index + 1 }}
                        </x-table.cell>

                        <x-table.cell>
                            {{ $course->name }}
                            </a>
                        </x-table.cell>

                        <x-table.cell>
                            {{ $course->code }}
                        </x-table.cell>

                        <x-table.cell>
                            @can('update', $course)
                                <div class="flex items-center gap-4">
                                    <a class="group inline-flex items-center justify-center gap-1 text-yellow-600" href="{{ route('courses.edit', $course->id) }}">
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
                            <img class="w-32" src="{{ asset('images/empty-data.svg') }}" alt="Empty data" />
                            <h4 class="text-xl font-semibold text-zinc-500">No data</h4>
                        </div>
                    </td>
                </tr>
            @endif
        </x-slot:body>
    </x-table.table>

    <div>
        {{ $courses->onEachSide(1)->links('vendor.pagination.tailwind') }}
    </div>
@endsection

