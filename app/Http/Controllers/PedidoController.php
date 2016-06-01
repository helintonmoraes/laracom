<?php

namespace Laracom\Http\Controllers;

use Illuminate\Http\Request;
use Laracom\Http\Requests;
use DB;
use Laracom\Models\Produto as Produto;
use Laracom\Models\Pedido as Pedido;
use Laracom\Models\Carrinho;
use Laracom\Models\Cliente as Cliente;

class PedidoController extends Controller {
    
    function getCont(){
        $cont['entregue'] = Pedido::where('status','Entregue e Finalizado!')->count();
        $cont['ag_envio'] = Pedido::where('status','Aguardando envio, pedido pago!')->count();
        $cont['pen_pgto'] = Pedido::where('status','Aguardando Pagamento!')->count();
        $cont['enviado'] = Pedido::where('status','Pedido Enviado!')->count();
        return $cont;
    }
    
    function getIndex() {
        $cont = $this->getCont();
        return view('painel.pedido.inicio-pedidos',compact('cont'));
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
  
    function getListarPedidos($opcao,Request $request) {
        $cont = $this->getCont();
        switch ($opcao) {
            case 1:
                $pedidos = Pedido::where('status', 'Aguardando envio, pedido pago!')->paginate(10);
                $cor = 'background-color:#d9534f;color:#ffffff';
                $status = "Aguardando Envio!!!";
                return view('painel.pedido.inicio-pedidos', compact('pedidos', 'cor','status','cont'));
                break;
            case 2:
                $pedidos = Pedido::where('status', 'Aguardando Pagamento!')->paginate(10);
                $cor = 'background-color:#f0ad4e;color:#ffffff';
                $status = 'Aguardando Pagamento...';
                return view('painel.pedido.inicio-pedidos', compact('pedidos', 'cor','status','cont'));
                break;
            case 3:
                $pedidos = Pedido::where('status', 'Pedido Enviado!')->paginate(10);
                $status = 'Pedido Enviado!!!';
                $cor = 'background-color:#286090;color:#ffffff';
                return view('painel.pedido.inicio-pedidos', compact('pedidos', 'cor','status','cont'));
                break;
            case 4:
                $pedidos = Pedido::where('status', 'Entregue e Finalizado!')->paginate(10);
                $status = 'Pedidos Entregues';
                $cor = 'background-color:#449d44;color:#ffffff';
                return view('painel.pedido.inicio-pedidos', compact('pedidos', 'cor','status','cont'));
                break;
            case 5 :
                $pedidos = Pedido::paginate(10);
                $cor = '#EFFBFB';
                $status = 'Todos os Pedidos';
                return view('gestao.inicio-pedidos', compact('pedidos', 'cor','status','cont'));
            case 6 :
                $pedidos = Pedido::where('status', 'Aguardando envio, pedido pago!')->orWhere('status', 'Aguardando pagamento')->paginate(10);
                $status = 'Pedidos Pendentes';
                $cor = '#FCECED';
                return view('painel.pedidos.inicio-pedidos', compact('pedidos', 'cor','status','cont'));
            case 7 :
                $pedidos = Pedido::where('status', 'Enviado para entrega')->orWhere('status', 'Pedido entregue')->paginate(10);
                $status = 'Pedidos Confirmados';
                $cor = '#ECFCED';
                return view('painel.pedidos.inicio-pedidos', compact('pedidos', 'cor','status','cont'));
            case 8 :
                if($request['atributo'] == 'valor_pedido'){
                    
                    
                    $pedidos= Pedido::where("valor_pedido",'>',$request['parametro'])->where("valor_pedido",'<',$request['parametro2'])->paginate(10);
                   
                    
                }
                if($request['atributo'] == 'data_pedido'){
                    $pedidos = Pedido::where($request['atributo'], $request['parametro'])->paginate(10);
                }

                $status = 'Resultados de Busca';
                $cor = 'background-color:#449d44;color:#ffffff';
                return view('painel.pedido.inicio-pedidos', compact('pedidos', 'cor','status','cont'));
        }
    }
    
    function postAlterarStatus(Request $request){
        
        if($request['status']=='Entregue e Finalizado!'){
            if($request['saida_estoque'] == FALSE){
                $dados = Carrinho::where('id_pedido',$request['external_reference'])->get();
                foreach($dados as $d){
                    $estoque = Produto::find($d->id_produto)->qtd_estoque;
                    //Creditando pontos
                    $query = Pedido::where('external_reference',$d->id_pedido)->get(); 
                    $bonus = $query[0]['valor_total'];
                    $cliente = $query[0]['id_cliente'];
                    $atual = (Cliente::find($cliente)->saldo_pontos)+$bonus;
                    Cliente::where('id',$cliente)->update(array('saldo_pontos'=> $atual));
                    Produto::where('id',$d->id_produto)->update(array('qtd_estoque'=>$estoque-$d->qty));
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
            \Session::flash('ped_alt','A situação do pedido foi alterada!');
            return back();
        }
        if($request['status']=='Aguardando envio, pedido pago!'){
            if($request['saida_estoque'] == FALSE){
                $dados = Carrinho::where('id_pedido',$request['external_reference'])->get();
                foreach($dados as $d){
                    $estoque = Produto::find($d->id_produto)->qtd_estoque;
                    //Creditando pontos
                    $query = Pedido::where('external_reference',$d->id_pedido)->get(); 
                    $bonus = $query[0]['valor_total'];
                    $cliente = $query[0]['id_cliente'];
                    $atual = (Cliente::find($cliente)->saldo_pontos)+$bonus;
                    Cliente::where('id',$cliente)->update(array('saldo_pontos'=> $atual));
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
                    //Creditando pontos
                    $query = Pedido::where('external_reference',$d->id_pedido)->get(); 
                    $bonus = $query[0]['valor_total'];
                    $cliente = $query[0]['id_cliente'];
                    $atual = (Cliente::find($cliente)->saldo_pontos)+$bonus;
                    Cliente::where('id',$cliente)->update(array('saldo_pontos'=> $atual));
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
