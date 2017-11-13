<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuestas extends Model
{
    //
    protected $table = 'respuestas';
    protected $fillable = ['evaluado','evaluador','materia_id','pregunta_id', 'categoriacalif_id','periodo','sede_id','evaluacion_id','actor_id'];
}
