<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    />

    <title><?php echo $__env->yieldContent('title-prefix', 'WIMSS'); ?> <?php echo $__env->yieldContent('title'); ?></title>

    <link
        href="https://fonts.googleapis.com"
        rel="preconnect"
    />
    <link
        href="https://fonts.gstatic.com"
        rel="preconnect"
        crossorigin
    />
    <link
        href="https://fonts.googleapis.com/css2?&family=Inter:wght@100..900&display=swap"
        rel="stylesheet"
    />

    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-zinc-50 font-sans text-zinc-800 antialiased">
    <?php echo $__env->make('partials.panel-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="mx-auto flex min-h-[calc(100dvh-4rem)] max-w-8xl items-stretch">
        <div
            class="absolute left-0 top-16 z-10 hidden h-dvh w-full bg-zinc-800/50 backdrop-blur-sm"
            id="overlay"
        ></div>

        <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="w-full bg-white md:ps-72">
            <?php if(session('success')): ?>
                <div class="border-b-4 border-green-600 bg-green-500 px-4 py-2 text-green-50">
                    <p class="text-sm">
                        <?php echo session('success'); ?>

                    </p>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="border-b-4 border-red-600 bg-red-500 px-4 py-2 text-red-50">
                    <p class="text-sm">
                        <?php echo session('serror'); ?>

                    </p>
                </div>
            <?php endif; ?>

            <main class="relative h-full px-4 py-3">
                <?php $__env->startSection('content'); ?>
                <?php echo $__env->yieldSection(); ?>
            </main>
        </div>
    </div>
</body>

</html>

<?php /**PATH C:\wamp\www\wimss_prod\resources\views/layouts/dashboard-layout.blade.php ENDPATH**/ ?>