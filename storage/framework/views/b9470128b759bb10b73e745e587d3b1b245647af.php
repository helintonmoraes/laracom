<?php $__env->startSection('content'); ?>

<div id="chartContainer" style="height:300px; width:100%;">
</div>
<script type="text/javascript">
  window.onload = function () {
    var all = <?php echo e($x1); ?>+<?php echo e($x2); ?>+<?php echo e($x3); ?>+<?php echo e($x4); ?>+<?php echo e($x5); ?>+<?php echo e($x6); ?>+<?php echo e($x7); ?>

    var chart = new CanvasJS.Chart("chartContainer",
    {
      
      title:{
        text: "Estoque por Categorias - Total:"+all  
      },
      animationEnabled: true,
      axisY: {
        title: "Itens"
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      theme: "theme3",
      data: [

      {        
        type: "column",  
        showInLegend: false, 
        legendMarkerColor: null,
        legendText: null,
        dataPoints: [
            {label: "Eletrodomesticos", y: <?php echo e($x1); ?>},
            {label: "Games e Diversão", y: <?php echo e($x2); ?>},
            {label: "Ferramentas", y: <?php echo e($x3); ?>},
            {label: "Utensilios Domesticos", y: <?php echo e($x4); ?>},
            {label: "Computadores e Notebooks", y: <?php echo e($x5); ?>},
            {label: "TV, Áudio e Vídeo", y: <?php echo e($x6); ?>},
            {label: "Celulares e Tablets", y: <?php echo e($x7); ?>},
            
        ]
        
        
      }   
      ]
    });

    chart.render();
  }
  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('painel.layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('painel.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>