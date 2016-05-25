<?php


Route::group(['middleware'=>['web']], function(){
    
 Route::group(['prefix'=>'cliente','middleware'=>'Laracom\Http\Middleware\Cliente'], function(){    
    Route::controller('/', 'ClienteController');
 });   
 
 Route::group(['middleware'=>'Laracom\Http\Middleware\Admin'], function(){    
   Route::controller('painel', 'PainelController');
   Route::controller('pedido','PedidoController');
 }); 
  
    
 Route::controller('facebook', 'FacebookController');
 Route::controller('login','LoginController');
 Route::controller('cart','CarrinhoController');
 

 Route::controller('/', 'LojaController');

});






 








