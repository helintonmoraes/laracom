<?php $__env->startSection('content'); ?>


<?php echo $__env->yieldContent('content'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('painel.layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('painel.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>