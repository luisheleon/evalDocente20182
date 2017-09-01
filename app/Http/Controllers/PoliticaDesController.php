<?php

namespace App\Http\Controllers;

use App\Factor;
use App\Politica;
use App\PoliticaDes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliticaDesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retorna al inicio para carga el menu en la sesión

        if(session()->get('modulos') == null)
        {
            return redirect()->route('indexHome');
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(session()->get('modulos') == null)
        {
            return redirect()->route('indexHome');
        }
        //
        $politica = Politica::find($id);
        if($politica == null)
        {
            //retorna un error 404 cuando el factor no existe
            abort(404, 'Unauthorized action.');
        }

        $politicaDes =  DB::table('politicadescrip as d')
           ->join('factores as f','d.factor_id','=','f.id')
           ->join('criterios as c','d.criterio_id','=','c.id')
           ->join('indicadores as i','d.indicador_id','=','i.id')
           ->join('preguntas as p','d.pregunta_id','=','p.id')
           ->join('politicaevaluacion as po','d.politica_id','=','po.id')
           ->where('d.politica_id',$id)
           ->get();


        return view('admin.politicaDes')->with(['politicades' => $politicaDes,'routeView'=>'politicades.politicaDesView','msnError'=>'politicades.politicaDesMsn']);
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

    public function politicaDesView(Request $request)
    {
        if($request->tipo  == 1)
        {
            $factor = Factor::where('estado','1')->pluck('factor','id');
            //retorno el request al formulario

            return view('admin.politicaDesView')->with(['request'=>$request->all(),'factor'=>$factor]);
        }
        if($request->tipo  == 2)
        {
            //consulto la información del factor
            $indicador = PoliticaDes::find($request->id);
            return view('admin.politicaDesView')->with(['request'=>$request->all(),'politica'=>$indicador]);
        }

    }

    public function msnError()
    {
        session()->flash('msn','Debe seleccionar un indicador para continuar');
        session()->flash('tipoAlert','danger');

        return redirect()->route('indicador.index');
    }
}
