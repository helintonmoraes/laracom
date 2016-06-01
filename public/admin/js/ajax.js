  $('#id_categoria').on('change', function (e) {
        console.log(e);
        var cat_id = e.target.value;

        //AJAX
        $.get('/painel/ajax-subcat?cat_id=' + cat_id, function(data) {
             //SUCESS DATA
             $('#id_subcategoria').empty();
             $.each(data, function(index, subcatObj){
                 
                 $('#id_subcategoria').append('<option value="'+subcatObj.id+'">'+subcatObj.nome+'</option>');
             });
        });
   });


