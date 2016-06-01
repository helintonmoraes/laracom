<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Boletos Ativos no MP</h3>
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Valor</th>
                                    <th>Data</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; foreach($pedidos as $pedido): $__empty_1 = false; ?>
                                <tr class="odd gradeX">
                                    <td> <?php echo e($pedido['collection']['id']); ?></td> 
                                    <td>R$ <?php echo e(number_format($pedido['collection']['total_paid_amount'], 2, ',', '.')); ?></td>

                                    <td> <?php echo e($pedido['collection']['date_created']); ?></td> 

                                    <?php if( $pedido['collection']['status'] == 'cancelled'): ?>
                                    <td> Cancelado</td>
                                    <?php endif; ?>

                                    <?php if( $pedido['collection']['status'] == 'pending'): ?>
                                    <td> Pendente Pagamento</td>
                                    <?php endif; ?>

                                    <td>
                                        <a href="/pedido/detalhar-pedido/<?php echo e($pedido['collection']['external_reference']); ?>" class="edit"><i class="fa fa-pencil"></i></a>
                                        <a href="#deletar-dado" role="button" data-toggle="modal" onclick="deletaDado(<?php echo e($pedido['collection']['id']); ?>)" class="deletar"><i class="glyphicon glyphicon-trash"></i></a>

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
                                        <p>Deseja cancelar o boleto deste pedido?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                        <a id="confirmaDelecao" class="btn default">Apagar</a>
                                    </div>
                                </div>
                            </div>

                            <script type="text/javascript">
                                function deletaDado (idDado){
                                //seta o caminho para quando clicar em "Apagar".
                                var href = '/painel/deletar-pedido/' + idDado;
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