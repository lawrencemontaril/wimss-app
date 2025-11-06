


<?php $__env->startSection('title', '- Forbidden'); ?>

<?php $__env->startSection('content'); ?>
  <div class="flex min-h-96 flex-col items-center justify-center gap-8">
    <img src="<?php echo e(asset('images/403.svg')); ?>" alt="Empty data" class="w-32" />
    <h4 class="text-xl font-semibold text-zinc-500">403: Access denied</h4>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wimssph/public_html/wimss_prod/resources/views/errors/403.blade.php ENDPATH**/ ?>