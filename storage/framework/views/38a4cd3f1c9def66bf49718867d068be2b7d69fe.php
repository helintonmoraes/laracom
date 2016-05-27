<?php $__env->startSection('content'); ?>

    <div style="background-repeat: no-repeat;background-position: 150px 100px; background-image:url('<?php echo e(URL::asset('loja/images/icons/cadeado.png')); ?>')"class="content">
       
          
                <div style="border-radius:15px;background-color: #ffffff" class="login-form">
                    <h2>Autenticação</h2>
                    <?php echo e(Form::open(['url' => "login/autenticar"])); ?>

                    <div>
                        <span><label>Login</label></span>
                        <span><input name="login" type="text" class="textbox" ></span>
                        <?php if($errors->has('login')): ?>                  
                           <p class="text-danger"><?php echo $errors->first('login'); ?></p>
                        <?php endif; ?> 
                    </div>
                    <div>
                        <span><label>Senha</label></span>
                        <span><input name="senha" type="password" class="textbox"></span>
                        <?php if($errors->has('senha')): ?>                  
                           <p class="text-danger"><?php echo $errors->first('senha'); ?></p>
                        <?php endif; ?> 
                    </div>

                    <div>
                        
                        <span><input type="submit" value="Logar"></span>
                        <a href="/facebook/redirect">FB Login</a>

                        <div id="status">
                        </div>
                    </div>
                        
                    <?php echo e(Form::close()); ?>

                     <a style="display:block;margin-left:100px;"href="/reset-senha">Esqueci minha senha!</a><a style="display:block;margin-left:100px;"href="/registro">Não Tenho Cadastro!</a>
                </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('loja.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>