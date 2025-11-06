<aside
    class="fixed top-16 z-20 hidden h-[calc(100dvh-4rem)] w-72 flex-col overflow-y-auto border-r border-zinc-200 bg-zinc-50 p-2 md:flex"
    id="sidebar-menu"
>
    <ul>
        <li>
            <a
                href="<?php echo e(route('dashboard')); ?>"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'block relative rounded-xl px-4 py-3 text-sm font-medium',
                    'bg-sky-400 text-sky-50' => Route::is('dashboard'),
                    'text-zinc-700 hover:bg-zinc-100' => !Route::is('dashboard'),
                ]); ?>"
            >
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-home'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e(Route::is('dashboard') ? 'text-white' : 'text-zinc-400').' inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                <span class="ml-2">Dashboard</span>
            </a>
        </li>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', \App\Models\Hei::class)): ?>
            <li>
                <a
                    href="<?php echo e(route('heis.index')); ?>"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'block relative rounded-xl px-4 py-3 text-sm font-medium',
                        'bg-sky-400 text-sky-50' => Route::is('heis.*'),
                        'text-zinc-700 hover:bg-zinc-100' => !Route::is('heis.*'),
                    ]); ?>"
                >
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-building-library'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e(Route::is('heis.*') ? 'text-white' : 'text-zinc-400').' inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                    <span class="ml-2">HEIs</span>
                    <span class="absolute right-2 min-w-8 rounded-full border border-sky-400 bg-zinc-50 p-1 px-2 text-center text-xs text-sky-400">
                        <?php echo e($sidebarData['hei_count']); ?>

                    </span>
                </a>
            </li>
        <?php endif; ?>

        <?php if (\Illuminate\Support\Facades\Blade::check('notrole', 'admin')): ?>
            <li>
                <a
                    href="<?php echo e(route('heis.show', auth()->user()->profile->hei)); ?>"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'block relative rounded-xl px-4 py-3 text-sm font-medium',
                        'bg-sky-400 text-sky-50' => Route::is('heis.show'),
                        'text-zinc-700 hover:bg-zinc-100' => !Route::is('heis.show'),
                    ]); ?>"
                >
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-building-library'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e(Route::is('heis.show') ? 'text-white' : 'text-zinc-400').' inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                    <span class="ml-2">Your HEI</span>
                </a>
            </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', \App\Models\Course::class)): ?>
            <li>
                <a
                    href="<?php echo e(route('courses.index')); ?>"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'block relative rounded-xl px-4 py-3 text-sm font-medium',
                        'bg-sky-400 text-sky-50' => Route::is('courses.*'),
                        'text-zinc-700 hover:bg-zinc-100' => !Route::is('courses.*'),
                    ]); ?>"
                >
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-star'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e(Route::is('courses.*') ? 'text-white' : 'text-zinc-400').' inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                    <span class="ml-2">Courses</span>
                    <span class="absolute right-2 min-w-8 rounded-full border border-sky-400 bg-zinc-50 p-1 px-2 text-center text-xs text-sky-400">
                        <?php echo e($sidebarData['course_count']); ?>

                    </span>
                </a>
            </li>
        <?php endif; ?>
    </ul>

    <?php if (\Illuminate\Support\Facades\Blade::check('role', ['admin', 'dean', 'faculty', 'hte'])): ?>
        <div class="mx-0.5 mt-4 flex items-center justify-between gap-3 rounded-xl p-1.5 px-3 text-sm font-medium text-zinc-700">
            Users
        </div>

        <ul>
            <?php if (\Illuminate\Support\Facades\Blade::check('role', ['admin', 'dean'])): ?>
                <li>
                    <a
                        href="<?php echo e(route('deans.index')); ?>"
                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'block relative rounded-xl px-4 py-3 text-sm font-medium',
                            'bg-sky-400 text-sky-50' => Route::is('deans.*'),
                            'text-zinc-700 hover:bg-zinc-100' => !Route::is('deans.*'),
                        ]); ?>"
                    >
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-book-open'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e(Route::is('deans.*') ? 'text-white' : 'text-zinc-400').' inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                        <span class="ml-2">Deans</span>
                        <span class="absolute right-2 min-w-8 rounded-full border border-sky-400 bg-zinc-50 p-1 px-2 text-center text-xs text-sky-400">
                            <?php echo e($sidebarData['dean_count']); ?>

                        </span>
                    </a>
                </li>

                <li>
                    <a
                        href="<?php echo e(route('faculties.index')); ?>"
                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'block relative rounded-xl px-4 py-3 text-sm font-medium',
                            'bg-sky-400 text-sky-50' => Route::is('faculties.*'),
                            'text-zinc-700 hover:bg-zinc-100' => !Route::is('faculties.*'),
                        ]); ?>"
                    >
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-user-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e(Route::is('faculties.*') ? 'text-white' : 'text-zinc-400').' inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                        <span class="ml-2">SIP/Faculty Coordinators</span>
                        <span class="absolute right-2 min-w-8 rounded-full border border-sky-400 bg-zinc-50 p-1 px-2 text-center text-xs text-sky-400">
                            <?php echo e($sidebarData['faculty_count']); ?>

                        </span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (\Illuminate\Support\Facades\Blade::check('role', ['admin', 'dean', 'faculty'])): ?>
                <li>
                    <a
                        href="<?php echo e(route('htes.index')); ?>"
                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'block relative rounded-xl px-4 py-3 text-sm font-medium',
                            'bg-sky-400 text-sky-50' => Route::is('htes.*'),
                            'text-zinc-700 hover:bg-zinc-100' => !Route::is('htes.*'),
                        ]); ?>"
                    >
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-building-office-2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e(Route::is('htes.*') ? 'text-white' : 'text-zinc-400').' inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                        <span class="ml-2">HTEs</span>
                        <span class="absolute right-2 min-w-8 rounded-full border border-sky-400 bg-zinc-50 p-1 px-2 text-center text-xs text-sky-400">
                            <?php echo e($sidebarData['hte_count']); ?>

                        </span>
                    </a>
                </li>
            <?php endif; ?>

            <li>
                <a
                    href="<?php echo e(route('students.index')); ?>"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'block relative rounded-xl px-4 py-3 text-sm font-medium',
                        'bg-sky-400 text-sky-50' => Route::is('students.*'),
                        'text-zinc-700 hover:bg-zinc-100' => !Route::is('students.*'),
                    ]); ?>"
                >
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-academic-cap'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e(Route::is('students.*') ? 'text-white' : 'text-zinc-400').' inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                    <span class="ml-2">Students</span>
                    <span class="absolute right-2 min-w-8 rounded-full border border-sky-400 bg-zinc-50 p-1 px-2 text-center text-xs text-sky-400">
                        <?php echo e($sidebarData['student_count']); ?>

                    </span>
                </a>
            </li>

            <li>
                <a
                    href="<?php echo e(route('guardians.index')); ?>"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'block relative rounded-xl px-4 py-3 text-sm font-medium',
                        'bg-sky-400 text-sky-50' => Route::is('guardians.*'),
                        'text-zinc-700 hover:bg-zinc-100' => !Route::is('guardians.*'),
                    ]); ?>"
                >
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-users'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => ''.e(Route::is('guardians.*') ? 'text-white' : 'text-zinc-400').' inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                    <span class="ml-2">Guardians</span>
                    <span class="absolute right-2 min-w-8 rounded-full border border-sky-400 bg-zinc-50 p-1 px-2 text-center text-xs text-sky-400">
                        <?php echo e($sidebarData['guardian_count']); ?>

                    </span>
                </a>
            </li>
        </ul>
    <?php endif; ?>
</aside>

<?php /**PATH C:\wamp\www\wimss_prod\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>