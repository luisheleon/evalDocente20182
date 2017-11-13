<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evaluador')->unsigned();
            $table->integer('evaluado')->unsigned();
            $table->integer('materia_id')->unsigned();
            $table->integer('pregunta_id')->unsigned();
            $table->integer('categoriacalificacion_id')->unsigned();
            $table->integer('periodo')->unsigned();
            $table->integer('sede_id')->unsigned();
            $table->integer('actor_id')->unsigned();
            $table->integer('evaluacion_id')->unsigned();
            $table->integer('actor_id')->unsigned();
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
        Schema::dropIfExists('respuestas');
    }
}
