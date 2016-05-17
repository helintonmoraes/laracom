@extends('loja.layouts.master')
@section('content')

  
<div class="cart_border">
        <div class="table-responsive cart_info">
            @if(count($cart))
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td>PRODUTO</td>                        
                        <td>PREÇO</td>
                        <td>QUANTIDADE</td>
                        <td>TOTAL</td>
                        <td>AÇÃO</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr>

                        <td class="cart_description">
                            <h4><a href="/produto-detalhes/{{$item->id}}">{{$item->name}}</a></h4>
                        </td>
                        <td class="cart_price">
                            <p>R$ {{number_format($item->price, 2, ',', '.')}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href='{{url("cart/add-qtd/$item->id")}}'><img src="{{URL::asset('loja/images/icons/upload.png')}}" alt="Meus Pedidos"/></a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href="{{url("cart/rem-qtd/$item->id")}}"><img src="{{URL::asset('loja/images/icons/download.png')}}" alt="Meus Pedidos"/></a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">R$ {{number_format($item->subtotal, 2, ',', '.')}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="/cart/remove-carrinho/{{$item->id}}">Remover</a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                <p>Você não possui itens no carrinho!</p>
                @endif
                </tbody>
            </table>
        </div>
</div>
@if($carts_row > 0)
<div class="wrapper-dropdown-3">
   <span>Resumo:</span>
     {{$carts}} item(s) - Total da Compra: R${{$carts_row}}
     
     @if(session('desconto'))
      @if((Session::get('desconto')) > $carts_row)
        | Cartão de Desconto: R${{$carts_row}}
      @else
        | Cartão de Desconto: R$ {{ Session::get('desconto')}} 
      @endif
           @if((Session::get('desconto')) < $carts_row)
           | Valor a pagar: {{ $carts_row -(Session::get('desconto')) }}
           @else
           | Valor a pagar: 0.00
           @endif
     @endif
     
        <form method="get" action="{{ URL::previous() }}">
             <input type="hidden" name="_token" value="{{ csrf_token()}}">
             <h4><button type="submit" style="float:left;margin-right:1%;" class="add-cart">Continuar Comprando</button></h4>
        </form>
        <form method="post" action="/cliente/pedido">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h4><button type="submit" href="cliente"class="add-cart">Finalizar Compra</button></h4>
        </form>
    
</div>
@endif
  

    

@endsection
