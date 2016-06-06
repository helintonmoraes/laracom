
<!DOCTYPE HTML>
<html>
    <head>
        <title>Laracom - Comércio de Eletrônicos</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="<?php echo e(URL::asset('loja/css/style.css')); ?>" rel="stylesheet" type="text/css" media="all"/>
        <link href="<?php echo e(URL::asset('loja/css/slider.css')); ?>" rel="stylesheet" type="text/css" media="all"/>
        <link href="<?php echo e(URL::asset('loja/css/easy-responsive-tabs.css')); ?>" rel="stylesheet" type="text/css" media="all"/>
        
        
        <link rel="stylesheet" href="<?php echo e(URL::asset('loja/css/global.css')); ?>">
        <script src="<?php echo e(URL::asset('loja/js/easyResponsiveTabs.js')); ?>" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo e(URL::asset('loja/js/jquery-1.7.2.min.js')); ?>"></script> 
        <script type="text/javascript" src="<?php echo e(URL::asset('loja/js/move-top.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(URL::asset('loja/js/easing.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(URL::asset('loja/js/startstop-slider.js')); ?>"></script>
        

        
        <!-- Rating  -->
        <script src="<?php echo e(URL::asset('loja/rating/js/stars.js')); ?>" type="text/javascript"></script>
        <link href="<?php echo e(URL::asset('loja/rating/js/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" media="all"/>
        
        <script src="<?php echo e(URL::asset('loja/rating/js/jquery.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(URL::asset('loja/rating/js/jquery.rateyo.min.js')); ?>" type="text/javascript"></script>
        <link href="<?php echo e(URL::asset('loja/rating/js/jquery.rateyo.css')); ?>" rel="stylesheet" type="text/css" media="all"/>
        

                <script src="<?php echo e(URL::asset('loja/js/slides.min.jquery.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('loja/js/jquery.cycle2.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('loja/js/ajax.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('loja/js/easyResponsiveTabs.js')); ?>" type="text/javascript"></script>

    </head>
    <body>
    
        <div class="wrap">
            <div class="header">
                <div class="headertop_desc">
                    <div class="call">
                        <p><span>Precisa de Ajuda?</span> Ligue para: <span class="number">0800-123456</span></span></p>
                    </div>
                    <div class="account_desc">
                        <?php if(session('cliente')): ?>                       
                        <ul>
                            
                            <li><a href="<?php echo e(url('cliente/sair')); ?>">Logout</a></li>
                            <li><a href="<?php echo e(url('cliente/pedidos')); ?>">Meus Pedidos</a></li>					
                            <li><a href="<?php echo e(url('cliente')); ?>">Minha Conta</a></li>
                        </ul>
                        <?php else: ?>
                        <ul>
                            <li><a href="<?php echo e(url('registro')); ?>">Registrar</a></li>
                            <li><a href="<?php echo e(url('login/autenticar')); ?>">Logar</a></li>
                        </ul>
                        
                        <?php endif; ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="header_top">
                    <div class="logo">
                        <a href="/"><img src="<?php echo e(URL::asset('loja/images/logo.png')); ?>" alt="Logomarca"/></a>
                    </div> 
                   
                        
                        
                        


                        <?php echo $__env->make('loja.layouts.cart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        
                        
                    



                    <div class="clear"></div>
                </div>
                <div class="header_bottom">
                    <div class="menu">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="#">Sobre</a></li>
                            <li><a href="#">Entrega</a></li>                            
                            <li><a href="/contato">Contato</a></li>
                            <div class="clear"></div>
                        </ul>
                    </div>



                    <div class="search_box">
                        <?php echo e(Form::open(['url' => 'buscar','class' => 'form','method'=>'get'])); ?>

                        <?php echo e(Form::text('buscar',null,['placeholder' => 'Informe o produto','class' => 'form-control'])); ?>

                        <?php echo e(Form::submit('')); ?>

                        <?php echo e(Form::close()); ?>

                    </div>

                    <div class="clear"></div>
                </div>	     

                <?php echo $__env->yieldContent('content'); ?>

                <div class="footer">
                    <div class="wrap">	
                        <div class="section group">
                            <div class="col_1_of_4 span_1_of_4">
                                <h4>Informaçoes</h4>
                                <ul>
                                    <li><a href="about.html">Sobre nós</a></li>
                                    <li><a href="contact.html">Para o Cliente</a></li>                                    
                                    <li><a href="delivery.html">Pedidos e Devoluções</a></li>
                                    <li><a href="contact.html">Contato</a></li>
                                </ul>
                            </div>
                            <div class="col_1_of_4 span_1_of_4">
                                <h4>A melhor loja</h4>
                                <ul>
                                    <li><a href="about.html">Premiações</a></li>                                    
                                    <li><a href="#">Politica de Privacidade</a></li>
                                    <li><a href="contact.html">Mapa do Site</a></li>
                                    <li><a href="#">Termo de Serviço</a></li>
                                </ul>
                            </div>
                            <div class="col_1_of_4 span_1_of_4">
                                <h4>Minha Conta</h4>
                                <ul>
                                    <li><a href="contact.html">Registrar</a></li>
                                    <li><a href="index.html">Ver Carrinho</a></li>
                                    <li><a href="#">Lista de Desejos</a></li>
                                    <li><a href="#">Rastrear Compra</a></li>
                                    <li><a href="contact.html">Ajuda</a></li>
                                </ul>
                            </div>
                            <div class="col_1_of_4 span_1_of_4">
                                <h4>Contact</h4>
                                <ul>
                                    <li><span>0800-123456</span></li>
                                    <li><span>0800-789012</span></li>
                                </ul>
                                <div class="social-icons">
                                    <h4>Siga-nos</h4>
                                    <ul>
                                        <li><a href="#" target="_blank"><img src="<?php echo e(URL::asset('loja/images/facebook.png')); ?>" alt="" /></a></li>
                                        <li><a href="#" target="_blank"><img src="<?php echo e(URL::asset('loja/images/twitter.png')); ?>" alt="" /></a></li>
                                        <li><a href="#" target="_blank"><img src="<?php echo e(URL::asset('loja/images/skype.png')); ?>" alt="" /> </a></li>
                                        <li><a href="#" target="_blank"> <img src="<?php echo e(URL::asset('loja/images/dribbble.png')); ?>" alt="" /></a></li>
                                        <li><a href="#" target="_blank"> <img src="<?php echo e(URL::asset('loja/images/linkedin.png')); ?>" alt="" /></a></li>
                                        <div class="clear"></div>
                                    </ul>
                                </div>
                            </div>
                        </div>			
                    </div>
                    <div class="copy_right">
                        <p>Laracom - Helinton e Jeferson © Todos os direitor Reservados 2016</p>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $().UItoTop({easingType: 'easeOutQuart'});

                    });
                </script>
                <a href="#" id="toTop"><span id="toTopHover"> </span></a>
                </body>
                
                </html>

<!--Logs de Erros e Avisos-->

<?php if(Session::has('status')): ?>
<script>    
alert("<?php echo e(Session::get('status')); ?>");
</script>
<?php endif; ?>

<?php if(Session::has('token')): ?>
<script LANGUAGE="JavaScript" TYPE="text/javascript">
alert ("<?php echo session('token'); ?>")
</script>
<?php endif; ?>

<?php if(Session::has('enviado')): ?>
<script LANGUAGE="JavaScript" TYPE="text/javascript">
alert ("<?php echo session('enviado'); ?>")
</script>
<?php endif; ?>

<?php if(Session::has('flash_reset')): ?>
<script LANGUAGE="JavaScript" TYPE="text/javascript">
alert ("<?php echo session('flash_reset'); ?>")
window.location="login/autenticar";
</script> 
<?php endif; ?>

<?php if(Session::has('estoque')): ?>
<script LANGUAGE="JavaScript" TYPE="text/javascript">
alert ("<?php echo session('estoque'); ?>")

</script> 
<?php endif; ?>

<?php if(Session::has('mp_error')): ?>
<script LANGUAGE="JavaScript" TYPE="text/javascript">
alert ("<?php echo session('mp_error'); ?>")
location.reload(); 
</script> 
<?php endif; ?>
<!--SDK Facebook-->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '271295806549887',
      xfbml      : true,
      version    : 'v2.6'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>