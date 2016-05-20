@extends('painel.layouts.master')
@extends('painel.layouts.menu')
@section('content')
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
                                @forelse($produtos as $produto)
                                <tr class="odd gradeX">
                                    <td>{{$produto->nome}}</td>
                                    <td>{{$produto->preco_venda}}</td>
                                    <td class="center">
                                        @forelse($categorias as $categoria)
                                        @if($produto->id_categoria == $categoria->id)
                                        {{$categoria->nome}}
                                        @endif
                                        @empty
                                        @endforelse                        
                                    </td>
                                    <td class="center">
                                        @forelse($categorias as $categoria)
                                        @if($produto->id_subcategoria == $categoria->id)
                                        <p class="date">{{$categoria->nome}}</p>
                                        @endif
                                        @empty
                                        @endforelse                        
                                    </td>
                                    <td>
                                        <a href="editar-produto/{{$produto->id}}" class="edit"><i class="fa fa-pencil"></i></a>
                                        <a href="#deletar-dado" role="button" data-toggle="modal" onclick="deletaDado({{$produto->id}})" class="deletar"><i class="glyphicon glyphicon-trash"></i></a>

                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                            <a href="adicionar-produto"><button type="button"  class="btn btn-success">Novo Produto</button></a>
                        </table>
                        {{$produtos->links()}}


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




    @endsection