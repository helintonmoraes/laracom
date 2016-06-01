@extends('loja.layouts.master')

@section('content')

<div class="section group">
    <div class="table-responsive cart_info">
            
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td align="center">CÓDIGO PEDIDO</td>    
                        <td align="center">DATA</td>    
                        <td align="center">HORA</td>
                        <td align="center">VALOR</td>
                        <td align="center">ENTREGA</td>
                        <td align="center">PAGAMENTO</td>
                        <td align="center">$$$</td>
                        <td align="center">***</td>
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pedidos as $pedido)
                    <tr>
                        <td class="cart_price" align="center">
                            <p>{{$pedido['external_reference']}}</p> 
                        </td>

                        <td class="cart_price" align="center">
                            <p> {{$pedido['data_pedido']}}</p> 
                        </td>
                        
                        <td class="cart_total" align="center">
                            <p> {{$pedido['hora_pedido']}}</p> 
                        </td>
                        
                        <td class="cart_price" align="center">
                            <p> R$ {{number_format($pedido['valor_total'], 2, ',', '.')}}</p>                           
                        </td>

                        <td class="cart_total" align="center">
                            <p> {{$pedido['entrega']}}</p> 
                        </td>
                        
                        <td class="cart_total" align="center">
                            <p> {{$pedido['status']}}</p>
                        </td>
                        
                        <td class="cart_total" align="center">
                        @if($pedido['boleto_emitido']==FALSE)
                            <p><a target="_blank" href="boleto/{{$pedido['external_reference']}}/{{$pedido['pref_id']}}">Finalize Agora!</a></p>
                        @endif
                        </td>
                        
                        <td class="cart_total" align="center">
                            <p><a href="/cliente/pedido-detalhado/{{$pedido['external_reference']}}">Mais Detalhes</a></p>
                        </td>
                        
                        

                    </tr>
                    {!!$pedidos->links() !!}
                    @empty
                    @endforelse
                             
              
                
                </tbody>
            </table>
        
             
       
        </div>
</div>
@endsection




