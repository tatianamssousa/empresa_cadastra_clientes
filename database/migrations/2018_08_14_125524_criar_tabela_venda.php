<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaVenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('produto_id')->unsigned();
            $table->integer('quantidade')->unsigned();
            $table->string('valor');
            $table->integer('formaDePagamento_id')->unsigned();
            $table->string('vencimento');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cliente_id', 'venda_fk_cliente')
                ->references('id')
                ->on('clientes');
            $table->foreign('produto_id', 'venda_fk_produto')
                ->references('id')
                ->on('produtos');
            $table->foreign('formaDePagamento_id', 'venda_fk_formaDePagamento')
                ->references('id')
                ->on('formasDePagamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendas', function (Blueprint $table){
            $table->dropForeign('venda_fk_cliente');
            $table->dropForeign('venda_fk_produto');
            $table->dropForeign('venda_fk_formaDePagamento');
        });
        Schema::dropIfExists('vendas');
    }
}
