<?php

namespace App\Http\Controllers;

use App\DecanoFaltad;
use App\Respuestas;
use Illuminate\Http\Request;
use App\Evaluacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DecanoDocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //retorna al inicio para carga el menu en la sesión
        if(session()->get('modulos') == null)
        {
            return redirect()->route('indexHome');
        }


        $evaluacion = Evaluacion::where('estado',1)
            ->where('actor_id','3')
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

        $facultadDocente = DecanoFaltad::where('decano_id',Auth::user()->id)->get()->toArray();



        $docentes = DB::table('materias as m')
            ->join('facultad as f','m.facultad_id','=','f.id')
            ->join('docente_materias as dm','dm.materia_id','=','m.id')
            ->join('users as u','u.id','=','dm.docente_id')
            ->where('f.id',$facultadDocente[0]['facultad_id'])
            ->select('u.nombre','u.apellidos','u.id')
            ->groupBy('u.nombre')
            ->groupBy('u.apellidos')
            ->groupBy('u.id')
            ->get();


        $docentesRespuesta = DB::table('respuestas as r')
            ->where('r.evaluador',Auth::user()->id)
            ->where('r.actor_id','3')
            ->where('r.periodo',$periodo)
            ->where('r.sede_id',$sede)
            ->where('r.evaluacion_id',$idEval)
            ->select('r.evaluado')
            ->pluck('r.evaluado')
            ->toArray();


        return view('admin.decanodocente')->with(['docentes'=>$docentes,
            'docentes'=>$docentes,
            'dataRespuesta'=>$docentesRespuesta,
            'periodo'=>$periodo,
            'idEval' => $idEval
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
        return redirect()->route('decanodocente.index');


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
    public function destroy()
    {
        //
    }

    public function preguntaDecano(Request $request)
    {
        if(session()->get('modulos') == null)
        {
            return redirect()->route('indexHome');
        }

        $evaluacion = Evaluacion::find($request->idEval);

        $respuestas = Respuestas::where('evaluado',$request->docente_id)
            ->where('evaluador',Auth::user()->id)
            ->where('evaluacion_id',$request->idEval)
            ->get()
            ->toArray();

        if(count($respuestas) > 0)
        {
            return redirect()->route('materiaestudiante.index');
        }

        $categoriaCalif = DB::table('evaluacion as e')
            ->join('categoriacalif as cc','cc.id','=','e.categoriacalif_id')
            ->join('categoriades as cd','cd.categoriacalif_id','=','cc.id')
            ->where('e.id',$request->idEval)
            ->select('cd.*')
            ->get();


        $preguntas = DB::table('evaluacion as e')
            ->join('politicaevaluacion as pe','pe.id','=','e.politica_id')
            ->join('politicadescrip as pd','pd.politica_id','=','pe.id')
            ->join('preguntas as p','p.id','=','pd.pregunta_id')
            ->where('e.id',$request->idEval)
            ->where('pd.actor_id',3)
            ->where('p.estado','1')
            ->select('p.id','p.pregunta')
            ->orderBy('pd.politica_id')
            ->get();




        return view('admin.evaluacionDocenteDecano',['preguntasTotal'=>$preguntas,
            'datosBasicos'=>$request,
            'categoriaCalif'=>$categoriaCalif,
            'evaluacion'=>$evaluacion,
            'dataInstrumentoDoc'=>''


        ]);

    }
}
