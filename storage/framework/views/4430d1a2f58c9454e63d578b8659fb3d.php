<?php $__env->startSection('title-prefix'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    Edit <?php echo e($recommendation->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $breadcrumbs = [
            ['name' => 'Recommendations', 'url' => route('recommendations.index')],
            ['name' => $recommendation->label, 'url' => '#'],
            ['name' => 'Edit', 'url' => route('recommendations.edit', $recommendation)],
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
        Edit <?php echo e($recommendation->label); ?>

    </h1>

    <?php if(session('success')): ?>
        <div class="mb-4 rounded-xl border border-yellow-600 bg-yellow-500 p-2 px-4 text-sm text-yellow-50">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form
        action="<?php echo e(route('recommendations.update', $recommendation)); ?>"
        method="POST"
    >
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
            <div class="mb-4 grid grid-cols-1 gap-4 lg:grid-cols-2">
                <div>
                    <?php if (isset($component)) { $__componentOriginal3cf47f8fe36e9fecb8ab96f4432c11f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3cf47f8fe36e9fecb8ab96f4432c11f7 = $attributes; } ?>
<?php $component = App\View\Components\TextInput::resolve(['name' => 'label','type' => 'text','value' => ''.e(old('name', $recommendation->label)).'','labelText' => 'Label'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

                <div>
                    <?php if (isset($component)) { $__componentOriginal3cf47f8fe36e9fecb8ab96f4432c11f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3cf47f8fe36e9fecb8ab96f4432c11f7 = $attributes; } ?>
<?php $component = App\View\Components\TextInput::resolve(['name' => 'code','type' => 'text','value' => ''.e(old('code', $recommendation->code)).'','labelText' => 'Code'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

            <div class="mb-4">
                <label
                    class="block text-sm font-semibold"
                    for="message"
                >
                    Message
                </label>

                <textarea
                    class="my-1 block w-full rounded-md border border-zinc-200 bg-white p-3 text-sm text-zinc-800 shadow-sm focus:border-sky-500 focus:outline-offset-0 focus:outline-sky-500"
                    id="description"
                    name="message"
                    rows="3"
                ><?php echo e(old('message', $recommendation->message)); ?></textarea>
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
                href="<?php echo e(route('recommendations.index')); ?>"
            >
                Cancel
            </a>
        </div>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\_projects\wimss\resources\views/pages/recommendations/edit.blade.php ENDPATH**/ ?>