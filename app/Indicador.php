<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    //
    protected $table = "indicadores";
    protected  $fillable = ['indicador','estado'];
}
