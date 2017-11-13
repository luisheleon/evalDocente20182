<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DecanoFaltad extends Model
{
    //
    protected $table = 'decanofacultad';
    protected $fillable = ['decano_id','facultad_id'];
}
