<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Gestor de Estoque</h3>
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>

                                <tr>
                                    <th>Produto</th>
                                    <th>Preço R$</th>
                                    <th>Categoria</th>
                                    <th>Subcategoria</th>
                                    <th>Estoque</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; foreach($produtos as $produto): $__empty_1 = false; ?>
                                <tr class="odd gradeX">
                                    <td><?php echo e($produto->nome); ?></td>
                                    <td><?php echo e($produto->preco_venda); ?></td>
                                    <td class="center">
                                        <?php $__empty_2 = true; foreach($categorias as $categoria): $__empty_2 = false; ?>
                                        <?php if($produto->id_categoria == $categoria->id): ?>
                                        <?php echo e($categoria->nome); ?>

                                        <?php endif; ?>
                                        <?php endforeach; if ($__empty_2): ?>
                                        <?php endif; ?>                        
                                    </td>
                                    <td class="center">
                                        <?php $__empty_2 = true; foreach($categorias as $categoria): $__empty_2 = false; ?>
                                        <?php if($produto->id_subcategoria == $categoria->id): ?>
                                        <p class="date"><?php echo e($categoria->nome); ?></p>
                                        <?php endif; ?>
                                        <?php endforeach; if ($__empty_2): ?>
                                        <?php endif; ?>                        
                                    </td>
                                    <td><?php echo e($produto->qtd_estoque); ?></td>
                                    <td>
                                          <div id="add-estoque<?php echo e($produto->id); ?>" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">Alterar Estoque</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Estoque Atual:<?php echo e($produto->qtd_estoque); ?></p>
                                        <p>Quantos <?php echo e($produto->nome); ?> você deseja adicionar?</p>
                                        
                                        <?php echo e(Form::open(['url' => "painel/altera-estoque", 'files' => true,'id' => 'file-upload', 'class' => 'upload'])); ?>

                                        <div class="form-group">
                                        <?php echo e(Form::hidden('id',$produto->id,['class'=>'form-control'])); ?>

                                        <?php echo e(Form::text('qtd_estoque',null,['class'=>'form-control'])); ?>

                                         <?php if($errors->has('qtd_estoque')): ?>                  
                                         <p class="text-danger"><?php echo $errors->first('qtd_estoque'); ?></p>
                                         <?php endif; ?> 
                                        
                                        </div>
                                     <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                        <button type="submit" class="btn btn-default">Adicionar</button>
                                    </div>
                                       <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                                        <a href="#add-estoque<?php echo e($produto->id); ?>" role="button" data-toggle="modal" class="deletar"><i class="glyphicon glyphicon-trash"></i></a>

                                    </td>
                                </tr>
                           
                                <?php endforeach; if ($__empty_1): ?>
                                <?php endif; ?>
                            </tbody>
                            <a href="adicionar-produto"><button type="button"  class="btn btn-success">Novo Produto</button></a>
                        </table>
                        <?php echo e($produtos->links()); ?>



                        
                </div>
            </div>
        </div>
    </div>


   

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('painel.layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('painel.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>