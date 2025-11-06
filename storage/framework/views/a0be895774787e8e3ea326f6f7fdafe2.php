<?php if($paginator->hasPages()): ?>
    <nav
        class="my-2 flex items-center justify-between"
        role="navigation"
        aria-label="<?php echo e(__('Pagination Navigation')); ?>"
    >
        <div class="flex flex-1 justify-between sm:hidden">
            <?php if($paginator->onFirstPage()): ?>
                <span
                    class="relative inline-flex cursor-default items-center rounded-xl border border-zinc-200 bg-white px-4 py-2 text-sm font-medium leading-5 text-zinc-500"
                >
                    <?php echo __('pagination.previous'); ?>

                </span>
            <?php else: ?>
                <a
                    class="relative inline-flex items-center rounded-xl border border-sky-200 bg-sky-50 px-4 py-2 text-sm font-medium leading-5 text-sky-500 ring-sky-500/50 transition duration-150 ease-in-out hover:border-sky-300 hover:bg-sky-200 focus:outline-none focus:ring active:bg-sky-500 active:text-sky-50"
                    href="<?php echo e($paginator->previousPageUrl()); ?>"
                >
                    <?php echo __('pagination.previous'); ?>

                </a>
            <?php endif; ?>

            <?php if($paginator->hasMorePages()): ?>
                <a
                    class="relative inline-flex items-center rounded-xl border border-sky-200 bg-sky-50 px-4 py-2 text-sm font-medium leading-5 text-sky-500 ring-sky-500/50 transition duration-150 ease-in-out hover:border-sky-300 hover:bg-sky-200 focus:outline-none focus:ring active:bg-sky-500 active:text-sky-50"
                    href="<?php echo e($paginator->nextPageUrl()); ?>"
                >
                    <?php echo __('pagination.next'); ?>

                </a>
            <?php else: ?>
                <span
                    class="relative inline-flex cursor-default items-center rounded-xl border border-zinc-200 bg-white px-4 py-2 text-sm font-medium leading-5 text-zinc-500"
                >
                    <?php echo __('pagination.next'); ?>

                </span>
            <?php endif; ?>
        </div>

        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <span class="relative z-0 inline-flex rounded-xl shadow-sm rtl:flex-row-reverse">
                    

                    <?php if($paginator->onFirstPage()): ?>
                        <span
                            aria-disabled="true"
                            aria-label="<?php echo e(__('pagination.previous')); ?>"
                        >
                            <span
                                class="relative inline-flex cursor-default items-center rounded-l-xl border border-zinc-200 bg-white px-2 py-2 text-sm font-medium leading-5 text-zinc-300"
                                aria-hidden="true"
                            >
                                <svg
                                    class="size-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15.75 19.5 8.25 12l7.5-7.5"
                                    />
                                </svg>
                            </span>
                        </span>
                    <?php else: ?>
                        <a
                            class="relative inline-flex items-center rounded-l-xl border border-sky-200 bg-sky-50 px-2 py-2 text-sm font-medium leading-5 text-sky-500 ring-sky-500/50 transition duration-150 ease-in-out hover:z-10 hover:border-sky-300 hover:bg-sky-200 focus:z-10 focus:border-sky-500 focus:outline-none focus:ring active:bg-sky-500 active:text-sky-50"
                            href="<?php echo e($paginator->previousPageUrl()); ?>"
                            aria-label="<?php echo e(__('pagination.previous')); ?>"
                            rel="prev"
                        >
                            <svg
                                class="size-5"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 19.5 8.25 12l7.5-7.5"
                                />
                            </svg>
                        </a>
                    <?php endif; ?>

                    
                    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if(is_string($element)): ?>
                            <span aria-disabled="true">
                                <span
                                    class="relative -ml-px inline-flex cursor-default items-center border border-zinc-200 bg-white px-4 py-2 text-sm font-medium leading-5 text-zinc-700"
                                >
                                    <?php echo e($element); ?>

                                </span>
                            </span>
                        <?php endif; ?>

                        
                        <?php if(is_array($element)): ?>
                            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page == $paginator->currentPage()): ?>
                                    <span aria-current="page">
                                        <span
                                            class="relative z-10 -ml-px inline-flex items-center border border-sky-200 bg-sky-500 px-4 py-2 text-sm font-medium leading-5 text-sky-50 transition duration-150 ease-in-out"
                                        >
                                            <?php echo e($page); ?>

                                        </span>
                                    </span>
                                <?php else: ?>
                                    <a
                                        class="relative -ml-px inline-flex items-center border border-zinc-200 bg-white px-4 py-2 text-sm font-medium leading-5 text-zinc-800 ring-sky-500/50 transition duration-150 ease-in-out hover:border-sky-200 hover:bg-sky-50 hover:text-sky-500 focus:z-20 focus:border-sky-300 focus:outline-none focus:ring active:z-20 active:bg-sky-500 active:text-sky-50"
                                        href="<?php echo e($url); ?>"
                                        aria-label="<?php echo e(__('Go to page :page', ['page' => $page])); ?>"
                                    >
                                        <?php echo e($page); ?>

                                    </a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    

                    <?php if($paginator->hasMorePages()): ?>
                        <a
                            class="relative inline-flex items-center rounded-r-xl border border-sky-200 bg-sky-50 px-2 py-2 text-sm font-medium leading-5 text-sky-500 ring-sky-500/50 transition duration-150 ease-in-out hover:z-10 hover:border-sky-300 hover:bg-sky-200 focus:z-10 focus:border-sky-500 focus:outline-none focus:ring active:bg-sky-500 active:text-sky-50"
                            href="<?php echo e($paginator->nextPageUrl()); ?>"
                            aria-label="<?php echo e(__('pagination.next')); ?>"
                            rel="next"
                        >
                            <svg
                                class="size-5"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m8.25 4.5 7.5 7.5-7.5 7.5"
                                />
                            </svg>
                        </a>
                    <?php else: ?>
                        <span
                            aria-disabled="true"
                            aria-label="<?php echo e(__('pagination.next')); ?>"
                        >
                            <span
                                class="relative -ml-px inline-flex cursor-default items-center rounded-r-xl border border-zinc-200 bg-white px-2 py-2 text-sm font-medium leading-5 text-zinc-300"
                                aria-hidden="true"
                            >
                                <svg
                                    class="size-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m8.25 4.5 7.5 7.5-7.5 7.5"
                                    />
                                </svg>
                            </span>
                        </span>
                    <?php endif; ?>
                </span>
            </div>

            <div>
                <p class="text-sm leading-5 text-zinc-700">
                    <?php echo __('Showing'); ?>

                    <?php if($paginator->firstItem()): ?>
                        <span class="font-medium"><?php echo e($paginator->firstItem()); ?></span>
                        <?php echo __('to'); ?>

                        <span class="font-medium"><?php echo e($paginator->lastItem()); ?></span>
                    <?php else: ?>
                        <?php echo e($paginator->count()); ?>

                    <?php endif; ?>
                    <?php echo __('of'); ?>

                    <span class="font-medium"><?php echo e($paginator->total()); ?></span>
                    <?php echo __('results'); ?>

                </p>
            </div>
        </div>
    </nav>
<?php endif; ?>

<?php /**PATH C:\wamp\www\wimss_prod\resources\views/vendor/pagination/tailwind.blade.php ENDPATH**/ ?>