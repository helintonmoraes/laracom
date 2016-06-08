@extends('painel.layouts.gestao')
@section('content')
@if(@$status)
<h2 style="{{$cor}};text-align:center;border-radius:10px;">{{$status}}</h2>
@else
<h1>Escolha umas das opções...</h1>
@endif

<p>Filtros de busca de pedido:</p>
<form id="busca_pedido" action="{{url('/pedido/listar-pedidos',8)}}">
    
    <select id="options" name="atributo" onchange="optionCheck()">
        <option>...</option>
        <option value="data_pedido">Data do Pedido</option>
        <option value="valor_pedido">Valor do Pedido</option>
        <option value="external_reference">Código do Pedido</option>
    </select>

    <script type="text/javascript">

        function optionCheck() {
            var option = document.getElementById("options").value;
            if (option == "data_pedido") {

                $("#busca_pedido").append('<input id="data" class="div1" type="text" name="parametro" placeholder="Data"/><input id="data" class="div1"  type="submit" value="Buscar Pedido">');
                $(".div2").remove();
                $(".div3").remove();
                $(document).ready(function () {
                    $("#data").datepicker({
                        dateFormat: 'dd/mm/yy',
                        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                        nextText: 'Próximo',
                        prevText: 'Anterior'
                    });
                });
            }
            if (option == "valor_pedido") {

                $("#busca_pedido").append('<input class="div2" name="parametro" placeholder="Valor Mínimo" type="text"/><input class="div2" name="parametro2" placeholder="Valor Máximo" type="text"/><input class="div2"  type="submit" value="Buscar Pedido">');
                $(".div1").remove();
                $(".div3").remove();

            }
            if (option == "external_reference") {

                $("#busca_pedido").append('<input class="div3" name="parametro" placeholder="Código do Pedido" type="text"/><input class="div3" type="submit" value="Buscar Pedido">');
                $(".div1").remove();
                $(".div2").remove();

            }
        }
    </script>

</form>

<div class="btn-group btn-group-justified" role="group" aria-label=".....">
    <!-- Os segundos parametros da url foram definidos por prioridade de resposta ao cliente-->
    <div class="btn-group" role="group">
        <a href="{{url('/pedido/listar-pedidos',1)}}">
            <button style="width:90%"type="button" class="btn btn-danger"><i class="fa fa fa-tags fa-2x"></i><h4 style="text-align:left">Quantidade: {{$cont['ag_envio']}}</h4>Pedidos Pagos, aguardando envio</button>
        </a>
    </div>
    <div class="btn-group" role="group">
        <a href="{{url('/pedido/listar-pedidos',2)}}">
            <button style="width:90%"type="button" class="btn btn-warning"><i class="fa fa-credit-card fa-2x"></i><h4 style="text-align:left">Quantidade: {{$cont['pen_pgto']}}</h4>Pedidos Aguardando Pagamento</button>
        </a>
    </div>
</div>
<br/>
<div class="btn-group btn-group-justified" role="group" aria-label="...">
    <div  class="btn-group"  role="group">
        <a href="{{url('/pedido/listar-pedidos',3)}}">
            <button style="width:90%" type="button" class="btn btn-primary"><i class="fa fa fa-truck fa-2x"></i><h4 style="text-align:left">Quantidade: {{$cont['enviado']}}</h4>Pedidos Enviados para Entrega...</button>
        </a>
    </div>
    <div class="btn-group" role="group">
        <a href="{{url('/pedido/listar-pedidos',4)}}">
            <button style="width:90%"ype="button" class="btn btn-success"><i class="fa fa fa-check-square-o fa-2x"></i><h4 style="text-align:left">Quantidade: {{$cont['entregue']}}</h4>Pedidos Entregues!!!</button>
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
        <td>{{$pedido->data_pedido}}</td>
        <td>{{'R$' . number_format($pedido->valor_pedido, 2, ',', '.')}}</td>
        <td><a class="glyphicon glyphicon-menu-hamburger"href="{{url('/pedido/detalhar-pedido/'.$pedido->external_reference)}}">Detalhar</a>
        @if(($pedido->status == 'Aguardando Pagamento!')&&((date('d/m/Y') - $pedido->data_pedido) < -9))
        <a href="{{url('/pedido/delete-pedido/'.$pedido->external_reference)}}" data-toggle="tooltip" data-placement="top" title="Pedido há mais de 10 dias sem finalizar" class="glyphicon glyphicon-remove" style="color:red">Cancelar</a>
        @endif
        </td>
    </tr>

    @empty
    Nenhum pedido
    @endforelse
</table>

{{$pedidos->render()}}

@endif
@endsection