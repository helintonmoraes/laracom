<?php $__env->startSection('content'); ?>

<?php if(isset($marcas)): ?>
<?php $__empty_1 = true; foreach($marcas as $marca): $__empty_1 = false; ?>
<?php echo e(Form::open(['url' => "painel/editar-marca/$marca->id", 'files' => true,'id' => 'file-upload', 'class' => 'upload'])); ?>

<h3>GESTOR DE MARCA</h3>
<div class="inner clearfix">
    <fieldset class="error">
        <label for="field1">NOME</label>
        <div class="field">
            <?php echo e(Form::text('nome', isset($marca->nome)? $marca->nome:null, ['placeholder' => 'Nome da Categoria','id'=>'field1'])); ?>

            <span class="error-alert">Please enter valid value</span>
        </div>
    </fieldset>
    
    <input type="submit" value="SALVAR" class="right">
    <?php endforeach; if ($__empty_1): ?>
    <?php endif; ?>
</div>
</form>

<?php else: ?>
<?php echo e(Form::open(['url' => 'painel/adicionar-marca', 'files' => true,'id' => 'file-upload', 'class' => 'upload'])); ?>


<h3>GESTOR DE CATEGORIAS</h3>
<div class="inner clearfix">
    <fieldset class="error">
        <label for="field1">NOME</label>
        <div class="field">
            <?php echo e(Form::text('nome',null, ['placeholder' => 'Nome da Marca','id'=>'field1'])); ?>

            <span class="error-alert">Please enter valid value</span>
        </div>
    </fieldset>
    <input type="submit" value="SALVAR" class="right">
</div>
</form>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('painel.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>