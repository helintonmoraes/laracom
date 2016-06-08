

<div>
    <a href="www.laracom.dev"><img src="{{URL::asset('http://oi66.tinypic.com/dcx4i1.jpg')}}" alt="Logomarca"/></a>
    <p style="color:red;text-align:left;font-size:20px;">Ofertas do Dia!</p>

    <table>
        <thead>
            <tr class="cart_menu">
                <td align="center"style="border-bottom: 2px solid black;border-top: 1px solid black;margin: 0px;padding: 2px;background-color: #cccccc;">NOME</td>    
                <td align="center"style="border-bottom: 2px solid black;border-top: 1px solid black;margin: 0px;padding: 2px;background-color: #cccccc;">VALOR</td>
                <td align="center"style="border-bottom: 2px solid black;border-top: 1px solid black;margin: 0px;padding: 2px;background-color: #cccccc;">ESTOQUE</td>
                <td align="center"style="border-bottom: 2px solid black;border-top: 1px solid black;margin: 0px;padding: 2px;background-color: #cccccc;"></td>
            </tr>
        </thead>
        <tbody>
            @forelse ($ofertas as $oferta)
            <tr>
                <td style="border-bottom: 2px solid black;border-top: 1px solid black;margin: 0px;padding: 2px;background-color: #F5F5DC;" class="cart_price" align="left">
                    <p> {{$oferta['nome']}}</p>                           
                </td>

                <td style="border-bottom: 2px solid black;border-top: 1px solid black;margin: 0px;padding: 2px;background-color: #F5F5DC;" class="cart_total" align="center">
                     <p> R$ {{number_format($oferta['preco_venda'], 2, ',', '.')}}</p> 
                </td>

                <td style="border-bottom: 2px solid black;border-top: 1px solid black;margin: 0px;padding: 2px;background-color: #F5F5DC;" class="cart_total" align="center">
                    <p> {{$oferta['qtd_estoque']}}</p>
                </td>

                <td style="border-bottom: 2px solid black;border-top: 1px solid black;margin: 0px;padding: 2px;background-color: #F5F5DC;" class="cart_total" align="center">
                    <p><a href="www.laracom.dev/produto-detalhes/{{$oferta['id']}}">Mais Detalhes</a></p>
                </td>
            </tr>

            @empty
            @endforelse

        </tbody>
    </table>

</div>
