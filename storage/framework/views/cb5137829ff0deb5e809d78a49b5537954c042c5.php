<?php $__env->startSection('content'); ?>

<script>
    $(function () {
    $('#products').slides({
    preload: true,
            preloadImage: 'img/loading.gif',
            effect: 'slide, fade',
            crossfade: true,
            slideSpeed: 350,
            fadeSpeed: 500,
            generateNextPrev: true,
            generatePagination: false
    });
    });</script>


<div class="main">
    <div class="content">
        <div class="section group">
            <div class="cont-desc span_1_of_2">
                <div class="product-details">				
                    <div class="grid images_3_of_2">
                        <div id="container">
                            <div id="products_example">
                                <div id="products">
                                    <div class="slides_container">
                                        <?php for($i = 1; $i <= $produto['cont']; $i++): ?>
                                        <a href="#" target="_blank"><img src="<?php echo e(URL::asset("/image-file/".$produto["imagem_".$i])); ?>" alt=" " /></a>
                                        <?php endfor; ?>

                                    </div>
                                    <ul class="pagination">
                                        <?php for($i = 1; $i <= $produto['cont']; $i++): ?>
                                        <li><a href="#"><img src="<?php echo e(URL::asset("/image-file/".$produto["imagem_".$i])); ?>" alt=" " /></a></li>
                                        <?php endfor; ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="desc span_3_of_2">
                        <h2><?php echo e($produto['nome']); ?></h2>
                        <p><?php echo e($produto['resumo']); ?></p>
                        <span>Quantidade em Estoque: <?php echo e($produto['qtd_estoque']); ?></span>
                        <div class="price">

                            <p>Preço: <span>R$ <?php echo e(number_format($produto['preco_venda'], 2, ',', '.')); ?></span></p>
                        </div>

                        <div class="share-desc">
                            <?php if($produto['qtd_estoque'] > 0): ?>
                            <div class="add-cart" id="cart">								
                                <form method="POST" action="<?php echo e(url('cart/add-cart')); ?>">
                                    Quantidade : <select name="qty">
                                        <?php foreach(range(1,$produto['qtd_estoque'])as $qty): ?>
                                        <option value="<?php echo e($qty); ?>"><?php echo e($qty); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="hidden" name="produto_id" value="<?php echo e($produto->id); ?>">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <h4><button type="submit" class="add-cart"> Adicionar ao Carrinho</button></h4>
                                </form>
                            </div>
                            <?php else: ?>
                            <div class="add-cart" id="cart">
                                <h4><button style="background-color:#8B8989;" disabled="TRUE"> Produto Indisponível</button></h4>
                            </div>
                            <?php endif; ?>
                            <div class="clear"></div>
                        </div>
                        <div class="wish-list">
                            <div class="rateyo-readonly-widg"></div>
                            <p>Avaliação Média: <?php echo e(number_format($media,2)); ?> pontos</p>
                            <script>
                                $(function () {
                                $(".rateyo-readonly-widg").rateYo({
                                rating: <?php echo e($media); ?>,
                                        readOnly: true
                                }).click(function(){

                                });
                                });
                            </script>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="product_desc">	
                    <div id="horizontalTab">
                        <ul class="resp-tabs-list">
                            <li>Detalhes do Produto</li>
                            <li>Especificações</li>

                            <div class="clear"></div>
                        </ul>
                        <div class="resp-tabs-container">
                            <div class="product-desc">
                                <p><?php echo e($produto['descricao']); ?></p>
                            </div>

                            <div class="product-tags">

                                <p><?php echo e($produto['especificacao']); ?></p>


                            </div>	


                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $(document).ready(function () {
                    $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion           
                            width: 'auto', //auto or any width like 600px
                            fit: true   // 100% fit in a container
                    });
                    });
                </script>
                <!--PRODUTOS RELACIONADOS-->
                <div class="content_bottom">
                    <div class="heading">
                        <h3>Produtos Relacionados</h3>
                    </div>

                    <div class="clear"></div>
                </div>
                <div class="section group">

                    <?php $__empty_1 = true; foreach($relacionados as $relacionado): $__empty_1 = false; ?>

                    <div class="grid_1_of_5 images_1_of_4">
                        <a href="/produto-detalhes/<?php echo e($relacionado->id); ?>"><img src="/image-file/<?php echo e($relacionado->imagem_1); ?>"/></a>
                        <p><?php echo e($relacionado->nome); ?></p>
                        <div class="price-details">
                            <div class="price-number">
                                <p><span class="rupees">R$ <?php echo e($relacionado->preco_venda); ?></span></p>
                            </div>
                            <div class="add-cart" id="cart">								
                                <form method="POST" action="<?php echo e(url('cart/add-cart')); ?>">
                                    <input type="hidden" name="qty" value="1">
                                    <input type="hidden" name="produto_id" value="<?php echo e($relacionado->id); ?>">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <h4><button type="submit" class="add-cart">Adicionar ao Carrinho</button></h4>
                                </form>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>

                    <?php endforeach; if ($__empty_1): ?>
                    <?php endif; ?>


                </div>






            </div>
            <!--CATEGORIAS-->
            <div class="rightsidebar span_3_of_1">
                <h2>CATEGORIAS</h2>
                <ul>
                    <?php $__empty_1 = true; foreach($categorias as $categoria): $__empty_1 = false; ?>
                    <li><a href='/categoria/<?php echo e($categoria->id); ?>'><?php echo e($categoria->nome); ?></a></li>
                    <?php endforeach; if ($__empty_1): ?>
                    <p>Nenhum categoria cadastrada</p>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('loja.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>