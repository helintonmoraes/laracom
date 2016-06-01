<?php

namespace Laracom\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Laracom\Models\Cliente;
use Socialite;

class FacebookController extends Controller {

    public function getRedirect() {
        return Socialite::driver('facebook')->redirect();
    }

    public function getCallback() {

        $facebook = \Socialite::driver('facebook')->user();

        $cliente = new Cliente();
        $cliente->nome = $facebook['name'];
        $cliente->email = $facebook['email'];
        $cliente->login = str_replace(' ', '', strtolower($facebook['name'].rand(11,99)));

        $query = Cliente::where('login', $cliente->login)->orWhere('email', $cliente->email)->get()->count();

        if ($query == 0) {
            Cliente::insert(array('fone'=>'','endereco'=>'','cpf'=>'','nome' => $cliente->nome, 'email' => $cliente->email, 'login' => $cliente->login, 'senha' => $facebook['id'], 'ativacao' => TRUE, 'saldo_pontos' => 0, 'pontos_usados' => 0, 'pontos_total' => 0));
            $cliente = Cliente::where('email', $cliente->email)->get()->count();
            $dados = Cliente::where('email', $facebook['email'])->first();
            //Caso a conta esteja desativada por ter sido alterado senha 
            //pelo Esqueci senha
            if ($dados->ativacao == FALSE) {
                $request->session()->put('ativacao', 1);
                return view('cliente.alt-senha');
            }
            \Session::put('cliente', $cliente);
            \Session::put('dados', $dados->id);
            if (\Session::has('next-url')) {
                $url = \Session::get('next-url');
                \Session::forget('next-url');
                return redirect($url);
            }
            return redirect('/cliente');
            
            
        } 
        else {
            $cliente = Cliente::where('email', $cliente->email)->get()->count();
            $dados = Cliente::where('email', $facebook['email'])->first();
            //Caso a conta esteja desativada por ter sido alterado senha 
            //pelo Esqueci senha
            if ($dados->ativacao == FALSE) {
                $request->session()->put('ativacao', 1);
                return view('cliente.alt-senha');
            }
            \Session::put('cliente', $cliente);
            \Session::put('dados', $dados->id);
            if (\Session::has('next-url')) {
                $url = \Session::get('next-url');
                \Session::forget('next-url');
                return redirect($url);
            }
            return redirect('/cliente');
        }

    }

}
