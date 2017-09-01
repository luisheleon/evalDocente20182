@extends('layouts.header')
@section('titulo','Criterio')
@section('titulopag','Criterio')

@section('jsscripts')
    @include('partials._scriptscrud')
    @endsection

@section('contenido')

    <br><br>
    {!! Form::open(['route' => 'factor.factorView', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'form']) !!}
    <div class="container table-responsive" style="width:80%">
        <table class="table table-striped table-bordered " id="tableFront" align="center">
            <thead>
            <tr>
                <th></th>
                <th>Perfil</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody>

            @foreach($criterio as $cri)
                <tr>
                    <td align="center">
                        <div class="i-checks" style="width:10px; height:10px;"><input type="radio" name="id" id="factorId" value="{{ $cri->id }}">
                        </div>
                    </td>
                    <td>{{ $cri->criterio  }}</td>
                    <td>@if($cri->estado == 1) Activo @else Deshabilitado @endif</td>
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