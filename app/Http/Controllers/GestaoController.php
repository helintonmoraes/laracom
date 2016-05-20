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
        return view('painel.gestao.gestao-clientes');
    }

    function getGestaoClientes() {
        $clientes = Cliente::orderBy('nome')->paginate(10);
        return view('gestao.listagem-clientes', compact('clientes'));
    }

    function getDetalhesCliente($id) {
        $cliente = Cliente::find($id);
        return view('gestao.detalhes-do-cliente', compact('cliente'));
    }

    function getGestaoPedidos() {
        return view('gestao.inicio-pedidos');
    }

    function getListarPedidos($opcao) {
        switch ($opcao) {
            case 1:
                $pedidos = Pedido::where('status', 'Aguardando envio, pedido pago!')->paginate(10);
                $cor = '#FA5858';
                $status = "Aguardando Envio!!!";
                return view('gestao.inicio-pedidos', compact('pedidos', 'cor','status'));
                break;
            case 2:
                $pedidos = Pedido::where('status', 'Aguardando pagamento')->paginate(10);
                $cor = '#FE9A2E';
                $status = 'Aguardando Pagamento...';
                return view('gestao.inicio-pedidos', compact('pedidos', 'cor','status'));
                break;
            case 3:
                $pedidos = Pedido::where('status', 'Enviado para entrega')->paginate(10);
                $status = 'Pedido Enviado!!!';
                $cor = '#2E64FE';
                return view('gestao.inicio-pedidos', compact('pedidos', 'cor','status'));
                break;
            case 4:
                $pedidos = Pedido::where('status', 'Pedido entregue')->paginate(10);
                $status = 'Pedidos Entregues';
                $cor = '#00FF40';
                return view('gestao.inicio-pedidos', compact('pedidos', 'cor','status'));
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
                return view('gestao.inicio-pedidos', compact('pedidos', 'cor','status'));
            case 7 :
                $pedidos = Pedido::where('status', 'Enviado para entrega')->orWhere('status', 'Pedido entregue')->paginate(10);
                $status = 'Pedidos Confirmados';
                $cor = '#ECFCED';
                return view('gestao.inicio-pedidos', compact('pedidos', 'cor','status'));
        }
    }

}
