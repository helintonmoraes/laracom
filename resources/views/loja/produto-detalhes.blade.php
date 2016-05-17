@extends('loja.layouts.master')

@section('content')

<script>
    $(function () {
        $('#products').slides({
            preload: true,
            preloadImage: 'img/loading.gif',
            effect: 'slide, fade',
            crossfade: true,
            slideSpeed: 350,
            fadeSpeed: 500,
            generateNextPrev: true,
            generatePagination: false
        });
    });
</script>


<div class="main">
    <div class="content">
        <div class="section group">
            <div class="cont-desc span_1_of_2">
                <div class="product-details">				
                    <div class="grid images_3_of_2">
                        <div id="container">
                            <div id="products_example">
                                <div id="products">
                                    <div class="slides_container">
                                        @for ($i = 1; $i <= $produto['cont']; $i++)
                                            <a href="#" target="_blank"><img src="{{URL::asset("/image-file/".$produto["imagem_".$i])}}" alt=" " /></a>
                                        @endfor
   
                                    </div>
                                    <ul class="pagination">
                                        @for ($i = 1; $i <= $produto['cont']; $i++)
                                            <li><a href="#"><img src="{{URL::asset("/image-file/".$produto["imagem_".$i])}}" alt=" " /></a></li>
                                        @endfor
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="desc span_3_of_2">
                        <h2>{{$produto['nome']}}</h2>
                        <p>{{$produto['resumo']}}</p>					
                        <div class="price">
                            
                            <p>Preço: <span>R$ {{number_format($produto['preco_venda'], 2, ',', '.')}}</span></p>
                        </div>

                        <div class="share-desc">
                                                <div class="add-cart" id="cart">								
                                   <form method="POST" action="{{url('cart/add-cart')}}">
                                       
                                           
                                            Quantidade : <select name="qty">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                           
                                         
                                         <input type="hidden" name="produto_id" value="{{$produto->id}}">
                                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                         <h4><button type="submit" class="add-cart"> Adicionar ao Carrinho</button></h4>
                                   </form>
                    </div>					
                            <div class="clear"></div>
                        </div>
                        <div class="wish-list">
                           <div class="rateyo-readonly-widg"></div>
                           <p>Avaliação Média: {{number_format($media,2)}} pontos</p>
                           <script>
                            $(function () {
                             $(".rateyo-readonly-widg").rateYo({
                             rating: {{$media}},
                             readOnly: true
                             }).click(function(){
                            
                             });
                            });
                        </script>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="product_desc">	
                    <div id="horizontalTab">
                        <ul class="resp-tabs-list">
                            <li>Detalhes do Produto</li>
                            <li>Especificações</li>
                            
                            <div class="clear"></div>
                        </ul>
                        <div class="resp-tabs-container">
                            <div class="product-desc">
                                <p>{{$produto['descricao']}}</p>
                            </div>

                            <div class="product-tags">
                            
                                <p>{{$produto['especificacao']}}</p>
                            
                              
                            </div>	

                           
                        </div>
                    </div>
                </div>
             
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#horizontalTab').easyResponsiveTabs({
                            type: 'default', //Types: default, vertical, accordion           
                            width: 'auto', //auto or any width like 600px
                            fit: true   // 100% fit in a container
                        });
                    });
                </script>
                <!--PRODUTOS RELACIONADOS-->
                <div class="content_bottom">
                    <div class="heading">
                        <h3>Produtos Relacionados</h3>
                    </div>

                    <div class="clear"></div>
                </div>
                <div class="section group">
                    
                    @forelse ($relacionados as $relacionado)
                    
                    <div class="grid_1_of_5 images_1_of_4">
                        <a href="/produto-detalhes/{{$relacionado->id}}"><img src="/image-file/{{$relacionado->imagem_1}}"/></a>
                        <p>{{$relacionado->nome}}</p>
                        <div class="price-details">
                            <div class="price-number">
                                <p><span class="rupees">R$ {{$relacionado->preco_venda}}</span></p>
                            </div>
                    <div class="add-cart" id="cart">								
                                   <form method="POST" action="{{url('cart/add-cart')}}">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="produto_id" value="{{$relacionado->id}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <h4><button type="submit" class="add-cart">Adicionar ao Carrinho</button></h4>
                                   </form>
                    </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    
                    @empty
                    @endforelse
                   

                </div>






            </div>
            <!--CATEGORIAS-->
            <div class="rightsidebar span_3_of_1">
                <h2>CATEGORIAS</h2>
                <ul>
                    @forelse($categorias as $categoria)
                    <li><a href='/categoria/{{$categoria->id}}'>{{$categoria->nome}}</a></li>
                    @empty
                    <p>Nenhum categoria cadastrada</p>
                    @endforelse
                </ul>
            </div>

        </div>
    </div>
</div>
</div>
@endsection

