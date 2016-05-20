<?php

namespace Laracom\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Carrinho extends Model
{
    public function scopeTotalPorProduto($query) {
        $query->select('id_produto', 
                DB::raw('count(id_produto) as qtde'))
                ->groupBy('id_produto');
    }
}
