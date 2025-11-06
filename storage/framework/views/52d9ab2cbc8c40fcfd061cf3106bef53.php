<?php $__env->startSection('title'); ?>
    - Import students
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $breadcrumbs = [['name' => 'Students', 'url' => route('students.index')], ['name' => 'Import', 'url' => route('students.import')]];
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
        Import Students
    </h1>

    <?php if(session('error')): ?>
        <div class="mb-4 rounded-xl border border-red-600 bg-red-500 p-2 px-4 text-red-50">
            <span class="text-sm"><?php echo e(session('error')); ?></span>
        </div>
    <?php endif; ?>

    <form
        action="<?php echo e(route('students.import-post')); ?>"
        method="POST"
        enctype="multipart/form-data"
    >
        <?php echo csrf_field(); ?>

        <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
            <h4 class="mb-4 text-lg font-semibold">Student Information</h4>

            <div class="<?php if (\Illuminate\Support\Facades\Blade::check('notrole', 'faculty')): ?> <?php endif; ?> <?php if (\Illuminate\Support\Facades\Blade::check('role', 'admin')): ?> lg:grid-cols-2 <?php endif; ?> mb-4 grid grid-cols-1 gap-4">
                <?php if (\Illuminate\Support\Facades\Blade::check('role', 'admin')): ?>
                    <div>
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

                            >
                                ---
                            </option>

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
                <?php else: ?>
                    <input
                        name="hei_id"
                        type="hidden"
                        value="<?php echo e(auth()->user()->profile->hei->id); ?>"
                    />
                <?php endif; ?>

                <?php if (\Illuminate\Support\Facades\Blade::check('notrole', 'faculty')): ?>
                    
                    <div>
                        <label
                            class="text-sm font-semibold"
                            for="faculty_id"
                        >
                            Associated Faculty Coordinator
                            <span class="text-red-500">*</span>
                        </label>
                        <select
                            class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm shadow-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-4 focus:ring-sky-500/50"
                            id="faculty_id"
                            name="faculty_id"
                            value="<?php echo e(old('faculty_id')); ?>"
                        >
                            <option
                                value=""
                                <?php echo e(old('hei_id') ? '' : 'selected'); ?>

                            >
                                ---
                            </option>

                            <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                    value="<?php echo e($faculty->id); ?>"
                                    <?php echo e(old('faculty_id') == $faculty->id ? 'selected' : ''); ?>

                                >
                                    <?php echo e($faculty->user->first_name); ?>

                                    <?php echo e($faculty->user->last_name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['faculty_id'];
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
                <?php else: ?>
                    <input
                        name="faculty_id"
                        type="hidden"
                        value="<?php echo e(auth()->user()->profile->id); ?>"
                    />
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label
                    class="text-sm font-semibold"
                    for="hte_id"
                >
                    Associated HTE
                    <span class="text-red-500">*</span>
                </label>
                <select
                    class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm shadow-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-4 focus:ring-sky-500/50"
                    id="hte_id"
                    name="hte_id"
                >
                    <option
                        value=""
                        <?php echo e(old('hte_id') ? '' : 'selected'); ?>

                    >---</option>

                    <?php $__currentLoopData = $htes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option
                            value="<?php echo e($hte->id); ?>"
                            <?php echo e(old('hte_id') == $hte->id ? 'selected' : ''); ?>

                        >
                            <?php echo e($hte->name); ?>: <?php echo e($hte->user->full_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['hte_id'];
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

            <div class="mb-4 grid grid-cols-1 gap-4 lg:grid-cols-2">
                
                <div>
                    <label
                        class="text-sm font-semibold"
                        for="course_id"
                    >
                        Course
                        <span class="text-red-500">*</span>
                    </label>
                    <select
                        class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm shadow-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-4 focus:ring-sky-500/50"
                        id="course_id"
                        name="course_id"
                    >
                        <option
                            value=""
                            <?php echo e(old('course_id') ? '' : 'selected'); ?>

                        >
                            ---
                        </option>

                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                value="<?php echo e($course->id); ?>"
                                <?php echo e(old('course_id') == $course->id ? 'selected' : ''); ?>

                            >
                                <?php echo e($course->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['course_id'];
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

                
                <div>
                    <label
                        class="text-sm font-semibold"
                        for="school_year"
                    >
                        School Year
                        <span class="text-red-500">*</span>
                    </label>
                    <select
                        class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm shadow-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-4 focus:ring-sky-500/50"
                        id="school_year"
                        name="school_year"
                    >
                        <option
                            value=""
                            <?php echo e(old('school_year') ? '' : 'selected'); ?>

                        >
                            ---
                        </option>

                        <?php $__currentLoopData = $school_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                value="<?php echo e($school_year); ?>"
                                <?php echo e(old('school_year') == $school_year ? 'selected' : ''); ?>

                            >
                                <?php echo e($school_year); ?> - <?php echo e($school_year + 1); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['school_year'];
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
            </div>

            <div class="mb-4">
                <label
                    class="text-sm font-semibold"
                    for="student-csv"
                >
                    Student CSV file
                    <span class="text-red-500">*</span>
                </label>
                <p class="mb-2 text-xs text-zinc-600">
                    Required columns: first_name, last_name, contact_number, username, password
                </p>
                <input
                    class="my-1 block w-full cursor-pointer rounded-lg border border-zinc-200 bg-white text-sm shadow-sm outline-none transition-all duration-150 ease-in-out file:border-none file:bg-zinc-200 file:p-2 focus:border-sky-500 focus:ring-4 focus:ring-sky-500/50"
                    id="student-csv"
                    name="student-csv"
                    type="file"
                    value="<?php echo e(old('student-csv')); ?>"
                />

                <p class="text-xs text-zinc-600">
                    Acceptable format: CSV. Max file size: 8MB.
                </p>
                <?php $__errorArgs = ['student-csv'];
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
        </div>

        <div class="mt-4 flex gap-2">
            <button
                class="max-w-fit text-nowrap rounded-full bg-sky-500 p-3 px-6 text-sm font-semibold text-sky-50 outline-none ring-sky-500/50 transition-all duration-150 ease-in-out hover:bg-sky-600 focus:ring-4"
                type="submit"
            >
                Import
            </button>
            <a
                class="max-w-fit text-nowrap rounded-full border border-zinc-200 bg-white p-3 px-6 text-sm font-semibold outline-none ring-zinc-200/50 transition-all duration-150 ease-in-out hover:bg-zinc-50 focus:ring-4"
                href="<?php echo e(route('students.index')); ?>"
            >
                Cancel
            </a>
        </div>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wimssph/public_html/wimss_prod/resources/views/pages/students/import.blade.php ENDPATH**/ ?>