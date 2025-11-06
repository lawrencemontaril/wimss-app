<?php $__env->startSection('title', ' - Sign in'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex min-h-dvh items-center justify-center">
        <div class="flex h-dvh overflow-hidden md:max-h-[32rem] md:rounded-xl md:border md:border-zinc-200">
            <div class="hidden p-2 md:block">
                <img
                    class="block h-full object-contain"
                    src="<?php echo e(asset('images/sign_in_banner.png')); ?>"
                    alt="Sign in banner"
                />
            </div>

            <form
                class="flex flex-col justify-center p-8 py-12 md:max-w-96 md:p-12"
                method="POST"
                action="<?php echo e(route('sign_in.post')); ?>"
            >
                <?php echo csrf_field(); ?>
                <a href="<?php echo e(route('index')); ?>">
                    <img
                        class="mx-auto mb-4 h-12 w-12"
                        src="<?php echo e(asset('images/wimss-icon.png')); ?>"
                        alt="WIMSS Icon"
                    />
                </a>

                <h1 class="mb-8 text-center text-2xl font-semibold">
                    Sign in to WIMSS
                </h1>

                <?php $__errorArgs = ['wrong_credential'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="mb-2 rounded-md bg-red-500 p-2 py-1 text-red-50">
                        <span class="text-sm"><?php echo e($message); ?></span>
                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="mb-4 grid grid-cols-1">
                    <?php if (isset($component)) { $__componentOriginal3cf47f8fe36e9fecb8ab96f4432c11f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3cf47f8fe36e9fecb8ab96f4432c11f7 = $attributes; } ?>
<?php $component = App\View\Components\TextInput::resolve(['name' => 'username','type' => 'text','value' => ''.e(old('username')).'','labelText' => 'Username'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

                <div class="mb-4 grid grid-cols-1">
                    <?php if (isset($component)) { $__componentOriginal3cf47f8fe36e9fecb8ab96f4432c11f7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3cf47f8fe36e9fecb8ab96f4432c11f7 = $attributes; } ?>
<?php $component = App\View\Components\TextInput::resolve(['name' => 'password','type' => 'password','value' => '','labelText' => 'Password'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

                <div class="mb-8 flex gap-2">
                    <input
                        class="h-4 w-4 rounded border-zinc-400 text-sky-600 focus:ring-2 focus:ring-sky-500/50"
                        id="remember"
                        name="remember"
                        type="checkbox"
                        <?php echo e(old('remember') ? 'checked' : ''); ?>

                    />
                    <label
                        class="text-xs text-zinc-600"
                        for="remember"
                    >
                        Keep me signed in
                    </label>
                </div>

                <button
                    class="rounded-full bg-sky-500 p-3 text-sm text-sky-50 hover:bg-sky-400"
                    type="submit"
                >
                    Sign in
                </button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.home-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\wimss_prod\resources\views/pages/sign_in.blade.php ENDPATH**/ ?>