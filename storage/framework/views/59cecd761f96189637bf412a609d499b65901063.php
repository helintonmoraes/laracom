<?php $__env->startSection('content'); ?>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align:center;">Painel Administrativo</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo e(Form::open(['url' => "login/autenticar-admin"])); ?>

                            
                                <div class="form-group">
                                    
                                    <input class="form-control" placeholder="Login" name="login" type="text" autofocus>
                                    <?php if($errors->has('login')): ?>                  
                                         <p class="text-danger"><?php echo $errors->first('login'); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="senha" type="password">
                                    <?php if($errors->has('senha')): ?>                  
                                         <p class="text-danger"><?php echo $errors->first('senha'); ?></p>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Logar</button>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('painel.layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>