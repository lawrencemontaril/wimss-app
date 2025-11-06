<?php $__env->startSection('title'); ?>
    - Create a Dean
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $breadcrumbs = [['name' => 'Deans', 'url' => route('deans.index')], ['name' => 'Create', 'url' => route('deans.create')]];
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
        Create Dean
    </h1>

    <form
        action="<?php echo e(route('deans.store')); ?>"
        method="POST"
    >
        <?php echo csrf_field(); ?>
        <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'admin')): ?>
                <h4 class="mb-4 text-lg font-semibold">HEI Information</h4>

                <div class="mb-4">
                    <label
                        class="text-sm font-semibold"
                        for="hei_id"
                    >
                        Associated HEI
                        <span class="text-red-500">*</span>
                    </label>
                    <select
                        class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm shadow-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-4 focus:ring-sky-500/50"
                        id="hei_id"
                        name="hei_id"
                    >
                        <option
                            value=""
                            <?php echo e(old('hei_id') ? '' : 'selected'); ?>

                        >---</option>

                        <?php $__currentLoopData = $heis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hei): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                value="<?php echo e($hei->id); ?>"
                                <?php echo e(old('hei_id') == $hei->id ? 'selected' : ''); ?>

                            >
                                <?php echo e($hei->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['hei_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="my-1 text-xs text-red-500"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <hr class="my-6 border-zinc-100" />
            <?php else: ?>
                <input
                    name="hei_id"
                    type="hidden"
                    value="<?php echo e(auth()->user()->profile->hei->id); ?>"
                />
            <?php endif; ?>

            <?php echo $__env->make('components.user-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="mt-4 flex gap-2">
            <button
                class="max-w-fit text-nowrap rounded-full bg-sky-500 p-3 px-6 text-sm font-semibold text-sky-50 outline-none ring-sky-500/50 transition-all duration-150 ease-in-out hover:bg-sky-600 focus:ring-4"
                type="submit"
            >
                Create
            </button>
            <a
                class="max-w-fit text-nowrap rounded-full border border-zinc-200 bg-white p-3 px-6 text-sm font-semibold outline-none ring-zinc-200/50 transition-all duration-150 ease-in-out hover:bg-zinc-50 focus:ring-4"
                href="<?php echo e(route('deans.index')); ?>"
            >
                Cancel
            </a>
        </div>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wimssph/public_html/wimss_prod/resources/views/pages/deans/create.blade.php ENDPATH**/ ?>