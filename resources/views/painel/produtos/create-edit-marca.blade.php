@extends('painel.layouts.master')
@extends('painel.layouts.menu')
@section('content')

@if(isset($marcas))
@forelse($marcas as $marca)
{{Form::open(['url' => "painel/editar-marca/$marca->id", 'files' => true,'id' => 'file-upload', 'class' => 'upload'])}}
<h3>GESTOR DE MARCA</h3>
<div class="inner clearfix">
    <fieldset class="error">
        <label for="field1">NOME</label>
        <div class="field">
            {{Form::text('nome', isset($marca->nome)? $marca->nome:null, ['placeholder' => 'Nome da Categoria','id'=>'field1'])}}
            <span class="error-alert">Please enter valid value</span>
        </div>
    </fieldset>
    
    <input type="submit" value="SALVAR" class="right">
    @empty
    @endforelse
</div>
</form>

@else
{{Form::open(['url' => 'painel/adicionar-marca', 'files' => true,'id' => 'file-upload', 'class' => 'upload'])}}

<h3>GESTOR DE CATEGORIAS</h3>
<div class="inner clearfix">
    <fieldset class="error">
        <label for="field1">NOME</label>
        <div class="field">
            {{Form::text('nome',null, ['placeholder' => 'Nome da Marca','id'=>'field1'])}}
            <span class="error-alert">Please enter valid value</span>
        </div>
    </fieldset>
    <input type="submit" value="SALVAR" class="right">
</div>
</form>
@endif
@endsection

