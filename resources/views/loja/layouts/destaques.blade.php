<div class="content_top">
            <div class="heading">
                <h3>Produtos em Destaque</h3>
            </div>
            <div class="see">
                <p><a href="/lancamentos">Ver todos os Destaques</a></p>
            </div>
            <div class="clear"></div>
        </div>

        <div class="section group">
            <!--PRODUTOS EM DESTAQUE-->
            @forelse($destaques as $destaque)
            

            <div class="grid_1_of_5 images_1_of_4">
                <a href="produto-detalhes/{{$destaque->id}}"><img src="/image-file/{{$destaque->imagem_1}}" alt="" /></a>
                <h3>{{$destaque->nome}}</h3>

                <div class="price-details">
                    <div class="price-number">
                        <p><span class="rupees">R$ {{number_format($destaque->preco_venda, 2, ',', '.')}}</span></p>
                    </div>
                    <div class="add-cart" id="cart">
                        {{Form::open(['url' => "cart/add-cart"])}} 
                            <input type="hidden" name="qty" value="1">
                            <input type="hidden" name="produto_id" value="{{$destaque->id}}">                            
                            <h4><button type="submit" class="add-cart">Adicionar ao Carrinho</button></h4>
                        {{Form::close()}}
                    </div>
                    <div class="clear"></div>
                </div>

            </div>
            
            @empty
            <div class="nave">
                Nenhum produto encotrado
            </div>
            @endforelse
        </div>