<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaDocente extends Model
{
    //
    protected $table = 'docente_materias';
    protected $fillable = ['docente_id','materia_id'];
}
