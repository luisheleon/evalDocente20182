<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaEstudiante extends Model
{
    //
    protected $table = 'estudiante_materias';
    protected $fillable =['estudiante_id','materia_id'];
}
