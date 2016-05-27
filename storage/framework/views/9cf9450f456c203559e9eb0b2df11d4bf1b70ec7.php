<?php $__env->startSection('content'); ?>

<div class="clearfix">
    <div class="heading">
        <h2><i class="fa fa-comments"></i>DETALHES DA MENSAGEM</h2>
    </div>
    <div class="comments-approval">
        <div class="author clearfix">
            <p class="left"><?php echo e($detalhes['nome']); ?><br><span><?php echo e($detalhes['data']); ?> <?php echo e($detalhes['hora']); ?></span></p>
            <div class="right"><a href="#" class="approve"><i class="fa fa-check"></i></a><a href="#" class="delete"><i class="fa fa-times"></i></a></div>
        </div>
        <p><?php echo e($detalhes['mensagem']); ?></p>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('painel.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>