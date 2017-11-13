<?php

namespace App\Http\Controllers;

use App\CategoriaCalif;
use App\CategoriaDes;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

        $categoriades = CategoriaDes::where('categoriacalif_id',$request->categoriacalif_id)
            ->where(function($query) use ($request){
                $query->where('nombre',$request->nombre)
                ->orWhere('valor',$request->valor)
                ->orWhere('descripcion',$request->descripcion);
            })
            ->get()
            ->toArray();

        if(count($categoriades) > 0)
        {
            $msn = "Esta categoria ya se encuentra registrada";
            session()->flash('tipoAlert','danger');
        }
        else
        {
            $categoriaDes = CategoriaDes::create(
                $request->only('categoriacalif_id','nombre','valor','descripcion')
            );
            $msn = "Se ha registrado la categoría de calificación correctamente";

        }

        session()->flash('msn',$msn);
        return redirect()->route('categoriaDes.show',$request->categoriacalif_id);
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
        try {

            $categoriaDes = CategoriaDes::find($id)
                ->update(
                    $request->only('categoriacalif_id','nombre','valor','descripcion')
                );
            $msn = 'Se ha actualizado la categoria de calificación correctamente';
        }
        catch(QueryException $e)
        {
            if($e->errorInfo[0])
            {
                $msn = "Esta categoria ya se encuentra registrada";
                session()->flash('tipoAlert','danger');
            }
            else
            {
                $msn = "Se ha presentado un inconveniente por favor intente nuevamente";
            }
        }
        session()->flash('msn',$msn);
        return redirect()->route('categoriaDes.show',$request->categoriacalif_id);
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
            //consulto la información de la categoria
            $categoriaDes = CategoriaDes::find($request->id);
            return view('admin.categoriaDesView')->with(['request'=>$request->all(),'categoriaDes'=>$categoriaDes]);
        }

    }

    public function msnError(Request $request)
    {
        session()->flash('msn','Debe seleccionar una categoría para continuar');
        session()->flash('tipoAlert','danger');

        return redirect()->route('categoriaDes.show',$request->categoriades_id);
    }


}
