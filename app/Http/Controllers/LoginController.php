<?php

namespace Laracom\Http\Controllers;

use Illuminate\Http\Request;
use Laracom\Http\Requests;
use Cart;
use Laracom\Models\Cliente;
use Laracom\Models\Admin;
use Validator; //Para uso de vaidação//

class LoginController extends Controller {

    //Múdulo de Autenticação do Cliente//
    public function getAutenticar(){
        return view('loja.login');
    }
    public function postAutenticar(Request $request) {
            $dadosForm = $request->toArray();
            $dadosForm['senha'] = sha1($request['senha']);
            $login = $request['login'];
            $senha = sha1($request['senha']);            
//              dd($senha);         
            $validator = Validator::make($dadosForm, Cliente::$rules_login,Cliente::$messages);
            if($validator->fails()){
            return redirect ('/login/autenticar')
                ->withErrors($validator)
                ->withInput();
            }
            //Fim das Regras// 
            $cliente = Cliente::where('login', '=', $login)
                              ->where('senha', '=', $senha)->count();
            
            if($cliente = 1){
                                
                $dados = Cliente::where('login',$login)->first();
                //Caso a conta esteja desativada por ter sido alterado senha 
                //pelo Esqueci senha
                if($dados->ativacao == FALSE){
                    $request->session()->put('ativacao', 1);
                    return view('cliente.alt-senha');
                    
                }
            }
            else{
                return back()->withInput();
            }

//----------->AQUI FICAM SALVOS OS DADOS CONSULTADOS NO BANCO--------------//
            $request->session()->put('cliente', $cliente);
            $request->session()->put('dados', $dados->id);
           
               
            if (\Session::has('next-url')) {
                $url = \Session::get('next-url');
                \Session::forget('next-url');
                return redirect($url);
            }
            return redirect('/cliente');
        
    }
    public function getAltSenha(Request $request){
        if($request->session()->get('ativacao')){
            return view('cliente.alt-senha');
        }
        else{
            redirect ('login/autenticar');
        }
    }
    public function postAltSenha(Request $request){
        $dadosForm = $request->toArray();
        $dadosForm['senha_old'] = sha1($request['senha_old']);
        $dadosForm['senha_old'] = sha1($request['senha_new']);
        $login = $request['login'];
        $senha_old = sha1($request['senha_old']);
        $senha_new = sha1($request['senha_new']);
        //Validação            
        $validator = Validator::make($dadosForm, Cliente::$rules_res,Cliente::$messages );
        if($validator->fails()){
        return redirect('login/alt-senha')
                ->withErrors($validator)
                ->withInput();
        }
        //Fim das Regras// 
        
        $cliente = Cliente::where('login',$login)
                        ->where('senha',$senha_old)->count();
        if($cliente == 1){
            Cliente::where('login',$login)->update(array('senha'=>$senha_new,'ativacao'=>TRUE));
            $request->session()->forget('ativacao');
            return redirect('login/autenticar');
        }
        else{
            \Session::flash('alt_fail','Dados Informados não conferem.'); 
            return redirect('login/alt-senha');
        }
        
        
        
    }
    //Fim do Múdulo de Autenticação do Cliente//
    
    
    //Múdulo de Autenticação do Administrador//
    public function getAdmin(){
        return view('painel.login');
    }
    public function postAutenticarAdmin(Request $request) {
            $dadosForm = $request->toArray();
            $login = $request['login'];
            $senha = sha1($request['senha']);   
            $dadosForm['senha'] = ltrim($request['senha']);
    
            $validator = Validator::make($dadosForm, Admin::$rules_login,Admin::$messages);
            if($validator->fails()){
            return redirect ('/login/admin')
                ->withErrors($validator)
                ->withInput();
            }
            //Fim das Regras// 
            $admin = Admin::where('login', '=', $login)->where('senha', '=', $senha)->count();
            
            if($admin == 1){
                                
                $dados_adm = Admin::where('login',$login)->first();
                //Caso a conta esteja desativada por ter sido alterado senha 
                //pelo Esqueci senha
                if($dados_adm->ativacao == FALSE){
                    $request->session()->put('ativacao', 1);
                    return view('cliente.alt-senha');
                }
            }
            else{
                return back()->withInput();
            }

//----------->AQUI FICAM SALVOS OS DADOS CONSULTADOS NO BANCO--------------//
            $request->session()->put('admin', $admin);
            $request->session()->put('dados_adm', $dados_adm->id);
           
               
            if (\Session::has('next-url')) {
                $url = \Session::get('next-url');
                \Session::forget('next-url');
                return redirect($url);
            }
            return redirect('/painel');
        
    }
    public function getAltSenhaAdmin(Request $request){
        if($request->session()->get('ativacao')){
            return view('cliente.alt-senha');
        }
        else{
            redirect ('login/autenticar');
        }
    }
    public function postAltSenhaAdmin(Request $request){
        $dadosForm = $request->toArray();
        $dadosForm['senha_old'] = sha1($request['senha_old']);
        $dadosForm['senha_old'] = sha1($request['senha_new']);
        $login = $request['login'];
        $senha_old = sha1($request['senha_old']);
        $senha_new = sha1($request['senha_new']);
        //Validação            
        $validator = Validator::make($dadosForm, Cliente::$rules_res,Cliente::$messages );
        if($validator->fails()){
        return redirect('login/alt-senha')
                ->withErrors($validator)
                ->withInput();
        }
        //Fim das Regras// 
        
        $cliente = Cliente::where('login',$login)
                        ->where('senha',$senha_old)->count();
        if($cliente == 1){
            Cliente::where('login',$login)->update(array('senha'=>$senha_new,'ativacao'=>TRUE));
            $request->session()->forget('ativacao');
            return redirect('login/autenticar');
        }
        else{
            \Session::flash('alt_fail','Dados Informados não conferem.'); 
            return redirect('login/alt-senha');
        }
        
        
        
    }
    //Fim do Múdulo de Autenticação do Cliente//
}
