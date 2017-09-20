<?php

namespace App\Http\Controllers;

use App\CategoriaCalif;
use App\CategoriaDes;
use Illuminate\Http\Request;

class CategoriaDesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if(session()->get('modulos') == null)
        {
            return redirect()->route('indexHome');
        }
        $categoria = CategoriaCalif::find($id);
        if($categoria == null){
            abort('404','Unauthorized action.');
        }

        $categoriaDes = CategoriaDes::where('categoriacalif_id',$id)->get();


        return view('admin.categoriaDes')->with([
            'categoriaDes'  =>  $categoriaDes,
            'routeView'     =>  'categoriaDes.categoriaDesView',
            'msnError'      =>  'categoriaDes.categoriaDesMsn',
            'categoriades_id'   =>  $id
        ]);






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


    public function categoriaDesView(Request $request)
    {
        if($request->tipo  == 1)
        {
            //retorno el request al formulario
            return view('admin.categoriaDesView')->with(['request'=>$request->all()]);
        }
        if($request->tipo  == 2)
        {
            //consulto la información del factor
            $categoria = CategoriaCalif::find($request->id);
            return view('admin.categoriaDesView')->with(['request'=>$request->all(),'categoria'=>$categoria]);
        }

    }

    public function msnError()
    {
        session()->flash('msn','Debe seleccionar una categoría para continuar');
        session()->flash('tipoAlert','danger');


        return redirect()->route('categoria.index');
    }


}
