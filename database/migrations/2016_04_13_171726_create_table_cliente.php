<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login');
            $table->string('senha');            
            $table->string('nome');           
            $table->string('email');
            $table->string('cpf');
            $table->string('endereco');
            $table->string('fone');
            $table->boolean('ativacao'); //FALSE senha deve ser alterada
            $table->float('saldo_pontos');  //Pontos do Cartão Fidelidade
            $table->float('pontos_usados'); //Pontos do Cartão Fidelidade
            $table->float('pontos_total');  //Pontos do Cartão Fidelidade
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
        Schema::dropIfExists('cliente');
    }
}
