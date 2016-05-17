<?php


Route::group(['middleware'=>['web']], function(){
 Route::group(['prefix'=>'cliente','middleware'=>'Laracom\Http\Middleware\Cliente'], function(){    
    Route::controller('/', 'ClienteController');
 });   
    
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
 
 Route::controller('login','LoginController');
 Route::controller('cart','CarrinhoController');
 Route::controller('painel', 'PainelController');
 
 Route::controller('/', 'LojaController');
 
 
 
});






 








