<?php

namespace Laracom\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Laracom\Http\Requests;
use Storage;
use MP;
use Laracom\Models\Cliente;
use Laracom\Models\Admin;
use Laracom\Models\Pedido;
use Laracom\Models\Produto;
use Laracom\Models\Contato;
use Laracom\Models\Categoria;
use Validator; //Para uso de vaidação//
use Auth;
class PainelController extends Controller {

    public function getIndex() {        
        $produtos = DB::table('produto')->paginate(5);
        $clientes = DB::table('cliente')->paginate(5);
        $estoque = Produto::all();
        
        $total = 0;
        foreach($estoque as $e){
            $total = $e->qtd_estoque + $total;
         }
//         dd($total);
        $marcas = DB::table('marca')->paginate(5);
        $categorias = DB::table('categoria')->where('id_pai','>', 0)->paginate(8);
        return view('painel.index', compact('produtos', 'marcas','categorias','clientes','total'));
    }

    //........................Painel Categoria....................................//
    public function getCategoria() {
        $categorias = DB::table('categoria')->where('id_pai','>', 0)->paginate(8);
        $categorias_pai = DB::table('categoria')->where('id_pai',0)->get();
        return view('painel.produtos.categoria', compact('categorias','categorias_pai'));
    }

    public function getAdicionarCategoria() {
        $categorias_pais = DB::table('categoria')->where('id_pai',0)->get();
        return view('.painel.produtos.create-edit-categoria', compact('categorias_pais'));
    }

    public function postAdicionarCategoria(Request $request) {
        $dadosForm = $request;
        
        DB::table('categoria')->insert(['nome' => "$dadosForm->nome", 'id_pai' => "$dadosForm->id_pai"]);
        return redirect('painel/categoria')->withInput();
    }

    public function getEditarCategoria($id) {
        $categorias_pais = DB::table('categoria')->where('id_pai',0)->get();
        $categorias_filhos = DB::table('categoria')->where('id',$id)->get();
        return view('painel.produtos.create-edit-categoria', compact('categorias_filhos','categorias_pais'));
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
        return view('painel.produtos.marca', compact('marcas'));
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
        return view('painel.produtos.produto', compact('produtos', 'categorias'));
    }

    public function getAdicionarProduto() {
        $categorias = DB::table('categoria')->get();        
        
        return view('painel.produtos.create-edit-produto', compact('categorias'));
    }
    public function getEditarProduto($id) {
        $produto = Produto::find($id);
        
        $categorias = DB::table('categoria')->get(); 
        return view('painel.produtos.create-edit-produto', compact('produto','categorias'));
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
        return view('painel.contatos.contato', compact('contatos'));
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
        return view('painel.pedido.pedidos',compact ('pedidos'));
    }
    
    public function getDeletarPedido($id){
        $result = MP::cancel_payment($id);
        return redirect('painel/pedidos');
    }
    
    public function getEstoque($estoque) {
        if($estoque == 0){
           $produtos = Produto::where('nome','<>','')->orderBy('qtd_estoque')->orderBy('id_subcategoria')->paginate(8);   
           $categorias = DB::table('categoria')->get();
           return view('painel.estoque.estoque', compact('produtos', 'categorias'));
        } 
        if($estoque == 1){
           $produtos = Produto::where('qtd_estoque',0)->orderBy('qtd_estoque')->orderBy('id_subcategoria')->paginate(8);   
           $categorias = DB::table('categoria')->get();
           return view('painel.estoque.estoque', compact('produtos', 'categorias'));
        }   
        if($estoque == 2){
           $produtos = Produto::where('qtd_estoque','>',0)->where('qtd_estoque','<',11)->orderBy('qtd_estoque')->orderBy('id_subcategoria')->paginate(8); 
           $categorias = DB::table('categoria')->get();
           return view('painel.estoque.estoque', compact('produtos', 'categorias'));
        }   
        if($estoque == 3){
           $produtos = Produto::where('qtd_estoque','>',10)->where('qtd_estoque','<',21)->orderBy('qtd_estoque')->paginate(8); 
           $categorias = DB::table('categoria')->get();
           return view('painel.estoque.estoque', compact('produtos', 'categorias'));
        } 
        if($estoque == 4){
           $produtos = Produto::where('qtd_estoque','>',20)->orderBy('qtd_estoque')->paginate(8); 
           $categorias = DB::table('categoria')->get();
           return view('painel.estoque.estoque', compact('produtos', 'categorias'));
        } 
    }
    public function postAlteraEstoque(Request $request){        
        $estoque = (Produto::find($request->id)->qtd_estoque+$request->qtd_estoque);
        $id = $request->id;
        Produto::where('id',$id)->update(array('qtd_estoque'=> $estoque));
        \Session::flash('estoque_ok','O estoque foi atualizado com sucesso!');
        return back()->withInput();
    }
    
    
    function getClientes() {
        $clientes = Cliente::orderBy('nome')->paginate(10);
        return view('painel.clientes.listagem-clientes', compact('clientes'));
    }

    function getDetalhesCliente($id) {
        $cliente = Cliente::find($id);
        return view('painel.clientes.detalhes-do-cliente', compact('cliente'));
    }
    //Gráfico de Estoque por Categoria
    function getEstoqueCategoria() {
        $cat_1 = Produto::where('id_categoria',1)->get();
        $cat_2 = Produto::where('id_categoria',2)->get();
        $cat_3 = Produto::where('id_categoria',3)->get();
        $cat_4 = Produto::where('id_categoria',4)->get();
        $cat_5 = Produto::where('id_categoria',5)->get();
        $cat_6 = Produto::where('id_categoria',6)->get();
        $cat_7 = Produto::where('id_categoria',7)->get();
        //Estoque por Categorias
        $x1 = 0;
        foreach($cat_1 as $c1){
            $x1 = $c1->qtd_estoque +$x1;
        }
        
        $x2 = 0;
        foreach($cat_2 as $c2){
            $x2 = $c2->qtd_estoque +$x2;
        }
        
        $x3 = 0;
        foreach($cat_3 as $c3){
            $x3 = $c3->qtd_estoque +$x3;
        }
        
        $x4 = 0;
        foreach($cat_4 as $c4){
            $x4 = $c4->qtd_estoque +$x4;
        }
        
        $x5 = 0;
        foreach($cat_5 as $c5){
            $x5 = $c5->qtd_estoque +$x5;
        }
        
        $x6 = 0;
        foreach($cat_6 as $c6){
            $x6 = $c6->qtd_estoque +$x6;
        }
        
        $x7 = 0;
        foreach($cat_7 as $c7){
            $x7 = $c7->qtd_estoque +$x7;
        }
        
        return view('painel.relatorios',compact('x1','x2','x3','x4','x5','x6','x7'));
    }
//   SELECT count(*) as NrVezes, id_cliente FROM pedidos GROUP BY id_cliente ORDER BY NrVezes DESC
    public function getSair(Request $request) {
        $request->session()->forget('admin');
        $request->session()->forget('dados_admin');
        
        return redirect('/login/admin');
    }
    
    public function getDadosAdmin(){
        $id = \Session::get('dados_adm');
        $dados = Admin::find($id);
        
        return view('painel.dados-adm',compact('dados'));
    }
    public function postEditarDadosAdm(Request $request) {
        $dados = $request->except('_token','cpf','email','login');
        $id = $request->session()->get('dados_adm');

        //Validação
        $validator = Validator::make($dados, Admin::$rules_alt, Cliente::$messages);
        if ($validator->fails()) {
            return redirect('painel/dados-admin')
                            ->withErrors($validator)
                            ->withInput();
        }
        //Fim das Regras//     
        $dados['senha']=sha1($request['senha']);
        Admin::where('id', $id)->update($dados);
        
        $msg = 'Cadastro Alterado com sucesso.';
        $request->session()->flash('status_adm',$msg);
        return redirect()->back(); 
    }
}
