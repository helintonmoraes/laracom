<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Gestor de Produto</h3>
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
                                    <td>
                                        <a href="editar-produto/<?php echo e($produto->id); ?>" class="edit"><i class="fa fa-pencil"></i></a>
                                        <a href="#deletar-dado" role="button" data-toggle="modal" onclick="deletaDado(<?php echo e($produto->id); ?>)" class="deletar"><i class="glyphicon glyphicon-trash"></i></a>

                                    </td>
                                </tr>
                                <?php endforeach; if ($__empty_1): ?>
                                <?php endif; ?>
                            </tbody>
                            <a href="adicionar-produto"><button type="button"  class="btn btn-success">Novo Produto</button></a>
                        </table>
                        <?php echo e($produtos->links()); ?>



                        <div id="deletar-dado" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">Confirmação</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Deseja realmente excluir este registro?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                        <a id="confirmaDelecao" class="btn red">Apagar</a>
                                    </div>
                                </div>
                            </div>

                            <script type="text/javascript">
                                function deletaDado (idDado){
                                //seta o caminho para quando clicar em "Apagar".
                                var href = '/painel/deletar-produto/' + idDado;
                                //adiciona atributo de delecao ao link
                                $('#confirmaDelecao').prop("href", href);
                                }
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php $__env->stopSection(); ?>
<?php echo $__env->make('painel.layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('painel.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>