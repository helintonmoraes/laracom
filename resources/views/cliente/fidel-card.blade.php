@extends('loja.layouts.master')

@section('content')
<div class="section group">
      <div style="border-radius:10px"class="grid_1_of_5 images_1_of_4">
          <h2 style="margin-bottom:10px">Total de Pontos</h2>
        <img src="{{URL::asset('loja/images/icons/money-bag.png')}}" alt="Meus Pedidos"/>
        <h1 style="font-size:2em;">{{number_format($cliente->saldo_pontos, 0, ',', '.')}} pts</h1>
    </div>
    
    <div style="border-radius:10px"class="grid_1_of_5 images_1_of_4">
       <h2 style="margin-bottom:10px">Pontos Consumidos</h2>
        <img src="{{URL::asset('loja/images/icons/website.png')}}" alt="Meus Pedidos"/>
        <h1 style="font-size:2em;">{{number_format($cliente->pontos_usados, 0, ',', '.')}} pts</h1>
    </div>
    
    <div style="border-radius:10px"class="grid_1_of_5 images_1_of_4">
       <h2 style="margin-bottom:10px">Saldo em R$</h2>
        <img src="{{URL::asset('loja/images/icons/coins-2.png')}}" alt="Meus Pedidos"/>
        <h1 style="font-size:2em;">R${{number_format($saldo_real, 2, ',', '.')}}</h1>
    </div>
    @if($resgate == FALSE)
    <div style="border-radius:10px;background-color:#dddddd;"class="grid_1_of_5 images_1_of_4">
       <h2 style="margin-bottom:10px">Resgatar</h2>
        <img src="{{URL::asset('loja/images/icons/coins-1.png')}}" alt="Meus Pedidos"/>
        <h1 style="font-size:2em;">Não Liberado</h1>
    </div>
    @else
    <div style="border-radius:10px;background-color:#3AED8A;"class="grid_1_of_5 images_1_of_4">
       <h2 style="margin-bottom:10px">Resgatar</h2>
       <a href="add-desconto"><img src="{{URL::asset('loja/images/icons/coins-1.png')}}" alt="Meus Pedidos"/></a>
        <h1 style="font-size:2em;">Resgatar</h1>
    </div>
    @endif
    
</div>
<div class="wrapper-dropdown-3">
    <p>*A cada R$ 1,00 em compras você recebe 1 ponto</p>
    <p>*50 pontos equivalem a R$ 1,00</p>
    <p>*100 pontos equivalem a R$ 2,00</p>
    <p>*Resgate mínino de 1000 pontos</p>
</div>
@endsection




