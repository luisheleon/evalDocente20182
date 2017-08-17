<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPoliticadescripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('politicadescrip', function (Blueprint $table) {
            $table->integer('politica_id')->unsigned();
            $table->integer('factor_id')->unsigned();
            $table->integer('criterio_id')->unsigned();
            $table->integer('pregunta_id')->unsigned();
            $table->integer('actor_id')->unsigned();
            $table->timestamps();
            $table->primary(['politica_id','factor_id','criterio_id','pregunta_id','actor_id'],'primaryKeyPolitDescrip');
            $table->foreign('politica_id')->references('id')->on('politicaevaluacion');
            $table->foreign('factor_id')->references('id')->on('factores');
            $table->foreign('criterio_id')->references('id')->on('criterios');
            $table->foreign('pregunta_id')->references('id')->on('preguntas');
            $table->foreign('actor_id')->references('id')->on('actores');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('politicadescrip');
    }
}
