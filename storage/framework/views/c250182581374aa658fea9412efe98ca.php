<div class="mb-4 space-y-4">
    <label for="<?php echo e($name); ?>"><?php echo e($labelText); ?></label>
    <div
        class="likert-scale flex flex-col gap-4 lg:gap-2 lg:flex-row"
        id="<?php echo e($name); ?>-scale"
    >
        <div
            class="likert-box flex flex-1 cursor-pointer items-center justify-center rounded-full border border-zinc-200 p-4 text-center text-sm shadow-sm transition-all duration-150 ease-in-out"
            data-value="5"
            data-selected-class="bg-green-500 border-green-500 text-green-50"
            tabindex="0"
        >
            Excellent
        </div>
        <div
            class="likert-box flex flex-1 cursor-pointer items-center justify-center rounded-full border border-zinc-200 p-4 text-center text-sm shadow-sm transition-all duration-150 ease-in-out"
            data-value="4"
            data-selected-class="bg-lime-500 border-lime-500 text-lime-50"
            tabindex="0"
        >
            Very Good
        </div>
        <div
            class="likert-box flex flex-1 cursor-pointer items-center justify-center rounded-full border border-zinc-200 p-4 text-center text-sm shadow-sm transition-all duration-150 ease-in-out"
            data-value="3"
            data-selected-class="bg-sky-500 border-sky-500 text-sky-50"
            tabindex="0"
        >
            Good
        </div>
        <div
            class="likert-box flex flex-1 cursor-pointer items-center justify-center rounded-full border border-zinc-200 p-4 text-center text-sm shadow-sm transition-all duration-150 ease-in-out"
            data-value="2"
            data-selected-class="bg-yellow-500 border-yellow-500 text-yellow-50"
            tabindex="0"
        >
            Fair
        </div>
        <div
            class="likert-box flex flex-1 cursor-pointer items-center justify-center rounded-full border border-zinc-200 p-4 text-center text-sm shadow-sm transition-all duration-150 ease-in-out"
            data-value="1"
            data-selected-class="bg-red-500 border-red-500 text-red-50"
            tabindex="0"
        >
            Needs Improvement
        </div>
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

<?php /**PATH C:\wamp\www\wimss_prod\resources\views/components/likert-field.blade.php ENDPATH**/ ?>