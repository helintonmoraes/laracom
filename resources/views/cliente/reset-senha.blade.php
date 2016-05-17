@extends('loja.layouts.master')
@section('content')

<div class="main" style="margin-left:34%;">
    <div class="content">

                        
        <div class="section group">
            <div class="col span_2_of_3">
                <div class="contact-form">
                    
                    {{Form::open(['url' => "/reset-senha",'class'=>'add-cart'])}}
                    <div>    
                            <h2>Redefinição de Senha</h2>
                    </div>
                    <div>
                        <span><label>Login</label></span>
                        <span>{{Form::text('login', isset($cliente->login)? $cliente->login:null)}}</span>
                        <p class="text-danger">{!! $errors->first('login') !!}</p>
                    </div>

                    <div>
                        <span><label>E-mail</label></span>
                        <span>{{Form::text('email', isset($cliente->email)? $cliente->email:null)}}</span>
                        <p class="text-danger">{!! $errors->first('email') !!}</p>
                    </div>

                    <div>
                        <span><label>CPF</label></span>
                        <span>{{Form::text('cpf', isset($cliente->cpf)? $cliente->cpf:null,['maxlength'=>11])}}</span>
                        <p class="text-danger">{!! $errors->first('cpf') !!}</p>
                        @if(Session::has('reset_fail'))
                        <p text-align="center" class="text-danger">{!! session('reset_fail') !!}</p>
                        @endif
                       
                    </div>
  
                    <div>
                       <h4><button type="submit" class="add-cart">Redefinir Senha</button></h4>
                       <h4><button onclick="window.location.href='/cliente/'" type="button" class="add-cart">Voltar</button></h4>
                    </div>
                    {{Form::close()}}
                     
                </div>
            </div>
            
        </div>		
    </div> 
</div>


@endsection

