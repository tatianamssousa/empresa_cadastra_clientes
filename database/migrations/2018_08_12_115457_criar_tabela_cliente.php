<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('nome');
            $table->string('cpf');
            $table->string('nascimento');
            $table->string('email');
            $table->string('logradouro');
            $table->string('bairro');
            $table->integer('numero')->unsigned();
            $table->string('complemento');
            $table->string('cep');
            $table->string('cidade');
            $table->string('estado');
            $table->string('nacionalidade');
            $table->string('naturalidade');
            $table->string('telefone');
            $table->string('celular');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
