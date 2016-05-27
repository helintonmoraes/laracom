<?php $__env->startSection('content'); ?>     

<div class="main">
    <div class="content">
        <div class="nave">          
         
        <?php if(isset($parametro)): ?>
             <?php echo $filtros->appends(['buscar'=>"$parametro"])->links(); ?>

        <?php else: ?>
            <?php echo $filtros->render(); ?>

        <?php endif; ?>
        </div>
        <div class="total">
            <?php echo e($filtros->total()); ?> produtos encontrados!!!
        </div>

        <div class="section group">

            <?php $__empty_1 = true; foreach($filtros as $filtro): $__empty_1 = false; ?>

            <div class="grid_1_of_5 images_1_of_4">
                <a href="/produto-detalhes/<?php echo e($filtro->id); ?>"><img src="/image-file/<?php echo e($filtro->imagem_1); ?>"/></a>
                <h3><?php echo e($filtro->nome); ?></h3>
                <div class="price-details">
                    <div class="price-number">
                        <p><span class="rupees">R$ <?php echo e($filtro->preco_venda); ?></span></p>
                    </div>
                    <div class="add-cart" id="cart">								
                                   <form method="POST" action="<?php echo e(url('cart/add-cart')); ?>">
                                            <input type="hidden" name="produto_id" value="<?php echo e($filtro->id); ?>">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            <input type="hidden" name="qty" value=1>
                                            <h4><button type="submit" class="add-cart"> Adicionar ao Carrinho </button></h4></form>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            <?php endforeach; if ($__empty_1): ?>
            <div class="nave">
                <!-- Validação provisória para buscas vazias-->
                <?php if(isset($parametro)): ?>
                <?php if($parametro != ''): ?>               
                Nenhum produto encontrado
                <?php else: ?>
                Digite corretamente o produto desejado!!!
                <?php endif; ?>
                
                <?php else: ?>
                Nenhum produto encontrado
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>




    </div>
</div>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('loja.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>