<?php

namespace App\Http\Controllers;

use App\Funcionalidad;
use App\Perfil;
use App\PerfilFuncionalidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
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

        $perfil = Perfil::all();

        return view('admin.perfil')->with(['routeView'=>'perfil.View','msnError'=>'perfil.Msn','perfil'=>$perfil]);

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
        $perfil = Perfil::create(
            $request->only('perfil','sede_id')
        );

        session()->flash('msn','Se ha creado el perfil correctamente');
        return redirect()->route('perfil.index');
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
    public function update(Request $request, Perfil $perfil)
    {
        //
        $perfil->update(
            $request->only('perfil','sede_id')
        );

        session()->flash('msn','Se ha actualizado el perfil correctamente');
        return redirect()->route('perfil.index');

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
            $perfil_id = Auth::user()->perfil_id;
            $perfil = Perfil::find($perfil_id);
            return view('admin.perfilView')->with(['request'=>$request->all(),'perfil'=>$perfil]);
        }
        if($request->tipo  == 2)
        {
            //consulto la información del factor
            $perfil = Perfil::find($request->id);
            return view('admin.perfilView')->with(['request'=>$request->all(),'perfil'=>$perfil]);
        }
        if($request->tipo  == 3)
        {

            $perfilFun = DB::table('perfiles as p')
                ->join('perfilfuncionalidad as pf','p.id','=','pf.perfil_id')
                ->join('funcionalidades as f','f.id','=','pf.funcionalidad_id')
                ->join('paginas as pa','pa.id','=','f.pagina_id')
                ->join('modulos as m','m.id','=','pa.modulo_id')
                ->where('p.id','=',$request->id)
                ->select('pf.funcionalidad_id')
                ->groupBy('pf.funcionalidad_id')
                ->get();


            $perfilFun = collect($perfilFun)->toArray();

            dd($perfilFun);

            //$funcionalidad = Funcionalidad::whereIn('id',)

        }


    }

    public function msnError()
    {
        session()->flash('msn','Debe seleccionar un perfil para continuar');
        session()->flash('tipoAlert','danger');


        return redirect()->route('perfil.index');
    }
}
