
@yield('menu')

<!-- /.Menu -->                
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li>
                <a href="/painel"><i class="glyphicon glyphicon-home"></i> Iniciar</a>
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-file"></i>Produtos<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{URL::asset('painel/produto')}}">Listar</a>
                    </li>
                    <li>
                        <a href="{{URL::asset('painel/adicionar-produto')}}">Cadastrar</a>
                    </li>
                </ul>
            </li>
            <li>
            <li>
                <a href="#"><i class="fa fa-camera-retro"></i> SubCategorias<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{URL::asset('painel/categoria')}}">Listar</a>
                    </li>

                    <li>
                        <a href="{{URL::asset('painel/adicionar-categoria')}}">Adicionar</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            
                        <li>
                <a href="#"><i class="fa fa-cubes"></i> Estoque<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{URL::asset('painel/estoque/1')}}">Esgotados</a>
                    </li>

                    <li>
                        <a href="{{URL::asset('painel/estoque/2')}}">1 a 10 Unidades</a>
                    </li>
                    
                    <li>
                        <a href="{{URL::asset('painel/estoque/3')}}">11 a 20 Unidades</a>
                    </li>
                    
                    <li>
                        <a href="{{URL::asset('painel/estoque/4')}}">Mais de 20 Unidades</a>
                    </li>
                    
                    <li>
                        <a href="#">Por Categoria</a>
                    </li>
                    
                    <li>
                        <a href="#">Por Marca</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>





            <li>
                <a href="#"><i class="glyphicon glyphicon-indent-right"></i> Gráficos<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{URL::asset('painel/estoque-categoria')}}">Estoque por Categoria</a>
                    </li>
                    <li>
                        <a href="#">Por Marca</a>
                    </li>
                    <li>
                        <a href="#">Por Preço</a>
                    </li>

                    <li>
                        <a href="#">Por Data</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{url('/pedido')}}"><i class="glyphicon glyphicon-usd"></i> Pedidos<span class="fa arrow"></span></a>

                <!-- /.nav-second-level -->
            </li>




            
            <!-- novo botão gestao------------------------------------------------- -->
            <li>
                <a href="#"><i class="glyphicon glyphicon-eye-open"></i> Clientes<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/painel/clientes')}}">Listar Clientes</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
                        <li>
                <a href="{{URL::asset('painel/contatos')}}"><i class="glyphicon glyphicon-envelope"></i> Contatos<span class="fa arrow"></span></a>

                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-user"></i> Usuários<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Adicionar</a>
                    </li>
                    <li>
                        <a href="{{url('painel/dados-admin')}}">Alterar</a>
                    </li>
                    <li>
                        <a href="#">Excluir</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

        </ul>

    </div>
    <!-- /.sidebar-collapse -->
</div>