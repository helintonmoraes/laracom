<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('external_reference');
            $table->string('pref_id');
            $table->string('status');
            $table->string('entrega');           
            $table->string('data_pedido');
            $table->string('hora_pedido');
            $table->integer('id_cliente');
            $table->float('valor_pedido'); //Valor do Pedido sem os descontos
            $table->float('cartao_desconto'); //Valor dos desconto
            $table->float('valor_total'); //Valor total com os descontos
            $table->boolean('boleto_emitido');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
