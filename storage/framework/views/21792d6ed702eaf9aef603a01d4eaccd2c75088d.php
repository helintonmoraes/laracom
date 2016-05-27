<?php $__env->startSection('content'); ?>

  
<div class="cart_border">
        <div class="table-responsive cart_info">
            <?php if(count($cart)): ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td>PRODUTO</td>                        
                        <td>PREÇO</td>
                        <td>QUANTIDADE</td>
                        <td>TOTAL</td>
                        <td>AÇÃO</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cart as $item): ?>
                    <tr>

                        <td class="cart_description">
                            <h4><a href="/produto-detalhes/<?php echo e($item->id); ?>"><?php echo e($item->name); ?></a></h4>
                        </td>
                        <td class="cart_price">
                            <p>R$ <?php echo e(number_format($item->price, 2, ',', '.')); ?></p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href='<?php echo e(url("cart/add-qtd/$item->id")); ?>'><img src="<?php echo e(URL::asset('loja/images/icons/upload.png')); ?>" alt="Meus Pedidos"/></a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo e($item->qty); ?>" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href="<?php echo e(url("cart/rem-qtd/$item->id")); ?>"><img src="<?php echo e(URL::asset('loja/images/icons/download.png')); ?>" alt="Meus Pedidos"/></a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">R$ <?php echo e(number_format($item->subtotal, 2, ',', '.')); ?></p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="/cart/remove-carrinho/<?php echo e($item->id); ?>">Remover</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                <p>Você não possui itens no carrinho!</p>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
</div>
<?php if($carts_row > 0): ?>
<div class="wrapper-dropdown-3">
   <span>Resumo:</span>
     <?php echo e($carts); ?> item(s) - Total da Compra: R$<?php echo e($carts_row); ?>

     
     <?php if(session('desconto')): ?>
      <?php if((Session::get('desconto')) > $carts_row): ?>
        | Cartão de Desconto: R$<?php echo e($carts_row); ?>

      <?php else: ?>
        | Cartão de Desconto: R$ <?php echo e(Session::get('desconto')); ?> 
      <?php endif; ?>
           <?php if((Session::get('desconto')) < $carts_row): ?>
           | Valor a pagar: <?php echo e($carts_row -(Session::get('desconto'))); ?>

           <?php else: ?>
           | Valor a pagar: 0.00
           <?php endif; ?>
     <?php endif; ?>
     
        <form method="get" action="<?php echo e(URL::previous()); ?>">
             <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
             <h4><button type="submit" style="float:left;margin-right:1%;" class="add-cart">Continuar Comprando</button></h4>
        </form>
        <form method="post" action="/cliente/pedido">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <h4><button type="submit" href="cliente"class="add-cart">Finalizar Compra</button></h4>
        </form>
    
</div>
<?php endif; ?>
  

    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('loja.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>