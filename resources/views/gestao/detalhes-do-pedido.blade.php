@extends('painel.gestao.gestao-clientes')
@section('content')

<h1>Numero do pedido: {{$pedido->external_reference}}</h1>
<br/>
<table class="table">

    @forelse($produtos as $produto)

    <tr>  
        <td><img style="width: 50px"src="/image-file/{{$produto->imagem_1}}" alt="" /></td>
        <td>
            <!-- Large modal -->

            <button href type="button"  data-toggle="modal" data-target=".bs-example-modal-lg">
                {{$produto->nome}}
            </button>





        </td>

        <td>{{$produto->preco_venda}}</td>

    </tr> 

    @empty
    Nenhum item nesse pedido!!
    @endforelse
</table>
<hr>
<h2>Valor do Pedido : <span style="color: red;">{{$valorPedido}}</span> R$</h2>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">


        </div>
    </div>
</div>






@endsection