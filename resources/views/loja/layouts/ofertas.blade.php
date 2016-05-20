<div class="header_bottom_right">					 
    <div class="cycle-slideshow cycle-autoinit" 
         data-cycle-fx=carousel
         data-cycle-timeout=4000

         data-cycle-slides=">div"
         >
        @forelse($ofertas as $oferta)
        
        <div id="slide-1" class="slide">			                    
            <div class="slider-img">
                <a href="produto-detalhes/{{$oferta->id}}"><img src="/image-file/{{$oferta->imagem_1}}" alt="" /></a>								    
            </div>
            <div class="slider-text">
                <h1>OFERTA<br><span>HOJE</span></h1>
                  <div class="add-cart" id="cart">								
                    <form method="POST" action="{{url('cart/add-cart')}}">
                        <input type="hidden" name="qty" value=1>
                        <input type="hidden" name="produto_id" value="{{$oferta->id}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        
                        <h4><button type="submit" id="btnAdd"/>Adicionar ao Carrinho</button></h4> 
                    </form>
                </div>
                <div class="features_list">
                  <h2>{{$oferta->nome}}</h2>
                    <h1>R$ {{number_format($oferta->preco_venda, 2, ',', '.')}}</h1>
                    <p>{{$oferta->resumo}}</p>
                </div>
              
                <div class="features_list">
                    
                    
                </div>
            </div>			               
            <div class="clear"></div>				
        </div>
        
        @empty
         <div id="slide-1" class="slide">			                    
            <div class="slider-img">
                <h1>FAÇA O SEU CADASTRO<br><span>HOJE</span></h1>
                <a href="/registro">FAÇA O SEU CADASTRO</a>								    
            </div>
            <div class="slider-text">
                
                  <div class="add-cart" id="cart">								
 
                </div>
                <div class="features_list">
                
                </div>
              
                <div class="features_list">
                    
                    
                </div>
            </div>			               
            <div class="clear"></div>				
        </div>
       
        @endforelse


    </div>  			
</div>