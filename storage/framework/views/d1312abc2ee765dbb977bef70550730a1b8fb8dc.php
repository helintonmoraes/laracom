<?php $__env->startSection('content'); ?>

<div class="main" style="margin-left:34%;">
    <div class="content">

                        
        <div class="section group">
            <div class="col span_2_of_3">
                <div class="contact-form">
                    
                    <?php echo e(Form::open(['url' => "login/alt-senha",'class'=>'add-cart'])); ?>

                    <div>    
                            <h2>Redefinição de Senha</h2>
                    </div>
                    <div>
                        <span><label>Login</label></span>
                        <span><?php echo e(Form::text('login', isset($cliente->login)? $cliente->login:null)); ?></span>
                        <p class="text-danger"><?php echo $errors->first('login'); ?></p>
                    </div>

                    <div>
                        <span><label>Senha Atual</label></span>
                        <span><?php echo e(Form::password('senha_old')); ?></span>
                        <p class="text-danger"><?php echo $errors->first('senha_old'); ?></p>
                    </div>
                    
                    <div>
                        <span><label>Nova Senha</label></span>
                        <span><?php echo e(Form::password('senha_new')); ?></span>
                        <p class="text-danger"><?php echo $errors->first('senha_new'); ?></p>
                        <?php if(Session::has('alt_fail')): ?>
                        <p text-align="center" class="text-danger"><?php echo session('alt_fail'); ?></p>
                        <?php endif; ?>
                    </div>

 
                    <div>
                       <h4><button type="submit" class="add-cart">Redefinir Senha</button></h4>                       
                    </div>
                    <?php echo e(Form::close()); ?>

                     
                </div>
            </div>
            
        </div>		
    </div> 
</div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('loja.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>