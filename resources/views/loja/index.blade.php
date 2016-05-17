@extends('loja.layouts.master')

@section('content')

<!--Menu de Categorias-->
      

                        

<div class="header_slide">
    <div class="header_bottom_left">				
        <div class="categories">
            <ul>                
                <!--Menu de Categorias-->
                <h3>Categorias</h3>
                @forelse($categorias as $categoria)
                <li><a href='/categoria/{{$categoria->id}}'>{{$categoria->nome}}</a></li>
                @empty
                <p>Nenhum categoria cadastrada</p>
                @endforelse
            </ul>
        </div>					
    </div>
<!--Fim Menu de Categorias-->
	 
@include('loja.layouts.ofertas')

<div class="clear"></div>

</div>


</div>
<div class="main">
    <div class="content">
        <div class="clear"></div>
        
        

@include('loja.layouts.lancamentos')
@include('loja.layouts.destaques')

    </div>
</div>
</div>
@endsection