<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');//nome fantasia
            $table->string('razao');//razão social
            $table->string('cnpj');
            $table->string('ie');//inscrição estadual
            $table->string('email');
            $table->string('bairro');
            $table->integer('numero')->unsigned();
            $table->string('complemento');
            $table->string('cep');
            $table->string('cidade');
            $table->string('estado');
            $table->string('telefone');
            $table->integer('cliente_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cliente_id', 'empresa_fk_cliente')
                ->references('id')
                ->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresas',function (Blueprint $table) {
            $table->dropForeign('empresa_fk_cliente');
        });
        Schema::dropIfExists('empresas');
    }
}
