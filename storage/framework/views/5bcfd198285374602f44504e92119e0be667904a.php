<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Gestor de Contatos</h3>
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>

                                <tr>
                                    <th>NOME<span class="order"></span></th>
                                    <th>DATA<span class="order"></span></th>
                                    <th>HORA<span class="order"></span></th>
                                    <th>STATUS<span class="order"></span></th>
                                    <th>AÇOES<span class="order"></span></th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $__empty_1 = true; foreach($contatos as $contato): $__empty_1 = false; ?>
                                <tr class="odd gradeX">
                                    <td><?php echo e($contato->nome); ?></td>
                                    <td><?php echo e($contato->data); ?></td>
                                    <td><?php echo e($contato->hora); ?></td>   
                                    <td><?php echo e($contato->status); ?></td>
                                    <td>
                                        <a href="editar-produto/<?php echo e($contato->id); ?>" class="edit"><i class="fa fa-pencil"></i></a>
                                        <a href="#deletar-dado" role="button" data-toggle="modal" onclick="deletaDado(<?php echo e($contato->id); ?>)" class="deletar"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; if ($__empty_1): ?>
                                <?php endif; ?>
                            </tbody>
                            
                        </table>
                    


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
                                var href = '/painel/deletar-contato/' + idDado;
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