<?php

namespace Laracom\Http\Controllers;

use Illuminate\Http\Request;
use Laracom\Http\Requests;
use Laracom\Models\Produto as Produto;
use Laracom\Models\Pedido as Pedido;
use Laracom\Carrinho as Carrinho;
use Laracom\Models\Cliente as Cliente;

class PedidoController extends Controller {

    function getListagemDePedidos($id) {
        $cliente = Cliente::find($id);
        $pedidos = Pedido::where('id_cliente', $id)->orderBy('status')->get();

        return view('gestao.listagem-de-pedidos', compact('pedidos', 'cliente'));
    }

    function getDetalharPedido($id) {
        $pedido = Pedido::find($id);
        $itensDoCarrinho = Carrinho::where('id_pedido', $id)->get();
        $produtos = $this->getProdutos($itensDoCarrinho);  
        $valorPedido = 0;
        foreach($produtos as $produto){
            $valorPedido += $produto->preco_venda;
        }     
        return view('gestao.detalhes-do-pedido', compact('produtos','valorPedido','pedido'));
    }

    function getProdutos($itensDoCarrinho) {
        $arrayDeProdutos = [];
        foreach ($itensDoCarrinho as $item){            
            $arrayDeProdutos[] = Produto::find($item->id_produto);
        }   
        
        return $arrayDeProdutos;       
    }
    
    
    
    
    
    

}

class Lista {

    public $produto;

}
