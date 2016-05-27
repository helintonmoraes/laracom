<?php $__env->startSection('content'); ?>

<img src="<?php echo e(URL::asset('loja/images/404erro.jpg')); ?>" alt="" />

<?php $__env->stopSection(); ?>
<?php echo $__env->make('loja.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>