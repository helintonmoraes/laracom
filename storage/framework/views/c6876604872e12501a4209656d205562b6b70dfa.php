    

<?php $__env->startSection('content'); ?>
<?php if($cliente): ?>
<h1><?php echo e($cliente->nome); ?> </h1>
<table class="table">
    <tr>
        <th>Numero do pedido</th>
        <th>Status do pedido</th>
        <th>Data do pedido</th>
        <th></th>
    </tr>
    <?php $__empty_1 = true; foreach($pedidos as $pedido): $__empty_1 = false; ?>

    <?php $cor = getCor($pedido->status) ?>




    <a href="#">
        <tr style="background-color: <?php echo e($cor); ?>;">
            <td><?php echo e($pedido->external_reference); ?></td>
            <td><?php echo e($pedido->status); ?></td>
            <td><?php echo e($pedido->data_pedido); ?></td>
            <td><a class="btn btn-success" href="<?php echo e(url('/pedidos/detalhar-pedido',$pedido->id)); ?>">Ver detalhes</a></td>
        </tr>
    </a>
    <?php endforeach; if ($__empty_1): ?>
    Nenhum pedido realizado por esse cliente!!
    <?php endif; ?>
</table>
<?php endif; ?>

<?php $__env->stopSection(); ?>



































<?php

function getCor($status) {
    switch ($status) {
        case "Pedido entregue":
            $cor = '#ECFCED';
            break;
        case "Aguardando envio, pedido pago!":
            $cor = '#FCECED';
            break;
        case "Aguardando pagamento":
            $cor = '#F5F6CE';
            break;
        case "Enviado para entrega":
            $cor = '#E1D9F5';
            break;
        default :
            $cor = "white";
            break;
    }
    return $cor;
}
?>


<?php echo $__env->make('painel.gestao.gestao-clientes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>