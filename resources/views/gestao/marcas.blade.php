@extends('painel.gestao.gestao-clientes')
@section('content')
<table class="table table-hover">
    @forelse($marcas as $marca)
    <tr style="font-size: 12px;">
        <td>{{$marca->nome}}</td>
    </tr>
    @empty
    @endforelse
</table>

{{$marcas->render()}}
@endsection