<?php $__env->startSection('content'); ?>
<?php if(@$status): ?>
<h1 style="background:<?php echo e($cor); ?>;text-align:center;border-radius:10px;"><?php echo e($status); ?></h1>
<?php else: ?>
<h1>Escolha umas das opções...</h1>
<?php endif; ?>

<div class="btn-group btn-group-justified" role="group" aria-label="...">
    <!-- Os segundos parametros da url foram definidos por prioridade de resposta ao cliente-->
    <div class="btn-group" role="group">
        <a href="<?php echo e(url('/pedido/listar-pedidos',1)); ?>">
            <button type="button" class="btn btn-danger">Pedidos Pagos, aguardando envio...<?php echo e($cont['ag_envio']); ?></button>
        </a>
    </div>
    <div class="btn-group" role="group">
        <a href="<?php echo e(url('/pedido/listar-pedidos',2)); ?>">
            <button type="button" class="btn btn-warning">Pedidos Aguardando Pagamento...<?php echo e($cont['pen_pgto']); ?></button>
        </a>
    </div>
</div>
<br/>
<div class="btn-group btn-group-justified" role="group" aria-label="...">
    <div class="btn-group" role="group">
        <a href="<?php echo e(url('/pedido/listar-pedidos',3)); ?>">
            <button type="button" class="btn btn-primary">Pedidos Enviados para Entrega...<?php echo e($cont['enviado']); ?></button>
        </a>
    </div>
    <div class="btn-group" role="group">
        <a href="<?php echo e(url('/pedido/listar-pedidos',4)); ?>">
            <button type="button" class="btn btn-success">Pedidos Entregues!!!<?php echo e($cont['entregue']); ?></button>
        </a>
    </div>

</div>
<?php if(isset($pedidos)): ?>
<table class="table table-hover">
    <tr>
        <th>Num. Pedido</th>
        <th>Status</th>
        <th>Data</th>
        <th>Valor Total</th>
        <th></th>
    </tr>
    <?php $__empty_1 = true; foreach($pedidos as $pedido): $__empty_1 = false; ?>    
    <tr style="font-size: 14px;">
        <td><?php echo e($pedido->external_reference); ?></td>
        <td><?php echo e($pedido->status); ?></td>
        <td><?php echo e(date('d/m/y - H:i ',strtotime($pedido->updated_at))); ?>h</td>
        <td><?php echo e('R$' . number_format($pedido->valor_pedido, 2, ',', '.')); ?></td>
        <td><a class="glyphicon glyphicon-menu-hamburger"href="<?php echo e(url('/pedido/detalhar-pedido/'.$pedido->external_reference)); ?>">Detalhar</a></td>
    </tr>

    <?php endforeach; if ($__empty_1): ?>
    Nenhum pedido
    <?php endif; ?>
</table>
<?php echo e($pedidos->render()); ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('painel.layouts.gestao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>