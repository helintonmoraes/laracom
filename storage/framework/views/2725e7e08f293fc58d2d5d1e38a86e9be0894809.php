<?php $__env->startSection('content'); ?>

<div class="section group">
    <div class="table-responsive cart_info">

        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <td align="center">Imagem</td>  
                    <td align="center">Produto</td>         
                    <td align="center">Valor</td>
                    <td align="center">Qtd</td>
                    <td align="center">Avaliação</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>

                <?php foreach($detalhes as $detalhe): ?>
                
                <tr>
                    <td class="cart_price" width="10px" >                          
                        <?php foreach($produtos as $produto): ?>
                        <?php if($produto->id == $detalhe['id_produto']): ?>
                        <a target="_blank" href="/produto-detalhes/<?php echo e($produto->id); ?>"><img width="100%" src="<?php echo e(URL::asset("/image-file/".$produto["imagem_1"])); ?>" alt=" " /></a>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </td>

                    <td align="center" class="cart_price">
                        <?php foreach($produtos as $produto): ?>
                        <?php if($produto->id == $detalhe['id_produto']): ?>
                        <p style="margin-top:15px"><?php echo e($produto->nome); ?></p> 
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </td>

                    <td align="center" class="cart_price">
                        <?php foreach($produtos as $produto): ?>
                        <?php if($produto->id == $detalhe['id_produto']): ?>
                        <p style="margin-top:15px"><?php echo e($detalhe['preco_venda']); ?></p> 
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td align="center" class="cart_price">
                        <?php foreach($produtos as $produto): ?>
                        <?php if($produto->id == $detalhe['id_produto']): ?>
                        <p style="margin-top:15px"><?php echo e($detalhe['qty']); ?></p> 
                        <?php endif; ?>
                        <?php endforeach; ?>                          
                    </td>

                    <td align="center" class="cart_total">
                        <?php foreach($ratings as $rating): ?>                       
                        
                           <?php if($rating->id_produto == $detalhe['id_produto']): ?> 
                           <?php echo $__env->make('cliente.rating', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>             
                           
                           <div class="rateyo-readonly-widg<?php echo e($rating->id); ?>"></div>
                           
                                <?php echo e($rating->nota); ?>                              
                           <?php endif; ?>
                        <?php endforeach; ?>                       
                        
                    </td>
                    <td>
                        
                        <div class="add-cart" id="cart">
                            <?php echo e(Form::open(['url' => "cart/add-cart"])); ?> 
                            <input type="hidden" name="qty" value="1">
                            <?php foreach($produtos as $produto): ?>
                            <?php if($produto->id == $detalhe['id_produto']): ?>
                            <input type="hidden" name="produto_id" value="<?php echo e($detalhe['id_produto']); ?>">
                            <?php if($produto['qtd_estoque'] > 0): ?>
                            <h4><button type="submit" class="add-cart">Comprar Novamente</button></h4>
                            <?php else: ?>
                            <h4><button style="background-color:#8B8989;" disabled="TRUE"> Produto Indisponível</button></h4>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            
                            <?php echo e(Form::close()); ?>

                        </div>
                        
                         <div class="add-cart" id="cart">
                            
                        </div>
                        
                    </td>
                </tr>
                <?php endforeach; ?> 




            </tbody>
        </table>
    </div>
    <div class="wrapper-dropdown-3">
        <p>Código do Pedido: <span style='color:red'><?php echo e($pedido['external_reference']); ?></span></p>
        <p>Situação: <span style='color:red'><?php echo e($pedido['status']); ?></span></p>
        <p>Data e Hora: <span style='color:red'>R$ <?php echo e($pedido['data_pedido']); ?> - <?php echo e($pedido['hora_pedido']); ?></span></p>
        <p>Valor Total: <span style='color:red'>R$ <?php echo e($pedido['valor_pedido']); ?></span></p>
        <p>Valor do Desconto: <span style='color:red'>R$ <?php echo e($pedido['cartao_desconto']); ?></span></p>
        <div style="border:2px solid #a1a1a1;width:120px;border-radius:5px;background: #dddddd;">
            <?php if($pedido['pref_id']<>'Gratis'): ?>
                <?php if($pedido['boleto_emitido']==TRUE): ?> 
                    <?php if($pedido['status']=='Aguardando Pagamento!'): ?>
                    <a target="_blank" href="/cliente/boleto/<?php echo e($pedido['external_reference']); ?>/<?php echo e($pedido['pref_id']); ?>"><img style="margin-left:28px"src="<?php echo e(URL::asset('loja/images/icons/sign.png')); ?>" alt="Meus Pedidos"/><p align="center">2ª via de Boleto</p></a>
                    <?php else: ?>
                    <a href="/cliente/rastreio-detalhado/<?php echo e($pedido['external_reference']); ?>"><img style="margin-left:28px"src="<?php echo e(URL::asset('loja/images/icons/delivery-truck.png')); ?>" alt="Meus Pedidos"/><p align="center">Rastrear Pedido!</p></a>
                    <?php endif; ?>
                <?php else: ?>
                <a target="_blank" href="/cliente/boleto/<?php echo e($pedido['external_reference']); ?>/<?php echo e($pedido['pref_id']); ?>"><img style="margin-left:28px"src="<?php echo e(URL::asset('loja/images/icons/commerce.png')); ?>" alt="Meus Pedidos"/><p align="center">Pague Agora!</p></a>
                <?php endif; ?>
                
            <?php else: ?>
                <a href="/cliente/rastreio-detalhado/<?php echo e($pedido['external_reference']); ?>"><img style="margin-left:28px"src="<?php echo e(URL::asset('loja/images/icons/delivery-truck.png')); ?>" alt="Meus Pedidos"/><p align="center">Rastrear Pedido!</p></a>
            <?php endif; ?>
            
            <div>
            </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?>


<?php echo $__env->make('loja.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>