<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadFotoBebidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_foto_bebidas', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('path');
            $table->unsignedBigInteger('bebida_id');
            $table->foreign('bebida_id')->references('id')->on('bebidas')->onDelete('cascade');
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
        Schema::dropIfExists('upload_foto_bebidas');
    }
}
