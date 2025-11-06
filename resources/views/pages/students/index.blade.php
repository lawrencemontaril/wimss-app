@extends('layouts.dashboard-layout')

@section('title')
    - Students
@endsection

@section('content')
    @php
        $breadcrumbs = [['name' => 'Students', 'url' => route('students.index')], ['name' => 'List', 'url' => route('students.index')]];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <header class="mb-4">
        <h1 class="mb-2 text-2xl font-bold tracking-tight sm:text-3xl">Students</h1>
        <p class="hidden text-sm text-zinc-600 lg:inline">
            Students are individuals enrolled in an academic program, participating
            in
            internships and educational activities.
        </p>
    </header>

    <div class="mb-4 flex items-center justify-between gap-1 rounded-xl border border-zinc-200 bg-white p-1">
        <div class="flex items-center gap-1">
            @can('create', \App\Models\Student::class)
                <a
                    class="flex items-center gap-2 rounded-lg bg-sky-500 px-3 py-2 text-xs text-sky-50 hover:bg-sky-400"
                    href="{{ route('students.create') }}"
                >
                    <x-heroicon-o-plus class="size-4" />
                    New student
                </a>

                <a
                    class="flex items-center gap-2 rounded-lg bg-sky-500 px-3 py-2 text-xs text-sky-50 hover:bg-sky-400"
                    href="{{ route('students.import') }}"
                >
                    <x-heroicon-o-arrow-down-tray class="size-4" />
                    Import students
                </a>
            @endcan
        </div>

        @can('export', \App\Models\Student::class)
            <a
                class="flex items-center gap-2 rounded-lg bg-green-500 px-3 py-2 text-xs text-green-50 hover:bg-green-400 sm:w-auto"
                href="{{ route('students.export') }}"
            >
                <x-heroicon-o-arrow-up-tray class="size-4" />

                Export CSV
            </a>
        @endcan
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
            <x-table.th>Recommendation</x-table.th>
            @can('create', \App\Models\Student::class)
                <x-table.th>Action</x-table.th>
            @endcan
        </x-slot:header>

        <x-slot:body>
            @if ($students->isNotEmpty())
                @foreach ($students as $student)
                    <x-table.row href="{{ route('users.show', $student->username) }}">
                        <x-table.cell>
                            {{ $loop->index + 1 }}
                        </x-table.cell>

                        <x-table.cell>
                            {{ $student->full_name }}
                        </x-table.cell>

                        @role('admin')
                            <x-table.cell>
                                <div class="flex items-center gap-2">
                                    <a
                                        class="inline-block h-full max-w-32 overflow-hidden text-ellipsis text-nowrap rounded-md bg-zinc-100 px-2 py-1 hover:bg-zinc-200 md:max-w-full"
                                        href="{{ route('heis.show', $student->profile->hei->id) }}"
                                    >
                                        {{ $student->profile->hei->name }}
                                    </a>
                                </div>
                            </x-table.cell>
                        @endrole

                        <x-table.cell>

                            <div class="flex items-center gap-2">
                                <a
                                    href="{{ route('students.grades-show', $student->profile) }}"
                                    @class([
                                        'flex w-fit items-center gap-1 rounded-md px-2 py-[7px] text-xs',
                                        'bg-green-500 text-green-50 hover:bg-green-400' =>
                                            $student->profile->isPassed,
                                        'bg-red-500 text-red-50 hover:bg-red-400' => $student->profile->isFailed,
                                        'bg-yellow-500 text-yellow-50 hover:bg-yellow-400' =>
                                            $student->profile->isPending,
                                    ])
                                >
                                    <x-heroicon-s-eye class="size-4" />
                                    <span class="hidden md:inline">
                                        {{ $student->profile->isPassed ? 'Absorbed' : '' }}
                                        {{ $student->profile->isFailed ? 'Not absorbed' : '' }}
                                        {{ $student->profile->isPending ? 'Pending' : '' }}
                                    </span>
                                    @if (!$student->profile->isPending)
                                        <span>({{ $student->profile->final_grade }})</span>
                                    @endif
                                </a>
                            </div>
                        </x-table.cell>

                        @can('create', \App\Models\Student::class)
                            <x-table.cell>
                                <div class="flex items-center gap-4">
                                    @can('update', $student->profile)
                                        <a
                                            class="group inline-flex items-center justify-center gap-1 text-yellow-600"
                                            href="{{ route('users.edit', $student->username) }}"
                                        >
                                            <x-heroicon-m-pencil-square />
                                            <span class="font-bold group-hover:underline">
                                                Edit
                                            </span>
                                        </a>
                                    @endcan

                                    @can('delete', $student->profile)
                                        <button
                                            class="delete-btn group inline-flex items-center justify-center gap-1 text-red-600"
                                            data-modal-target="delete-modal"
                                            data-modal-toggle="delete-modal"
                                            data-url="{{ route('students.destroy', $student->profile) }}"
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
                    <td colspan="5">
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
        {{ $students->onEachSide(1)->links('vendor.pagination.tailwind') }}
    </div>
@endsection

