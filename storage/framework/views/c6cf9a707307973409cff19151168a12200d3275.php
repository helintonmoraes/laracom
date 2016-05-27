<?php $__env->startSection('content'); ?>     

<div class="main">
    <div class="content">
        <div class="nave">
            <?php echo $categorias->links(); ?>

        </div>
        <div class="total">
            <?php echo e($categorias->total()); ?> produtos encontrados!!!
        </div>

        <div class="section group">

            <?php $__empty_1 = true; foreach($categorias as $categoria): $__empty_1 = false; ?>

            <div class="grid_1_of_5 images_1_of_4">
                <a href="preview.html"><img src="<?php echo e(URL::asset("loja/images/produtos/$categoria->imagem_1")); ?>" alt="" /></a>
                <h2><?php echo e($categoria->nome); ?></h2>
                <div class="price-details">
                    <div class="price-number">
                        <p><span class="rupees">R$ <?php echo e($categoria->preco_venda); ?></span></p>
                    </div>
                    <div class="add-cart">								
                        <h4><a href="preview.html">Adicionar ao Carrinho</a></h4>
                    </div>
                    <div class="clear"></div>
                </div>

            </div>

            <?php endforeach; if ($__empty_1): ?>
            <div class="nave">
                Nenhum produto encotrado
            </div>
            <?php endif; ?>
        </div>




    </div>
</div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('loja.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>