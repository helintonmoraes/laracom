@extends('painel.layouts.master')
@section('content')
@extends('painel.layouts.menu')
@if(isset($categorias_filhos))
@forelse($categorias_filhos as $categorias_filho)
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Gestor de Produto</h3>
            </div>
            <div class="panel-body">
                {{Form::open(['url' => "painel/editar-categoria/$categorias_filho->id", 'files' => true])}}
                     <div class="form-group">
                         <label>Nome da Categoria</label>
                        {{Form::text('nome', isset($categorias_filho->nome)? $categorias_filho->nome:null, ['placeholder' => 'Nome da Categoria','class'=>'form-control'])}}
                         <p class="help-block">ERRO DE CAMPO!.</p>
                    </div>
                    <div class="form-group">
                    <label for="field1">Categoria Pai</label>
                        <select name="id_pai" class="form-control" data-placeholder="Escolha um ID Pai" id="field1">
                            @forelse($categorias_pais as $categorias_pai)
                            <option value="{{$categorias_pai->id}}">{{$categorias_pai->nome}}</option>
                            @empty
                            @endforelse
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn-success" value="Salvar" class="right">
                    </div>
            </div>
@empty
@endforelse

                {{Form::close()}}
            </div>
        </div>
    </div>

@else
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Gestor de Produto</h3>
            </div>
                <div class="panel-body">
                    {{Form::open(['url' => 'painel/adicionar-categoria', 'files' => true,'id' => 'file-upload', 'class' => 'upload'])}}
                        <div class="form-group">
                            <label>Nome da Categoria</label>
                            <input name="nome" class="form-control">
                            <p class="help-block">ERRO DE CAMPO!.</p>
                        </div>
                    
               <div class="form-group">
                        <label for="field1">Categoria Pai</label>
                       
                            <select name="id_pai" class="form-control" data-placeholder="Escolha um ID Pai"">
                                @forelse($categorias_pais as $categorias_pai)
                                <option value="{{$categorias_pai->id}}">{{$categorias_pai->nome}}</option>
                                @empty

                                @endforelse
                            </select>

                        </div>
       
                    <input type="submit" value="SALVAR" class="right">
                </div>
               {{Form::close()}}
            </div>
        </div>
    </div>

    @endif
    @endsection

