@extends('layouts.header')
@section('titulo','Evaluaciones')
@section('titulopag','Evaluaciones')
@section('jsscripts')
    @include('partials._scriptscrud')
@endsection

@section('contenido')



    <br><br>
    {!! Form::open(['route' => 'evaluacion.View', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'form']) !!}
    {!! Form::hidden('tipo','1') !!}
    <div class="container table-responsive" style="width:80%">
        <table class="table table-striped table-bordered " id="tableFront" align="center">
            <thead>
            <tr>
                <th></th>
                <th>Política</th>
                <th>Categoria</th>
                <th>Periodo</th>
                <th>Nombre</th>
                <th>Fecha de inicio</th>
                <th>Fecha de finalización</th>
                <th>Estado</th>
                <th>Sede</th>
                <th>Actor</th>
            </tr>
            </thead>
            <tbody>

            @foreach($evaluacion as $eval)
                <tr>
                    <td align="center">
                        <div class="i-checks" style="width:10px; height:10px;"><input type="radio" name="id" id="id" value="{{ $eval->id }}">
                        </div>
                    </td>
                    <td>{{ $eval->nompolitica }}</td>
                    <td>{{ $eval->nomcategoria }}</td>
                    <td>{{ $eval->periodo }}</td>
                    <td>{{ $eval->nombre }}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d h:i:s', $eval->fecha_inicio)->toDayDateTimeString() }}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d h:i:s', $eval->fecha_final)->toDayDateTimeString() }}</td>
                    <td>@if($eval->estado == 1) Activo @else Inactivo </td> @endif
                    <td>{{ $eval->sede }}</td>
                    <td>{{ $eval->actor }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <div align="center">
            <button type="button" class="btn btn-success btn-sm" name="aceptar" id="aceptar" value="1">Registrar</button>
            <button type="button" class="btn btn-info btn-sm" name="editar" id="editar" value="2" onclick="javascript: enviar(2)">Editar</button>
            </button>

        </div>
    </div>

    {!! Form::close() !!}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal"></div>


@endsection
