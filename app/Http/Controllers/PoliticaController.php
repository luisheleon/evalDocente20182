<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\Politica;
use Illuminate\Foundation\Console\PolicyMakeCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\Exception;

class PoliticaController extends Controller
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

        $politica = Politica::all();

        return view('admin.politica')->with(['politica'=>$politica,'routeView'=>'politica.politicaView','msnError'=>'politica.politicaMsn']);

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
        try
        {
           $politica = Politica::create(
                $request->only('nompolitica','estado','sede_id')
            );
            $msn = 'Se ha ingresado la política correctamente';
        }
        catch (Exception $e)
        {
            $msn = 'Se ha generado un error, intente nuevamente';
            session()->flash('tipoAlert','danger');
        }

        session()->flash('msn',$msn);
        return redirect()->route('politica.index');

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
    public function update(Request $request, Politica $politica)
    {
        //
        try
        {
            $politica->update(
                $request->only('nompolitica','estado','sede_id')
            );
            $msn = 'Se ha actualizado la política correctamente';
        }
        catch (Exception $e)
        {
            $msn = 'Se ha generado un error, intente nuevamente';
            session()->flash('tipoAlert','danger');
        }

        session()->flash('msn',$msn);
        return redirect()->route('politica.index');

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

    public function politicaView(Request $request)
    {
        if($request->tipo  == 1)
        {
            //retorno el request al formulario
            return view('admin.politicaView')->with(['request'=>$request->all()]);
        }
        if($request->tipo  == 2)
        {
            //consulto la información del factor
            $politica = Politica::find($request->id);
            return view('admin.politicaView')->with(['request'=>$request->all(),'politica'=>$politica]);
        }
        if($request->tipo  == 3)
        {
            dd($request->id);
            return redirect()->route('politicades.show',$request->id);
        }

    }

    public function msnError()
    {
        session()->flash('msn','Debe seleccionar un indicador para continuar');
        session()->flash('tipoAlert','danger');

        return redirect()->route('politica.index');
    }
}
