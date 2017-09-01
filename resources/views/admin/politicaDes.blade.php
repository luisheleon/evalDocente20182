@extends('layouts.header')
@section('titulo','Política Descripción')
@section('titulopag','Política Descripción')

@section('jsscripts')
    @include('partials._scriptscrud')
@endsection

@section('contenido')

    <br><br>
    {!! Form::open(['route' => 'politicades.politicaDesView', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'form']) !!}
    <div class="container table-responsive" style="width:80%">
        <table class="table table-striped table-bordered " id="tableFront" align="center">
            <thead>
            <tr>
                <th></th>
                <th>Política</th>
                <th>Sede</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody>

            @foreach($politicades as $poli)
                <tr>
                    <td align="center">
                        <div class="i-checks" style="width:10px; height:10px;"><input type="radio" name="id" id="politicaId" value="{{ $poli->id }}">
                        </div>
                    </td>
                    <td>{{ $poli->nompolitica  }}</td>
                    <td>{{ $poli->sede->sede }}</td>
                    <td>@if($poli->estado == 1) Activo @else Deshabilitado @endif</td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <div align="center">
            <button type="button" class="btn btn-success btn-sm" name="aceptar" id="aceptar" value="1">Registrar</button>
            <button type="button" class="btn btn-info btn-sm" name="editar" id="editar" value="2" onclick="javascript: enviar(2)">Editar</button>
            <a href="{{ route('politica.index') }}" class="btn btn-danger btn-sm">Regresar</a>
            </button>

        </div>
    </div>

    {!! Form::close() !!}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal"></div>


@endsection