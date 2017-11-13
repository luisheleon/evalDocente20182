<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstudianteMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante_materias', function (Blueprint $table) {
            $table->integer('estudiante_id');
            $table->integer('materia_id');
            $table->integer('periodo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.sssssssss
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiante_materias');
    }
}
