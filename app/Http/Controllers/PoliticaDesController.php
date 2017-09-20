<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Criterios;
use App\Factor;
use App\Indicador;
use App\Politica;
use App\PoliticaDes;
use App\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Resource;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class PoliticaDesController extends Controller
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
        $politicaEval = PoliticaDes::create(
            $request->only('politica_id','indicador_id','criterio_id','factor_id','pregunta_id','actor_id')
        );
        session()->flash('msn','Se ha creado la pregunta correctamente');
        return redirect()->route('politicades.show',['insgen'=>$request->politica_id]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(session()->get('modulos') == null)
        {
            return redirect()->route('indexHome');
        }
        //
        $politica = Politica::find($id);
        if($politica == null)
        {
            //retorna un error 404 cuando el factor no existe
            abort(404, 'Unauthorized action.');
        }

        $politicaDes =  DB::table('politicadescrip as d')
           ->join('factores as f','d.factor_id','=','f.id')
           ->join('criterios as c','d.criterio_id','=','c.id')
           ->join('indicadores as i','d.indicador_id','=','i.id')
           ->join('preguntas as p','d.pregunta_id','=','p.id')
           ->join('politicaevaluacion as po','d.politica_id','=','po.id')
            ->join('actores as ac','ac.id','=','d.actor_id')
           ->where('d.politica_id',$id)
           ->get();

        return view('admin.politicaDes')->with(['politicades' => $politicaDes,'routeView'=>'politicades.politicaDesView','msnError'=>'politicades.politicaDesMsn','politica_id'=>$id]);
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
        $idArray = explode('**',$id);

        //consulta la información del registro y se da el metodo update con los parametros que se desean actualizar
        $pregPolitica = PoliticaDes::where([
            'politica_id'   =>  $idArray[0],
            'factor_id'     =>  $idArray[1],
            'criterio_id'   =>  $idArray[2],
            'indicador_id'  =>  $idArray[3],
            'pregunta_id'   =>  $idArray[4],
            'actor_id'      =>  $idArray[5]
        ])
            ->update([
                'politica_id'   =>  $request->politica_id,
                'factor_id'     =>  $request->factor_id,
                'criterio_id'   =>  $request->criterio_id,
                'indicador_id'  =>  $request->indicador_id,
                'pregunta_id'   =>  $request->pregunta_id,
                'actor_id'      =>  $request->actor_id
            ])
            ;


        session()->flash('msn','Se ha editado la pregunta correctamente');
        return redirect()->route('politicades.show',['insgen'=>$request->politica_id]);
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

    public function politicaDesView(Request $request)
    {
        //creación
        if($request->tipo  == 1)
        {
            $factor = Factor::where('estado','1')->orderBy('factor','asc')->pluck('factor','id');
            $criterio = Criterios::where('estado','1')->orderBy('criterio','asc')->pluck('criterio','id');
            $indicador = Indicador::where('estado','1')->orderBy('indicador','asc')->pluck('indicador','id');
            $actor = Actor::pluck('actor','id');
            $preguntas = DB::table('preguntas as p')
                ->leftjoin('politicadescrip as d',function($q) use($request){
                    $q  ->on('d.pregunta_id','=','p.id')
                        ->where('d.politica_id','=',$request->politica_id);
                })
                ->where('estado','1')
                ->whereNull('d.pregunta_id')
                ->orderBy('pregunta','asc')
                ->pluck('pregunta','id');



            //retorno el request al formulario

            return view('admin.politicaDesView')->with([
                'request'   =>  $request->only('tipo','politica_id'),
                'factor'    =>  $factor,
                'actor'     =>  $actor,
                'criterio'  =>  $criterio,
                'indicador' =>  $indicador,
                'pregunta'  =>  $preguntas
            ]);
        }
        //actualización
        if($request->tipo  == 2)
        {
            $idDescript = explode('**',$request->id);
            $idUpdate = $request->id;

            $factor = Factor::find($idDescript[1])->pluck('factor','id');
            $criterio = Criterios::find($idDescript[2])->pluck('criterio','id');
            $indicador = Indicador::find($idDescript[3])->pluck('indicador','id');
            $pregunta = Pregunta::find($idDescript[4])->pluck('pregunta','id');
            $actor = Actor::find($idDescript[5])->pluck('actor','id');

            return view('admin.politicaDesView')->with([
                'actor'         =>  $actor,
                'factor'        =>  $factor,
                'criterio'      =>  $criterio,
                'indicador'     =>  $indicador,
                'pregunta'      =>  $pregunta,
                'request'       =>  $request,
                'iddescript'    =>  $idDescript,
                'idupdate'      =>  $idUpdate
            ]);
        }
        //eliminar pregunta
        if($request->tipo == 3)
        {
            //reviso si hay respuestas de la pregunta y la politica en la tabla respuestas


        }

    }

    public function msnError(Request $request)
    {
        session()->flash('msn','Debe seleccionar una pregunta para poder continuar');
        session()->flash('tipoAlert','danger');

        return redirect()->route('politicades.update',['politica_id'=>$request->politica_id]);
    }


}
