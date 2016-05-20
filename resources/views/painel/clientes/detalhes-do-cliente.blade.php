@extends('painel.gestao.gestao-clientes')
@section('content')
<h1>{{$cliente->nome}}</h1>

<a class="btn btn-primary" href="{{url('/pedidos/listagem-de-pedidos',$cliente->id)}}"> Ver pedidos de {{$cliente->nome}}</a>




<table class="table">
    <tr>

        <th>CPF</th>
        <th>Email</th>
    </tr>
    <tr>

        <td>{{$cliente->cpf}}</td>
        <td>{{$cliente->email}}</td>
    </tr>
</table>


<br/>
<h3>Pontos Acumulados: <span style="color: red;">{{$cliente->gift_card}}</span> pontos</h3>
<br/>
<br/>



<table class="table">
    <tr>
        <th>Telefone</th>
        <th>Endereço</th>

    </tr>

    <tr>

        <td>{{$cliente->fone}}</td>
        <td>{{$cliente->endereco}}</td>

    </tr>
</table>





@endsection