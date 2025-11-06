<div class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-3">
    <div class="rounded-xl border border-b-4 border-zinc-200 border-b-sky-500 bg-white p-4 shadow-sm">
        <p class="text-sm font-medium text-zinc-600">
            Faculties
        </p>
        <h4 class="text-4xl font-semibold text-zinc-950">
            <?php echo e($faculty_count); ?>

        </h4>
    </div>
    <div class="rounded-xl border border-b-4 border-zinc-200 border-b-sky-500 bg-white p-4 shadow-sm">
        <p class="text-sm font-medium text-zinc-600">
            HTEs
        </p>
        <h4 class="text-4xl font-semibold text-zinc-950">
            <?php echo e($hte_count); ?>

        </h4>
    </div>
    <div class="rounded-xl border border-b-4 border-zinc-200 border-b-sky-500 bg-white p-4 shadow-sm">
        <p class="text-sm font-medium text-zinc-600">
            Students
        </p>
        <h4 class="text-4xl font-semibold text-zinc-950">
            <?php echo e($student_count); ?>

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
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('grade-status-chart', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1751665779-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
    <div class="col-span-full rounded-xl border border-zinc-200 bg-white shadow-sm lg:col-span-8">
        <div class="border-b border-b-zinc-200 p-2 px-4">
            <span class="text-sm">Top Programs by absoprtion rate (%)</span>
        </div>
        <div class="p-4">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('top-department-chart', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1751665779-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
</div>

<div class="mb-4 grid grid-cols-1 gap-4 lg:grid-cols-12">
    <div class="col-span-full rounded-xl border border-zinc-200 bg-white shadow-sm">
        <div class="border-b border-b-zinc-200 p-2 px-4">
            <span class="text-sm">Top HTEs by absoprtion rate (%)</span>
        </div>
        <div class="p-4">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('top-hte-chart', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1751665779-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 gap-4 lg:grid-cols-12">
    <div class="col-span-full rounded-xl border border-zinc-200 bg-white shadow-sm">
        <div class="border-b border-b-zinc-200 p-2 px-4">
            <span class="text-sm">Top 10 students by final grade</span>
        </div>
        <div class="p-4">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('top-student-chart', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1751665779-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
</div>

<?php /**PATH C:\_projects\wimss\resources\views/components/dashboard/dean-dashboard.blade.php ENDPATH**/ ?>