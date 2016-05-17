<?php

namespace Laracom\Http\Controllers;

use Illuminate\Http\Request;

use Laracom\Http\Requests;

use Laracom\Models\Produto as Produto;

class ProdutoController extends Controller
{
    function getProduto($id){
        $produto = Produto::find($id);
        return view('gestao.detalhes-do-pedido');
    }
}
