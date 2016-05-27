<?php if($rating->status == FALSE): ?>
<script>
      $(function () {
        var rating = <?php echo e($rating->nota); ?>;
        
        $(".rateyo-readonly-widg<?php echo e($rating->id); ?>").rateYo({

          rating: <?php echo e($rating->nota); ?>,
          numStars: 5,
          precision: 2,
          minValue: 1,
          maxValue: 5,
          fullStar: true
        }).on("rateyo.set", function (e, data) {
        
        $.get('/cliente/rating?nota=' +data.rating+'&id=<?php echo e($rating->id); ?>', function(data) {
             location.reload(); 
                
              
        
        
        
        console.log(data.rating);
          rating = data.rating;
             
          
          
          
          });
        });
      });
</script>
<?php else: ?>
<script>
$(function () {
 
  $(".rateyo-readonly-widg<?php echo e($rating->id); ?>").rateYo({
    rating: <?php echo e($rating->nota); ?>,
    readOnly: true
  }).click(function(){
    alert('Este produto já foi avaliado!');
        });
});
</script>
<?php endif; ?>