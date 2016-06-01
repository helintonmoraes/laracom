<?php $__env->startSection('content'); ?>

<div class="section group">
    <div class="table-responsive cart_info">
            
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td align="center">CÓDIGO PEDIDO</td>    
                        <td align="center">DATA</td>    
                        <td align="center">HORA</td>
                        <td align="center">VALOR</td>
                        <td align="center">ENTREGA</td>
                        <td align="center">PAGAMENTO</td>
                        <td align="center">$$$</td>
                        <td align="center">***</td>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; foreach($pedidos as $pedido): $__empty_1 = false; ?>
                    <tr>
                        <td class="cart_price" align="center">
                            <p><?php echo e($pedido['external_reference']); ?></p> 
                        </td>

                        <td class="cart_price" align="center">
                            <p> <?php echo e($pedido['data_pedido']); ?></p> 
                        </td>
                        
                        <td class="cart_total" align="center">
                            <p> <?php echo e($pedido['hora_pedido']); ?></p> 
                        </td>
                        
                        <td class="cart_price" align="center">
                            <p> R$ <?php echo e(number_format($pedido['valor_total'], 2, ',', '.')); ?></p>                           
                        </td>

                        <td class="cart_total" align="center">
                            <p> <?php echo e($pedido['entrega']); ?></p> 
                        </td>
                        
                        <td class="cart_total" align="center">
                            <p> <?php echo e($pedido['status']); ?></p>
                        </td>
                        
                        <td class="cart_total" align="center">
                        <?php if($pedido['boleto_emitido']==FALSE): ?>
                            <p><a target="_blank" href="boleto/<?php echo e($pedido['external_reference']); ?>/<?php echo e($pedido['pref_id']); ?>">Finalize Agora!</a></p>
                        <?php endif; ?>
                        </td>
                        
                        <td class="cart_total" align="center">
                            <p><a href="/cliente/pedido-detalhado/<?php echo e($pedido['external_reference']); ?>">Mais Detalhes</a></p>
                        </td>
                        
                        

                    </tr>
                    <?php echo $pedidos->links(); ?>

                    <?php endforeach; if ($__empty_1): ?>
                    <?php endif; ?>
                             
              
                
                </tbody>
            </table>
        
             
       
        </div>
</div>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('loja.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>