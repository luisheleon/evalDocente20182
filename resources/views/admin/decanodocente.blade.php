@extends('layouts.header')
@section('titulo','Evaluar docentes')
@section('titulopag','Materias')

@section('jsscripts')

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
                <th width="20%">Documento</th>
                <th width="40%">Docente</th>
            </tr>
            </thead>
            <tbody>
                @foreach($docentes as $doc)

                    <tr>
                        <td align="center">
                            @if(in_array($doc->id,$dataRespuesta))
                                <i class="fa fa-flag fa-5" style="color: dodgerblue;" aria-hidden="true"></i></td>
                        @else
                            <a href="{{ route('decanodocente.instrumento',['docente_id'=>$doc->id,'nomdocente'=>$doc->nombre,'apedocente'=>$doc->apellidos,'idEval'=>$idEval]) }}"><i
                                        class="fa fa-check" style="color: forestgreen;"
                                        aria-hidden="true"></i>Calificar</a></td>
                        @endif
                        <td>{{ $doc->nombre }} {{ $doc->apellidos }}</td>

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