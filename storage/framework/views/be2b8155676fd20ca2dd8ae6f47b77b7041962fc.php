<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Gestor de Subcategorias</h3>
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>

                                <tr>
                                    <th>Nome</th>
                                    <th>ID</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; foreach($categorias as $categoria): $__empty_1 = false; ?>
                                <tr>

                                    <td>
                                        <p><?php echo e($categoria->nome); ?><br></p>
                                    </td>
                                    <td>
                                        <p><?php echo e($categoria->id); ?><br></p>
                                    </td>
                                    <td>
                                        <a href="editar-categoria/<?php echo e($categoria->id); ?>" class="edit"><i class="fa fa-pencil"></i></a>
                                        <a href="#deletar-dado" role="button" data-toggle="modal" onclick="deletaDado(<?php echo e($categoria->id); ?>)" class="deletar"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; if ($__empty_1): ?>

                                <?php endif; ?>
                            </tbody>
                            <a href="adicionar-categoria"><button type="button"  class="btn btn-success">Novo Categoria</button></a>
                        </table>
                        <?php echo e($categorias->links()); ?>



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
                                function deletaDado(idDado) {
                                //seta o caminho para quando clicar em "Apagar".
                                var href = '/painel/deletar-categoria/' + idDado;
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