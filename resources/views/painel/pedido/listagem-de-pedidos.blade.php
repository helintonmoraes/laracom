    
@extends('painel.layouts.gestao')
@section('content')
@if($cliente)
<h1>{{$cliente->nome}} </h1>
<table class="table">
    <tr>
        <th>Numero do pedido</th>
        <th>Status do pedido</th>
        <th>Data do pedido</th>
        <th></th>
    </tr>
    @forelse($pedidos as $pedido)

    <?php $cor = getCor($pedido->status) ?>




    <a href="#">
        <tr style="background-color: {{$cor}};">
            <td>{{$pedido->external_reference}}</td>
            <td>{{$pedido->status}}</td>
            <td>{{$pedido->data_pedido}}</td>
            <td><a class="btn btn-success" href="{{url('/pedidos/detalhar-pedido',$pedido->id)}}">Ver detalhes</a></td>
        </tr>
    </a>
    @empty
    Nenhum pedido realizado por esse cliente!!
    @endforelse
</table>
@endif

@endsection



































<?php

function getCor($status) {
    switch ($status) {
        case "Pedido entregue":
            $cor = '#ECFCED';
            break;
        case "Aguardando envio, pedido pago!":
            $cor = '#FCECED';
            break;
        case "Aguardando pagamento":
            $cor = '#F5F6CE';
            break;
        case "Enviado para entrega":
            $cor = '#E1D9F5';
            break;
        default :
            $cor = "white";
            break;
    }
    return $cor;
}
?>

