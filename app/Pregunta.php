<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    //
    protected $table = "preguntas";
    protected  $fillable = ['pregunta','estado'];
}
