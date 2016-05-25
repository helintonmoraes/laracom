@extends('painel.layouts.gestao')
@section('content')
@if(@$status)
<h1 style="background:{{$cor}};text-align:center;border-radius:10px;">{{$status}}</h1>
@else
<h1>Escolha umas das opções...</h1>
@endif

<div class="btn-group btn-group-justified" role="group" aria-label="...">
    <!-- Os segundos parametros da url foram definidos por prioridade de resposta ao cliente-->
    <div class="btn-group" role="group">
        <a href="{{url('/pedido/listar-pedidos',1)}}">
            <button type="button" class="btn btn-danger">Pedidos Pagos, aguardando envio...</button>
        </a>
    </div>
    <div class="btn-group" role="group">
        <a href="{{url('/pedido/listar-pedidos',2)}}">
            <button type="button" class="btn btn-warning">Pedidos Aguardando Pagamento...</button>
        </a>
    </div>
</div>
<br/>
<div class="btn-group btn-group-justified" role="group" aria-label="...">
    <div class="btn-group" role="group">
        <a href="{{url('/pedido/listar-pedidos',3)}}">
            <button type="button" class="btn btn-primary">Pedidos Enviados para Entrega...</button>
        </a>
    </div>
    <div class="btn-group" role="group">
        <a href="{{url('/pedido/listar-pedidos',4)}}">
            <button type="button" class="btn btn-success">Pedidos Entregues!!!</button>
        </a>
    </div>

</div>
@if(isset($pedidos))
<table class="table table-hover">
    <tr>
        <th>Num. Pedido</th>
        <th>Status</th>
        <th>Data</th>
        <th>Valor Total</th>
        <th></th>
    </tr>
    @forelse($pedidos as $pedido)    
    <tr style="font-size: 14px;">
        <td>{{$pedido->external_reference}}</td>
        <td>{{$pedido->status}}</td>
        <td>{{date('d/m/y - H:i ',strtotime($pedido->updated_at))}}h</td>
        <td>{{'R$' . number_format($pedido->valor_pedido, 2, ',', '.')}}</td>
        <td><a class="glyphicon glyphicon-menu-hamburger"href="{{url('/pedido/detalhar-pedido/'.$pedido->external_reference)}}">Detalhar</a></td>
    </tr>

    @empty
    Nenhum pedido
    @endforelse
</table>
{{$pedidos->render()}}
@endif
@endsection