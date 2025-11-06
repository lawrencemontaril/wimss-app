<?php $__env->startSection('title'); ?>
    <?php echo e($user->full_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $breadcrumbs = [['name' => 'Users', 'url' => '#'], ['name' => '@' . $user->username, 'url' => route('users.show', $user->username)]];
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

    <header class="mb-8 mt-4 flex items-center gap-4">
        <div
            class="flex h-24 w-24 items-center justify-center rounded-full bg-zinc-950 p-2 text-4xl text-zinc-50"
            id="profile-dropdown-btn"
        >
            <?php echo e($user->first_name[0] . $user->last_name[0]); ?>

        </div>
        <div class="flex flex-col gap-2">
            <p class="text-2xl font-semibold">
                <?php echo e($user->first_name . ' ' . $user->last_name); ?>

            </p>
            <span class="text-xs uppercase"><?php echo e($user->role); ?></span>
        </div>
    </header>

    <div class="mb-4 grid w-full grid-cols-12 gap-4">
        <div class="col-span-full lg:col-span-9">
            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'dean', $user)): ?>
                <div class="rounded-xl border border-zinc-200 bg-white shadow-sm">
                    <div class="border-b border-zinc-200 p-2 px-4">
                        <span class="font-semibold">Dean Information</span>
                    </div>
                    <div class="p-4">
                        <p class="mb-2 text-sm">
                            <b>Contact Number:</b>
                            <?php echo e($user->contact_number); ?>

                        </p>

                        <p class="mb-2 text-sm">
                            <b>HEI:</b>
                            <a
                                class="hover:underline"
                                href="<?php echo e(route('heis.show', $user->profile->hei)); ?>"
                            >
                                <?php echo e($user->profile->hei->name); ?>

                            </a>
                        </p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'faculty', $user)): ?>
                <div class="rounded-xl border border-zinc-200 bg-white shadow-sm">
                    <div class="border-b border-zinc-200 p-2 px-4">
                        <span class="font-semibold">Faculty Information</span>
                    </div>
                    <div class="p-4">
                        <p class="mb-2 text-sm">
                            <b>Contact Number:</b>
                            <?php echo e($user->contact_number); ?>

                        </p>

                        <p class="mb-2 text-sm">
                            <b>HEI:</b>
                            <a
                                class="hover:underline"
                                href="<?php echo e(route('heis.show', $user->profile->hei)); ?>"
                            >
                                <?php echo e($user->profile->hei->name); ?>

                            </a>
                        </p>

                        <p class="mb-2 text-sm">
                            <b>Department:</b>
                            <?php echo e($user->profile->department->name); ?>

                        </p>

                        <p class="mb-2 text-sm">
                            <b>HTEs:</b>
                            <?php if($user->profile->htes->isNotEmpty()): ?>
                                <ol class="mb-2 list-inside list-decimal ps-2 text-sm">
                                    <?php $__currentLoopData = $user->profile->htes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a
                                                class="hover:underline"
                                                href="<?php echo e(route('users.show', $hte->user->username)); ?>"
                                            >
                                                <?php echo e($hte->name); ?>

                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            <?php else: ?>
                                Not HTEs yet
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'hte', $user)): ?>
                <div class="rounded-xl border border-zinc-200 bg-white shadow-sm">
                    <div class="border-b border-zinc-200 p-2 px-4">
                        <span class="font-semibold">HTE Information</span>
                    </div>
                    <div class="p-4">
                        <p class="mb-2 text-sm">
                            <b>Contact Person Contact Number:</b>
                            <?php echo e($user->contact_number); ?>

                        </p>

                        <p class="mb-2 text-sm">
                            <b>HEI:</b>
                            <a
                                class="hover:underline"
                                href="<?php echo e(route('heis.show', $user->profile->hei)); ?>"
                            >
                                <?php echo e($user->profile->hei->name); ?>

                            </a>
                        </p>

                        <p class="mb-2 text-sm">
                            <b>Company Name:</b>
                            <?php echo e($user->profile->name); ?>

                        </p>

                        <p class="mb-2 text-sm">
                            <b>Address:</b>
                            <?php echo e($user->profile->address); ?>

                        </p>

                        <p class="mb-2 text-sm">
                            <b>Contact Number:</b>
                            <?php echo e($user->profile->contact_number); ?>

                        </p>

                        <p class="mb-2 text-sm">
                            <b>Company President:</b>
                            <?php echo e($user->profile->president); ?>

                        </p>

                        <p class="mb-2 text-sm">
                            <b>Memorandum of Agreement:</b>
                            <a
                                class="rounded-md bg-sky-500 p-1 px-3 text-sky-50 hover:bg-sky-400"
                                href="<?php echo e(Storage::disk('public')->url($user->profile->memorandum)); ?>"
                                download
                            >
                                Download
                            </a>
                        </p>

                        <p class="mb-2 text-sm">
                            <b>Faculty:</b>
                            <a
                                class="hover:underline"
                                href="<?php echo e(route('users.show', $user->profile->faculty->user->username)); ?>"
                            >
                                <?php echo e($user->profile->faculty->user->full_name); ?>

                            </a>
                        </p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'student', $user)): ?>
                <div class="mb-4 rounded-xl border border-zinc-200 bg-white shadow-sm">
                    <div class="border-b border-zinc-200 p-2 px-4">
                        <span class="font-semibold">Student Information</span>
                    </div>
                    <div class="p-4">
                        <p class="mb-2 text-sm">
                            <b>Contact Number:</b>
                            <?php echo e($user->contact_number); ?>

                        </p>

                        <p class="mb-2 text-sm">
                            <b>HEI:</b>
                            <a
                                class="hover:underline"
                                href="<?php echo e(route('heis.show', $user->profile->hei)); ?>"
                            >
                                <?php echo e($user->profile->hei->name); ?>

                            </a>
                        </p>

                        <p class="mb-2 text-sm">
                            <b>Course:</b>
                            <?php echo e($user->profile->course->name); ?>

                        </p>

                        <p class="mb-2 text-sm">
                            <b>Adviser:</b>
                            <a
                                class="hover:underline"
                                href="<?php echo e(route('users.show', $user->profile->faculty->user->username)); ?>"
                            >
                                <?php echo e($user->profile->faculty->user->full_name); ?>

                            </a>
                        </p>

                        <p class="mb-2 text-sm">
                            <b>HTE:</b>
                            <a
                                class="hover:underline"
                                href="<?php echo e(route('users.show', $user->profile->hte->user->username)); ?>"
                            >
                                <?php echo e($user->profile->hte->name); ?>

                            </a>
                        </p>

                        <p class="mb-2 text-sm">
                            <b>Guardian:</b>
                            <?php if($user->profile->guardian): ?>
                                <a
                                    class="hover:underline"
                                    href="<?php echo e(route('users.show', $user->profile->guardian->user->username)); ?>"
                                >
                                    <?php echo e($user->profile->guardian->user->full_name); ?>

                                </a>
                            <?php else: ?>
                                Not set
                            <?php endif; ?>
                        </p>
                    </div>
                </div>

                <?php if($user->profile->is_graded): ?>
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="rounded-xl border border-zinc-200 bg-white shadow-sm">
                            <div class="border-b border-zinc-200 p-2 px-4">
                                <span class="font-semibold">Strengths</span>
                            </div>

                            <div class="p-4">
                                <?php $__empty_1 = true; $__currentLoopData = $user->profile->strengths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $strength): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <p><?php echo e($loop->iteration); ?>. <?php echo e($strength['label']); ?> (<?php echo e($strength['score']); ?>)</p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <p>No strengths.</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="rounded-xl border border-zinc-200 bg-white shadow-sm">
                            <div class="border-b border-zinc-200 p-2 px-4">
                                <span class="font-semibold">Weaknesses</span>
                            </div>

                            <div class="p-4">
                                <?php $__empty_1 = true; $__currentLoopData = $user->profile->weaknesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weakness): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <p><?php echo e($loop->iteration); ?>. <?php echo e($weakness['label']); ?> (<?php echo e($weakness['score']); ?>)</p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <p>No weaknesses.</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-span-2 rounded-xl border border-zinc-200 bg-white shadow-sm">
                            <div class="border-b border-zinc-200 p-2 px-4">
                                <span class="font-semibold">Remarks</span>
                            </div>

                            <div class="p-4">
                                <?php echo e($user->profile->recom ?? 'No remarks/recommendations.'); ?>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'guardian', $user)): ?>
                <div class="rounded-xl border border-zinc-200 bg-white shadow-sm">
                    <div class="border-b border-zinc-200 p-2 px-4">
                        <span class="font-semibold">Guardian Information</span>
                    </div>
                    <div class="p-4">
                        <p class="mb-2 text-sm">
                            <b>Contact Number:</b>
                            <?php echo e($user->contact_number); ?>

                        </p>

                        <p class="mb-2 text-sm">
                            <b>HEI:</b>
                            <?php echo e($user->profile->hei->name); ?>

                        </p>
                        <p class="mb-2 text-sm">
                            <b>Child:</b>
                            <?php if($user->profile->child): ?>
                                <a
                                    class="hover:underline"
                                    href="<?php echo e(route('users.show', $user->profile->child->user->username)); ?>"
                                >
                                    <?php echo e($user->profile->child->user->full_name); ?>

                                </a>
                            <?php else: ?>
                                Not set
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        
        <div class="col-span-full lg:col-span-3">
            <div class="rounded-xl border border-zinc-200 bg-white p-4 shadow-sm">
                <?php if (\Illuminate\Support\Facades\Blade::check('notrole', 'admin', $user)): ?>
                    <?php
                        $updated_at = $user->updated_at->gt($user->profile->updated_at) ? $user->updated_at : $user->profile->updated_at;
                    ?>
                <?php else: ?>
                    <?php
                        $updated_at = $user->updated_at;
                    ?>
                <?php endif; ?>
                <h4 class="font-semibold">Created</h4>
                <p class="text-sm">
                    <?php echo e(\Carbon\Carbon::parse($user->created_at)->diffForHumans()); ?>

                </p>

                <hr class="my-2 border-zinc-100" />
                <h4 class="font-semibold">Last modified</h4>
                <p class="text-sm">
                    <?php echo e(\Carbon\Carbon::parse($updated_at)->diffForHumans()); ?>

                </p>
            </div>
        </div>
    </div>  
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.dashboard-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\wimss_prod\resources\views/pages/users/show.blade.php ENDPATH**/ ?>