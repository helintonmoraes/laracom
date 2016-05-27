<div class="content_top">
            <div class="heading">
                <h3>Produtos em Destaque</h3>
            </div>
            <div class="see">
                <p><a href="/lancamentos">Ver todos os Destaques</a></p>
            </div>
            <div class="clear"></div>
        </div>

        <div class="section group">
            <!--PRODUTOS EM DESTAQUE-->
            <?php $__empty_1 = true; foreach($destaques as $destaque): $__empty_1 = false; ?>
            

            <div class="grid_1_of_5 images_1_of_4">
                <a href="produto-detalhes/<?php echo e($destaque->id); ?>"><img src="/image-file/<?php echo e($destaque->imagem_1); ?>" alt="" /></a>
                <h3><?php echo e($destaque->nome); ?></h3>

                <div class="price-details">
                    <div class="price-number">
                        <p><span class="rupees">R$ <?php echo e(number_format($destaque->preco_venda, 2, ',', '.')); ?></span></p>
                    </div>
                    <div class="add-cart" id="cart">
                        <?php echo e(Form::open(['url' => "cart/add-cart"])); ?> 
                            <input type="hidden" name="qty" value="1">
                            <input type="hidden" name="produto_id" value="<?php echo e($destaque->id); ?>">                            
                            <h4><button type="submit" class="add-cart">Adicionar ao Carrinho</button></h4>
                        <?php echo e(Form::close()); ?>

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