@extends('loja.layouts.master')

@section('content')
@foreach($rastreio as $r)

@if($r->entrega == 'Pendente')
<div class="section group">
      <div style="border-radius:10px;background-color:#FFFF00"class="grid_1_of_5 images_1_of_4">
         <h2 style="margin-bottom:10px">Pagamento {{$r->entrega}}</h2>
        <img src="{{URL::asset('loja/images/icons/approve-invoice.png')}}" alt="Meus Pedidos"/>
    </div>
    
    <div style="border-radius:10px;background-color:#dddddd"class="grid_1_of_5 images_1_of_4">
       <h2 style="margin-bottom:10px">Separando Estoque</h2>
       <img src="{{URL::asset('loja/images/icons/delivered-box-verification-symbol.png')}}" alt="Meus Pedidos"/> 
    </div>
    
    <div style="border-radius:10px;background-color:#dddddd"class="grid_1_of_5 images_1_of_4">
       <h2 style="margin-bottom:10px">Pedido Enviado</h2>
       <img src="{{URL::asset('loja/images/icons/transport.png')}}" alt="Meus Pedidos"/>  
    </div>
    
    <div style="border-radius:10px;background-color:#dddddd;"class="grid_1_of_5 images_1_of_4">
        <h2 style="margin-bottom:10px">Pedido Entregue</h2>
        <img src="{{URL::asset('loja/images/icons/home-delivery-of-goods.png')}}" alt="Meus Pedidos"/>
    </div>
</div>
<div class="wrapper-dropdown-3">
</div>
@endif

@if($r->entrega == 'Pagamento Aprovado')
<div class="section group">
      <div style="border-radius:10px;background-color:#00FF00"class="grid_1_of_5 images_1_of_4">
         <h2 style="margin-bottom:10px">{{$r->entrega}}</h2>
        <img src="{{URL::asset('loja/images/icons/approve-invoice.png')}}" alt="Meus Pedidos"/>
    </div>
    
    <div style="border-radius:10px;background-color:#FFFF00"class="grid_1_of_5 images_1_of_4">
       <h2 style="margin-bottom:10px">Separando Estoque</h2>
       <img src="{{URL::asset('loja/images/icons/delivered-box-verification-symbol.png')}}" alt="Meus Pedidos"/> 
    </div>
    
    <div style="border-radius:10px;background-color:#dddddd"class="grid_1_of_5 images_1_of_4">
       <h2 style="margin-bottom:10px">Pedido Enviado</h2>
       <img src="{{URL::asset('loja/images/icons/transport.png')}}" alt="Meus Pedidos"/>  
    </div>
    
    <div style="border-radius:10px;background-color:#dddddd;"class="grid_1_of_5 images_1_of_4">
        <h2 style="margin-bottom:10px">Pedido Entregue</h2>
        <img src="{{URL::asset('loja/images/icons/home-delivery-of-goods.png')}}" alt="Meus Pedidos"/>
    </div>
</div>
<div class="wrapper-dropdown-3">
</div>
@endif

@if($r->entrega == 'Enviado')
<div class="section group">
      <div style="border-radius:10px;background-color:#00FF00"class="grid_1_of_5 images_1_of_4">
         <h2 style="margin-bottom:10px">{{$r->entrega}}</h2>
        <img src="{{URL::asset('loja/images/icons/approve-invoice.png')}}" alt="Meus Pedidos"/>
    </div>
    
    <div style="border-radius:10px;background-color:#00FF00"class="grid_1_of_5 images_1_of_4">
       <h2 style="margin-bottom:10px">Separando Estoque</h2>
       <img src="{{URL::asset('loja/images/icons/delivered-box-verification-symbol.png')}}" alt="Meus Pedidos"/> 
    </div>
    
    <div style="border-radius:10px;background-color:#FFFF00"class="grid_1_of_5 images_1_of_4">
       <h2 style="margin-bottom:10px">Pedido Enviado</h2>
       <img src="{{URL::asset('loja/images/icons/transport.png')}}" alt="Meus Pedidos"/>  
    </div>
    
    <div style="border-radius:10px;background-color:#dddddd;"class="grid_1_of_5 images_1_of_4">
        <h2 style="margin-bottom:10px">Pedido Entregue</h2>
        <img src="{{URL::asset('loja/images/icons/home-delivery-of-goods.png')}}" alt="Meus Pedidos"/>
    </div>
</div>
<div class="wrapper-dropdown-3">
</div>
@endif

@if($r->entrega == 'Entregue')
<div class="section group">
      <div style="border-radius:10px;background-color:#00FF00"class="grid_1_of_5 images_1_of_4">
         <h2 style="margin-bottom:10px">{{$r->entrega}}</h2>
        <img src="{{URL::asset('loja/images/icons/approve-invoice.png')}}" alt="Meus Pedidos"/>
    </div>
    
    <div style="border-radius:10px;background-color:#00FF00"class="grid_1_of_5 images_1_of_4">
       <h2 style="margin-bottom:10px">Separando Estoque</h2>
       <img src="{{URL::asset('loja/images/icons/delivered-box-verification-symbol.png')}}" alt="Meus Pedidos"/> 
    </div>
    
    <div style="border-radius:10px;background-color:#00FF00"class="grid_1_of_5 images_1_of_4">
       <h2 style="margin-bottom:10px">Pedido Enviado</h2>
       <img src="{{URL::asset('loja/images/icons/transport.png')}}" alt="Meus Pedidos"/>  
    </div>
    
    <div style="border-radius:10px;background-color:#00FF00;"class="grid_1_of_5 images_1_of_4">
        <h2 style="margin-bottom:10px">Pedido Entregue</h2>
        <img src="{{URL::asset('loja/images/icons/home-delivery-of-goods.png')}}" alt="Meus Pedidos"/>
    </div>
</div>
<div class="wrapper-dropdown-3">
</div>
@endif




@endforeach
@endsection




