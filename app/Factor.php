<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    //
    protected $table = "factores";
    protected  $fillable = ['factor','estado'];

    public function politicaDes()
    {
        return $this->hasMany('App\PoliticaDes');
    }
}
