<?php $__env->startSection('title'); ?>
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <header class="mb-4">
    <h1 class="mb-2 text-3xl font-bold tracking-tight">
      Hello, <?php echo e(auth()->user()->full_name); ?>.
    </h1>
  </header>

  <?php if (\Illuminate\Support\Facades\Blade::check('role', 'admin')): ?>
    <?php echo $__env->make('components.dashboard.admin-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>

  <?php if (\Illuminate\Support\Facades\Blade::check('role', 'dean')): ?>
    <?php echo $__env->make('components.dashboard.dean-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>

  <?php if (\Illuminate\Support\Facades\Blade::check('role', 'hte')): ?>
    <?php echo $__env->make('components.dashboard.hte-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>

  <?php if (\Illuminate\Support\Facades\Blade::check('role', 'faculty')): ?>
    <?php echo $__env->make('components.dashboard.faculty-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>

  <?php if (\Illuminate\Support\Facades\Blade::check('role', 'student')): ?>
    <?php echo $__env->make('components.dashboard.student-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>

  <?php if (\Illuminate\Support\Facades\Blade::check('role', 'guardian')): ?>
    <?php echo $__env->make('components.dashboard.guardian-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\_projects\wimss\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>