@extends('painel.layouts.gestao')
@section('content')

<table class="table">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
    </tr>

    @forelse($clientes as $cliente)

    <tr>
        <div>
            <td><a href="{{url('painel/detalhes-cliente', $cliente->id)}}"> {{$cliente->nome}}</a></td>
            <td>{{$cliente->email}}</td>
            <td>{{$cliente->fone}}</td>
        </div>
    </tr>

@empty
Nenhum Cliente cadastrado!!
@endforelse
</table>
{{$clientes->render()}}

@endsection