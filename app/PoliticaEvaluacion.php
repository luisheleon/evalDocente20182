<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoliticaEvaluacion extends Model
{
    //
    protected $table = "politicaevaluacion";
    protected  $fillable = ['nompolitica','estado','sede'];
}
