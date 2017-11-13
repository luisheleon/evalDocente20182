@extends('layouts.header')
@section('titulo','Evaluar docentes')
@section('titulopag','Evaluar Docentes')

@section('jsscripts')
    @endsection

@section('contenido')


    {!! Form::open(['route' => 'materiaestudiante.store', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'formPreguntas']) !!}

    <input type="hidden" name="docente_id" id="docente_id" value="{{ $datosBasicos->docente_id }}">
    <input type="hidden" name="materia_id" id="materia_id" value="{{ $datosBasicos->materia_id }}">
    <input type="hidden" name="sede_id" id="sede_id" value="{{ $evaluacion->sede_id }}">
    <input type="hidden" name="periodo" id="periodo" value="{{ $evaluacion->periodo }}">
    <input type="hidden" name="evaluacion_id" id="evaluacion_id" value="{{ $evaluacion->id }}">
    <input type="hidden" name="actor_id" id="actor_id" value="1">

    <div class="container" style="width: 80%">


        <table class="table table-responsive table-bordered" style="background-color: white">
            <tr>
                <td colspan="2" align="center"><b>Información general</b></td>
            </tr>
            <tr align="center">
                <td width="30%"><b> Nombre de la materia</b></td>
                <td>{{ $datosBasicos->nommateria }}</td>
            </tr>
            <tr align="center">
                <td width="30%"><b>Programa</b></td>
                <td>Estadística</td>
            </tr>
        </table>

        <table class="table table-responsive table-bordered table-condensed" style="background-color: white">
            <tr align="center">
                <td colspan="2"><b>Categorías de calificación</b></td>
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
                        <td>{{ $datosBasicos->nomdocente }} {{ $datosBasicos->apedocente }}</td>
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


    <br><br>

    {!! Form::close() !!}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal"></div>


@endsection