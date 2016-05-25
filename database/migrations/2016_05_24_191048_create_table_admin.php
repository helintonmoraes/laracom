<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login');
            $table->string('senha');            
            $table->string('nome');           
            $table->string('email');
            $table->string('cpf');
            $table->string('endereco');
            $table->string('fone');
            $table->boolean('ativacao'); //FALSE senha deve ser alterada
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
        Schema::dropIfExists('admin');
    }
}
