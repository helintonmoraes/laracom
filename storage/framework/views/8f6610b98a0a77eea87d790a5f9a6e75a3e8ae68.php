<?php $__env->startSection('content'); ?>

<!--Menu de Categorias-->
      

                        

<div class="header_slide">
    <div class="header_bottom_left">				
        <div class="categories">
            <ul>                
                <!--Menu de Categorias-->
                <h3>Categorias</h3>
                <?php $__empty_1 = true; foreach($categorias as $categoria): $__empty_1 = false; ?>
                <li><a href='/categoria/<?php echo e($categoria->id); ?>'><?php echo e($categoria->nome); ?></a></li>
                <?php endforeach; if ($__empty_1): ?>
                <p>Nenhum categoria cadastrada</p>
                <?php endif; ?>
            </ul>
        </div>					
    </div>
<!--Fim Menu de Categorias-->
	 
<?php echo $__env->make('loja.layouts.ofertas', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="clear"></div>

</div>


</div>
<div class="main">
    <div class="content">
        <div class="clear"></div>
        
        

<?php echo $__env->make('loja.layouts.lancamentos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('loja.layouts.destaques', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('loja.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>