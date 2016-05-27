<div class="cart" >
    <p><span>Carrinho:</span><div id="dd" class="wrapper-dropdown-2"> <?php echo e($carts); ?> item(s) <span style="color:green;font-size:15px;">Total R$<?php echo e(number_format($carts_row, 2, ',', '.')); ?></span></p>
        <?php if(session('desconto')): ?>
        
          <?php if((Session::get('desconto')) < $carts_row): ?>
          | Descontos: R$ <?php echo e(Session::get('desconto')); ?> |
          <?php else: ?>
          | Descontos: R$ <?php echo e(number_format($carts_row, 2, ',', '.')); ?> |
          <?php endif; ?>
            <?php if($carts_row>0): ?>
                <?php if($carts_row < Session::get('desconto')): ?>
                    Valor a pagar: R$ 0,00
                <?php else: ?>
                    Valor a pagar: <?php echo e(number_format($carts_row-Session::get('desconto'), 2, ',', '.')); ?>

                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
        
        <a href="<?php echo e(url('cart/ver-carrinho')); ?>">Ver Carrinho</a>
        <p>
        <ul class="dropdown" id="add_cart">
          <?php $__empty_1 = true; foreach($cart as $item): $__empty_1 = false; ?>
          <li><?php echo e($item->name); ?>, Preço: R$<?php echo e($item->price); ?> X <?php echo e($item->qty); ?> = <?php echo e($item->subtotal); ?> 
          
          
          
          </li>
          <?php endforeach; if ($__empty_1): ?>
          <li>Você não possui produtos no carrinho!</li>
          <?php endif; ?>                         
        </ul>
    </div>
    </p>
</div>
<script type="text/javascript">
function DropDown(el) {
    this.dd = el;
    this.initEvents();
}
DropDown.prototype = {
    initEvents: function () {
        var obj = this;

        obj.dd.on('click', function (event) {
            $(this).toggleClass('active');
            event.stopPropagation();
        });
    }
}

$(function () {

    var dd = new DropDown($('#dd'));

    $(document).click(function () {
        // all dropdowns
        $('.wrapper-dropdown-2').removeClass('active');
    });

});
</script>