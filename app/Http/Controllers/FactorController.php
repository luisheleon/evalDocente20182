<?php
namespace App\Http\Controllers;
use App\Factor;
use App\Modulo;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;



class FactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(session()->get('modulos') == null)
        {
            return redirect()->route('indexHome');
        }
        //
        $modulos = modulo::all();
        foreach($modulos as $mod)
        {
            $arrayDoble[$mod->id][] = $mod->modulo;
            $arrayDoble[$mod->id][] = $mod->image;
            $arrayDoble[$mod->id][] = $mod->orden;
        }
        $factores = Factor::all();
        return view('admin.factores')->with('factores',$factores)->with('modulos',$modulos)->with('arra',$arrayDoble)->with(['routeView'=>'factor.factorView','msnError'=>'factor.factorMsn']);

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

       $factor = Factor::create($request->only('factor','estado'));
        session()->flash('msn','Se ha creado el factor correctamente');
        return redirect()->route('factor.index');

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
    public function update(Request $request, Factor $factor)
    {
        //
        $factor->update(
            $request->only('factor','estado')
        );
        session()->flash('msn','Se edito el factor correctamente');
        return redirect()->route('factor.index');

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

    public function factorView(Request $request)
    {
        if($request->tipo  == 1)
        {
            //retorno el request al formulario
            return view('admin.factoresView')->with(['request'=>$request->all()]);
        }
        if($request->tipo  == 2)
        {
            //consulto la información del factor
            $factor = Factor::find($request->id);
            return view('admin.factoresView')->with(['request'=>$request->all(),'factor'=>$factor]);
        }

    }

    public function msnError()
    {
        session()->flash('msn','Debe seleccionar un factor para continuar');
        session()->flash('tipoAlert','danger');


        return redirect()->route('factor.index');
    }
}