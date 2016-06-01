<?php

namespace Laracom\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model {

    protected $table = 'produto';

    static $rules = [
            'id_categoria'=>'required',
            'id_subcategoria'=>'required',
            'nome' => 'required|min:3|max:100',
            'preco_venda' => 'required|min:3|max:100',
            'descricao' => 'required',
            'especificacao' => 'required',
            'resumo' => 'required',
            'imagem_1'=>'mimes:jpeg,bmp,png|required',
            
        ];
    static $messages = [
            'nome.required'            => 'Informe o nome do produto.',
            'descricao.required'       => 'Informe a descrição do produto.',
            'resumo.required'          => 'Informe o resumo do produto.',
            'especificao.required'     => 'Informe a especificação do produto.',
            'preco_venda.required'     => 'Informe o preço do produto.', 
            'id_categoria.required'    => 'Escolha um categoria',
            'id_subcategoria.required' => 'Escolha uma subcategoria',
            'imagem_1.required'        => 'A imagem de capa é obrigatória',
            'imagem_1.mimes'        => 'A imagem da capa deve conter um arquivo do tipo: jpeg, bmp, png.',
];
    
    
}

