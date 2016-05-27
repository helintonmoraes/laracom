<div class="header_bottom_right">					 
    <div class="cycle-slideshow cycle-autoinit" 
         data-cycle-fx=carousel
         data-cycle-timeout=4000

         data-cycle-slides=">div"
         >
        <?php $__empty_1 = true; foreach($ofertas as $oferta): $__empty_1 = false; ?>
        <?php if($oferta->oferta == true): ?>
        <div id="slide-1" class="slide">			                    
            <div class="slider-img">
                <a href="produto-detalhes/<?php echo e($oferta->id); ?>"><img src="/image-file/<?php echo e($oferta->imagem_1); ?>" alt="" /></a>								    
            </div>
            <div class="slider-text">
                <h1>OFERTA<br><span>HOJE</span></h1>
                  <div class="add-cart" id="cart">								
                    <form method="POST" action="<?php echo e(url('cart/add-cart')); ?>">
                        <input type="hidden" name="produto_id" value="<?php echo e($oferta->id); ?>">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <h4><button type="submit" id="btnAdd"/>Adicionar ao Carrinho</button></h4> 
                    </form>
                </div>
                <div class="features_list">
                  <h2><?php echo e($oferta->nome); ?></h2>
                    <h1>R$ <?php echo e($oferta->preco_venda); ?></h1>
                    <p><?php echo e($oferta->resumo); ?></p>
                </div>
              
                <div class="features_list">
                    
                    
                </div>


            </div>			               
            <div class="clear"></div>				
        </div>
        <?php endif; ?>
        <?php endforeach; if ($__empty_1): ?>
        <?php endif; ?>


    </div>  			
</div>