<?php

namespace App\Http\Controllers;

use App\CategoriaCalif;
use App\Evaluacion;
use App\Perfil;
use App\Periodo;
use App\Politica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        setlocale(LC_TIME, 'Espain');
        if(session()->get('modulos') == null)
        {
            return redirect()->route('indexHome');
        }
        $evaluacion = Evaluacion::all();
        $evaluacion->each(function($evaluacion){
            $evaluacion->sede;
            $evaluacion->politica;
            $evaluacion->categoriaCalif;
        });

        $evaluacion = DB::table('evaluacion as e')
            ->join('sedes as s','e.sede_id','=','s.id')
            ->join('politicaevaluacion as p','e.politica_id','=','p.id')
            ->join('categoriacalif as c','e.categoriacalif_id','=','c.id')
            ->join('periodos as pe','e.periodo','=','pe.id')
            ->select('s.sede','p.nompolitica','c.nomcategoria','e.nombre','e.fecha_inicio','e.fecha_final','pe.periodo','e.estado','e.id')
            ->get();

        return view('admin.evaluacion')->with(
            [
                'evaluacion'    =>  $evaluacion,
                'routeView'     =>  'evaluacion.View',
                'msnError'      =>  'evaluacion.Msn'
            ]
        );
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
        $evaluacionActiva = Evaluacion::where('estado',1)->where('sede_id',$request->sede_id)->get();
        if(count($evaluacionActiva) <= 0)
        {
            $msn = 'Se ha creado la evaluación correctamente';
        }
        else
        {
            //Este edita la información del request
            Input::merge(['estado' => '2']);
            $msn = 'Se ha creado la evaluación con estado inactivo, ya hay una evaluación activa';
        }

        $evaluacion = Evaluacion::create(
            $request->only('politica_id','categoriacalif_id','periodo','nombre','fecha_inicio','fecha_final','estado','sede_id')
        );

        session()->flash('msn',$msn);
        return redirect()->route('evaluacion.index');
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
    public function update(Request $request, Evaluacion $evaluacion)
    {
        //

        $evaluacion->update(
            $request->only('politica_id','categoriacalif_id','periodo','nombre','fecha_inicio','fecha_final','estado')
        );

        session()->flash('msn','Se ha actualizado la evaluación correctamente');
        return redirect()->route('evaluacion.index');

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


    public function View(Request $request)
    {
        if($request->tipo  == 1)
        {
            //retorno el request al formulario
            $politica = Politica::where('estado',1)->orderBy('nompolitica','asc')->pluck('nompolitica','id');
            $categoria = CategoriaCalif::where('estado',1)->orderBy('nomcategoria','asc')->pluck('nomcategoria','id');
            $periodo = Periodo::all()->pluck('periodo','id');
            $perfil_id = Auth::user()->perfil_id;
            $perfil = Perfil::find($perfil_id);
            return view('admin.evaluacionView')->with(['request'=>$request->all(),'politica'=>$politica,'categoria'=>$categoria,'periodo'=>$periodo,'perfil'=>$perfil]);
        }
        if($request->tipo  == 2)
        {
            //Se pasan los datos
            $estado=0;
            $politica = Politica::where('estado',1)->orderBy('nompolitica','asc')->pluck('nompolitica','id');
            $categoria = CategoriaCalif::where('estado',1)->orderBy('nomcategoria','asc')->pluck('nomcategoria','id');
            $periodo = Periodo::all()->pluck('periodo','id');
            $perfil_id = Auth::user()->perfil_id;
            $perfil = Perfil::find($perfil_id);

            $evaluacionActiva = Evaluacion::where('estado',1)->where('sede_id',$perfil->sede_id)->where('id','!=',$request->id)->get();
            if(count($evaluacionActiva) <= 0)
            {
                $estado = array('1'=>'Activo','2'=>'Inhabilitado');
                session()->flash('msn',null);
            }
            else
            {
                $estado = array('2'=>'Inhabilitado');
                session()->flash('msn','No se puede activar mas de una evaluación al tiempo');
            }

            $evaluacion = Evaluacion::find($request->id);

            return view('admin.evaluacionView')->with(['request'=>$request->all(),'politica'=>$politica,'categoria'=>$categoria,'periodo'=>$periodo,'perfil'=>$perfil,'evaluacion'=>$evaluacion,'estado'=>$estado]);

        }

    }

    public function msnError()
    {
        session()->flash('msn','Debe seleccionar una evaluación para continuar');
        session()->flash('tipoAlert','danger');


        return redirect()->route('evaluacion.index');
    }
}
