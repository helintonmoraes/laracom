@extends('painel.layouts.master')
@extends('painel.layouts.menu')
@section('content')

<div class="row" >
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Dados do Administrador</h3>
            </div>
            <div class="panel-body" >
                <div class="row">
                    <div class="col-lg-6">
                        @if(isset($dados))
                        {{Form::open(['url' => "painel/editar-dados-adm"])}}
                        @else
                        {{Form::open(['url' => 'painel/adicionar-admin'])}}
                        @endif

                        <div class="form-group">
                            <label>Nome</label>
                            {{Form::text('nome', isset($dados->nome)? $dados->nome:null, ['class' => 'form-control'])}}                          
                            @if($errors->has('nome'))                  
                            <p class="text-danger">{!! $errors->first('nome') !!}</p>
                            @endif                    
                        </div>
                        
                        <div class="form-group">
                            <label>Login</label>
                            {{Form::text('login', isset($dados->login)? $dados->login:null, ['disabled'=>'true','class' => 'form-control'])}}                          
                            @if($errors->has('login'))                  
                            <p class="text-danger">{!! $errors->first('login') !!}</p>
                            @endif                    
                        </div>

                        <div class="form-group">
                            <label>Senha</label>
                            {{Form::password('senha',['class' => 'form-control'])}}                          
                            @if($errors->has('senha'))                  
                            <p class="text-danger">{!! $errors->first('senha') !!}</p>
                            @endif                    
                        </div>
                        
                        <div class="form-group">
                            <label>E-mail</label>
                            {{Form::text('email', isset($dados->email)? $dados->email:null, ['disabled'=>'true','class' => 'form-control'])}}                          
                            @if($errors->has('email'))                  
                            <p class="text-danger">{!! $errors->first('email') !!}</p>
                            @endif                    
                        </div>
                        
                        <div class="form-group">
                            <label>CPF</label>
                            {{Form::text('cpf', isset($dados->cpf)? $dados->cpf:null, ['disabled'=>'true','class' => 'form-control'])}}                          
                            @if($errors->has('cpf'))                  
                            <p class="text-danger">{!! $errors->first('cpf') !!}</p>
                            @endif                    
                        </div>
                        
                        <div class="form-group">
                            <label>Fone</label>
                            {{Form::text('fone', isset($dados->fone)? $dados->fone:null, ['class' => 'form-control'])}}                          
                            @if($errors->has('fone'))                  
                            <p class="text-danger">{!! $errors->first('fone') !!}</p>
                            @endif                    
                        </div>
                        
                        <div class="form-group">
                            <label>Endereço</label>
                            {{Form::text('endereco', isset($dados->endereco)? $dados->endereco:null, ['class' => 'form-control'])}}                          
                            @if($errors->has('endereco'))                  
                            <p class="text-danger">{!! $errors->first('endereco') !!}</p>
                            @endif                    
                        </div>


                        <button type="submit" class="btn btn-default">Atualizar Registro</button>
                        <button type="reset" class="btn btn-default">Limpar</button>

                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

