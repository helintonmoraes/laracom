<?php $__env->startSection('content'); ?>

<div class="main" style="margin-left:34%;">
    <div class="content">

                        
        <div class="section group">
            <div class="col span_2_of_3">
                <div class="contact-form">
                    
                    <?php echo e(Form::open(['url' => "/reset-senha",'class'=>'add-cart'])); ?>

                    <div>    
                            <h2>Redefinição de Senha</h2>
                    </div>
                    <div>
                        <span><label>Login</label></span>
                        <span><?php echo e(Form::text('login', isset($cliente->login)? $cliente->login:null)); ?></span>
                        <p class="text-danger"><?php echo $errors->first('login'); ?></p>
                    </div>

                    <div>
                        <span><label>E-mail</label></span>
                        <span><?php echo e(Form::text('email', isset($cliente->email)? $cliente->email:null)); ?></span>
                        <p class="text-danger"><?php echo $errors->first('email'); ?></p>
                    </div>

                    <div>
                        <span><label>CPF</label></span>
                        <span><?php echo e(Form::text('cpf', isset($cliente->cpf)? $cliente->cpf:null,['maxlength'=>11])); ?></span>
                        <p class="text-danger"><?php echo $errors->first('cpf'); ?></p>
                        <?php if(Session::has('reset_fail')): ?>
                        <p text-align="center" class="text-danger"><?php echo session('reset_fail'); ?></p>
                        <?php endif; ?>
                       
                    </div>
  
                    <div>
                       <h4><button type="submit" class="add-cart">Redefinir Senha</button></h4>
                       <h4><button onclick="window.location.href='/cliente/'" type="button" class="add-cart">Voltar</button></h4>
                    </div>
                    <?php echo e(Form::close()); ?>

                     
                </div>
            </div>
            
        </div>		
    </div> 
</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('loja.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>