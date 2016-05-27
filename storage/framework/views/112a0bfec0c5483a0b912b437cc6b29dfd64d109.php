<div class="slider">					     
    <div id="slider">
        <div id="mover">
            <?php $__empty_1 = true; foreach($ofertas as $oferta): $__empty_1 = false; ?> 
            <div id="slide-1" class="slide">			                    
                <div class="slider-img">
                    <a href="preview.html"><img src="/image-file/<?php echo e($oferta->imagem_1); ?>" alt="" /></a>									    
                </div>
                <div class="slider-text">
                    <h1>Clearance<br><span>SALE</span></h1>
                    <h2>UPTo 20% OFF</h2>
                    <div class="features_list">
                        <h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>							               
                    </div>
                    <a href="preview.html" class="button">Shop Now</a>
                </div>			               
                <div class="clear"></div>				
            </div>	
            <?php endforeach; if ($__empty_1): ?>
            <?php endif; ?>
	

        </div>		
    </div>
    <div class="clear"></div>					       
</div>