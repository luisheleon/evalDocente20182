<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    //
    protected $table = 'evaluacion';
    protected $fillable = ['politica_id','categoriacalif_id','periodo','nombre','fecha_inicio','fecha_final','estado','sede_id','actor_id'];


    public function politica()
    {
        return $this->belongsTo('App\Politica');
    }

    public function categoriaCalif()
    {
        return $this->belongsTo('App\CategoriaCalif');
    }

    public function sede()
    {
        return $this->belongsTo('App\Sede');
    }

}
