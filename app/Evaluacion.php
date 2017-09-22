<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    //
    protected $table = 'evaluacion';
    protected $fillable = ['politica_id','categoriacalif_id','periodo','nombre','fecha_inicio','fecha_final','estado','sede_id'];


    public function politica()
    {
        return $this->hasMany('App\Politica');
    }

    public function categoriaCalif()
    {
        return $this->hasMany('App\CategoriaCalif');
    }

    public function sede()
    {
        return $this->hasMany('App\Sede');
    }

}
