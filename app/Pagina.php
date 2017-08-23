<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    //
    protected $table = "paginas";
    protected  $fillable = ['nombrepag','nombrepag','orden','url'];

    public function modulo()
    {
        return $this->belongsTo('App\Modulo');
    }

    public function funcionalidad()
    {
        return $this->hasMany('App\Funcionalidad');
    }
}
