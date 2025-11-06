<?php $__env->startSection('title-prefix'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <?php echo e($hei->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $breadcrumbs = [
            ['name' => 'HEIs', 'url' => route('heis.index')],
            ['name' => $hei->name, 'url' => route('heis.show', $hei->id)],
        ];
    ?>

    <?php if (isset($component)) { $__componentOriginal269900abaed345884ce342681cdc99f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal269900abaed345884ce342681cdc99f6 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumb::resolve(['items' => $breadcrumbs] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Breadcrumb::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal269900abaed345884ce342681cdc99f6)): ?>
<?php $attributes = $__attributesOriginal269900abaed345884ce342681cdc99f6; ?>
<?php unset($__attributesOriginal269900abaed345884ce342681cdc99f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal269900abaed345884ce342681cdc99f6)): ?>
<?php $component = $__componentOriginal269900abaed345884ce342681cdc99f6; ?>
<?php unset($__componentOriginal269900abaed345884ce342681cdc99f6); ?>
<?php endif; ?>

    <header class="mb-4">
        <div class="text-red-sky flex h-40 items-end justify-center rounded-xl bg-sky-500 p-4 md:justify-start">
            <div>
                <h1 class="text-2xl font-semibold text-sky-950">
                    <?php echo e($hei->name); ?>

                </h1>
                <span class="text-xs text-sky-950">HEI</span>
            </div>
        </div>
    </header>

    <div class="mb-4 rounded-xl border border-zinc-200 bg-white shadow-sm">
        <div class="border-b border-zinc-200 p-2 px-4">
            <span class="font-semibold">HEI Information</span>
        </div>
        <div class="p-4">
            <p class="text-sm">
                <b>Address:</b>
                <?php echo e($hei->address); ?>

            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">
        <div class="rounded-xl border border-b-4 border-zinc-200 border-b-sky-500 bg-white p-4 shadow-sm">
            <p class="text-sm font-medium text-zinc-600">
                <?php echo e(Str::plural('Dean', $hei->deans->count())); ?>

            </p>
            <h4 class="text-4xl font-semibold text-zinc-950">
                <?php echo e($hei->deans->count()); ?>

            </h4>
        </div>
        <div class="rounded-xl border border-b-4 border-zinc-200 border-b-sky-500 bg-white p-4 shadow-sm">
            <p class="text-sm font-medium text-zinc-600">
                <?php echo e(Str::plural('Faculty', $hei->faculties->count())); ?>

            </p>
            <h4 class="text-4xl font-semibold text-zinc-950">
                <?php echo e($hei->faculties->count()); ?>

            </h4>
        </div>
        <div class="rounded-xl border border-b-4 border-zinc-200 border-b-sky-500 bg-white p-4 shadow-sm">
            <p class="text-sm font-medium text-zinc-600">
                <?php echo e($hei->htes->count() > 1 || $hei->htes->count() == 0 ? 'HTEs' : 'HTE'); ?>

            </p>
            <h4 class="text-4xl font-semibold text-zinc-950">
                <?php echo e($hei->htes->count()); ?>

            </h4>
        </div>
        <div class="rounded-xl border border-b-4 border-zinc-200 border-b-sky-500 bg-white p-4 shadow-sm">
            <p class="text-sm font-medium text-zinc-600">
                <?php echo e(Str::plural('Student', $hei->students->count())); ?>

            </p>
            <h4 class="text-4xl font-semibold text-zinc-950">
                <?php echo e($hei->students->count()); ?>

            </h4>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wimssph/public_html/wimss_prod/resources/views/pages/heis/show.blade.php ENDPATH**/ ?>