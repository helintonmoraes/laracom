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
        <link href="<?php echo e(URL::asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo e(URL::asset('admin/bower_components/metisMenu/dist/metisMenu.min.css')); ?>" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo e(URL::asset('admin/dist/css/timeline.css')); ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo e(URL::asset('admin/dist/css/sb-admin-2.css')); ?>" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo e(URL::asset('admin/bower_components/morrisjs/morris.css')); ?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo e(URL::asset('admin/bower_components/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

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
                            <?php $__empty_1 = true; foreach($contatos as $contato): $__empty_1 = false; ?>
                            <li>
                                <a href="#">
                                    <div>
                                        <strong><?php echo e($contato->nome); ?></strong>
                                        <span class="pull-right text-muted">
                                            <em><?php echo e($contato->data); ?></em>
                                        </span>
                                    </div>
                                    <div><?php echo e($contato->email); ?></div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <?php endforeach; if ($__empty_1): ?>
                              <li>
                                <a class="text-center" href="#">
                                    <strong>Não possui contatos</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if(isset($contato)): ?>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>Ler todas as mensagens</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                            <?php endif; ?>
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
                            <li><a href="<?php echo e(url('painel/dados-admin')); ?>"><i class="fa fa-user fa-fw"></i> <?php echo e($admin->nome); ?></a>
                            </li>
                            <li><a href="<?php echo e(url('painel/dados-admin')); ?>"><i class="fa fa-gear fa-fw"></i> Alterar Cadastro</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo e(URL::asset('painel/sair')); ?>"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
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
                    <?php echo $__env->yieldContent('content'); ?>
                    
                    
                    
                    
                    
                    
                    
                </div>


            </div>
            
            
            
            
            <!-- jQuery -->
            <script src="<?php echo e(URL::asset('admin/bower_components/jquery/dist/jquery.min.js')); ?>"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="<?php echo e(URL::asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="<?php echo e(URL::asset('admin/bower_components/metisMenu/dist/metisMenu.min.js')); ?>"></script>

           
            
            <!-- Custom Theme JavaScript -->
            <script src="<?php echo e(URL::asset('admin/dist/js/sb-admin-2.js')); ?>"></script>            
            <script src="<?php echo e(URL::asset('admin/js/ajax.js')); ?>"></script>            
            <script src="<?php echo e(URL::asset('admin/bower_components/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
            <script src="<?php echo e(URL::asset('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')); ?>"></script>
    </body>

</html>


<?php if(Session::has('estoque_ok')): ?>
<script LANGUAGE="JavaScript" TYPE="text/javascript">
alert ("<?php echo session('estoque_ok'); ?>")
location.reload(); 
</script> 
<?php endif; ?>

<?php if(Session::has('ped_alt')): ?>
<script LANGUAGE="JavaScript" TYPE="text/javascript">
alert ("<?php echo session('ped_alt'); ?>")
location.reload(); 
</script> 
<?php endif; ?>

<?php if(Session::has('status_adm')): ?>
<script LANGUAGE="JavaScript" TYPE="text/javascript">
alert ("<?php echo session('status_adm'); ?>")
location.reload(); 
</script> 
<?php endif; ?>


<!--     Canvas Charts JavaScript -->         
<script src="<?php echo e(URL::asset('admin/js/canvas/canvasjs.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('admin/js/canvas/jquery.canvasjs.min.js')); ?>"></script>