@extends('loja.layouts.master')

@section('content')
<div class="section group">
    <div class="client_top">
        <div class="img_tumb">
            <img src="{{URL::asset('loja/images/icons/thief.png')}}" alt="Meus Pedidos"/>
        </div>
        <div class="title_client">
            <p>{{$cliente->nome}}  ID: {{$cliente->id}}</p>
        </div>
    </div>
    <div style="border-radius:10px"class="grid_1_of_5 images_1_of_4">
        <a href="{{url('cliente/pedidos')}}"><img width="50%"src="{{URL::asset('loja/images/icons/paper.png')}}" alt="Meus Pedidos"/></a>
        <h3>Meus Pedidos</h3>
    </div>
    
    <div style="border-radius:10px"class="grid_1_of_5 images_1_of_4">
        <a href="{{url('cliente/cartao-fid')}}"><img width="50%"src="{{URL::asset('loja/images/icons/fidel_c.png')}}" alt="Meus Pedidos"/></a>
        <h3>Cartão Fidelidade</h3>
    </div>

    <div style="border-radius:10px"class="grid_1_of_5 images_1_of_4">
        <a href="{{url('cart/ver-carrinho')}}"><img width="50%"src="{{URL::asset('loja/images/icons/tool.png')}}" alt="MeuCarrinho"/></a>
        <h3>Meu Carrinho</h3>
    </div>
    <div style="border-radius:10px"class="grid_1_of_5 images_1_of_4">
        <a href="{{url('cliente/cadastro')}}"><img width="50%"src="{{URL::asset('loja/images/icons/profile.png')}}" alt="MeuCadastro"/></a>
        <h3>Meu Cadastro</h3>
    </div>
    
    <div style="border-radius:10px"class="grid_1_of_5 images_1_of_4">
        <a href="{{url('cliente/sair')}}"><img width="50%"src="{{URL::asset('loja/images/icons/power.png')}}" alt="Sair"/></a>
        <h3>Sair</h3>
    </div>
</div>
@endsection