@extends('layouts.header')
@section('titulo','Evaluar docentes')
@section('titulopag','Materias')

@section('jsscripts')
    @include('partials._scriptscrud')
    @endsection

@section('contenido')



    <br><br>
    {!! Form::open(['route' => 'materiaestudiante.index', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'form']) !!}
    {!! Form::hidden('tipo','1') !!}
    <div class="container table-responsive" style="width:80%">

        @if(isset($periodo))

        <table id="tableFront" class="table table-striped table-bordered" cellspacing="0">
            <thead id="tableColor">
            <tr>
                <th width="20%">Estado</th>
                <th width="40%">Materia</th>
                <th width="40%">Docente</th>
            </tr>
            </thead>
            <tbody>
                @foreach($materiasEstuidante as $materia)

                    <tr>
                        <td align="center">
                            @if(in_array($materia->codmateria,$dataRespuesta))
                                <i class="fa fa-flag fa-5" style="color: dodgerblue;" aria-hidden="true"></i></td>
                        @else
                            <a href="{{ route('materias.preguntas',['docente_id'=>$materia->docente_id,'materia_id'=>$materia->codmateria,'nommateria'=>$materia->nommateria,'nomdocente'=>$materia->nombre,'apedocente'=>$materia->apellidos,'idEval'=>$idEval]) }}"><i
                                        class="fa fa-check" style="color: forestgreen;"
                                        aria-hidden="true"></i>Calificar</a></td>
                        @endif
                        <td>{{ $materia->nommateria }} </td>
                        <td>{{ $materia->nombre }} {{ $materia->apellidos }}</td>
                    </tr>
                @endforeach

            </tbody>

            @else
                <div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Alerta!</strong> No hay evaluaciones disponible en el momento </div>
            @endif
        </table>
    </div>

    {!! Form::close() !!}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal"></div>


@endsection