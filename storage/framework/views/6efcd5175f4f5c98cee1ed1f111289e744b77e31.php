<?php $__env->startSection('content'); ?>

<?php if(isset($categorias_filhos)): ?>
<?php $__empty_1 = true; foreach($categorias_filhos as $categorias_filho): $__empty_1 = false; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Gestor de Produto</h3>
            </div>
            <div class="panel-body">
                <?php echo e(Form::open(['url' => "painel/editar-categoria/$categorias_filho->id", 'files' => true])); ?>

                     <div class="form-group">
                         <label>Nome da Categoria</label>
                        <?php echo e(Form::text('nome', isset($categorias_filho->nome)? $categorias_filho->nome:null, ['placeholder' => 'Nome da Categoria','class'=>'form-control'])); ?>

                         <p class="help-block">ERRO DE CAMPO!.</p>
                    </div>
                    <div class="form-group">
                    <label for="field1">Categoria Pai</label>
                        <select name="id_pai" class="form-control" data-placeholder="Escolha um ID Pai" id="field1">
                            <?php $__empty_2 = true; foreach($categorias_pais as $categorias_pai): $__empty_2 = false; ?>
                            <option value="<?php echo e($categorias_pai->id); ?>"><?php echo e($categorias_pai->nome); ?></option>
                            <?php endforeach; if ($__empty_2): ?>
                            <?php endif; ?>
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn-success" value="Salvar" class="right">
                    </div>
            </div>
<?php endforeach; if ($__empty_1): ?>
<?php endif; ?>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>

<?php else: ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Gestor de Produto</h3>
            </div>
                <div class="panel-body">
                    <?php echo e(Form::open(['url' => 'painel/adicionar-categoria', 'files' => true,'id' => 'file-upload', 'class' => 'upload'])); ?>

                        <div class="form-group">
                            <label>Nome da Categoria</label>
                            <input name="nome" class="form-control">
                            <p class="help-block">ERRO DE CAMPO!.</p>
                        </div>
                    
               <div class="form-group">
                        <label for="field1">Categoria Pai</label>
                       
                            <select name="id_pai" class="form-control" data-placeholder="Escolha um ID Pai"">
                                <?php $__empty_1 = true; foreach($categorias_pais as $categorias_pai): $__empty_1 = false; ?>
                                <option value="<?php echo e($categorias_pai->id); ?>"><?php echo e($categorias_pai->nome); ?></option>
                                <?php endforeach; if ($__empty_1): ?>

                                <?php endif; ?>
                            </select>

                        </div>
       
                    <input type="submit" value="SALVAR" class="right">
                </div>
               <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>

    <?php endif; ?>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('painel.layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('painel.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>