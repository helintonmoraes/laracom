<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Laracom 1.0 - Beta</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{URL::asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{URL::asset('admin/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{URL::asset('admin/dist/css/timeline.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{URL::asset('admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{URL::asset('admin/bower_components/morrisjs/morris.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{URL::asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{URL::asset('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css')}}">

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index">Laracom Beta 1.0</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <!--Mensagens-->
                        <ul class="dropdown-menu dropdown-messages">
                            @forelse($contatos as $contato)
                            <li>
                                <a href="#">
                                    <div>
                                        <strong>{{$contato->nome}}</strong>
                                        <span class="pull-right text-muted">
                                            <em>{{$contato->data}}</em>
                                        </span>
                                    </div>
                                    <div>{{$contato->email}}</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            @empty
                            <li>
                                <a class="text-center" href="#">
                                    <strong>Não possui contatos</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                            @endforelse

                            @if(isset($contato))
                            <li>
                                <a class="text-center" href="#">
                                    <strong>Ler todas as mensagens</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                            @endif
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- /.dropdown -->

                    <!-- /.dropdown -->

                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{url('painel/dados-admin')}}"><i class="fa fa-user fa-fw"></i> {{$admin->nome}}</a>
                            </li>
                            <li><a href="{{url('painel/dados-admin')}}"><i class="fa fa-gear fa-fw"></i> Alterar Cadastro</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{URL::asset('painel/sair')}}"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>



                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    @yield('content')







                </div>


            </div>




            <!-- jQuery -->
            <script src="{{URL::asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="{{URL::asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="{{URL::asset('admin/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>



            <!-- Custom Theme JavaScript -->
            <script src="{{URL::asset('admin/dist/js/sb-admin-2.js')}}"></script>            
            <script src="{{URL::asset('admin/js/ajax.js')}}"></script>            
            <script src="{{URL::asset('admin/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{URL::asset('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>

<!--Datapicker-->

<script src="{{URL::asset('admin/datapicker/js/jquery-ui.js')}}"></script>

<script>
    $(document).ready(function () {
        $("#data").datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
            dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });
    });
</script>


</html>


@if(Session::has('estoque_ok'))
<script LANGUAGE="JavaScript" TYPE="text/javascript">
alert("{!! session('estoque_ok') !!}")
location.reload();
</script> 
@endif

@if(Session::has('ped_alt'))
<script LANGUAGE="JavaScript" TYPE="text/javascript">
    alert("{!! session('ped_alt') !!}")
    window.location = "/pedido";
</script> 
@endif

@if(Session::has('status_adm'))
<script LANGUAGE="JavaScript" TYPE="text/javascript">
    alert("{!! session('status_adm') !!}")
    location.reload();
</script> 
@endif

@if(Session::has('pedido_delete'))
<script LANGUAGE="JavaScript" TYPE="text/javascript">
    alert("{!! session('pedido_delete') !!}")
    location.reload();
</script> 
@endif




<!--Canvas Charts JavaScript -->         
<script src="{{URL::asset('admin/js/canvas/canvasjs.min.js')}}"></script>
<script src="{{URL::asset('admin/js/canvas/jquery.canvasjs.min.js')}}"></script>