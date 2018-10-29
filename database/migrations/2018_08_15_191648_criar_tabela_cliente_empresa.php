<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaClienteEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('empresa_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cliente_id', 'cliente_empresa_fk_cliente')
                ->references('id')
                ->on('clientes');
            $table->foreign('empresa_id', 'cliente_empresa_fk_empresa')
                ->references('id')
                ->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cliente_empresas',function (Blueprint $table) {
            $table->dropForeign('cliente_empresa_fk_cliente');
            $table->dropForeign('cliente_empresa_fk_empresa');
        });
        Schema::dropIfExists('cliente_empresas');
    }
}
