<?php $__env->startSection('content'); ?>     

<?php $__empty_1 = true; foreach($filtros as $filtro): $__empty_1 = false; ?>

 <?php if(isset($parametro)): ?>
    <?php echo $filtros->appends(['buscar'=>"$parametro"])->render(); ?>

 <?php endif; ?>


            <div class="grid_1_of_5 images_1_of_4">
            <a href="preview.html"><img src="<?php echo e(URL::asset("loja/images/produtos/$filtro->imagem_1")); ?>" alt="" /></a>
                <h3><?php echo e($filtro->nome); ?></h3>
                <div class="price-details">
                    <div class="price-number">
                        <p><span class="rupees">R$ <?php echo e($filtro->preco_venda); ?></span></p>
                    </div>
                    <div class="add-cart">								
                        <h4><a href="preview.html">Adicionar ao Carrinho</a></h4>
                    </div>
                    <div class="clear"></div>
                </div>

            </div>

<?php endforeach; if ($__empty_1): ?>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('loja.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>