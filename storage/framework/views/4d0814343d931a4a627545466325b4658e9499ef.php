<?php $__env->startSection('content'); ?>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="col span_2_of_3">
                <div class="contact-form" style="margin-left:50%">
                    
                    <?php echo e(Form::open(['url' => "/registro",'class'=>'add-cart'])); ?>

                    <div>
                        <h2>Formulário de Registro</h2>
                        <span><label>Nome</label></span>
                        <span><?php echo e(Form::text('nome', isset($cliente->nome)? $cliente->nome:null)); ?></span>
                        <p class="text-danger"><?php echo $errors->first('nome'); ?></p>
                    </div>
                    <div>
                        <span><label>Login</label></span>
                        <span><?php echo e(Form::text('login', isset($cliente->login)? $cliente->login:null)); ?></span>
                        <p class="text-danger"><?php echo $errors->first('login'); ?></p>
                    </div>
                    <div>
                        <span><label>Senha</label></span>
                        <span><?php echo e(Form::password('senha')); ?></span>
                        <p class="text-danger"><?php echo $errors->first('senha'); ?></p>
                    </div>
                    <div>
                        <span><label>E-mail</label></span>
                        <span><?php echo e(Form::text('email', isset($cliente->email)? $cliente->email:null)); ?></span>
                        <p class="text-danger"><?php echo $errors->first('email'); ?></p>
                    </div>

                    <div>
                        <span><label>CPF</label></span>
                        <span><?php echo e(Form::text('cpf', isset($cliente->cpf)? $cliente->cpf:null,['maxlength'=>'11'])); ?></span>
                        <p class="text-danger"><?php echo $errors->first('cpf'); ?></p>
                    </div>
                    
                    <div>
                        <span><label>Fone</label></span>
                        <span><?php echo e(Form::text('fone', isset($cliente->fone)? $cliente->fone:null)); ?></span>
                        <p class="text-danger"><?php echo $errors->first('fone'); ?></p>
                    </div>
                    <div>
                        <span><label>Endereço</label></span>
                        <span><input name="endereco" placeholder="Rua XXX, N°, Cidade-UF" type="text" class="textbox"></span>
                        <p class="text-danger"><?php echo $errors->first('endereco'); ?></p>
                    </div>
                    <div>
                       <h4><button type="submit" class="add-cart">                                         
                                                Enviar
                                                </button></h4>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
            
        </div>		
    </div> 
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('loja.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>