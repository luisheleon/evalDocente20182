@extends('layouts.header')
@section('titulo','Evaluar del decano')
@section('titulopag','Evaluación del decano')

@section('jsscripts')
    @endsection

@section('contenido')



    @if($respuestasActivas == 1)

        <div class="alert alert-warning alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Alerta!</strong> Ya realizo su autoevaluación </div>
     @else


    @if(isset($periodo))


    {!! Form::open(['route' => 'docente.store', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'formPreguntas']) !!}

    <input type="hidden" name="docente_id" id="docente_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
    <input type="hidden" name="materia_id" id="materia_id" value="0">
    <input type="hidden" name="sede_id" id="sede_id" value="{{ $sede }}">
    <input type="hidden" name="periodo" id="periodo" value="{{ $periodo }}">
    <input type="hidden" name="evaluacion_id" id="evaluacion_id" value="{{ $idEval}}">
    <input type="hidden" name="actor_id" id="actor_id" value="2">


    <div class="container" style="width: 80%">


        <table class="table table-responsive table-bordered" style="background-color: white">
            <tr>
                <td colspan="2" align="center"><b>Información general</b></td>
            </tr>
            <tr align="center">
                <td width="30%"><b> Nombre del docente</b></td>
                <td>{{ \Illuminate\Support\Facades\Auth::user()->nombre }} {{ \Illuminate\Support\Facades\Auth::user()->apellidos }}</td>
            </tr>

        </table>



        <table class="table table-responsive table-bordered table-condensed" style="background-color: white">
            <tr align="center">
                <td style="width: 30%"><b>Categorías de calificación</b></td>
            </tr>
            <tr>
                @foreach($categoriaCalif as $califica)
                    <td style="text-align: center"><b>{{ $califica->nombre }}</b></td>
                @endforeach
            </tr>
            <tr>
                @foreach($categoriaCalif as $califica)
                    <td style="text-align: center">{{ $califica->descripcion }}</td>
                @endforeach
            </tr>


        </table>


        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
            <ul id="myTabs" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab"
                                                          aria-controls="home" aria-expanded="true">
                        <td>{{ \Illuminate\Support\Facades\Auth::user()->nombre }} {{ \Illuminate\Support\Facades\Auth::user()->apellidos }}</td>
                    </a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                    <br><br>

                    <table id="table" class="table table-striped table-bordered " cellspacing="0" align="center">
                        <thead id="tableColor">
                        <tr>
                            <th style="text-align: center" width="60%">Pregunta</th>
                            @foreach($categoriaCalif as $califica)
                                <th style="text-align: center">{{ $califica->nombre }}</th>
                            @endforeach
                            <th align="center">Comentario</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($preguntasTotal as $preguntas)

                            <tr>
                                <td align="center">{{ $preguntas->pregunta }} </td>
                                @foreach($categoriaCalif as $califica)
                                    <td align="center"><input class="flat-red" type="radio" id="cal[{{ $preguntas->id }}]"
                                                              name="cal[{{ $preguntas->id }}]"
                                                              value="{{ $califica->id }}" required></td>
                                @endforeach
                                <td align="center"><textarea class="form-control" name="comentario" id="comentario" rows="3" cols="25" ></textarea></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

        <div align="center">
            <button type="submit" class="btn btn-success btn-sm" name="aceptar" id="aceptar" value="1">Registrar
            </button>
        </div>

    </div>
    @else

        <div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Alerta!</strong> No hay evaluaciones disponible en el momento </div>
        @endif

    @endif

    <br><br>

    {!! Form::close() !!}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal"></div>


@endsection