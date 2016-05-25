@extends('painel.layouts.login')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align:center;">Painel Administrativo</h3>
                    </div>
                    <div class="panel-body">
                        {{Form::open(['url' => "login/autenticar-admin"])}}
                            
                                <div class="form-group">
                                    
                                    <input class="form-control" placeholder="Login" name="login" type="text" autofocus>
                                    @if($errors->has('login'))                  
                                         <p class="text-danger">{!! $errors->first('login') !!}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="senha" type="password">
                                    @if($errors->has('senha'))                  
                                         <p class="text-danger">{!! $errors->first('senha') !!}</p>
                                    @endif
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Logar</button>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection