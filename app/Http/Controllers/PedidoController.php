<?php

namespace Laracom\Http\Controllers;

use Illuminate\Http\Request;
use Laracom\Http\Requests;
use Laracom\Models\Produto as Produto;
use Laracom\Models\Pedido as Pedido;
use Laracom\Models\Carrinho;
use Laracom\Models\Cliente as Cliente;

class PedidoController extends Controller {
   function getListagemDePedidos($id) {
        $cliente = Cliente::find($id);
        $pedidos = Pedido::where('id_cliente', $id)->orderBy('status')->get();

        return view('gestao.listagem-de-pedidos', compact('pedidos', 'cliente'));
    }

    function getDetalharPedido($id) {
        $ped = Pedido::where('external_reference',$id)->get();
        
        $pedido = $ped->toArray();
        
       
        
        $cliente = Cliente::find($pedido[0]['id_cliente']);
        $itensDoCarrinho = Carrinho::where('id_pedido', $id)->get();

        
        $produtos = $this->getProdutos($itensDoCarrinho);
        
        
        return view('gestao.detalhes-do-pedido', compact('produtos', 'pedido', 'cliente'));
    }

    function getProdutos($itensDoCarrinho) {
        $arrayDeProdutos = [];
        foreach ($itensDoCarrinho as $item) {
            $produto = Produto::find($item->id_produto);
            $produto->qty = $item->qty;
            $produto->valor_unit = $item->valor_unit;

            $arrayDeProdutos[] = $produto;
        }
        
        return $arrayDeProdutos;
    }

}
