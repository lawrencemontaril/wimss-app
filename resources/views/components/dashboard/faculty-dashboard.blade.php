<div class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
    <div class="rounded-xl border border-b-4 border-zinc-200 border-b-sky-500 bg-white p-4 shadow-sm">
        <p class="text-sm font-medium text-zinc-600">
            HTEs
        </p>
        <h4 class="text-4xl font-semibold text-zinc-950">
            {{ $hte_count }}
        </h4>
    </div>
    <div class="rounded-xl border border-b-4 border-zinc-200 border-b-sky-500 bg-white p-4 shadow-sm">
        <p class="text-sm font-medium text-zinc-600">
            Students
        </p>
        <h4 class="text-4xl font-semibold text-zinc-950">
            {{ $student_count }}
        </h4>
    </div>
</div>

@if ($ug_students->isNotEmpty())
    <h1 class="mb-4 text-2xl font-bold tracking-tight sm:text-3xl">
        Ungraded students
    </h1>

    <x-table.table>
        @include('components.search-bar')

        <x-slot:header>
            <x-table.th>#</x-table.th>
            <x-table.th>Name</x-table.th>
            <x-table.th>Action</x-table.th>
        </x-slot:header>

        <x-slot:body>
            @foreach ($ug_students as $ug_student)
                <x-table.row href="{{ route('users.show', $ug_student->username) }}">
                    <x-table.cell>
                        {{ $loop->index + 1 }}
                    </x-table.cell>

                    <x-table.cell>
                        {{ $ug_student->full_name }}
                    </x-table.cell>

                    <x-table.cell>
                        <div class="flex items-center gap-4">
                            <a
                                class="group inline-flex items-center justify-center gap-1 text-sky-600"
                                href="{{ route('students.grades-create', $ug_student->profile) }}"
                                wire:navigate.hover
                            >
                                <x-heroicon-m-pencil-square />
                                <span class="font-bold group-hover:underline">
                                    Rate
                                </span>
                            </a>
                        </div>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot:body>
    </x-table.table>

    <div>
        {{ $ug_students->onEachSide(1)->links('vendor.pagination.tailwind') }}
    </div>
@endif

<hr class="my-4" />

<div class="mb-4 grid grid-cols-1 gap-4 lg:grid-cols-12">
    <div class="col-span-full rounded-xl border border-zinc-200 bg-white shadow-sm lg:col-span-4">
        <div class="border-b border-b-zinc-200 p-2 px-4">
            <span class="text-sm">Grade status chart</span>
        </div>
        <div class="w-full p-8 lg:p-2">
            <livewire:grade-status-chart />
        </div>
    </div>
    <div class="col-span-full rounded-xl border border-zinc-200 bg-white shadow-sm lg:col-span-8">
        <div class="border-b border-b-zinc-200 p-2 px-4">
            <span class="text-sm">Top departments by absoprtion rate (%)</span>
        </div>
        <div class="p-4">
            <livewire:top-department-chart />
        </div>
    </div>
</div>

<div class="mb-4 grid grid-cols-1 gap-4 lg:grid-cols-12">
    <div class="col-span-full rounded-xl border border-zinc-200 bg-white shadow-sm">
        <div class="border-b border-b-zinc-200 p-2 px-4">
            <span class="text-sm">Top HTEs by absoprtion rate (%)</span>
        </div>
        <div class="p-4">
            <livewire:top-hte-chart />
        </div>
    </div>
</div>

<div class="grid grid-cols-1 gap-4 lg:grid-cols-12">
    <div class="col-span-full rounded-xl border border-zinc-200 bg-white shadow-sm">
        <div class="border-b border-b-zinc-200 p-2 px-4">
            <span class="text-sm">Top 10 students by final grade</span>
        </div>
        <div class="p-4">
            <livewire:top-student-chart />
        </div>
    </div>
</div>

