<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['labelText', 'value']));

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

foreach (array_filter((['labelText', 'value']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="grid grid-cols-3 lg:grid-cols-7">
    <div class="flex items-center bg-zinc-100 p-2 text-sm font-medium">
        <?php echo e($labelText); ?>

    </div>
    <div
        class="<?php if($value == 5): ?> bg-green-500 text-green-50 flex <?php else: ?> hidden lg:flex <?php endif; ?> items-center justify-center p-2 text-sm">
        Excellent
    </div>
    <div
        class="<?php if($value == 4): ?> bg-lime-500 text-lime-50 flex <?php else: ?> hidden lg:flex <?php endif; ?> items-center justify-center p-2 text-sm">
        Very Good
    </div>
    <div
        class="<?php if($value == 3): ?> bg-sky-500 text-sky-50 flex <?php else: ?> hidden lg:flex <?php endif; ?> items-center justify-center p-2 text-sm">
        Good
    </div>
    <div
        class="<?php if($value == 2): ?> bg-yellow-500 text-yellow-50 flex <?php else: ?> hidden lg:flex <?php endif; ?> items-center justify-center p-2 text-sm">
        Fair
    </div>
    <div
        class="<?php if($value == 1): ?> bg-red-500 text-red-50 flex <?php else: ?> hidden lg:flex <?php endif; ?> items-center justify-center p-2 text-sm">
        Needs improvement
    </div>
    <div class="flex items-center justify-center p-2 text-xl font-semibold">
        <?php echo e($value); ?>

    </div>
</div>

<?php /**PATH C:\wamp\www\wimss_prod\resources\views/components/likert-grid.blade.php ENDPATH**/ ?>