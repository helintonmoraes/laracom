@extends('painel.layouts.master')

@section('content')

<div class="clearfix">
    <div class="heading">
        <h2><i class="fa fa-comments"></i>DETALHES DA MENSAGEM</h2>
    </div>
    <div class="comments-approval">
        <div class="author clearfix">
            <p class="left">{{$detalhes['nome']}}<br><span>{{$detalhes['data']}} {{$detalhes['hora']}}</span></p>
            <div class="right"><a href="#" class="approve"><i class="fa fa-check"></i></a><a href="#" class="delete"><i class="fa fa-times"></i></a></div>
        </div>
        <p>{{$detalhes['mensagem']}}</p>
    </div>
</div>

@endsection