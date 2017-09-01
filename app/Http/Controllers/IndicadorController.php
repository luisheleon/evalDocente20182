<?php

namespace App\Http\Controllers;

use App\Indicador;
use Illuminate\Http\Request;

class IndicadorController extends Controller
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
        $indicador = Indicador::all();
        return view('admin.indicador')->with(['indicadores'=>$indicador,'routeView'=>'indicador.indicadorView','msnError'=>'indicador.indicadorMsn']);

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
        $indicador = Indicador::create(
            $request->only('indicador','estado')
        );
        session()->flash('msn','Se ha creado el indicador correctamente');
        return redirect()->route('indicador.index');

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
    public function update(Request $request,Indicador $indicador)
    {
        //
        $indicador->update(
            $request->only('indicador','estado')
        );
        session()->flash('msn','Se ha editado el indicador correctamente');
        return redirect()->route('indicador.index');

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

    public function indicadorView(Request $request)
    {
        if($request->tipo  == 1)
        {
            //retorno el request al formulario
            return view('admin.indicadorView')->with(['request'=>$request->all()]);
        }
        if($request->tipo  == 2)
        {
            //consulto la información del factor
            $indicador = Indicador::find($request->id);
            return view('admin.indicadorView')->with(['request'=>$request->all(),'indicador'=>$indicador]);
        }

    }

    public function msnError()
    {
        session()->flash('msn','Debe seleccionar un indicador para continuar');
        session()->flash('tipoAlert','danger');

        return redirect()->route('indicador.index');
    }
}
