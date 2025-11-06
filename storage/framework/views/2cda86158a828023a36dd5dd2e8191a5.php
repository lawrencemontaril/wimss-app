<?php $__env->startSection('title'); ?>
    - Create a Student
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $breadcrumbs = [
            ['name' => 'Students', 'url' => route('students.index')],
            ['name' => $student->user->full_name, 'url' => route('users.show', $student->user->username)],
            ['name' => 'Grades', 'url' => ''],
            ['name' => 'Create', 'url' => route('students.create')],
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

    <h1 class="mb-2 text-2xl font-bold tracking-tight sm:text-3xl">
        Grade <?php echo e($student->user->full_name); ?>

    </h1>
    <p class="mb-4 text-xs uppercase text-zinc-600">
        <?php echo e($student->course->name); ?>

    </p>

    <?php if(!$read): ?>
        <form
            action=""
            method="GET"
        >
            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'hte')): ?>
                <?php echo $__env->make('partials.hte-grading-rubrics', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php elseif (\Illuminate\Support\Facades\Blade::check('role', 'faculty')): ?>
                <?php echo $__env->make('partials.faculty-grading-rubrics', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>

            <div class="mt-4 flex gap-2">
                <button
                    class="max-w-fit text-nowrap rounded-full bg-sky-500 p-3 px-6 text-sm font-semibold text-sky-50 outline-none ring-sky-500/50 transition-all duration-150 ease-in-out hover:bg-sky-600 focus:ring-4"
                    name="read"
                    type="submit"
                    value="true"
                >
                    I have read the rubrics
                </button>
                <a
                    class="max-w-fit text-nowrap rounded-full border border-zinc-200 bg-white p-3 px-6 text-sm font-semibold outline-none ring-zinc-200/50 transition-all duration-150 ease-in-out hover:bg-zinc-50 focus:ring-4"
                    href="<?php echo e(route('dashboard')); ?>"
                >
                    Cancel
                </a>
            </div>
        </form>
    <?php else: ?>
        <?php if (\Illuminate\Support\Facades\Blade::check('role', 'hte')): ?>
            <?php echo $__env->make('partials.hte-grading-form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php elseif (\Illuminate\Support\Facades\Blade::check('role', 'faculty')): ?>

            <form
                action="<?php echo e(route('students.grades-update', $student)); ?>"
                method="POST"
            >
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
                    <div>
                        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'adviser_rating','labelText' => 'Adviser Rating'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ratings' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                10 => ['label' => 'Excellent', 'bg' => 'bg-green-500', 'border' => 'border-green-500', 'text' => 'text-green-50'],
                                8 => ['label' => 'Very Good', 'bg' => 'bg-lime-500', 'border' => 'border-lime-500', 'text' => 'text-lime-50'],
                                6 => ['label' => 'Good', 'bg' => 'bg-sky-500', 'border' => 'border-sky-500', 'text' => 'text-sky-50'],
                                4 => ['label' => 'Fair', 'bg' => 'bg-yellow-500', 'border' => 'border-yellow-500', 'text' => 'text-yellow-50'],
                                2 => ['label' => 'Needs Improvement', 'bg' => 'bg-red-500', 'border' => 'border-red-500', 'text' => 'text-red-50'],
                            ])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalac988c4d0a1cf553d936f10f295d255c)): ?>
<?php $attributes = $__attributesOriginalac988c4d0a1cf553d936f10f295d255c; ?>
<?php unset($__attributesOriginalac988c4d0a1cf553d936f10f295d255c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac988c4d0a1cf553d936f10f295d255c)): ?>
<?php $component = $__componentOriginalac988c4d0a1cf553d936f10f295d255c; ?>
<?php unset($__componentOriginalac988c4d0a1cf553d936f10f295d255c); ?>
<?php endif; ?>
                    </div>
                </div>

                <div class="mt-4 flex gap-2">
                    <button
                        class="max-w-fit text-nowrap rounded-full bg-sky-500 p-3 px-6 text-sm font-semibold text-sky-50 outline-none ring-sky-500/50 transition-all duration-150 ease-in-out hover:bg-sky-600 focus:ring-4"
                        type="submit"
                    >
                        Mark grade
                    </button>
                    <a
                        class="max-w-fit text-nowrap rounded-full border border-zinc-200 bg-white p-3 px-6 text-sm font-semibold outline-none ring-zinc-200/50 transition-all duration-150 ease-in-out hover:bg-zinc-50 focus:ring-4"
                        href="<?php echo e(route('dashboard')); ?>"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\_projects\wimss\resources\views/pages/students/grades/create.blade.php ENDPATH**/ ?>