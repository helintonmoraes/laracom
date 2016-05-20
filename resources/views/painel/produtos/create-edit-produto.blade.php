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
                    <div class="col-lg-6">
                        @if(isset($produto))
                            {{Form::open(['url' => "painel/editar-produto/$produto->id", 'files' => true])}}
                            @else
                            {{Form::open(['url' => 'painel/adicionar-produto','files'=>true])}}
                        @endif
                           
                        <div class="form-group">
                            <label>Categoria</label>
                            <select name="id_categoria" class="form-control" id="id_categoria">                                                                
                                <option value="">Selecione...</option>
                                @forelse ($categorias as $categoria)
                                @if($categoria->id_pai == 0)
                                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                @endif
                                @empty
                                @endforelse
                            </select>
                            @if($errors->has('id_categoria'))                  
                                <p class="text-danger">{!! $errors->first('id_categoria') !!}</p>
                            @endif 
                        </div>

                        <div class="form-group">
                            <label for="field1">Subcategorias</label>
                            <select class="form-control" name="id_subcategoria" id="id_subcategoria">
                                <option value="">Selecione...</option>
                            </select>
                            @if($errors->has('id_subcategoria'))                  
                                <p class="text-danger">{!! $errors->first('id_subcategoria') !!}</p>
                            @endif 
                        </div>

                        <div class="form-group">
                            <label>Nome do Produto</label>
                            {{Form::text('nome', isset($produto->nome)? $produto->nome:null, ['placeholder' => 'Nome do Produto','class' => 'form-control'])}}                          
                            @if($errors->has('nome'))                  
                                <p class="text-danger">{!! $errors->first('nome') !!}</p>
                            @endif                    
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon">R$</span>
                            {{Form::text('preco_venda', isset($produto->preco_venda)? $produto->preco_venda:null, ['placeholder' => 'Preço','class' => 'form-control'])}} 
                        </div>
                            @if($errors->has('preco_venda'))                  
                                <p class="text-danger">{!! $errors->first('preco_venda') !!}</p>
                            @endif

                        <div class="form-group">
                            <label>Imagem Capa</label>
                            {{Form::file('imagem_1')}} 
                        </div>
                        <div class="form-group">
                            <label>Imagem 2</label>
                            <input name="imagem_2" type="file">
                        </div>
                        <div class="form-group">
                            <label>Imagem 3</label>
                            <input name="imagem_3" type="file">
                        </div>
                        <div class="form-group">
                            <label>Imagem 4</label>
                            <input name="imagem_4" type="file">
                        </div>
                        <div class="form-group">
                            <label>Imagem 5</label>
                            <input name="imagem_5" type="file">
                        </div>
                        <div class="form-group">
                            <label>Imagem 6</label>
                            <input name="imagem_6" type="file">
                        </div>
                        <div class="form-group">
                            <label>Descrição do Produto</label>
                          {{Form::textarea('descricao', isset($produto->descricao)? $produto->descricao:null, ['placeholder' => 'Descrição','class' => 'form-control','rows'=>3])}} 
                            @if($errors->has('descricao'))                  
                                <p class="text-danger">{!! $errors->first('descricao') !!}</p>
                            @endif 
                        </div>
                        <div class="form-group">
                            <label>Especificação Técnica</label>
                            {{Form::textarea('especificacao', isset($produto->especificacao)? $produto->especificacao:null, ['placeholder' => 'Especificação','class' => 'form-control','rows'=>3])}} 
                            @if($errors->has('especificacao'))                  
                                <p class="text-danger">{!! $errors->first('especificacao') !!}</p>
                            @endif 
                        </div>
                        <div class="form-group">
                            <label>Resumo</label>
                            {{Form::textarea('resumo', isset($produto->resumo)? $produto->resumo:null, ['placeholder' => 'Resumo','class' => 'form-control','rows'=>3])}} 
                            @if($errors->has('resumo'))                  
                                <p class="text-danger">{!! $errors->first('resumo') !!}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Opções de Visualização</label>
                            <div class="checkbox">
                                <label>
                                    <input name="oferta" value="true" type="checkbox">Oferta
                                </label>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input name="lancamento" value="true" type="checkbox">Lançamento
                                </label>
                            </div> 

                            <div class="checkbox">
                                <label>
                                    <input name="destaque" value="true" type="checkbox">Destaque
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default">Enviar</button>
                        <button type="reset" class="btn btn-default">Limpar</button>

                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

