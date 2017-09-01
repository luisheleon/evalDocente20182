<?php

namespace App\Http\Controllers;

use App\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use League\Flysystem\Exception;

class PreguntaController extends Controller
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
        $pregunta = Pregunta::all();
        return view('admin.pregunta')->with(['pregunta'=>$pregunta,'routeView'=>'pregunta.preguntaView','msnError'=>'pregunta.preguntaMsn']);

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
        $pregunta = Pregunta::create(
            $request->only('pregunta','estado')
        );
        session()->flash('msn','Se ha creado la pregunta correctamente');
        return redirect()->route('pregunta.index');
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

        $pregunta  = Pregunta::find($id);
        $pregunta->update($request->only('pregunta','estado'));

        session()->flash('msn','Se ha editado la pregunta correctamente');
        return redirect()->route('pregunta.index');
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

    public function preguntaView(Request $request)
    {
        if($request->tipo  == 1)
        {
            //retorno el request al formsulario
            return view('admin.preguntaView')->with(['request'=>$request->all()]);
        }
        if($request->tipo  == 2)
        {
            //consulto la información del factor
            $pregunta = Pregunta::find($request->id);
            return view('admin.preguntaView')->with(['request'=>$request->all(),'pregunta'=>$pregunta]);
        }

    }

    public function msnError()
    {
        session()->flash('msn','Debe seleccionar una pregunta para continuar');
        session()->flash('tipoAlert','danger');

        return redirect()->route('pregunta.index');
    }
}
