@extends('layouts.header')
@section('titulo','Criterio')
@section('titulopag','Criterio')

@section('jsscripts')
    @include('partials._scriptscrud')
    @endsection

@section('contenido')

    <br><br>
    {!! Form::open(['route' => 'perfil.View', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'form']) !!}
    {!! Form::hidden('tipo','1') !!}
    <div class="container table-responsive" style="width:80%">
        <table class="table table-striped table-bordered " id="tableFront" align="center">
            <thead>
            <tr>
                <th></th>
                <th>Perfil</th>

            </tr>
            </thead>
            <tbody>

            @foreach($perfil as $per)
                <tr>
                    <td align="center">
                        <div class="i-checks" style="width:10px; height:10px;"><input type="radio" name="id" id="Id" value="{{ $per->id }}">
                        </div>
                    </td>
                    <td>{{ $per->perfil }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <div align="center">
            <button type="button" class="btn btn-success btn-sm" name="aceptar" id="aceptar" value="1">Registrar</button>
            <button type="button" class="btn btn-info btn-sm" name="editar" id="editar" value="2" onclick="javascript: enviar(2)">Editar</button>
            <button type="button" class="btn btn-warning btn-sm" name="perfmisos" id="perfmisos" value="2" onclick="javascript: enviar(3)">Permisos</button>
        </div>
    </div>

    {!! Form::close() !!}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal"></div>


@endsection