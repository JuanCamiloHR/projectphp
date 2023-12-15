<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Método id. Es un campo en sql server

            $table->unsignedBigInteger('user_id'); //Este campo solo acepta números positivos, enteros
            $table->foreign('user_id')->references('id')->on('users');// Para crear la relación con la tabla de USERS

            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');

            $table->timestamps(); //Método de fechas. Crea dis campos en sql server. Creación y actualización.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};