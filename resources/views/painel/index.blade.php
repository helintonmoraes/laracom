@extends('painel.layouts.master')
@section('content')
@extends('painel.layouts.menu')
<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-comments fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{$contatos->total()}}</div>
                    <div>Contatos!</div>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer">
                <a href="{{url('painel/contatos')}}"> <span class="pull-left">Ver detalhes</span></a>
                <a href="{{url('painel/contatos')}}"> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                     <i class="fa fa fa-tags fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{$produtos->total()}}</div>
                    <div>Produtos!</div>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer">
                <a href="{{url('painel/produto')}}"> <span class="pull-left">Ver detalhes</span></a>
                <a href="{{url('painel/produto')}}"> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>


<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                     <i class="fa fa-shopping-cart fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{$pedidos}}</div>
                    <div>Pedidos!</div>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer">
                <a href="{{url('pedido')}}"> <span class="pull-left">Ver detalhes</span></a>
                <a href="{{url('pedido')}}"> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                      <i class="fa fa-camera-retro fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{$categorias->total()}}</div>
                    <div>Categorias!</div>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer">
                <a href="{{url('painel/categoria')}}"> <span class="pull-left">Ver detalhes</span></a>
                <a href="{{url('painel/categoria')}}"> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                      <i class="fa fa fa-users fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{$clientes->total()}}</div>
                    <div>Clientes!</div>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer">
                <a href="{{url('painel/clientes')}}"> <span class="pull-left">Ver detalhes</span></a>
                <a href="{{url('painel/clientes')}}"> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                      <i class="fa fa-cubes fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{$total}}</div>
                    <div>Estoque!</div>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer">
                <a href="{{url('painel/estoque/0')}}"> <span class="pull-left">Ver detalhes</span></a>
                <a href="{{url('painel/estoque/0')}}"> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>

@endsection