<?php

namespace Laracom\Http\Controllers;

use Illuminate\Http\Request;
use Laracom\Http\Requests;
use Cart;
use MP;
use Validator; //Para uso de Validação//
use Laracom\Models\Cliente;
use Laracom\Models\Pedido;
use Laracom\Models\Produto;
use Laracom\Models\Rating;
use Laracom\Models\Carrinho;

class ClienteController extends Controller {

    public function getIndex(Request $request) {
        return view('cliente.index');
    }

    //Destroi a sessão do cliente
    public function getSair(Request $request) {
        $request->session()->forget('cliente');
        $request->session()->forget('dados');
        $request->session()->forget('desconto');
        return redirect('/');
    }

    public function getCadastro(Request $request) {
        return view('cliente.dados');
    }

    public function postEditar(Request $request) {
        $dados = $request->except('_token','cpf','email','login');
        $id = $request->session()->get('dados');

        //Validação
        $validator = Validator::make($dados, Cliente::$rules_alt, Cliente::$messages);
        if ($validator->fails()) {
            return redirect('cliente/cadastro')
                            ->withErrors($validator)
                            ->withInput();
        }
        //Fim das Regras//     
        $dados['senha']=sha1($request['senha']);
        Cliente::where('id', $id)->update($dados);
        $msg = 'Cadastro Alterado com sucesso.';
        $request->session()->flash('status',$msg);
        return redirect()->back(); 
    }
    public function postFinalizar(Request $request) {
       
        $dados = $request->except('_token','email','login');
        $id = $request->session()->get('dados');

        //Validação
        $validator = Validator::make($dados, Cliente::$rules_alt, Cliente::$messages);
        if ($validator->fails()) {
            return redirect('cliente/cadastro')
                            ->withErrors($validator)
                            ->withInput();
        }
        //Fim das Regras//     
        $dados['senha']=sha1($request['senha']);
        Cliente::where('id', $id)->update($dados);
        $msg = 'Cadastro Finalizado com sucesso.';
        $request->session()->flash('status',$msg);
        return redirect('cart/ver-carrinho'); 
    }
    //++++++++++Módulo de Pedidos do Cliente+++++++++++// 
    //
    //============Finalizando um Pedido====================//
    
    
    public function postPedido(Request $request) {
        //Recupera ID do cliente Logado
        $id = $request->session()->get('dados');
        //Busca o cliente no DB
        $cliente = Cliente::find($id);
        if($cliente->cpf == ''){
            return view('cliente.finaliza_cadastro',compact('cliente'));
        }
        //Todos os itens do carrinho de compras 
        $carts = Cart::content();

        
        //Apenas o valor totda da compra
        $valor_pedido = Cart::total();
        //Incializando variavel que ira tratar dos descontos
        $descontos = 0;

        //Gerando uma referencia concatenada com ID do cliente
        //com uma string random, tal informação irá
        //vincular com a busca na API do mercado pago
        $external = $cliente->id . '-' . rand(111111, 999999) . '-' . rand(1111, 9999);

        //Montando o array do itens
        $i = 0;
        foreach ($carts as $cart) {
            $carrinho[$i] = array(
                "id" => $cart['id'],
                "title" => $cart['name'],
                "quantity" => $cart['qty'] + 0,
                "currencyid" => $cliente->id,
                "unit_price" => $cart['price'] + 0,
                "description" => $cliente->id,
            );
            $i++;
            Carrinho::insert(array('id_pedido'=>$external,'id_produto'=>(int)$cart['id'],'preco_venda'=>(float)$cart['price'],'qty'=>(int)$cart['qty']));
        }
        
        //Verificar se existe um cartão de desconto ativo em sessão
        if ($request->session()->get('desconto')) {
            //Se o desconto for maior que o pedido o valor de descontos recebe o proprio valor de pedidos
            if (($request->session()->get('desconto')) > $valor_pedido) {
                $descontos = $valor_pedido;
            }
            //Se o desconto for menor que o pedido o valor de descontos recebe o valor da sessão desconto
            elseif (($request->session()->get('desconto')) < $valor_pedido) {
                $descontos = $request->session()->get('desconto');
            }
            //Caso não exista desconto ativo
            else {
                $descontos = 0.0;
            }
            //Para haver o decremento do valor total, se faz necessário criar um item
            //extra no carrinho, no qual este item recebe o valor do desconto para abater nos demais itens
            if ($descontos > 0) {
                $carrinho[$i] = array(
                    "id" => 10,
                    "title" => 'Cartão Desconto',
                    "quantity" => 1,
                    "currencyid" => $cliente->id,
                    "unit_price" => -$request->session()->get('desconto'),
                    "description" => $cliente->id,
                );
            } else {
                //Caso não exista desconto ativo, o item será 0
                $carrinho[$i] = array(
                    "id" => 10,
                    "title" => 'Cartão Desconto',
                    "quantity" => 1,
                    "currencyid" => $cliente->id,
                    "unit_price" => 0,
                    "description" => $cliente->id,
                );
            }
        }
        //Preparando pedido para a API do Mercado Pago
        //Será direcionado a API caso o valor da comprar seja maior que 0,00, pois 
        //pode acontecer do cartão de descontos cobrir todo o valor
        if ($valor_pedido > $descontos) {
            $preference_data = array(
                //Passando o array dos items do carrinho
                "items" => $carrinho, //Itens do carrinho, a API já soma todos os valores
                "back_urls" => array("success" => "www.laracom.dev/cliente/pedidos", "pending" => "www.laracom.dev/cliente/pedidos"),
                "payer" => //Dados do comprador
                [
                    "name" => $cliente->nome,
                    "email" => $cliente->email,
                    "first_name" => $cliente->nome,
                    "address" => array("street_name" => $cliente->endereco)
                ],
                //Referencia para vincular o pedido com o DB do ecommerce
                "external_reference" => $external
            );
            try {
                //Se tudo estiver correto, a API pegar os dados do Array e envia ao servidor para gerar o pagamento
                $preference = MP::create_preference($preference_data);

                //Após gerar o pagamento é efetua a gravação do pedido no DB do Laracom
                $j = 0;
                //Estou gerando novamente o array do carrinho para desconsiderar o item desconto
                //e poder gravar corretamente no DB do Laracom
                foreach ($carts as $cart) {
                    $carrinho_2[$j] = array(
                        "id" => $cart['id'],
                        "title" => $cart['name'],
                        "quantity" => $cart['qty'] + 0,
                        "currencyid" => $cliente->id,
                        "unit_price" => $cart['price'] + 0,
                        "description" => $cliente->id,
                    );
                    $rating[$j] = array(
                        "id_cliente"=>$cliente->id,
                        "id_pedido"=>$external,
                        "id_produto"=>$cart['id'],
                        "nota"=>0,
                        "status"=>FALSE
                    );
                    //Inserção do Ranting
                    Rating::insert($rating[$j]);                    
                    $j++;
                }
                
                //Preparando dados que serão gravados no DB pedidos
                $data_p = date('d/m/Y');
                $hora_p = date('H:i');
                $dadosPedido = array(
                    "id_cliente" => $id,
                    "external_reference" => $external,
                    "status" => 'Pedido não finalizado',
                    "entrega" => 'Aguardando Pagamento',
                    "data_pedido" => $data_p,
                    "hora_pedido" => $hora_p,
                    "pref_id" => $preference['response']['id'],
                    "valor_pedido" => $valor_pedido,
                    "cartao_desconto" => $descontos,
                    "valor_total" => $valor_pedido - $descontos,
                    "boleto_emitido" => FALSE,
                    "saida_estoque" => FALSE
                );
                Pedido::insert($dadosPedido);
                //Depois de tudo feito, vou atualizar o cartão desconto, caso 
                //tivesse sido usado
                if ($request->session()->get('desconto')) {
                    $dados = Cliente::find($id);
                    $request->session()->forget('desconto');
                    $saldo_pontos = ($dados->saldo_pontos - ($valor_pedido) / 0.02);
                    if ($saldo_pontos < 0) {
                        $saldo_pontos = 0;
                    }
                    Cliente::where('id', $id)->update(array('saldo_pontos' => $saldo_pontos, 'pontos_usados' => (($descontos / 0.02) + $dados->pontos_usados), 'pontos_total' => (($saldo_pontos + $descontos) / 0.02) + $dados->saldo_pontos));
                }
                //Limpa Carrinho
                Cart::destroy();
                //Direciona para a página de pagamentos
                return redirect()->to($preference['response']['init_point']);
            } catch (\Exception $e) {
                
                if($e->getMessage() == "Could not resolve host: api.mercadopago.com"){
                    \Session::flash('mp_error','Não foi possível concluir o seu pedido, verifique a sua conexão ou tente mais tarde!');
                    return redirect()->to('/cart/ver-carrinho');
                }
                
            }
        }
        //Caso o valor do cartão desconto cubra o valor do pedido, 
        //não será necessário comunicar com a API de pagamentos
        else {
            $j = 0;
            foreach ($carts as $cart) {
                $carrinho_2[$j] = array(
                    "id" => $cart['id'],
                    "title" => $cart['name'],
                    "quantity" => $cart['qty'] + 0,
                    "currencyid" => $cliente->id,
                    "unit_price" => $cart['price'] + 0,
                    "description" => $cliente->id,
                );
                $rating[$j] = array(
                    "id_cliente"=>$cliente->id,
                    "id_pedido"=>$external,
                    "id_produto"=>$cart['id'],
                    "nota"=>0,        
                    "status"=>FALSE
                );
                $estoque = Produto::find($cart['id'])->qtd_estoque;
                $estoque = $estoque - $cart['qty'];
                Produto::where('id',$cart['id'])->update(array('qtd_estoque'=>$estoque));
                
                //Inserção do Ranting
                Rating::insert($rating[$j]);                    
                $j++;
            }
            $data_p = date('d/m/Y');
            $hora_p = date('H:i');
            //Preparando dados que serão gravados no DB pedidos
            $dadosPedido = array(
                "id_cliente" => $id,
                "external_reference" => $external,
                "status" => 'Aguardando envio, pedido pago!',
                "entrega" => 'Pagamento Aprovado',
                "data_pedido" => $data_p,
                "hora_pedido" => $hora_p,
                "pref_id" => 'Gratis',
                "valor_pedido" => $valor_pedido,
                "cartao_desconto" => $descontos,
                "valor_total" => 0,
                "boleto_emitido" => FALSE,
                "saida_estoque" => TRUE
            );
            
            Pedido::insert($dadosPedido);

            //Atualizar Cartão de Desconto
            if ($request->session()->get('desconto')) {
                $dados = Cliente::find($id);
                $request->session()->forget('desconto');
                $saldo_pontos = ($valor_pedido) / 0.02;
                if ($saldo_pontos < 0) {
                    $saldo_pontos = 0;
                }
                Cliente::where('id', $id)->update(array('saldo_pontos' => ($dados->saldo_pontos - $saldo_pontos), 'pontos_usados' => (($descontos / 0.02) + $dados->pontos_usados), 'pontos_total' => (($saldo_pontos + $descontos) / 0.02) + $dados->saldo_pontos));
            }
            //Limpa Carrinho
            Cart::destroy();
            return redirect()->to('cliente/pedidos');
        }
    }

    //Listando todos os pedidos realizados=================
    public function getPedidos(Request $request) {
        //Pega id do Cliente como parametro de busca
        $id = $request->session()->get('dados');
        
        //Passando o parametro para recuperar pedidos do cliente logado
        $up_pedidos = Pedido::where('id_cliente', $id)->get();
        $pedidos = Pedido::where('id_cliente', $id)->get();
        //Verificando se existem pedidos que não foram emitidos boletos
        //para que possa exibir opção de pagamento.
        foreach ($up_pedidos as $pedido) {
            //Pedidos com este status são testados
            if ($pedido->status == 'Pedido não finalizado') {
                //Nesta etapa a busca é direcionada para a API do Mercado Pago
                $filters = array(
                    "external_reference" => $pedido->external_reference,
                );
                $search_result = MP::search_payment($filters, null, 100);

                //Após a captura dos resultados, testa os que estão com status 200, que 
                //representa um pedido que já foi emitido boleto
                if ($search_result['response']['paging']['total'] == 1) {

                    //Com este status o pedido é atualizado no DB para Pagamento não confirmado
                    //que significa que o cliente emitiu o boleto mas ainda não compensou o pagamento.
                    Pedido::where('external_reference', $pedido->external_reference)->update(array('boleto_emitido' => TRUE, 'status' => 'Aguardando Pagamento!'));
                }
            }
            if ($pedido->pref_id == 'Gratis') {
                Pedido::where('external_reference', $pedido->external_reference)->update(array('boleto_emitido' => TRUE));
            }


            $pedidos = Pedido::where('id_cliente', $id)->orderBy('id')->paginate(8);
        }


        return view('cliente.pedidos', compact('pedidos'));
    }

    //Exibindo o pedido detalhado============================
    public function getPedidoDetalhado($id) {
        $busca = Pedido::where('external_reference', $id)->get();
        
        $detalhes = Carrinho::where('id_pedido', $id)->get();
        
        if ($busca[0]['status'] == 'Pedido não finalizado') {
            $filters = array(
                "external_reference" => $busca[0]['external_reference'],
            );
            $search_result = MP::search_payment($filters, 1, 1);

            if ($search_result['response']['paging']['total'] == 1) {
                Pedido::where('external_reference', $id)->update(array('boleto_emitido' => TRUE, 'status' => 'Aguardando Pagamento!'));
            }
        }

        $busca = Pedido::where('external_reference', $id)->get();
        
        $produtos = Produto::all();
        $pedido = array(
            "status" => $busca[0]['status'],
            "entrega" => $busca[0]['entrega'],
            "data_pedido" => $busca[0]['data_pedido'],
            "hora_pedido" => $busca[0]['hora_pedido'],
            "valor_pedido" => $busca[0]['valor_pedido'],
            "external_reference" => $id,
            "boleto_emitido" => $busca[0]['boleto_emitido'],
            "pref_id" => $busca[0]['pref_id'],
            "cartao_desconto" => $busca[0]['cartao_desconto'],
            "valor_total" => $busca[0]['valor_total']
        );
        
        $ratings = Rating::where('id_pedido',$id)->get();        
        
        return view('cliente.pedido-detalhado', compact('pedido', 'detalhes', 'produtos','ratings'));
    }

    public function getBoleto($id, $pref) {
        $filters = array(
            "external_reference" => $id,
        );
        $search_result = MP::search_payment($filters, null, null);
//        dd($search_result);
        if ($search_result['response']['results'] == []) {
            $preference = MP::get_preference("$pref");
            return redirect()->to($preference['response']['init_point']);
        } else {
            Pedido::where('external_reference', $id)->update(array('boleto_emitido' => TRUE, 'status' => 'Aguardando pagamento'));
            $call_payment = $search_result['response']['results'][0]['collection']['payer']['id'];
            $id_payment = $search_result['response']['results'][0]['collection']['id'];
            return redirect()->away("https://www.mercadopago.com/mlb/payments/ticket/helper?payment_id=" . $id_payment . "&payment_method_reference_id=1812085698&caller_id=" . $call_payment)->withInput();
        }
    }

    //Cancelar um pedido - Ainda está em testes!!!
    public function getCancel() {
        $result = MP::cancel_payment(1976035867);
        dd($result);
    }

    //Cartão Fidelidade - Gerenciador de descontos e pontuação do cliente
    public function getCartaoFid(Request $request) {
        $id = $request->session()->get('dados');

        $cliente = Cliente::find($id);
        $saldo_real = 0.02 * $cliente->saldo_pontos;
        if ($saldo_real > 20) {
            $resgate = TRUE;
        } else {
            $resgate = FALSE;
        }
        return view('cliente.fidel-card', compact('cliente', 'saldo_real', 'resgate'));
    }

    public function getAddDesconto(Request $request) {
        $id = $request->session()->get('dados');
        $desconto = Cliente::find($id)->saldo_pontos * 0.02;
        $total = Cart::total() - $desconto;
        $request->session()->put('desconto', $desconto);
        $request->session()->put('total', $total);
        return redirect()->to('cliente/');
    }
    
    public function getRating(Request $request){
        $nota = $request->nota;       
        $id = $request->id;
        Rating::where('id',$id)->update(array('nota'=>$nota,'status'=>TRUE));
        
    }
    public function getRastreioDetalhado($id){        
        $rastreio = Pedido::where('external_reference',$id)->get();
        return view('cliente.rastreio-detalhado',compact('rastreio'));
    }
    
}
