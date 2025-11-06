<div class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-3">
    <div class="rounded-xl border border-b-4 border-zinc-200 border-b-sky-500 bg-white p-4 shadow-sm">
        <p class="text-sm font-medium text-zinc-600">
            Faculties
        </p>
        <h4 class="text-4xl font-semibold text-zinc-950">
            {{ $faculty_count }}
        </h4>
    </div>
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

<hr class="my-4" />

<div class="mb-4 grid grid-cols-1 gap-4 lg:grid-cols-12">
    <div class="col-span-full rounded-xl border border-zinc-200 bg-white shadow-sm lg:col-span-4">
        <div class="border-b border-b-zinc-200 p-2 px-4">
            <span class="text-sm">Recommendation Status Chart</span>
        </div>
        <div class="w-full p-8 lg:p-2">
            <livewire:grade-status-chart />
        </div>
    </div>
    <div class="col-span-full rounded-xl border border-zinc-200 bg-white shadow-sm lg:col-span-8">
        <div class="border-b border-b-zinc-200 p-2 px-4">
            <span class="text-sm">Top Programs by absoprtion rate (%)</span>
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

