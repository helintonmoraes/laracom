<?php $__env->startSection('content'); ?>

<div class="tables clearfix">
    <table class="datatable adm-table">

        <thead>
            <tr>
                <th><input type="checkbox" data-label="" class="select-all"></th>
                <th>NOME<span class="order"></span></th>
                <th>ID<span class="order"></span></th>
                <th>AÇOES<span class="order"></span></th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; foreach($marcas as $marca): $__empty_1 = false; ?>
            <tr>
                <td><input type="checkbox" data-label=""></td>
                <td>

                    <p><?php echo e($marca->nome); ?><br></p>
                </td>
                <td><span class="date"><?php echo e($marca->id); ?></span></td>
                <td>
                    <a href="editar-marca/<?php echo e($marca->id); ?>" class="edit"><i class="fa fa-pencil"></i></a>
                    <a href="deletar-marca/<?php echo e($marca->id); ?>" class="delete"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            <?php endforeach; if ($__empty_1): ?>

        <?php endif; ?>
        </tbody>


    </table>
        <div class="nave">
            <?php echo $marcas->links(); ?>

        </div>
   
    

</div>
<a href="adicionar-marca" class="btn_i">Nova Marca</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('painel.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>