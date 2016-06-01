@extends('loja.layouts.master')

@section('content')

<div class="section group">
    <div class="table-responsive cart_info">

        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <td align="center">Imagem</td>  
                    <td align="center">Produto</td>         
                    <td align="center">Valor</td>
                    <td align="center">Qtd</td>
                    <td align="center">Avaliação</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>

                @foreach($detalhes as $detalhe)
                
                <tr>
                    <td class="cart_price" width="10px" >                          
                        @foreach($produtos as $produto)
                        @if($produto->id == $detalhe['id_produto'])
                        <a target="_blank" href="/produto-detalhes/{{$produto->id}}"><img width="100%" src="{{URL::asset("/image-file/".$produto["imagem_1"])}}" alt=" " /></a>
                        @endif
                        @endforeach
                    </td>

                    <td align="center" class="cart_price">
                        @foreach($produtos as $produto)
                        @if($produto->id == $detalhe['id_produto'])
                        <p style="margin-top:15px">{{$produto->nome}}</p> 
                        @endif
                        @endforeach
                    </td>

                    <td align="center" class="cart_price">
                        @foreach($produtos as $produto)
                        @if($produto->id == $detalhe['id_produto'])
                        <p style="margin-top:15px">{{$detalhe['preco_venda']}}</p> 
                        @endif
                        @endforeach
                    </td>
                    <td align="center" class="cart_price">
                        @foreach($produtos as $produto)
                        @if($produto->id == $detalhe['id_produto'])
                        <p style="margin-top:15px">{{$detalhe['qty']}}</p> 
                        @endif
                        @endforeach                          
                    </td>

                    <td align="center" class="cart_total">
                        @foreach($ratings as $rating)                       
                        
                           @if($rating->id_produto == $detalhe['id_produto']) 
                           @include('cliente.rating')             
                           
                           <div class="rateyo-readonly-widg{{$rating->id}}"></div>
                           
                                {{$rating->nota}}                              
                           @endif
                        @endforeach                       
                        
                    </td>
                    <td>
                        
                        <div class="add-cart" id="cart">
                            {{Form::open(['url' => "cart/add-cart"])}} 
                            <input type="hidden" name="qty" value="1">
                            @foreach($produtos as $produto)
                            @if($produto->id == $detalhe['id_produto'])
                            <input type="hidden" name="produto_id" value="{{$detalhe['id_produto']}}">
                            @if($produto['qtd_estoque'] > 0)
                            <h4><button type="submit" class="add-cart">Comprar Novamente</button></h4>
                            @else
                            <h4><button style="background-color:#8B8989;" disabled="TRUE"> Produto Indisponível</button></h4>
                            @endif
                            @endif
                            @endforeach
                            
                            {{Form::close()}}
                        </div>
                        
                         <div class="add-cart" id="cart">
                            
                        </div>
                        
                    </td>
                </tr>
                @endforeach 




            </tbody>
        </table>
    </div>
    <div class="wrapper-dropdown-3">
        <p>Código do Pedido: <span style='color:red'>{{$pedido['external_reference']}}</span></p>
        <p>Situação: <span style='color:red'>{{$pedido['status']}}</span></p>
        <p>Data e Hora: <span style='color:red'>R$ {{$pedido['data_pedido']}} - {{$pedido['hora_pedido']}}</span></p>
        <p>Valor Total: <span style='color:red'>R$ {{$pedido['valor_pedido']}}</span></p>
        <p>Valor do Desconto: <span style='color:red'>R$ {{$pedido['cartao_desconto']}}</span></p>
        <div style="border:2px solid #a1a1a1;width:120px;border-radius:5px;background: #dddddd;">
            @if($pedido['pref_id']<>'Gratis')
                @if($pedido['boleto_emitido']==TRUE) 
                    @if($pedido['status']=='Aguardando Pagamento!')
                    <a target="_blank" href="/cliente/boleto/{{$pedido['external_reference']}}/{{$pedido['pref_id']}}"><img style="margin-left:28px"src="{{URL::asset('loja/images/icons/sign.png')}}" alt="Meus Pedidos"/><p align="center">2ª via de Boleto</p></a>
                    @else
                    <a href="/cliente/rastreio-detalhado/{{$pedido['external_reference']}}"><img style="margin-left:28px"src="{{URL::asset('loja/images/icons/delivery-truck.png')}}" alt="Meus Pedidos"/><p align="center">Rastrear Pedido!</p></a>
                    @endif
                @else
                <a target="_blank" href="/cliente/boleto/{{$pedido['external_reference']}}/{{$pedido['pref_id']}}"><img style="margin-left:28px"src="{{URL::asset('loja/images/icons/commerce.png')}}" alt="Meus Pedidos"/><p align="center">Pague Agora!</p></a>
                @endif
                
            @else
                <a href="/cliente/rastreio-detalhado/{{$pedido['external_reference']}}"><img style="margin-left:28px"src="{{URL::asset('loja/images/icons/delivery-truck.png')}}" alt="Meus Pedidos"/><p align="center">Rastrear Pedido!</p></a>
            @endif
            
            <div>
            </div>
        </div>
    </div>

    @endsection

