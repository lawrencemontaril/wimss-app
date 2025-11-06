<form
    action="<?php echo e(route('students.grades-update', $student)); ?>"
    method="POST"
>
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
        <h4 class="mb-6 text-2xl font-bold">I. Student Personality</h4>
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'per1','labelText' => 'General Appearance'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'per2','labelText' => 'Social Maturity'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'per3','labelText' => 'Mental Alertness'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'per4','labelText' => 'Social Confidence'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'per5','labelText' => 'Observance to Office Etiquettes'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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

        <hr class="my-6 border-zinc-200" />

        <h4 class="mb-6 text-2xl font-bold">II. Technical Knowledge & Skills</h4>
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'tech1','labelText' => 'Typing Skills'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'tech2','labelText' => 'PC Operations'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'tech3','labelText' => 'Programming Skills'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'tech4','labelText' => 'Basic Network Administration'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'tech5','labelText' => 'Computer Troubleshooting'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'tech6','labelText' => 'Communication Skills'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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

        <hr class="my-6 border-zinc-200" />

        <h4 class="mb-6 text-2xl font-bold">III. Office Work Management</h4>
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'office1','labelText' => 'Quality and Quantity of Work'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'office2','labelText' => 'Promptness'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'office3','labelText' => 'Reliability and Trustworthiness'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'office4','labelText' => 'Interest and Initiatives'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'office5','labelText' => 'Cooperativeness and Discipline'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'office6','labelText' => 'Observance of Proper Office Procedures'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
        <?php if (isset($component)) { $__componentOriginalac988c4d0a1cf553d936f10f295d255c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac988c4d0a1cf553d936f10f295d255c = $attributes; } ?>
<?php $component = App\View\Components\LikertField::resolve(['name' => 'office7','labelText' => 'Judgement Ability'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('likert-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikertField::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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

    <div class="mt-4 flex gap-2">
        <button
            class="max-w-fit text-nowrap rounded-full bg-sky-500 p-3 px-6 text-sm font-semibold text-sky-50 outline-none ring-sky-500/50 transition-all duration-150 ease-in-out hover:bg-sky-600 focus:ring-4"
            type="submit"
        >
            Mark grade
        </button>
        <a
            class="max-w-fit text-nowrap rounded-full border border-zinc-200 bg-white p-3 px-6 text-sm font-semibold outline-none ring-zinc-200/50 transition-all duration-150 ease-in-out hover:bg-zinc-50 focus:ring-4"
            href="<?php echo e(route('students.index')); ?>"
        >
            Cancel
        </a>
    </div>
</form>

<?php /**PATH /home/wimssph/public_html/wimss_prod/resources/views/partials/hte-grading-form.blade.php ENDPATH**/ ?>