@extends('painel.layouts.master')
@extends('painel.layouts.menu')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Gestor de Pedidos</h3>
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
                                @forelse($pedidos as $pedido)
                                <tr class="odd gradeX">
                                    <td> {{$pedido['collection']['id']}}</td> 
                                    <td>R$ {{{ number_format($pedido['collection']['total_paid_amount'], 2, ',', '.') }}}</td>
                                    
                                    <td> {{$pedido['collection']['date_created']}}</td> 
                                   
                                        @if( $pedido['collection']['status'] == 'cancelled')
                                            <td> Cancelado</td>
                                        @endif
                            
                                        @if( $pedido['collection']['status'] == 'pending')
                                            <td> Pendente Pagamento</td>
                                        @endif
                                    
                                    <td>
                                        <a href="editar-produto/{{$pedido['collection']['id']}}" class="edit"><i class="fa fa-pencil"></i></a>
                                        <a href="#deletar-dado" role="button" data-toggle="modal" onclick="deletaDado({{$pedido['collection']['id']}})" class="deletar"><i class="glyphicon glyphicon-trash"></i></a>

                                    </td>
                                </tr>
                                @empty
                                @endforelse
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




    @endsection