@extends('loja.layouts.master')
@section('content')

<div class="main" style="margin-left:34%;">
    <div class="content">
        <div class="section group">
            <div class="col span_2_of_3">
                <div class="contact-form">  
                   
                        
                    {{Form::open(['url' => "cliente/finalizar",'class'=>'add-cart'])}}
                    <div>

                        <h2>Finalizar Cadastro</h2>
                        
                        <span><label>Nome</label></span>
                        <span>{{Form::text('nome', isset($cliente->nome)? $cliente->nome:null)}}</span>
                        <p class="text-danger">{!! $errors->first('nome') !!}</p>
                        
                    </div>
                    <div>
                        <span><label>Login</label></span>
                        <span>{{Form::text('login', isset($cliente->login)? $cliente->login:null,['disabled'=>true,'style'=>' background-color:#dddddd'])}}</span>
                        <p class="text-danger">{!! $errors->first('login') !!}</p>
                    </div>
                    <div>
                        
                        <span><label>Senha</label></span>
                        <span>{{ Form::password('senha')}}</span>
                        <p class="text-danger">{!! $errors->first('senha') !!}</p>
                    </div>
                    <div>
                        <span><label>E-mail</label></span>
                        <span>{{Form::text('email', isset($cliente->email)? $cliente->email:null,['disabled'=>true,'style'=>' background-color:#dddddd'])}}</span>
                        <p class="text-danger">{!! $errors->first('email') !!}</p>
                    </div>

                    <div>
                        <span><label>CPF</label></span>
                        <span>{{Form::text('cpf', isset($cliente->cpf)? $cliente->cpf:null)}}</span>
                        <p class="text-danger">{!! $errors->first('cpf') !!}</p>
                    </div>
                    
                    <div>
                        <span><label>Fone</label></span>
                        <span>{{Form::text('fone', isset($cliente->fone)? $cliente->fone:null)}}</span>
                        <p class="text-danger">{!! $errors->first('fone') !!}</p>
                    </div>
                    <div>
                        <span><label>Endereço</label></span>
                        
                        <span><span>{{Form::text('endereco', isset($cliente->endereco)? $cliente->endereco:null,['placeholder'=>'Rua XXX, N°, Cidade-UF'])}}</span></span>
                        <p class="text-danger">{!! $errors->first('endereco') !!}</p>
                    </div>
                    <div>
                       <h4><button type="submit" class="add-cart">Finalizar Cadastro</button></h4>
                       <h4><button onclick="window.location.href='/cliente/'" type="button" class="add-cart">Voltar</button></h4>
                    </div>
                    {{Form::close()}}
                     
                </div>
            </div>
            
        </div>		
    </div> 
</div>


@endsection

