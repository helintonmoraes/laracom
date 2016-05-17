@extends('painel.layouts.master')

@section('content')

<div class="tables clearfix">
    <table class="datatable adm-table">

        <thead>
            <tr>
                <th><input type="checkbox" data-label="" class="select-all"></th>
                <th>NOME<span class="order"></span></th>
                <th>ID<span class="order"></span></th>
                <th>AÇOES<span class="order"></span></th>
            </tr>
        </thead>
        <tbody>
            @forelse($marcas as $marca)
            <tr>
                <td><input type="checkbox" data-label=""></td>
                <td>

                    <p>{{$marca->nome}}<br></p>
                </td>
                <td><span class="date">{{$marca->id}}</span></td>
                <td>
                    <a href="editar-marca/{{$marca->id}}" class="edit"><i class="fa fa-pencil"></i></a>
                    <a href="deletar-marca/{{$marca->id}}" class="delete"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            @empty

        @endforelse
        </tbody>


    </table>
        <div class="nave">
            {!!$marcas->links()!!}
        </div>
   
    

</div>
<a href="adicionar-marca" class="btn_i">Nova Marca</a>
@endsection