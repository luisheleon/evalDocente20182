<?php

namespace App\Http\Controllers;

use App\CategoriaCalif;
use App\Factor;
use Illuminate\Http\Request;

class CategoriaController extends Controller
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
        $categoria = CategoriaCalif::all();
        return view('admin.categoria')->with(['categoria'=>$categoria,'routeView'=>'categoria.categoriaView','msnError'=>'categoria.categoriaMsn']);

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
        $categoria = CategoriaCalif::create(
            $request->only('nomcategoria','estado')
        );
        session()->flash('msn','Se ha creado la categoría de calificación correctamente');
        return redirect()->route('categoria.index');
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
        //algunas veces no funciona la propiedad de la clase para invocar el update, así que toca de esta manera
       $categoria =  CategoriaCalif::find($id)
           ->update([
               'nomcategoria'   =>  $request->nomcategoria,
               'estado'         =>  $request->estado
           ]);

        session()->flash('msn','Se ha editado la categoría de calificación correctamente');
        return redirect()->route('categoria.index');

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

    public function categoriaView(Request $request)
    {
        if($request->tipo  == 1)
        {
            //retorno el request al formulario
            return view('admin.categoriaView')->with(['request'=>$request->all()]);
        }
        if($request->tipo  == 2)
        {
            //consulto la información del factor
            $categoria = CategoriaCalif::find($request->id);
            return view('admin.categoriaView')->with(['request'=>$request->all(),'categoria'=>$categoria]);
        }

    }

    public function msnError()
    {
        session()->flash('msn','Debe seleccionar una categoría para continuar');
        session()->flash('tipoAlert','danger');


        return redirect()->route('categoria.index');
    }
}
