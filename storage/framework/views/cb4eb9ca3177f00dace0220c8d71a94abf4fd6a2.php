<?php $__env->startSection('content'); ?>

<h4>Num. pedido: <?php echo e($pedido[0]['external_reference']); ?> <br/> Cliente: <?php echo e($cliente->nome); ?> </h4>

<br/>
<table class="table table-hover">

    <tr>
        <th></th>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Valor unitario</th>
        <th>Valor total do item</th>
    </tr>
    <?php $__empty_1 = true; foreach($produtos as $produto): $__empty_1 = false; ?>
    <tr>  
        <td><img class="thumb"style="width: 50px"src="/image-file/<?php echo e($produto->imagem_1); ?>" alt="" /></td>
        <td><?php echo e($produto->nome); ?></td>
        <td><?php echo e($produto->qty); ?></td>
        <td><?php echo e($produto->preco_venda); ?></td>
        <td><?php echo e($produto->preco_venda * $produto->qty); ?></td>
    </tr> 
    <?php endforeach; if ($__empty_1): ?>
    Nenhum item nesse pedido!!
    <?php endif; ?>
</table>
<hr>


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">


        </div>
    </div>
</div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('painel.gestao.gestao-clientes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>