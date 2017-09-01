<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criterios extends Model
{
    //
    protected $table = "criterios";
    protected  $fillable = ['criterio','estado'];

    public function politicaDes()
    {
        return $this->hasMany('App\PoliticaDes');
    }
}
