<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionalidad extends Model
{
    //
    protected $table = "funcionalidades";
    protected  $fillable = ['pagina_id','funcionalidad','nombreboton'];

}
