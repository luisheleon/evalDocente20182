<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaCalif extends Model
{
    //
    protected $table = "categoriacalif";
    protected  $fillable = ['nomcategoria','estado','sede'];
}
