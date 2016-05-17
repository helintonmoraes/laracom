<?php

namespace Laracom\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Laracom\Http\Requests;
use Storage;
use MP;
use Laracom\Models\Cliente;
use Laracom\Models\Pedido;
use Laracom\Models\Produto;
use Laracom\Models\Contato;
use Laracom\Models\Categoria;
use Validator; //Para uso de vaidação//
use Auth;
class PainelController extends Controller {

    public function getIndex() {        
        $produtos = DB::table('produto')->paginate(5);
        $marcas = DB::table('marca')->paginate(5);
        $categorias = DB::table('categoria')->where('id_pai','>', 0)->paginate(8);
        return view('painel.index', compact('produtos', 'marcas','categorias'));
    }

    //........................Painel Categoria....................................//
    public function getCategoria() {
        $categorias = DB::table('categoria')->where('id_pai','>', 0)->paginate(8);
        $categorias_pai = DB::table('categoria')->where('id_pai',0)->get();
        return view('painel.categoria', compact('categorias','categorias_pai'));
    }

    public function getAdicionarCategoria() {
        $categorias_pais = DB::table('categoria')->where('id_pai',0)->get();
        return view('.painel.create-edit-categoria', compact('categorias_pais'));
    }

    public function postAdicionarCategoria(Request $request) {
        $dadosForm = $request;
        
        DB::table('categoria')->insert(['nome' => "$dadosForm->nome", 'id_pai' => "$dadosForm->id_pai"]);
        return redirect('painel/categoria')->withInput();
    }

    public function getEditarCategoria($id) {
        $categorias_pais = DB::table('categoria')->where('id_pai',0)->get();
        $categorias_filhos = DB::table('categoria')->where('id',$id)->get();
        return view('painel.create-edit-categoria', compact('categorias_filhos','categorias_pais'));
    }

    public function postEditarCategoria(Request $request, $id) {
        $dadosForm = $request;
        
        DB::table('categoria')
                ->where('id', $id)
                ->update(['nome' => $dadosForm->nome, 'id_pai' => $dadosForm->id_pai]);

        return redirect('painel/categoria')->withInput();
    }

    public function getDeletarCategoria($idCategoria) {
        $categoria = DB::table('categoria')->where('id', $idCategoria);

        $categoria->delete();

        return redirect('painel/categoria');
    }

    //-------------Painel Marca-------------//
    public function getMarca() {
        $marcas = DB::table('marca')->paginate(8);
        return view('painel.marca', compact('marcas'));
    }

    public function getAdicionarMarca() {
        return view('.painel.create-edit-marca');
    }

    public function postAdicionarMarca(Request $request) {
        $dadosForm = $request;
        DB::table('marca')->insert(['nome' => "$dadosForm->nome"]);
        return redirect('painel/marca')->withInput();
    }

    public function getEditarMarca($id) {
        $marcas = DB::table('marca')->where('id', $id)->get();
        return view('.painel.create-edit-marca', compact('marcas'));
    }

    public function postEditarMarca(Request $request, $id) {
        $dadosForm = $request;
        DB::table('marca')
                ->where('id', $id)
                ->update(['nome' => "$dadosForm->nome"]);
        return redirect('painel/marca')->withInput();
    }

    public function getDeletarMarca($id) {
        $marca = DB::table('marca')->where('id', $id);
        $marca->delete();
        return redirect('painel/marca');
    }

    //-----------------------------------------//
    //
    //-------------Painel Produto-------------//
    public function getProduto() {
        $produtos = DB::table('produto')->paginate(8);
        $categorias = DB::table('categoria')->get();
        return view('painel.produto', compact('produtos', 'categorias'));
    }

    public function getAdicionarProduto() {
        $categorias = DB::table('categoria')->get();        
        
        return view('painel.create-edit-produto', compact('categorias'));
    }
    public function getEditarProduto($id) {
        $produto = Produto::find($id);
        
        $categorias = DB::table('categoria')->get(); 
        return view('.painel.create-edit-produto', compact('produto','categorias'));
    }

    public function postEditarProduto(Request $request, $id) {
        $dadosForm = $request->except('_token', 'file','cont');
        //Regras de validaçao 
        $validator = Validator::make($dadosForm, Produto::$rules,Produto::$messages );
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        //Fim das Regras//   
        Produto::where('id',$id)->update($dadosForm);
        return redirect('painel/produto')->withInput();
    }
    public function getAjaxSubcat(Request $request){
        $cat_id = $request->cat_id;
       
        $subcats = DB::table('categoria')->where('id_pai',$cat_id)->get();
        
        return response()->json($subcats);        
    }

    public function postAdicionarProduto(Request $request) {  
        $dadosForm = $request->except('_token');
        
        //Regras de validaçao 
        $validator = Validator::make($dadosForm, Produto::$rules,Produto::$messages );
        if($validator->fails()){
            return redirect ('/painel/adicionar-produto')
                ->withErrors($validator)
                ->withInput();
        }
        //Fim das Regras//      
        
        $img_1 = str_random(10) . '.jpg';
        $img_2 = str_random(10) . '.jpg';
        $img_3 = str_random(10) . '.jpg';
        $img_4 = str_random(10) . '.jpg';
        $img_5 = str_random(10) . '.jpg';
        $img_6 = str_random(10) . '.jpg';
        
        $file_1 = $request->file('imagem_1');
        $file_2 = $request->file('imagem_2');
        $file_3 = $request->file('imagem_3');
        $file_4 = $request->file('imagem_4');
        $file_5 = $request->file('imagem_5');
        $file_6 = $request->file('imagem_6');
        
        if ($request->hasFile('imagem_1') && $file_1->isValid()) {
            Storage::disk('local')->put($img_1, file_get_contents($file_1));
            $cont = 1;
        }
        if ($request->hasFile('imagem_2') && $file_2->isValid()) {
            Storage::disk('local')->put($img_2, file_get_contents($file_2));
            $cont++;
        }
        if ($request->hasFile('imagem_3') && $file_3->isValid()) {
            Storage::disk('local')->put($img_3, file_get_contents($file_3));
            $cont++;
        }
         if ($request->hasFile('imagem_4') && $file_4->isValid()) {
            Storage::disk('local')->put($img_4, file_get_contents($file_4));
            $cont++;
        }
         if ($request->hasFile('imagem_5') && $file_5->isValid()) {
            Storage::disk('local')->put($img_5, file_get_contents($file_5));
            $cont++;
        }
        if ($request->hasFile('imagem_6') && $file_6->isValid()) {
            Storage::disk('local')->put($img_6, file_get_contents($file_6));
            $cont++;
        }
        

        if (!(isset($dadosForm['destaque']))) {
            $dadosForm['destaque'] = 'false';
        }
        if (!(isset($dadosForm['lancamento']))) {
            $dadosForm['lancamento'] = 'false';
        }
        if (!(isset($dadosForm['oferta']))) {
            $dadosForm['oferta'] = 'false';
        }
        
        
        $dadosForm['imagem_1'] = $img_1;
        $dadosForm['imagem_2'] = $img_2;
        $dadosForm['imagem_3'] = $img_3;
        $dadosForm['imagem_4'] = $img_4;
        $dadosForm['imagem_5'] = $img_5;
        $dadosForm['imagem_6'] = $img_6;        
        $dadosForm['qtd_avalicao'] = '10';
        $dadosForm['qtd_estoque'] = '10';
        $dadosForm['id_marca'] = '1';
        $dadosForm['cont'] = $cont;        
        Produto::insert($dadosForm);
        return redirect('painel/produto')->withInput();
    }

    public function getDeletarProduto($id) {
        $produto = Produto::find($id);
        
        Storage::disk('local')->delete($produto['imagem_1'],$produto['imagem_2'],$produto['imagem_3'],$produto['imagem_4'],$produto['imagem_5'],$produto['imagem_6']);
        $produto->delete();

        return back()->withInput();
//      return redirect('painel/produto');
    }
    
    //--------Gestor de Mensagens--------//
    
    public function getContatos(){
        $contatos = DB::table('contatos')->get();
        return view('painel.contato', compact('contatos'));
    }
    
    public function getContatoDetalhes($id){
        $detalhes = Contato::find($id);
        return view('painel.contato-detalhes', compact('detalhes'));
    }
    public function getDeletarContato($id) {
        $contato = Contato::find($id);       
       
        $contato->delete();
        
        return redirect('painel/contatos');
    }
    
    
    
    //Gestor de Pedidos
    public function getPedidos(){
        
        $filters = array(               
               "external_reference" => null,
               "status" => "pending"
            
        );        
        //Fazendo a busca na base de dados do Mercado Pago
        $search_result = MP::search_payment($filters,null,100);
        //Retorno da busca
        
        $pedidos = $search_result['response']['results'];
        return view('painel.pedidos',compact ('pedidos'));
    }
    
    public function getDeletarPedido($id){
        $result = MP::cancel_payment($id);
        return redirect('painel/pedidos');
    }
  
}
