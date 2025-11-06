<h4 class="mb-4 text-lg font-semibold">User Information</h4>
<div class="mb-4 grid grid-cols-1 gap-4 lg:grid-cols-2">
  <div>
    <?php if (isset($component)) { $__componentOriginal3cf47f8fe36e9fecb8ab96f4432c11f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3cf47f8fe36e9fecb8ab96f4432c11f7 = $attributes; } ?>
<?php $component = App\View\Components\TextInput::resolve(['type' => 'text','labelText' => 'First Name','name' => 'first_name','value' => ''.e(old('first_name')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php $component = App\View\Components\TextInput::resolve(['type' => 'text','labelText' => 'Last Name','name' => 'last_name','value' => ''.e(old('last_name')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
  <?php if (isset($component)) { $__componentOriginal3cf47f8fe36e9fecb8ab96f4432c11f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3cf47f8fe36e9fecb8ab96f4432c11f7 = $attributes; } ?>
<?php $component = App\View\Components\TextInput::resolve(['type' => 'text','labelText' => 'Contact Number','name' => 'contact_number','value' => ''.e(old('contact_number')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php $component = App\View\Components\TextInput::resolve(['type' => 'text','labelText' => 'Username','name' => 'username','value' => ''.e(old('username')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php $component = App\View\Components\TextInput::resolve(['type' => 'password','labelText' => 'Password','name' => 'password','value' => ''.e(old('password')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php $component = App\View\Components\TextInput::resolve(['type' => 'password','labelText' => 'Confirm Password','name' => 'password_confirmation','value' => ''.e(old('password_confirmation')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php /**PATH /home/wimssph/public_html/wimss_prod/resources/views/components/user-form.blade.php ENDPATH**/ ?>