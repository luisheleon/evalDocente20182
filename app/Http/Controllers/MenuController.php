<?php

namespace App\Http\Controllers;


use App\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfil_id = Auth::user()->perfil_id;
        $perfil = Perfil::find($perfil_id);

        //genera el desglose de modulos con permisos para el perfil
        $modulos = DB::table('modulos')->join('paginas','modulos.id','=','paginas.modulo_id')
            ->join('funcionalidades','funcionalidades.pagina_id','=','paginas.id')
            ->join('perfilfuncionalidad','perfilfuncionalidad.funcionalidad_id','=','funcionalidades.id')
            ->where('perfilfuncionalidad.perfil_id','=',$perfil_id)
            ->groupBy('modulos.id','modulos.modulo','modulos.image','modulos.orden')
            ->orderBy('modulos.orden','ASC')
            ->select('modulos.id','modulos.modulo','modulos.image','modulos.orden')
            ->get();

        if($modulos == null || count($modulos) == 0)
        {
            dd($modulos);
        }

        //genera el array de paginas para cada perfil
        foreach($modulos as $mod)
        {
            $paginas = DB::table('paginas')
                ->join('funcionalidades','paginas.id','=','funcionalidades.pagina_id')
                ->join('perfilfuncionalidad','perfilfuncionalidad.funcionalidad_id','=','funcionalidades.id')
                ->where([
                    ['perfilfuncionalidad.perfil_id','=',$perfil_id],
                    ['paginas.modulo_id','=',$mod->id]

                ])
                ->select('paginas.*')
                ->get();

            foreach($paginas as $pag) {
                $pagi[$mod->id][$pag->id][] = $pag->nombrepag;
                $pagi[$mod->id][$pag->id][] = $pag->orden;
                $pagi[$mod->id][$pag->id][] = $pag->url;
            }

        }


        session(['modulos'=>$modulos, 'paginas'=> $pagi,'perfil'=>$perfil]);

        return view('home');
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
}
