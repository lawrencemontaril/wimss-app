<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title><?php echo $__env->yieldContent('title-prefix', 'WIMSS'); ?> <?php echo $__env->yieldContent('title'); ?></title>

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link href="https://fonts.googleapis.com/css2?&family=Inter:wght@100..900&display=swap" rel="stylesheet" />

    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <link type="image/x-icon" href="favicon.ico" rel="shortcut icon" />
</head>

<body class="bg-zinc-50 font-sans text-zinc-800 antialiased">
    <?php $__env->startSection('content'); ?>

    <?php echo $__env->yieldSection(); ?>
</body>

</html>

<?php /**PATH C:\wamp\www\wimss_prod\resources\views/layouts/home-layout.blade.php ENDPATH**/ ?>