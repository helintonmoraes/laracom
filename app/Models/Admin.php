<?php

namespace Laracom\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model {

    protected $table = 'admin';
    
    //Regras para cadastro no sistema
    static $rules = [
        'login' => 'required|unique:cliente',
        'senha' => 'required|min:10',
        'nome' => 'required',
        'email' => 'required|email|unique:cliente',
        'cpf' => 'required|cpf|unique:cliente',
        'fone' => 'required',
        'endereco' => 'required',
    ];
    //Regras apenas para alteração de dados através do portal do cliente
    static $rules_alt = [        
        'senha' => 'required|min:10',
        'nome' => 'required',
        'fone' => 'required',
        'endereco' => 'required',
    ];
    
    //Regras para recuperar senha
    static $rules_res_p = [        
        'login' => 'required',        
        'email' => 'required|email',
        'cpf' => 'required|cpf',    
    ];
    //Regras para Login
    static $rules_login = [
        'login' => 'required|exists:admin',
        'senha' => 'required',
    ];
    
    //Regras para alteração de senha de contas não ativadas
    static $rules_res = [
        'login' => 'required|exists:cliente',
        'senha_old' => 'required',
        'senha_new' => 'required|min:10',
    ];
    
    static $messages = [
        'login.required' => 'Informe o seu Login.',
        'login.unique' => 'Já existe um usuário com este login',
        'email.unique' => 'Já existe um cadastro vinculado a este e-mail',
        'senha.required' => 'Informe a sua Senha.',
        'nome.required' => 'Informe o seu Nome.',
        'email.required' => 'Informe o seu e-mail.',
        'cpf.required' => 'Informe o CPF.',
        'cpf.cpf' => 'O CPF informado não é válido',
        'fone.required' => 'Informe o telefone.',
        'login.exists' => '',
        'senha.exists' => 'Login ou senha incorreta!',
        'senha.min' =>'A senha deve ter no mínimo 10 dígitos',
        'senha_new.min' =>'A senha deve ter no mínimo 10 dígitos',
        'senha_new.required' => 'Informe a sua nova senha.',
        'endereco.required' => 'Informe o endereço.',
    ];

}
