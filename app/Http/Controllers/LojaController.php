<?php

namespace Laracom\Http\Controllers;

use DB; //Usar tabelas do banco
use Illuminate\Http\Request;
use Laracom\Models\Produto;
use Laracom\Models\Contato;
use Laracom\Models\Cliente;
use Laracom\Models\Rating;
use Validator; //Para uso de Validação//
use Laracom\Http\Requests;
use Storage;
use Cart;
use Mail;
class LojaController extends Controller {
    public function getIndex() {        
        //Consulta de Todos os produtos        
        $ofertas = Produto::orderByRaw('RANDOM()')->get();
        $destaques = Produto::orderByRaw('RANDOM()')->where('destaque',true)->paginate(4);
        $lancamentos = Produto::orderByRaw('RANDOM()')->where('lancamento',true)->paginate(4);
        $produtos = Produto::all()->random(4);      
        $categorias = DB::table('categoria')->where('id_pai', 0)->get();
        return view('loja.index', compact('produtos','categorias','ofertas','destaques','lancamentos'));
    }
    //Caso digite URL inválida!!!
    public function missingMethod($parameters = array()) {
        return view('errors.503');
    }
    //Página de produtos filtrados por categorias
    public function getCategoria($id) {
        $filtros = DB::table('produto')->where('id_categoria', $id)->paginate(8);        
        return view('loja.filtro', compact('filtros'));
    }
    //Página de produtos filtrados por busca
    public function getBuscar(Request $request) {       
        $busca = $request;
        $res = $busca['buscar'];        
        if ($busca['buscar'] != "") {
            $filtros = DB::table('produto')
                       ->where('nome', 'ilike', "%$res%")->paginate(8);
            $parametro = $busca['buscar'];            
            return view('loja.filtro', compact('filtros', 'parametro'));
        }
        else{
            $res = str_random(10);
            $filtros = DB::table('produto')->where('nome',$res)->paginate(8);
            $parametro = $busca['buscar'];
            return view('loja.filtro', compact('filtros', 'parametro'));
        }
    }
     //Página de produtos filtrados lançamentos
    public function getLancamentos() {        
        $filtros = DB::table('produto')->where('lancamento', true)->paginate(8);
        return view('loja.filtro', compact('filtros'));
    }
    //Página de produtos filtrados destaques
    public function getDestaques() {
        $filtros = DB::table('produto')->where('destaque', true)->paginate(8);
        return view('loja.filtro', compact('filtros'));
    }
    //Página do produto detalhado
    public function getProdutoDetalhes($id) {    
        $produto = Produto::find($id);      
        $cat = $produto->id_subcategoria;
        $relacionados = Produto::where('id_subcategoria',$cat)
                        ->where('id','<>',$id)
                        ->paginate(4);      
        $categorias = DB::table('categoria')->where('id_pai', 0)->get();
        //Calculo de média de ranting//
        $rating_cont = Rating::where('id_produto',$id)->count();
        if($rating_cont > 0){
            $rating = Rating::where('id_produto',$id)->get();
            $soma = 0;
            $i=0;
            foreach($rating as $r){
                $soma =  $r['nota'] + $soma;
                $i++;
            }
            $media = ($soma/$i);
        }
        else{
            $media = 0;
        }
       //Fim do calculo//
        
        
        return view('loja.produto-detalhes', compact('categorias', 'produto', 'relacionados','media'));
    }
    //Função que recupara imagens da Storage
    public function getImageFile($nome) {
        $imagem = Storage::disk('local')->get($nome);
        return response($imagem, 200)->header('Content-Type', 'image/jpeg');
    }
    //Página de contatos, aberta a todos os visitantes
    public function getContato() {
        return view('loja.contato');
    }
    public function postContato(Request $request) {
        $dadosForm = $request->except('_token');
        $dadosForm['status'] = 'Pendente';
        $dadosForm['hora'] = date('H:i');
        $dadosForm['data'] = date('d/m/Y');
        Contato::insert($dadosForm); 
        \Session::flash('enviado','Mensagem enviada com sucesso!');
        return back()->withInput();
    }
    //Página de cadastro de clientes
    public function getRegistro(Request $request) {
        if($request->session()->get('dados')){          
            
            return redirect ('cliente/');
        }
        return view('loja.create-edit-cliente');
    }
     public function postRegistro(Request $request) {
        $dadosForm = $request->except('_token');
        $dadosForm['saldo_pontos']=0;
        $dadosForm['pontos_usados']=0;
        $dadosForm['pontos_total']=0;
        $dadosForm['ativacao']=TRUE;
         //Validação
        $validator = Validator::make($dadosForm, Cliente::$rules,Cliente::$messages );
        if($validator->fails()){
            return redirect ('/registro')
                ->withErrors($validator)
                ->withInput();
        }
        //Fim das Regras//         
        Cliente::insert($dadosForm);

        return redirect ('cliente/');
     }
    
    public function getResetSenha(){
        return view('cliente.reset-senha');
    }
    
    public function postResetSenha(Request $request){
        $dadosForm = $request->except('_token');
        
        //Validação
        $validator = Validator::make($dadosForm, Cliente::$rules_res_p,Cliente::$messages );
        if($validator->fails()){
            return redirect ('/reset-senha')
                ->withErrors($validator)
                ->withInput();
        }
        //Fim das Regras//
        
        $dados = Cliente::where('login',$dadosForm['login'])
                ->where('email',$dadosForm['email'])
                ->where('cpf',$dadosForm['cpf'])->count();
        //Nova senha gerada
        $senha = str_random(10);
        
        if($dados == 1){
            $cliente = Cliente::where('login',$dadosForm['login'])->update(array('senha'=>sha1($senha),'ativacao'=>FALSE)); 
            
            $destino = Cliente::where('login',$dadosForm['login'])->get();
            
            $data = array(
            'login'=>$destino[0]['login'],
            'name'=>$destino[0]['nome'],
            'email'=>$destino[0]['email'],
            'subject'=>'Teste',
            'msg'=>'Teste',
            'senha'=> $senha
            );
            $email = $destino[0]['email'];
            
            Mail::send('cliente.nova-senha',['data'=>$data], function ($message) use($destino){
            $message->from('us@example.com', 'Laracom');
            $message->to($destino[0]['email']);
            $message->subject('Redifinição de Senha - Laracom');
            
        });
        
        \Session::flash('flash_reset','Uma nova senha foi enviada em seu e-mail.'); 
        return redirect('/reset-senha');
        
        }
        else{
            \Session::flash('reset_fail','Dados Informados não conferem.'); 
             return redirect('/reset-senha');
        }
        
        
        
       
    }
     
     
}
