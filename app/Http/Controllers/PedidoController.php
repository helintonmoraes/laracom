<?php

namespace Laracom\Http\Controllers;

use Illuminate\Http\Request;
use Laracom\Http\Requests;
use Laracom\Models\Produto as Produto;
use Laracom\Models\Pedido as Pedido;
use Laracom\Models\Carrinho;
use Laracom\Models\Cliente as Cliente;

class PedidoController extends Controller {
    
    function getIndex() {
        return view('painel.pedido.inicio-pedidos');
    }
   function getListagemDePedidos($id) {
        $cliente = Cliente::find($id);
        $pedidos = Pedido::where('id_cliente', $id)->orderBy('status')->get();
        return view('painel.pedido.listagem-de-pedidos', compact('pedidos', 'cliente'));
    }

    function getDetalharPedido($id) {
        $ped = Pedido::where('external_reference',$id)->get();
        $pedido = $ped->toArray();
        $cliente = Cliente::find($pedido[0]['id_cliente']);
        $itensDoCarrinho = Carrinho::where('id_pedido', $id)->get();
        $produtos = $this->getProdutos($itensDoCarrinho);
        return view('painel.pedido.detalhes-do-pedido', compact('produtos', 'pedido', 'cliente'));
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
  
    function getListarPedidos($opcao) {
        switch ($opcao) {
            case 1:
                $pedidos = Pedido::where('status', 'Aguardando envio, pedido pago!')->paginate(10);
                $cor = '#d9534f';
                $status = "Aguardando Envio!!!";
                return view('painel.pedido.inicio-pedidos', compact('pedidos', 'cor','status'));
                break;
            case 2:
                $pedidos = Pedido::where('status', 'Aguardando Pagamento!')->paginate(10);
                $cor = '#FE9A2E';
                $status = 'Aguardando Pagamento...';
                return view('painel.pedido.inicio-pedidos', compact('pedidos', 'cor','status'));
                break;
            case 3:
                $pedidos = Pedido::where('status', 'Pedido Enviado!')->paginate(10);
                $status = 'Pedido Enviado!!!';
                $cor = '#2E64FE';
                return view('painel.pedido.inicio-pedidos', compact('pedidos', 'cor','status'));
                break;
            case 4:
                $pedidos = Pedido::where('status', 'Entregue e Finalizado!')->paginate(10);
                $status = 'Pedidos Entregues';
                $cor = '#00FF40';
                return view('painel.pedido.inicio-pedidos', compact('pedidos', 'cor','status'));
                break;
            case 5 :
                $pedidos = Pedido::paginate(10);
                $cor = '#EFFBFB';
                $status = 'Todos os Pedidos';
                return view('gestao.inicio-pedidos', compact('pedidos', 'cor','status'));
            case 6 :
                $pedidos = Pedido::where('status', 'Aguardando envio, pedido pago!')->orWhere('status', 'Aguardando pagamento')->paginate(10);
                $status = 'Pedidos Pendentes';
                $cor = '#FCECED';
                return view('painel.pedidos.inicio-pedidos', compact('pedidos', 'cor','status'));
            case 7 :
                $pedidos = Pedido::where('status', 'Enviado para entrega')->orWhere('status', 'Pedido entregue')->paginate(10);
                $status = 'Pedidos Confirmados';
                $cor = '#ECFCED';
                return view('painel.pedidos.inicio-pedidos', compact('pedidos', 'cor','status'));
        }
    }
    
    function postAlterarStatus(Request $request){
        
        if($request['status']=='Entregue e Finalizado!'){
            if($request['saida_estoque'] == FALSE){
                $dados = Carrinho::where('id_pedido',$request['external_reference'])->get();
                foreach($dados as $d){
                    $estoque = Produto::find($d->id_produto)->qtd_estoque;
                    Produto::where('id',$d->id_produto)->update(array('qtd_estoque'=>$estoque-$d->qty));
                    Pedido::where('external_reference',$request['external_reference'])->update(array('saida_estoque'=>TRUE));
                }
            }
            Pedido::where('id',$request['id_pedido'])->update(array('status'=>'Entregue e Finalizado!','entrega'=>'Entregue'));
            \Session::flash('ped_alt','A situação do pedido foi alterada!');
            return back();
        }
        if($request['status']=='Aguardando Pagamento!'){
            Pedido::where('id',$request['id_pedido'])->update(array('status'=>'Aguardando Pagamento!','entrega'=>'Pendente'));
            return back();
        }
        if($request['status']=='Aguardando envio, pedido pago!'){
            if($request['saida_estoque'] == FALSE){
                $dados = Carrinho::where('id_pedido',$request['external_reference'])->get();
                foreach($dados as $d){
                    $estoque = Produto::find($d->id_produto)->qtd_estoque;
                    $pontos = 
                    Produto::where('id',$d->id_produto)->update(array('qtd_estoque'=>$estoque-$d->qty));
                    
                    Pedido::where('external_reference',$request['external_reference'])->update(array('saida_estoque'=>TRUE));
                }
            }
            Pedido::where('id',$request['id_pedido'])->update(array('status'=>'Aguardando envio, pedido pago!','entrega'=>'Pagamento Aprovado'));
            \Session::flash('ped_alt','A situação do pedido foi alterada!');
            return back();
        }
        if($request['status']=='Pedido Enviado!'){
            if($request['saida_estoque'] == FALSE){
                $dados = Carrinho::where('id_pedido',$request['external_reference'])->get();
                foreach($dados as $d){
                    $estoque = Produto::find($d->id_produto)->qtd_estoque;
                    Produto::where('id',$d->id_produto)->update(array('qtd_estoque'=>$estoque-$d->qty));
                    Pedido::where('external_reference',$request['external_reference'])->update(array('saida_estoque'=>TRUE));
                }
            }
            Pedido::where('id',$request['id_pedido'])->update(array('status'=>'Pedido Enviado!','entrega'=>'Enviado'));
            \Session::flash('ped_alt','A situação do pedido foi alterada!');
            return back();
        }
    }
 

}
