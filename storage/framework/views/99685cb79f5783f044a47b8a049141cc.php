<label
    class="text-sm font-semibold"
    for="<?php echo e($name); ?>"
>
    <?php echo e($labelText); ?>

    <?php if($required): ?>
        <span class="text-red-500">*</span>
    <?php else: ?>
        <span class="text-xs italic text-zinc-500">(Optional)</span>
    <?php endif; ?>
</label>
<input
    class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-0"
    id="<?php echo e($name); ?>"
    name="<?php echo e($name); ?>"
    type="<?php echo e($type); ?>"
    value="<?php echo e($value); ?>"
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

<?php /**PATH /home/wimssph/public_html/wimss_prod/resources/views/components/text-input.blade.php ENDPATH**/ ?>