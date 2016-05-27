<?php $__env->startSection('content'); ?>
<h1><?php echo e($cliente->nome); ?></h1>

<a class="btn btn-primary" href="<?php echo e(url('/pedidos/listagem-de-pedidos',$cliente->id)); ?>"> Ver pedidos de <?php echo e($cliente->nome); ?></a>




<table class="table">
    <tr>

        <th>CPF</th>
        <th>Email</th>
    </tr>
    <tr>

        <td><?php echo e($cliente->cpf); ?></td>
        <td><?php echo e($cliente->email); ?></td>
    </tr>
</table>


<br/>
<h3>Pontos Acumulados: <span style="color: red;"><?php echo e($cliente->gift_card); ?></span> pontos</h3>
<br/>
<br/>



<table class="table">
    <tr>
        <th>Telefone</th>
        <th>Endereço</th>

    </tr>

    <tr>

        <td><?php echo e($cliente->fone); ?></td>
        <td><?php echo e($cliente->endereco); ?></td>

    </tr>
</table>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('painel.gestao.gestao-clientes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>