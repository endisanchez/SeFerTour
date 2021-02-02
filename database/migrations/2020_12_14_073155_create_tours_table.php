<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tours', function (Blueprint $table) {
          $table->id();
          $table->string('nombre');
          $table->date('fecha');
          $table->string('hora');
          $table->string('comunidad');
          $table->string('provincia');
          $table->string('ciudad');
          $table->string('direccion');
          $table->string('idioma_tour');
          $table->string('latitud')->nullable();;
          $table->string('longitud')->nullable();;
          $table->unsignedBigInteger('id_guia');
          $table->timestamp('created_at')->nullable();
          $table->timestamp('updated_at')->nullable();
          $table->foreign('id_guia')->references('id')->on('guias')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
