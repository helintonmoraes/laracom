@extends('loja.layouts.master')

@section('content')

    <div style="background-repeat: no-repeat;background-position: 150px 100px; background-image:url('{{URL::asset('loja/images/icons/cadeado.png')}}')"class="content">
       
          
                <div style="border-radius:15px;background-color: #ffffff" class="login-form">
                    <h2>Autenticação</h2>
                    {{Form::open(['url' => "login/autenticar"])}}
                    <div>
                        <span><label>Login</label></span>
                        <span><input name="login" type="text" class="textbox" ></span>
                        @if($errors->has('login'))                  
                           <p class="text-danger">{!! $errors->first('login') !!}</p>
                        @endif 
                    </div>
                    <div>
                        <span><label>Senha</label></span>
                        <span><input name="senha" type="password" class="textbox"></span>
                        @if($errors->has('senha'))                  
                           <p class="text-danger">{!! $errors->first('senha') !!}</p>
                        @endif 
                    </div>

                    <div>
                        
                        <span><input type="submit" value="Logar"></span>
                        <a href="/facebook/redirect">FB Login</a>

                        <div id="status">
                        </div>
                    </div>
                        
                    {{Form::close()}}
                     <a style="display:block;margin-left:100px;"href="/reset-senha">Esqueci minha senha!</a><a style="display:block;margin-left:100px;"href="/registro">Não Tenho Cadastro!</a>
                </div>

@endsection

