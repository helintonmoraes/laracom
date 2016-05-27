<?php $__env->startSection('content'); ?>

<div class="row" >
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Dados do Administrador</h3>
            </div>
            <div class="panel-body" >
                <div class="row">
                    <div class="col-lg-6">
                        <?php if(isset($dados)): ?>
                        <?php echo e(Form::open(['url' => "painel/editar-dados-adm"])); ?>

                        <?php else: ?>
                        <?php echo e(Form::open(['url' => 'painel/adicionar-admin'])); ?>

                        <?php endif; ?>

                        <div class="form-group">
                            <label>Nome</label>
                            <?php echo e(Form::text('nome', isset($dados->nome)? $dados->nome:null, ['class' => 'form-control'])); ?>                          
                            <?php if($errors->has('nome')): ?>                  
                            <p class="text-danger"><?php echo $errors->first('nome'); ?></p>
                            <?php endif; ?>                    
                        </div>
                        
                        <div class="form-group">
                            <label>Login</label>
                            <?php echo e(Form::text('login', isset($dados->login)? $dados->login:null, ['disabled'=>'true','class' => 'form-control'])); ?>                          
                            <?php if($errors->has('login')): ?>                  
                            <p class="text-danger"><?php echo $errors->first('login'); ?></p>
                            <?php endif; ?>                    
                        </div>

                        <div class="form-group">
                            <label>Senha</label>
                            <?php echo e(Form::password('senha',['class' => 'form-control'])); ?>                          
                            <?php if($errors->has('senha')): ?>                  
                            <p class="text-danger"><?php echo $errors->first('senha'); ?></p>
                            <?php endif; ?>                    
                        </div>
                        
                        <div class="form-group">
                            <label>E-mail</label>
                            <?php echo e(Form::text('email', isset($dados->email)? $dados->email:null, ['disabled'=>'true','class' => 'form-control'])); ?>                          
                            <?php if($errors->has('email')): ?>                  
                            <p class="text-danger"><?php echo $errors->first('email'); ?></p>
                            <?php endif; ?>                    
                        </div>
                        
                        <div class="form-group">
                            <label>CPF</label>
                            <?php echo e(Form::text('cpf', isset($dados->cpf)? $dados->cpf:null, ['disabled'=>'true','class' => 'form-control'])); ?>                          
                            <?php if($errors->has('cpf')): ?>                  
                            <p class="text-danger"><?php echo $errors->first('cpf'); ?></p>
                            <?php endif; ?>                    
                        </div>
                        
                        <div class="form-group">
                            <label>Fone</label>
                            <?php echo e(Form::text('fone', isset($dados->fone)? $dados->fone:null, ['class' => 'form-control'])); ?>                          
                            <?php if($errors->has('fone')): ?>                  
                            <p class="text-danger"><?php echo $errors->first('fone'); ?></p>
                            <?php endif; ?>                    
                        </div>
                        
                        <div class="form-group">
                            <label>Endereço</label>
                            <?php echo e(Form::text('endereco', isset($dados->endereco)? $dados->endereco:null, ['class' => 'form-control'])); ?>                          
                            <?php if($errors->has('endereco')): ?>                  
                            <p class="text-danger"><?php echo $errors->first('endereco'); ?></p>
                            <?php endif; ?>                    
                        </div>


                        <button type="submit" class="btn btn-default">Atualizar Registro</button>
                        <button type="reset" class="btn btn-default">Limpar</button>

                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('painel.layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('painel.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>