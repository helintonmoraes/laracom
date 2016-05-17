@extends('loja.layouts.master')
@section('content')

<div class="main" style="margin-left:34%;">
    <div class="content">

                        
        <div class="section group">
            <div class="col span_2_of_3">
                <div class="contact-form">
                    
                    {{Form::open(['url' => "login/alt-senha",'class'=>'add-cart'])}}
                    <div>    
                            <h2>Redefinição de Senha</h2>
                    </div>
                    <div>
                        <span><label>Login</label></span>
                        <span>{{Form::text('login', isset($cliente->login)? $cliente->login:null)}}</span>
                        <p class="text-danger">{!! $errors->first('login') !!}</p>
                    </div>

                    <div>
                        <span><label>Senha Atual</label></span>
                        <span>{{Form::password('senha_old')}}</span>
                        <p class="text-danger">{!! $errors->first('senha_old') !!}</p>
                    </div>
                    
                    <div>
                        <span><label>Nova Senha</label></span>
                        <span>{{Form::password('senha_new')}}</span>
                        <p class="text-danger">{!! $errors->first('senha_new') !!}</p>
                        @if(Session::has('alt_fail'))
                        <p text-align="center" class="text-danger">{!! session('alt_fail') !!}</p>
                        @endif
                    </div>

 
                    <div>
                       <h4><button type="submit" class="add-cart">Redefinir Senha</button></h4>                       
                    </div>
                    {{Form::close()}}
                     
                </div>
            </div>
            
        </div>		
    </div> 
</div>


@endsection


