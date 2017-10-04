<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Politica extends Model
{
    //
    protected $table = 'politicaevaluacion';
    protected $fillable = ['nompolitica','estado'];

    public function politicaDes()
    {
        return $this->hasMany('App\PoliticaDes');
    }

    public function evaluacion()
    {
        return $this->hasMany('App\Evaluacion');
    }
}
