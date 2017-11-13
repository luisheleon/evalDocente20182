<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    //
    protected $table = 'materias';
    protected $fillable = ['codmateria','nombre','sede_id'];
}
