<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoliticaDes extends Model
{
    //
    protected $table = 'politicadescrip';
    protected $fillable = ['politica_id','factor_id','criterio_id','pregunta_id','actor_id','indicador_id'];

    public function politica()
    {
        return $this->belongsTo('App\Politica');
    }

    public function factor()
    {
        return $this->belongsTo('App\Factor');
    }

    public function criterio()
    {
        return $this->belongsTo('App\Criterio');
    }

    public function pregunta()
    {
        return $this->belongsTo('App\Pregunta');
    }

    public function actor()
    {
        return $this->belongsTo('App\Actor');
    }

    public function indicador()
    {
        return $this->belongsTo('App\Indicador');
    }
}
