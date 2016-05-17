@if($rating->status == FALSE)
<script>
      $(function () {
        var rating = {{$rating->nota}};
        
        $(".rateyo-readonly-widg{{$rating->id}}").rateYo({

          rating: {{$rating->nota}},
          numStars: 5,
          precision: 2,
          minValue: 1,
          maxValue: 5,
          fullStar: true
        }).on("rateyo.set", function (e, data) {
        
        $.get('/cliente/rating?nota=' +data.rating+'&id={{$rating->id}}', function(data) {
             location.reload(); 
                
              
        
        
        
        console.log(data.rating);
          rating = data.rating;
             
          
          
          
          });
        });
      });
</script>
@else
<script>
$(function () {
 
  $(".rateyo-readonly-widg{{$rating->id}}").rateYo({
    rating: {{$rating->nota}},
    readOnly: true
  }).click(function(){
    alert('Este produto já foi avaliado!');
        });
});
</script>
@endif