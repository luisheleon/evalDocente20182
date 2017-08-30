<?php

namespace App\Http\Controllers;

use App\Criterios;
use Illuminate\Http\Request;

class CriterioController extends Controller
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

        $criterio = Criterios::all();
        return view('admin.criterio')->with(['criterio'=>$criterio,'routeView'=>'criterio.criterioView','msnError'=>'criterio.criterioMsn']);


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
        $criterio = Criterios::create(
            $request->only('criterio','estado')
        );
        session()->flash('msn','Se ha creado el factor correctamente');
        return redirect()->route('criterio.index');

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
    public function update(Request $request, Criterios $criterio)
    {
        //
        $criterio->update($request->only('criterio','estado'));
        session()->flash('msn','Se ha editado el criterio correctamente');
        return redirect()->route('criterio.index');
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

    public function criterioView(Request $request)
    {
        if($request->tipo  == 1)
        {
            //retorno el request al formulario
            return view('admin.CriterioView')->with(['request'=>$request->all()]);
        }
        if($request->tipo  == 2)
        {
            //consulto la información del factor
            $criterio = Criterios::find($request->id);
            return view('admin.criterioView')->with(['request'=>$request->all(),'criterio'=>$criterio]);
        }

    }

    public function msnError()
    {
        session()->flash('msn','Debe seleccionar un criterio para continuar');
        session()->flash('tipoAlert','danger');

        return redirect()->route('criterio.index');
    }
}
