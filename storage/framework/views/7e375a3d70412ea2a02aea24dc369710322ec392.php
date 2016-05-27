<?php $__env->startSection('content'); ?>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="col span_2_of_3">
                <div class="contact-form">
                    <h2>Mensagem Enviada!</h2>
                    <p>Agradecemos o seu contato, em breve nossos consultores retornarão</p>
                </div>
            </div>
            <div class="col span_1_of_3">
                <div class="contact_info">
                    <h3>Encontre nossa loja</h3>
                    <div class="map">
                        <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
                    </div>
                </div>
                <div class="company_address">
                    <h3>Informações :</h3>
                    <p>Laracom Comercio de Produtos</p>
                    <p>Rua Coronel Vivida, 567,</p>
                    <p>Ponta Grossa-PR</p>
                    <p>Phone:0800-123456</p>

                    <p>Email: <span>contato@laracom.dev</span></p>
                    <p>Siga-nos: <span>Facebook</span>, <span>Twitter</span></p>
                </div>
            </div>
        </div>		
    </div> 
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('loja.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>