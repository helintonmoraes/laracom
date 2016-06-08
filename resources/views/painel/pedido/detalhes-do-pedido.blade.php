@extends('painel.layouts.gestao')
@section('content')

<h4>Num. pedido: {{$pedido[0]['external_reference']}} <br/> Cliente: {{$cliente->nome}} </h4>
{{Form::open(['url' => "pedido/alterar-status"])}}
<input class="form-control" type="hidden" value="{{$pedido[0]['id']}}" name="id_pedido">
<input class="form-control" type="hidden" value="{{$pedido[0]['saida_estoque']}}" name="saida_estoque">
<input class="form-control" type="hidden" value="{{$pedido[0]['external_reference']}}" name="external_reference">
<select name="status">
    <option></option>
    <option>Entregue e Finalizado!</option>
    <option>Aguardando Pagamento!</option>
    <option>Aguardando envio, pedido pago!</option>
    <option>Pedido Enviado!</option>
    <input type="submit" value="Alterar Situação">
</select>
{{Form::close()}}
<br/>
<table class="table table-hover">

    <tr>
        <th></th>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Valor unitario</th>
        <th>Valor total do item</th>
    </tr>
    @forelse($produtos as $produto)
    <tr>  
        <td><img class="thumb"style="width: 50px"src="/image-file/{{$produto->imagem_1}}" alt="" /></td>
        <td>{{$produto->nome}}</td>
        <td>{{$produto->qty}}</td>
        <td>{{$produto->preco_venda}}</td>
        <td>{{$produto->preco_venda * $produto->qty}}</td>
    </tr> 
    @empty
    Nenhum item nesse pedido!!
    @endforelse
</table>
<hr>


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">


        </div>
    </div>
</div>





@endsection