<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilFuncionalidad extends Model
{
    //
    protected $table = "modulos";
    protected  $fillable = ['perfil_id','funcionalidad_id'];

}
