<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaDes extends Model
{
    //
    protected $table = 'categoriades';
    protected $fillable = ['categoriacalif_id','nombre','valor','descripcion'];

    public function categoriaCalif()
    {
        return $this->hasMany('App\CategoriaCalif');
    }
}
