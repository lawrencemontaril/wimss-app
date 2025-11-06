<?php $__env->startSection('title', '- Update ' . $hei->name); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $breadcrumbs = [
            ['name' => 'HEIs', 'url' => route('heis.index')],
            ['name' => $hei->name, 'url' => route('heis.show', $hei)],
            ['name' => 'Edit', 'url' => route('heis.edit', $hei)],
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

    <h1 class="mb-4 text-2xl font-bold tracking-tight sm:text-3xl">
        Edit <?php echo e($hei->name); ?>

    </h1>

    <?php if(session('success')): ?>
        <div class="mb-4 rounded-xl border border-yellow-600 bg-yellow-500 p-2 px-4 text-sm text-yellow-50">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form
        action="<?php echo e(route('heis.update', $hei)); ?>"
        method="POST"
    >
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
            <div class="mb-4">
                <?php if (isset($component)) { $__componentOriginal3cf47f8fe36e9fecb8ab96f4432c11f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3cf47f8fe36e9fecb8ab96f4432c11f7 = $attributes; } ?>
<?php $component = App\View\Components\TextInput::resolve(['name' => 'name','type' => 'text','value' => ''.e(old('name', $hei->name)).'','labelText' => 'Name'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\TextInput::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3cf47f8fe36e9fecb8ab96f4432c11f7)): ?>
<?php $attributes = $__attributesOriginal3cf47f8fe36e9fecb8ab96f4432c11f7; ?>
<?php unset($__attributesOriginal3cf47f8fe36e9fecb8ab96f4432c11f7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3cf47f8fe36e9fecb8ab96f4432c11f7)): ?>
<?php $component = $__componentOriginal3cf47f8fe36e9fecb8ab96f4432c11f7; ?>
<?php unset($__componentOriginal3cf47f8fe36e9fecb8ab96f4432c11f7); ?>
<?php endif; ?>
            </div>

            <div class="mb-4">
                <?php if (isset($component)) { $__componentOriginal3cf47f8fe36e9fecb8ab96f4432c11f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3cf47f8fe36e9fecb8ab96f4432c11f7 = $attributes; } ?>
<?php $component = App\View\Components\TextInput::resolve(['name' => 'address','type' => 'text','value' => ''.e(old('address', $hei->address)).'','labelText' => 'Address'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\TextInput::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3cf47f8fe36e9fecb8ab96f4432c11f7)): ?>
<?php $attributes = $__attributesOriginal3cf47f8fe36e9fecb8ab96f4432c11f7; ?>
<?php unset($__attributesOriginal3cf47f8fe36e9fecb8ab96f4432c11f7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3cf47f8fe36e9fecb8ab96f4432c11f7)): ?>
<?php $component = $__componentOriginal3cf47f8fe36e9fecb8ab96f4432c11f7; ?>
<?php unset($__componentOriginal3cf47f8fe36e9fecb8ab96f4432c11f7); ?>
<?php endif; ?>
            </div>
        </div>

        <div class="mt-4 flex gap-2">
            <button
                class="max-w-fit text-nowrap rounded-full bg-yellow-500 p-3 px-6 text-sm font-semibold text-yellow-50 outline-offset-2 outline-yellow-500 hover:bg-yellow-400"
                type="submit"
            >
                Update
            </button>
            <a
                class="max-w-fit text-nowrap rounded-full border border-zinc-200 bg-white p-3 px-6 text-sm font-semibold outline-offset-2 outline-zinc-800 hover:bg-zinc-50"
                href="<?php echo e(route('heis.index')); ?>"
            >
                Cancel
            </a>
        </div>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wimssph/public_html/wimss_prod/resources/views/pages/heis/edit.blade.php ENDPATH**/ ?>