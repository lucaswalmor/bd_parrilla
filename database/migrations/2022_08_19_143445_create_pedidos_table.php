<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_cliente');
            $table->string('cpf');
            $table->string('rua');
            $table->string('bairro');
            $table->string('apartamento')->nullable();
            $table->string('bloco')->nullable();
            $table->string('telefone');
            $table->string('lanche');
            $table->string('observacoes')->nullable();
            $table->double('valor_total');
            $table->string('troco')->nullable();
            $table->string('forma_pagamento');
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
