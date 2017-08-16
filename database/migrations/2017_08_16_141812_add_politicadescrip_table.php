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
            $table->integer('politica_id');
            $table->integer('factor_id');
            $table->integer('criterio_id');
            $table->integer('pregunta_id');
            $table->integer('actor_id');
            $table->timestamps();
            $table->primary(['politica_id','factor_id','criterio_id','pregunta_id','actor_id'],'primaryKeyPolitDescrip');
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
