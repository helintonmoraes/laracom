<?php $__env->startSection('content'); ?>
<div class="section group">
    <div class="table-responsive cart_info">
            
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td>PRODUTO</td>                        
                        <td>PREÇO</td>
                        <td>QUANTIDADE</td>
                        <td>TOTAL</td>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cart as $item): ?>
                    <tr>

                        <td class="cart_description">
                            <h4><a href="/produto-detalhes/<?php echo e($item->id); ?>"><?php echo e($item->name); ?></a></h4>
                        </td>
                        <td class="cart_price">
                            <p>R$ <?php echo e($item->price); ?></p>
                        </td>
                        <td class="cart_price">
                            <p><?php echo e($item->qty); ?></p>                            
                        </td>
                        
                        <td class="cart_total">
                            <p class="cart_total_price">R$ <?php echo e($item->subtotal); ?></p>
                        </td>

                    </tr>
                    <?php endforeach; ?>          
              
                
                </tbody>
            </table>
        </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('loja.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>