<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    //
    protected $table = "perfiles";
    protected  $fillable = ['perfil','sede_id'];

    public function perfilfun()
    {
        return $this->hasMany('App\PerfilFuncionalidad');
    }

    public function sede()
    {
        return $this->belongsTo('App\Sede');
    }

}
