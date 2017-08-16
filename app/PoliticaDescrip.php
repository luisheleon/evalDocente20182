<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoliticaDescrip extends Model
{
    //
    protected $table = "politicadescrip";
    protected  $fillable = ['politica_id','factor_id','criterio_id','pregunta_id','actor_id'];
}
