<?php

namespace App\Http\Controllers;

use App\Evaluacion;
use App\MateriaEstudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Respuestas;

class MateriaEstudianteController extends Controller
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
            ->where('actor_id','1')
            ->select('periodo','id')
            ->get()
            ->toArray();


        if(count($evaluacion) <= 0)
        {
            $periodo = null;
            $idEval = null;

        }
        else
        {
            $periodo = $evaluacion[0]['periodo'];
            $idEval = $evaluacion[0]['id'];
        }

        $materiasEstuidante =  DB::table('estudiante_materias as e')
            ->join('users as u','u.id','=','e.estudiante_id')
            ->join('materias as m','m.id','=','e.materia_id')
            ->join('docente_materias as d','d.materia_id','=','m.id')
            ->join('users as h','d.docente_id','=','h.id')
            ->select('m.nombre as nommateria','m.codmateria','e.periodo','h.nombre','h.apellidos','d.docente_id')
            ->where('u.id',Auth::user()->id)
            ->where('e.periodo',$periodo)
            ->get();

        $docentes =  DB::table('estudiante_materias as e')
            ->join('users as u','u.id','=','e.estudiante_id')
            ->join('materias as m','m.id','=','e.materia_id')
            ->join('docente_materias as d','d.materia_id','=','m.id')
            ->select('d.docente_id')
            ->where('u.id',Auth::user()->id)
            ->where('e.periodo',$periodo)
            ->groupBy('d.docente_id')
            ->pluck('d.docente_id');


        $dataRespuesta = Respuestas::where('evaluador', Auth::user()->id)
            ->whereIn('evaluado', $docentes)
            ->where('periodo',$periodo)
            ->where('evaluacion_id',$idEval)
            ->where('actor_id',1)
            ->groupBy('materia_id')
            ->pluck('materia_id')
            ->toArray();





        return view('admin.materiaestudiante')->with(['materiasEstuidante'=>$materiasEstuidante,
            'routeView'=>'materiaestudiante.index',
            'msnError'=>'materiaestudiante.index',
            'docentes'=>$docentes,
            'dataRespuesta'=>$dataRespuesta,
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
        return redirect()->route('materiaestudiante.index');
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


    public function preguntas(Request $request)
    {

        //
        if(session()->get('modulos') == null)
        {
            return redirect()->route('indexHome');
        }

        $evaluacion = Evaluacion::find($request->idEval);

        $respuestas = Respuestas::where('evaluado',$request->docente_id)
            ->where('evaluador',Auth::user()->id)
            ->where('materia_id',$request->materia_id)
            ->where('evaluacion_id',$evaluacion->id)
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
            ->where('pd.actor_id',1)
            ->where('p.estado','1')
            ->select('p.id','p.pregunta')
            ->orderBy('pd.politica_id')
            ->get();


        return view('admin.evaluacionDocente',['preguntasTotal'=>$preguntas,
            'datosBasicos'=>$request,
            'categoriaCalif'=>$categoriaCalif,
            'evaluacion'=>$evaluacion,
            'dataInstrumentoDoc'=>''


        ]);


    }
}
