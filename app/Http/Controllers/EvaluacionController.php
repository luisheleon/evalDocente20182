<?php

namespace App\Http\Controllers;

use App\Evaluacion;
use Illuminate\Http\Request;

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
        if(session()->get('modulos') == null)
        {
            return redirect()->route('indexHome');
        }
        $evaluacion = Evaluacion::all();
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


    public function View(Request $request)
    {
        if($request->tipo  == 1)
        {
            //retorno el request al formulario
            return view('admin.factoresView')->with(['request'=>$request->all()]);
        }
        if($request->tipo  == 2)
        {
            //consulto la información del factor
            $factor = Factor::find($request->id);
            return view('admin.factoresView')->with(['request'=>$request->all(),'factor'=>$factor]);
        }

    }

    public function msnError()
    {
        session()->flash('msn','Debe seleccionar un factor para continuar');
        session()->flash('tipoAlert','danger');


        return redirect()->route('factor.index');
    }
}
