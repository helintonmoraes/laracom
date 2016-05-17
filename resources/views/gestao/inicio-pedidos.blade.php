@extends('painel.gestao.gestao-clientes')
@section('content')
<h1>Escolha umas das opções...</h1>

<div class="btn-group btn-group-justified" role="group" aria-label="...">
    <!-- Os segundos parametros da url foram definidos por prioridade de resposta ao cliente-->
    <div class="btn-group" role="group">
        <a href="{{url('/gestao/listar-pedidos',1)}}">
            <button type="button" class="btn btn-danger">Pedidos Pagos, aguardando envio...</button>
        </a>
    </div>
    <div class="btn-group" role="group">
        <a href="{{url('/gestao/listar-pedidos',2)}}">
            <button type="button" class="btn btn-warning">Pedidos Aguardando Pagamento...</button>
        </a>
    </div>
</div>
<br/>
<div class="btn-group btn-group-justified" role="group" aria-label="...">
    <div class="btn-group" role="group">
        <a href="{{url('/gestao/listar-pedidos',3)}}">
            <button type="button" class="btn btn-primary">Pedidos Enviados para Entrega...</button>
        </a>
    </div>
    <div class="btn-group" role="group">
        <a href="{{url('/gestao/listar-pedidos',4)}}">
            <button type="button" class="btn btn-success">Pedidos Entregues!!!</button>
        </a>
    </div>

</div>
@if(@$pedidos)
<table class="table">
    @forelse($pedidos as $pedido)
    <tr style="background-color: {{$cor}};">
        <td>
            {{$pedido->external_reference}}
        </td>
        
    </tr>

    @empty
    Nenhum pedido
    @endforelse
</table>
{{$pedidos->render()}}
@endif
@endsection