<nav class="mb-2">
    <ol class="flex flex-wrap items-center gap-2 text-sm font-medium text-zinc-500">
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!$loop->last): ?>
                <li class="flex items-center gap-2 hover:text-zinc-700">
                    <a class="max-w-48 overflow-hidden text-ellipsis text-nowrap" href="<?php echo e($item['url']); ?>">
                        <?php echo e($item['name']); ?>

                    </a>
                    <svg class="size-4 text-zinc-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </li>
            <?php else: ?>
                <li class="max-w-48 overflow-hidden text-ellipsis text-nowrap">
                    <?php echo e($item['name']); ?>

                </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
</nav>

<?php /**PATH C:\_projects\wimss\resources\views/components/breadcrumb.blade.php ENDPATH**/ ?>