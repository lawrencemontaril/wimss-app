<?php $__env->startSection('title'); ?>
    - Create a Student
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $breadcrumbs = [
            ['name' => 'Students', 'url' => route('students.index')],
            ['name' => $student->user->full_name, 'url' => route('users.show', $student->user->username)],
            ['name' => 'Grades', 'url' => ''],
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

    <div class="rounded-xl border border-zinc-200 bg-white">
        <div class="border-b border-zinc-200 p-4">
            <p class="font-semibold">Student Report Card</p>
        </div>
        <div class="p-2">
            <div class="mb-2 grid grid-cols-1 gap-2 border border-zinc-200 lg:grid-cols-3">
                <div class="p-2">
                    <p class="text-xs">FULL NAME</p>
                    <p class="text-base font-semibold">
                        <?php echo e($student->user->full_name); ?>

                    </p>
                </div>
                <div class="p-2">
                    <p class="text-xs">COURSE</p>
                    <p class="text-base font-semibold">
                        <?php echo e($student->course->name); ?>

                    </p>
                </div>
                <div class="p-2">
                    <p class="text-xs">SCHOOL YEAR</p>
                    <p class="text-base font-semibold">
                        <?php echo e($student->school_year); ?> - <?php echo e($student->school_year + 1); ?>

                    </p>
                </div>
            </div>

            <div class="mb-2 grid grid-cols-1 gap-2 border border-zinc-200 lg:grid-cols-3">
                <div class="p-2">
                    <p class="text-xs">PROFESSOR</p>
                    <p class="text-base font-semibold">
                        <?php echo e($student->faculty->user->full_name); ?>

                    </p>
                </div>
                <div class="col-span-2 p-2">
                    <p class="text-xs">HTE</p>
                    <p class="text-base font-semibold">
                        <?php echo e($student->hte->name); ?>

                    </p>
                </div>
            </div>

            <div class="mb-2 border border-zinc-200">
                <div class="bg-zinc-200 p-2 text-center text-sm font-medium">
                    Student Personality
                </div>

                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'General Appearance','value' => $student->per1]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'General Appearance','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->per1)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'Social Maturity','value' => $student->per2]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'Social Maturity','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->per2)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'Mental Alertness','value' => $student->per3]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'Mental Alertness','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->per3)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'Social Confidence','value' => $student->per4]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'Social Confidence','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->per4)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'Observance to Office Etiquettes','value' => $student->per5]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'Observance to Office Etiquettes','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->per5)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>

                <div class="grid grid-cols-3 border-t border-zinc-200 lg:grid-cols-7">
                    <div class="col-span-2 flex items-center p-2 text-sm font-medium lg:col-span-6">
                        Total
                    </div>
                    <div class="flex items-center justify-center p-2 pe-4 text-xl font-semibold">
                        <?php echo e($student->per_total); ?>/25
                    </div>
                </div>
            </div>

            <div class="mb-2 border border-zinc-200">
                <div class="bg-zinc-200 p-2 text-center text-sm font-medium">
                    Technical Knowledge & Skills
                </div>

                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'Typing Skills','value' => $student->tech1]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'Typing Skills','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->tech1)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'PC Operations','value' => $student->tech2]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'PC Operations','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->tech2)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'Programming Skills','value' => $student->tech3]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'Programming Skills','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->tech3)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'Basic Network Administration','value' => $student->tech4]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'Basic Network Administration','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->tech4)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'Computer Troubleshooting','value' => $student->tech5]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'Computer Troubleshooting','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->tech5)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'Communication Skills','value' => $student->tech6]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'Communication Skills','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->tech6)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>

                <div class="grid grid-cols-3 border-t border-zinc-200 lg:grid-cols-7">
                    <div class="col-span-2 flex items-center p-2 text-sm font-medium lg:col-span-6">
                        Total
                    </div>
                    <div class="flex items-center justify-center p-2 pe-4 text-xl font-semibold">
                        <?php echo e($student->tech_total); ?>/30
                    </div>
                </div>
            </div>

            <div class="mb-2 border border-zinc-200">
                <div class="bg-zinc-200 p-2 text-center text-sm font-medium">
                    Office Work Management
                </div>

                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'Quality and Quantity of Work','value' => $student->office1]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'Quality and Quantity of Work','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->office1)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'Promptness','value' => $student->office2]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'Promptness','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->office2)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'Reliability and Trustworthiness','value' => $student->tech3]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'Reliability and Trustworthiness','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->tech3)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'Interest and Initiatives','value' => $student->office4]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'Interest and Initiatives','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->office4)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'Cooperativeness and Discipline','value' => $student->office5]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'Cooperativeness and Discipline','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->office5)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'Observance of Proper Office Procedures','value' => $student->office6]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'Observance of Proper Office Procedures','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->office6)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal8c6c51a956747039fdf08fdae70dee96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c6c51a956747039fdf08fdae70dee96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.likert-grid','data' => ['labelText' => 'Judgement Ability','value' => $student->office7]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['labelText' => 'Judgement Ability','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($student->office7)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $attributes = $__attributesOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__attributesOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c6c51a956747039fdf08fdae70dee96)): ?>
<?php $component = $__componentOriginal8c6c51a956747039fdf08fdae70dee96; ?>
<?php unset($__componentOriginal8c6c51a956747039fdf08fdae70dee96); ?>
<?php endif; ?>

                <div class="grid grid-cols-3 border-t border-zinc-200 lg:grid-cols-7">
                    <div class="col-span-2 flex items-center p-2 text-sm font-medium lg:col-span-6">
                        Total
                    </div>
                    <div class="flex items-center justify-center p-2 pe-4 text-xl font-semibold">
                        <?php echo e($student->office_total); ?>/35
                    </div>
                </div>
            </div>

            <div class="mb-2 border border-zinc-200">
                <div class="bg-zinc-200 p-2 text-center text-sm font-medium">
                    Final Grade
                </div>

                <div class="grid grid-cols-3 border-t border-zinc-200 lg:grid-cols-7">
                    <div class="col-span-2 flex items-center p-2 text-sm font-medium lg:col-span-6">
                        HTE Rating
                    </div>
                    <div class="flex items-center justify-center p-2 pe-4 text-xl font-semibold">
                        <?php echo e($student->likert_total); ?>/90
                    </div>
                </div>

                <div class="grid grid-cols-3 border-t border-zinc-200 lg:grid-cols-7">
                    <div class="col-span-2 flex items-center p-2 text-sm font-medium lg:col-span-6">
                        Adviser Rating
                    </div>
                    <div class="flex items-center justify-center p-2 pe-4 text-xl font-semibold">
                        <?php echo e($student->adviser_rating); ?>/10
                    </div>
                </div>

                <div class="grid grid-cols-3 border-t border-zinc-200 lg:grid-cols-7">
                    <div class="col-span-2 flex items-center p-2 text-sm font-medium lg:col-span-6">
                        Total
                    </div>
                    <div class="flex items-center justify-center p-2 pe-4 text-xl font-semibold">
                        <?php echo e($student->final_grade); ?>/100
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\wimss_prod\resources\views/pages/students/grades/show.blade.php ENDPATH**/ ?>