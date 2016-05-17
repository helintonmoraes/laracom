@extends('loja.layouts.master')


@section('content')     

<div class="main">
    <div class="content">
        <div class="nave">          
         
        @if(isset($parametro))
             {!!$filtros->appends(['buscar'=>"$parametro"])->links() !!}
        @else
            {!!$filtros->render() !!}
        @endif
        </div>
        <div class="total">
            {{$filtros->total()}} produtos encontrados!!!
        </div>

        <div class="section group">

            @forelse($filtros as $filtro)

            <div class="grid_1_of_5 images_1_of_4">
                <a href="/produto-detalhes/{{$filtro->id}}"><img src="/image-file/{{$filtro->imagem_1}}"/></a>
                <h3>{{$filtro->nome}}</h3>
                <div class="price-details">
                    <div class="price-number">
                        <p><span class="rupees">R$ {{$filtro->preco_venda}}</span></p>
                    </div>
                    <div class="add-cart" id="cart">								
                                   <form method="POST" action="{{url('cart/add-cart')}}">
                                            <input type="hidden" name="produto_id" value="{{$filtro->id}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="qty" value=1>
                                            <h4><button type="submit" class="add-cart"> Adicionar ao Carrinho </button></h4></form>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            @empty
            <div class="nave">
                <!-- Validação provisória para buscas vazias-->
                @if(isset($parametro))
                @if($parametro != '')               
                Nenhum produto encontrado
                @else
                Digite corretamente o produto desejado!!!
                @endif
                
                @else
                Nenhum produto encontrado
                @endif
            </div>
            @endforelse
        </div>




    </div>
</div>
@endsection




