<?php

namespace Laracom\Http\Controllers;

use Illuminate\Http\Request;
use Laracom\Http\Requests;
use Laracom\Models\Cliente as Cliente;
use Laracom\Models\Produto as Produto;
use Laracom\Models\Pedido as Pedido;
use Laracom\Models\Carrinho;
use DB;

class GestaoController extends Controller {

    function getIndex() {
       
        //dd(Carrinho::where('id_pedido',1)->totalPorProduto()->get());
        return 'INDEX';
    }

    function getGestaoClientes() {
        $clientes = Cliente::orderBy('nome')->paginate(10);
        return view('painel.clientes.listagem-clientes', compact('clientes'));
    }

    function getDetalhesCliente($id) {
        $cliente = Cliente::find($id);
        return view('painel.clientes.detalhes-do-cliente', compact('cliente'));
    }

 

}
