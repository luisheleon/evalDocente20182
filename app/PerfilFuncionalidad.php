<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilFuncionalidad extends Model
{
    //
    protected $table = "perfilfuncionalidad";
    protected  $fillable = ['perfil_id','funcionalidad_id'];

    public function perfil()
    {
        return $this->belongsTo('App\Perfil');
    }

    public function funcionalidad()
    {
        return $this->belongsTo('App\Funcionalidad');
    }
}
