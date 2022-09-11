<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanchePedidosTable extends Migration
{
    public function up()
    {
        Schema::create('lanche_pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedido_id');
            $table->string('lanche_id');
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->string('nome');
            $table->string('observacoes')->nullable();
            $table->double('preco');
            $table->string('ingredientes');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('lanche_pedidos');
    }
}
