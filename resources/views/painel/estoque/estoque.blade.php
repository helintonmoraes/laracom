@extends('painel.layouts.master')
@extends('painel.layouts.menu')
@section('content')
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
                                    <td>{{$produto->qtd_estoque}}</td>
                                    <td>
                                          <div id="add-estoque{{$produto->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">Alterar Estoque</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Estoque Atual:{{$produto->qtd_estoque}}</p>
                                        <p>Quantos {{$produto->nome}} você deseja adicionar?</p>
                                        
                                        {{Form::open(['url' => "painel/altera-estoque", 'files' => true,'id' => 'file-upload', 'class' => 'upload'])}}
                                        <div class="form-group">
                                        {{Form::hidden('id',$produto->id,['class'=>'form-control'])}}
                                        {{Form::text('qtd_estoque',null,['class'=>'form-control'])}}
                                         @if($errors->has('qtd_estoque'))                  
                                         <p class="text-danger">{!! $errors->first('qtd_estoque') !!}</p>
                                         @endif 
                                        
                                        </div>
                                     <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                        <button type="submit" class="btn btn-default">Adicionar</button>
                                    </div>
                                       {{Form::close()}}
                                </div>
                            </div>
                        </div>
                    </div>
                                        <a href="#add-estoque{{$produto->id}}" role="button" data-toggle="modal" class="deletar"><i class="glyphicon glyphicon-trash"></i></a>

                                    </td>
                                </tr>
                           
                                @empty
                                @endforelse
                            </tbody>
                            <a href="adicionar-produto"><button type="button"  class="btn btn-success">Novo Produto</button></a>
                        </table>
                        {{$produtos->links()}}


                        
                </div>
            </div>
        </div>
    </div>


   

    @endsection