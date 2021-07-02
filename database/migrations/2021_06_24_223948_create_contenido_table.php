<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenido', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('nombre_guardado');
            $table->string('tipo');
            $table->string('estado');
            $table->float('precio');
            $table->foreignId('id_descuento')->constrained('descuento');
            $table->foreignId('id_cateogoria')->constrained('categoria');
            $table->foreignId('id_autor')->constrained('autor');
            $table->integer('puntuacion')->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenido');
    }
}
