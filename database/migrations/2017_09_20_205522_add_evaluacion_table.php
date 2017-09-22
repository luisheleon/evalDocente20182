<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEvaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('politica_id')->unique();
            $table->integer('categoriacalif_id')->unique();
            $table->string('periodo',255);
            $table->string('nombre',255);
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_final');
            $table->integer('estado');
            $table->integer('sede_id')->unique();
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
        Schema::dropIfExists('evaluacion');
    }
}

