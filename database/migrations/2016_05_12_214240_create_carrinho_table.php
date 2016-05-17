<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrinhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('carrinhos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_pedido');
            $table->integer('id_produto'); 
            $table->float('preco_venda');
            $table->integer('qty'); //Quantidade
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('carrinhos');
    }
}
