<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name',
    'labelText',
    'ratings' => [
        5 => ['label' => 'Excellent', 'bg' => 'bg-green-500', 'border' => 'border-green-500', 'text' => 'text-green-50'],
        4 => ['label' => 'Very Good', 'bg' => 'bg-lime-500', 'border' => 'border-lime-500', 'text' => 'text-lime-50'],
        3 => ['label' => 'Good', 'bg' => 'bg-sky-500', 'border' => 'border-sky-500', 'text' => 'text-sky-50'],
        2 => ['label' => 'Fair', 'bg' => 'bg-yellow-500', 'border' => 'border-yellow-500', 'text' => 'text-yellow-50'],
        1 => ['label' => 'Needs Improvement', 'bg' => 'bg-red-500', 'border' => 'border-red-500', 'text' => 'text-red-50'],
    ],
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'name',
    'labelText',
    'ratings' => [
        5 => ['label' => 'Excellent', 'bg' => 'bg-green-500', 'border' => 'border-green-500', 'text' => 'text-green-50'],
        4 => ['label' => 'Very Good', 'bg' => 'bg-lime-500', 'border' => 'border-lime-500', 'text' => 'text-lime-50'],
        3 => ['label' => 'Good', 'bg' => 'bg-sky-500', 'border' => 'border-sky-500', 'text' => 'text-sky-50'],
        2 => ['label' => 'Fair', 'bg' => 'bg-yellow-500', 'border' => 'border-yellow-500', 'text' => 'text-yellow-50'],
        1 => ['label' => 'Needs Improvement', 'bg' => 'bg-red-500', 'border' => 'border-red-500', 'text' => 'text-red-50'],
    ],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<div class="mb-4 space-y-4">
    <label for="<?php echo e($name); ?>"><?php echo e($labelText); ?></label>

    <div
        class="likert-scale flex flex-col gap-4 lg:flex-row lg:gap-2"
        id="<?php echo e($name); ?>-scale"
    >
        <?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div
                class="likert-box flex flex-1 cursor-pointer items-center justify-center rounded-full border border-zinc-200 p-4 text-center text-sm shadow-sm transition-all duration-150 ease-in-out"
                data-value="<?php echo e($value); ?>"
                data-selected-class="<?php echo e("{$rating['bg']} {$rating['border']} {$rating['text']}"); ?>"
                tabindex="0"
            >
                <?php echo e($rating['label']); ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <input
        id="<?php echo e($name); ?>"
        name="<?php echo e($name); ?>"
        type="hidden"
        value="<?php echo e(old($name)); ?>"
    />

    <?php $__errorArgs = [$name];
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

<?php /**PATH C:\_projects\wimss\resources\views/components/likert-field.blade.php ENDPATH**/ ?>