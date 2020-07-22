<?php $__env->startSection('content'); ?>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

    <?php echo $__env->make('projects.only_projects', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\HTML\Progi\OpenServer\OpenServer\domains\TestWork\resources\views/projects/index.blade.php ENDPATH**/ ?>