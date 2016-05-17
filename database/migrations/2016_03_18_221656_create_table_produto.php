<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduto extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('produto', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nome');
            $table->text('descricao');
            $table->text('especificacao');
            $table->string('resumo');
            $table->string('imagem_1');
            $table->string('imagem_2');
            $table->string('imagem_3');
            $table->string('imagem_4');
            $table->string('imagem_5');
            $table->string('imagem_6');
            $table->integer('qtd_avalicao');
            $table->float('preco_venda');
            $table->integer('qtd_estoque');
            $table->boolean('destaque');
            $table->boolean('lancamento');
            $table->boolean('oferta');
            $table->integer('id_categoria');
            $table->integer('id_subcategoria');
            $table->integer('id_marca');
            $table->integer('cont');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
       
        Schema::dropIfExists('produto');
    }

}
