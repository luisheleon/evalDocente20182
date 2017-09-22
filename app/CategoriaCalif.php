<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaCalif extends Model
{
    //
    protected $table = "categoriacalif";
    protected  $fillable = ['nomcategoria','estado'];

    public function categoriaDes()
    {
        return $this->belongsTo('App\CategoriaDes');
    }

    public function evaluacion()
    {
        return $this->belongsTo('App\Evaluacion');
    }
}
