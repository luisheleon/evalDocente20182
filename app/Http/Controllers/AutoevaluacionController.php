<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Evaluacion;
use App\Respuestas;
use Illuminate\Support\Facades\DB;

class AutoevaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        if(session()->get('modulos') == null)
        {
            return redirect()->route('indexHome');
        }




        $evaluacion = Evaluacion::where('estado',1)
            ->where('actor_id','2')
            ->select('periodo','id','sede_id')
            ->get()
            ->toArray();


        if(count($evaluacion) <= 0)
        {
            $periodo = null;
            $idEval = null;
            $sede = null;

        }
        else
        {
            $periodo = $evaluacion[0]['periodo'];
            $idEval = $evaluacion[0]['id'];
            $sede = $evaluacion[0]['sede_id'];

        }


        $respuestas = Respuestas::where('evaluado',Auth::user()->id)
            ->where('evaluador',Auth::user()->id)
            ->where('evaluacion_id',$idEval)
            ->get()
            ->toArray();



        //identifica si ya tiene respuestas
        $respuestasActivas = 0;
        if(count($respuestas) > 0)
        {
            $respuestasActivas = 1;
        }



        $categoriaCalif = DB::table('evaluacion as e')
            ->join('categoriacalif as cc','cc.id','=','e.categoriacalif_id')
            ->join('categoriades as cd','cd.categoriacalif_id','=','cc.id')
            ->where('e.id',$idEval)
            ->select('cd.*')
            ->get();




        $preguntas = DB::table('evaluacion as e')
            ->join('politicaevaluacion as pe','pe.id','=','e.politica_id')
            ->join('politicadescrip as pd','pd.politica_id','=','pe.id')
            ->join('preguntas as p','p.id','=','pd.pregunta_id')
            ->where('e.id',$idEval)
            ->where('pd.actor_id',2)
            ->where('p.estado','1')
            ->select('p.id','p.pregunta')
            ->orderBy('pd.politica_id')
            ->get();




        return view('admin.autoevaluacion',['preguntasTotal'=>$preguntas,
            'categoriaCalif'=>$categoriaCalif,
            'evaluacion'=>$evaluacion,
            'periodo' => $periodo,
            'idEval' => $idEval,
            'sede' => $sede,
            'respuestasActivas' => $respuestasActivas
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        foreach($request->cal as $pregKey => $pregVal)
        {
            $dataRespuesta = new Respuestas();

            $dataRespuesta->evaluador = Auth::user()->id;
            $dataRespuesta->evaluado = $request->docente_id;
            $dataRespuesta->materia_id = $request->materia_id;
            $dataRespuesta->pregunta_id = $pregKey;
            $dataRespuesta->categoriacalif_id = $pregVal;
            $dataRespuesta->periodo = $request->periodo;
            $dataRespuesta->sede_id = $request->sede_id;
            $dataRespuesta->evaluacion_id = $request->evaluacion_id;
            $dataRespuesta->actor_id = $request->actor_id;

            $dataRespuesta->save();
        }



        session()->flash('msn','Se ha guradado la evaluación correctamente');
        return redirect()->route('docente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
