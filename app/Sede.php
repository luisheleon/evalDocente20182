<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    //
    protected $table = "sedes";
    protected  $fillable = ['sede'];

    public function perfil()
    {
        return $this->hasMany('App\Perfil');
    }

    public function evaluacion()
    {
        return $this->hasMany('App\Evaluacion');
    }

}
