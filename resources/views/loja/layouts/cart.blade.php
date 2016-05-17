<div class="cart" >
    <p><span>Carrinho:</span><div id="dd" class="wrapper-dropdown-2"> {{$carts}} item(s) <span style="color:green;font-size:15px;">Total R${{ number_format($carts_row, 2, ',', '.')}}</span></p>
        @if(session('desconto'))
        
          @if((Session::get('desconto')) < $carts_row)
          | Descontos: R$ {{ Session::get('desconto') }} |
          @else
          | Descontos: R$ {{number_format($carts_row, 2, ',', '.')}} |
          @endif
            @if($carts_row>0)
                @if($carts_row < Session::get('desconto'))
                    Valor a pagar: R$ 0,00
                @else
                    Valor a pagar: {{ number_format($carts_row-Session::get('desconto'), 2, ',', '.') }}
                @endif
            @endif
        @endif
        
        <a href="{{url('cart/ver-carrinho')}}">Ver Carrinho</a>
        <p>
        <ul class="dropdown" id="add_cart">
          @forelse ($cart as $item)
          <li>{{$item->name}}, Preço: R${{$item->price}} X {{$item->qty}} = {{$item->subtotal}} 
          
          
          
          </li>
          @empty
          <li>Você não possui produtos no carrinho!</li>
          @endforelse                         
        </ul>
    </div>
    </p>
</div>
<script type="text/javascript">
function DropDown(el) {
    this.dd = el;
    this.initEvents();
}
DropDown.prototype = {
    initEvents: function () {
        var obj = this;

        obj.dd.on('click', function (event) {
            $(this).toggleClass('active');
            event.stopPropagation();
        });
    }
}

$(function () {

    var dd = new DropDown($('#dd'));

    $(document).click(function () {
        // all dropdowns
        $('.wrapper-dropdown-2').removeClass('active');
    });

});
</script>