<?php $__env->startSection('content'); ?>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Login</th>
        <th>Email</th>
        <th>Telefone</th>
    </tr>

    <?php $__empty_1 = true; foreach($clientes as $cliente): $__empty_1 = false; ?>

    <tr>
        <div>
            <td><?php echo e($cliente->id); ?></td>
            <td><a href="<?php echo e(url('painel/detalhes-cliente', $cliente->id)); ?>"> <?php echo e($cliente->nome); ?></a></td>
            <td><?php echo e($cliente->login); ?></td>
            <td><?php echo e($cliente->email); ?></td>
            <td><?php echo e($cliente->fone); ?></td>
        </div>
    </tr>

<?php endforeach; if ($__empty_1): ?>
Nenhum Cliente cadastrado!!
<?php endif; ?>
</table>
<?php echo e($clientes->render()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('painel.layouts.gestao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>