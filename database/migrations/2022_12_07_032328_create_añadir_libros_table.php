<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAñadirLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('añadir_libros', function (Blueprint $table) {
            $table->id();
            $table->string('autor');
            $table->string('ombre');
            $table->string('editorial');
            $table->string('lugarPublicacion');
            $table->integer('añoPublicacion');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('añadir_categorias')->onDelete('cascade');
            $table->string('pdf');
            $table->string('imagen');


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
        Schema::dropIfExists('añadir_libros');
    }
}
