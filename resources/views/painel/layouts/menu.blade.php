@yield('menu')
<!-- /.Menu -->                
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li>
                <a href="/painel"><i class="glyphicon glyphicon-home"></i> Iniciar</a>
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-file"></i> Produtos<span class="fa arrow"></span></a>
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
                <a href="#"><i class="glyphicon glyphicon-list-alt"></i> SubCategorias<span class="fa arrow"></span></a>
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
                <a href="{{URL::asset('painel/contatos')}}"><i class="glyphicon glyphicon-envelope"></i> Contatos<span class="fa arrow"></span></a>

                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="glyphicon glyphicon-indent-right"></i> Relatórios<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Por Categoria</a>
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
                <a href="#"><i class="glyphicon glyphicon-usd"></i> Pedidos<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Todos</a>
                    </li>
                    <li>
                        <a href="#">Pendentes</a>
                    </li>
                    <li>
                        <a href="#">Confirmados</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>



            <li>
                <a href="#"><i class="glyphicon glyphicon-user"></i> Usuários<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Adicionar</a>
                    </li>
                    <li>
                        <a href="#">Alterar</a>
                    </li>
                    <li>
                        <a href="#">Excluir</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            
            <!-- novo botão gestao------------------------------------------------- -->
            <li>
                <a href="#"><i class="glyphicon glyphicon-eye-open"></i> Gestão<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/gestao/gestao-clientes')}}">Listar Clientes</a>
                    </li>
                    <li>
                        <a href="{{url('/gestao/gestao-pedidos')}}">Listar Pedidos</a>
                    </li>
                    <li>
                        <a href="#">novo item</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>


        </ul>

    </div>
    <!-- /.sidebar-collapse -->
</div>