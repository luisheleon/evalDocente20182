<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPerfilfuncionalidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfilfuncionalidad', function (Blueprint $table) {
            $table->integer('perfil_id')->unsigned();
            $table->integer('funcionalidad_id')->unsigned();
            $table->timestamps();
            $table->primary(['perfil_id','funcionalidad_id'],'pk_perfilFuncionalidad');
            $table->foreign('perfil_id','fk_perfilFunPer')->references('id')->on('perfiles');
            $table->foreign('funcionalidad_id','fk_perfilFunFun')->references('id')->on('funcionalidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfilfuncionalidad');
    }
}
