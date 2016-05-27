        <div class="content_bottom">
            <div class="heading">
                <h3>Lançamentos</h3>
            </div>
            <div class="see">
                <p><a href="/lancamentos">Ver todos os Lançamentos</a></p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <!--PRODUTOS EM LANÇAMENTO-->
            <?php $__empty_1 = true; foreach($lancamentos as $lancamento): $__empty_1 = false; ?>
            

            <div class="grid_1_of_5 images_1_of_4">
                <a href="produto-detalhes/<?php echo e($lancamento->id); ?>"><img src="/image-file/<?php echo e($lancamento->imagem_1); ?>" alt="" /></a>
                <h3><?php echo e($lancamento->nome); ?></h3>
                <div class="price-details">
                    <div class="price-number">
                        <p><span class="rupees">R$ <?php echo e(number_format($lancamento->preco_venda, 2, ',', '.')); ?></span></p>
                    </div>

                    <div class="add-cart">								
                        <form method="POST" action="<?php echo e(url('cart/add-cart')); ?>">
                            <input type="hidden" name="qty" value="1">
                            <input type="hidden" id="v1" name="produto_id" value="<?php echo e($lancamento->id); ?>">
                            <input type="hidden" id="v2" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <h4><button type="submit" id="btnAdd"/>Adicionar ao Carrinho</button></h4>                                         
                        </form>
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

