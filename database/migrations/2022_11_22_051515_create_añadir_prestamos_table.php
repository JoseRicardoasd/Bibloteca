<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAñadirPrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('añadir_prestamos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_libro');
            $table->string('autor');
            $table->string('cantidad');
            $table->string('nombreUsuario');
            $table->integer('clave_biblioteca');
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
        //
    }
}
