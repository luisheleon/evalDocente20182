<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoriadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoriades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoriacalif_id')->unsigned();
            $table->string('nombre','255')->unique();
            $table->integer('valor')->unique();
            $table->string('descripcion','255');
            $table->timestamps();
            $table->foreign('categoriacalif_id')->references('id')->on('categoriacalif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoriades');
    }
}
