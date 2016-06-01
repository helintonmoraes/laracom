<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Gestor de Produto</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <?php if(isset($produto)): ?>
                            <?php echo e(Form::open(['url' => "painel/editar-produto/$produto->id", 'files' => true])); ?>

                            <?php else: ?>
                            <?php echo e(Form::open(['url' => 'painel/adicionar-produto','files'=>true])); ?>

                        <?php endif; ?>
                           
                        <div class="form-group">
                            <label>Categoria</label>
                            <select name="id_categoria" class="form-control" id="id_categoria">                                                                
                                <option value="">Selecione...</option>
                                <?php $__empty_1 = true; foreach($categorias as $categoria): $__empty_1 = false; ?>
                                <?php if($categoria->id_pai == 0): ?>
                                    <option value="<?php echo e($categoria->id); ?>"><?php echo e($categoria->nome); ?></option>
                                <?php endif; ?>
                                <?php endforeach; if ($__empty_1): ?>
                                <?php endif; ?>
                            </select>
                            <?php if($errors->has('id_categoria')): ?>                  
                                <p class="text-danger"><?php echo $errors->first('id_categoria'); ?></p>
                            <?php endif; ?> 
                        </div>

                        <div class="form-group">
                            <label for="field1">Subcategorias</label>
                            <select class="form-control" name="id_subcategoria" id="id_subcategoria">
                                <option value="">Selecione...</option>
                            </select>
                            <?php if($errors->has('id_subcategoria')): ?>                  
                                <p class="text-danger"><?php echo $errors->first('id_subcategoria'); ?></p>
                            <?php endif; ?> 
                        </div>

                        <div class="form-group">
                            <label>Nome do Produto</label>
                            <?php echo e(Form::text('nome', isset($produto->nome)? $produto->nome:null, ['placeholder' => 'Nome do Produto','class' => 'form-control'])); ?>                          
                            <?php if($errors->has('nome')): ?>                  
                                <p class="text-danger"><?php echo $errors->first('nome'); ?></p>
                            <?php endif; ?>                    
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon">R$</span>
                            <?php echo e(Form::text('preco_venda', isset($produto->preco_venda)? $produto->preco_venda:null, ['placeholder' => 'Preço','class' => 'form-control'])); ?> 
                        </div>
                            <?php if($errors->has('preco_venda')): ?>                  
                                <p class="text-danger"><?php echo $errors->first('preco_venda'); ?></p>
                            <?php endif; ?>

                        <div class="form-group">
                            <label>Imagem Capa</label>
                            <?php echo e(Form::file('imagem_1')); ?> 
                        </div>
                             <?php if($errors->has('imagem_1')): ?>                  
                                <p class="text-danger"><?php echo $errors->first('imagem_1'); ?></p>
                            <?php endif; ?>
                        <div class="form-group">
                            <label>Imagem 2</label>
                            <input name="imagem_2" type="file">
                        </div>
                        <div class="form-group">
                            <label>Imagem 3</label>
                            <input name="imagem_3" type="file">
                        </div>
                        <div class="form-group">
                            <label>Imagem 4</label>
                            <input name="imagem_4" type="file">
                        </div>
                        <div class="form-group">
                            <label>Imagem 5</label>
                            <input name="imagem_5" type="file">
                        </div>
                        <div class="form-group">
                            <label>Imagem 6</label>
                            <input name="imagem_6" type="file">
                        </div>
                        <div class="form-group">
                            <label>Descrição do Produto</label>
                          <?php echo e(Form::textarea('descricao', isset($produto->descricao)? $produto->descricao:null, ['placeholder' => 'Descrição','class' => 'form-control','rows'=>3])); ?> 
                            <?php if($errors->has('descricao')): ?>                  
                                <p class="text-danger"><?php echo $errors->first('descricao'); ?></p>
                            <?php endif; ?> 
                        </div>
                        <div class="form-group">
                            <label>Especificação Técnica</label>
                            <?php echo e(Form::textarea('especificacao', isset($produto->especificacao)? $produto->especificacao:null, ['placeholder' => 'Especificação','class' => 'form-control','rows'=>3])); ?> 
                            <?php if($errors->has('especificacao')): ?>                  
                                <p class="text-danger"><?php echo $errors->first('especificacao'); ?></p>
                            <?php endif; ?> 
                        </div>
                        <div class="form-group">
                            <label>Resumo</label>
                            <?php echo e(Form::textarea('resumo', isset($produto->resumo)? $produto->resumo:null, ['placeholder' => 'Resumo','class' => 'form-control','rows'=>3])); ?> 
                            <?php if($errors->has('resumo')): ?>                  
                                <p class="text-danger"><?php echo $errors->first('resumo'); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Opções de Visualização</label>
                            <div class="checkbox">
                                <label>
                                    <input name="oferta" value="true" type="checkbox">Oferta
                                </label>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input name="lancamento" value="true" type="checkbox">Lançamento
                                </label>
                            </div> 

                            <div class="checkbox">
                                <label>
                                    <input name="destaque" value="true" type="checkbox">Destaque
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default">Enviar</button>
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