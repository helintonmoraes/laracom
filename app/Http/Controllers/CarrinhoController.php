<?php

namespace Laracom\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Cart;
use DB; //Usar tabelas do banco 
use Illuminate\Http\Request;
use Laracom\Http\Requests;
use Laracom\Models\Produto;

class CarrinhoController extends Controller {
    public function getVerCarrinho(Request $request){  
       
        return view('loja.carrinho');
    }
    public function getAddQtd($id){        
        $rowId = Cart::search(array('id' => $id+0));
        $item = Cart::get($rowId[0]);
        Cart::update($rowId[0], $item->qty + 1);
        return back()->withInput();
    }
    public function getRemQtd($id){        
        $rowId = Cart::search(array('id' => $id+0));
        $item = Cart::get($rowId[0]);
        Cart::update($rowId[0], $item->qty - 1);
        return back()->withInput();
    }
    
    public function getRemoveCarrinho($id){        
        $rowId = Cart::search(array('id' => $id+0));        
        Cart::remove($rowId[0]);
        return back()->withInput();        
    }
    public function postAddCart(Request $request) {  
        
        $id = $request['produto_id'];
        $produto = Produto::find($id);
        $categorias = DB::table('categoria')->where('id_pai', 0)->get();
        $destaques = DB::table('produto')->where('destaque', true)->paginate(4);
        $ofertas = DB::table('produto')->where('oferta', true)->get();
        $lancamentos = DB::table('produto')->where('lancamento', true)->paginate(4);            
        Cart::add(array('id' => $produto->id, 'name' => $produto->nome, 'qty' => $request['qty'], 'price' => $produto->preco_venda));
        $cart = Cart::content();
        
        return redirect('cart/ver-carrinho')->withInput();
    }
    

}
