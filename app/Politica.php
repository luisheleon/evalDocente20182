<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Politica extends Model
{
    //
    protected $table = 'politicaevaluacion';
    protected $fillable = ['nompolitica','estado','sede_id'];

    public function sede()
    {
        return $this->belongsTo('App\Sede');
    }

    public function politicaDes()
    {
        return $this->hasMany('App\PoliticaDes');
    }
}
