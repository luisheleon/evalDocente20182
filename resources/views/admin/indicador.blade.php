@extends('layouts.header')
@section('titulo','Indicadores')
@section('titulopag','Indicadores')
@section('jsscripts')
    @include('partials._scriptscrud')
@endsection

@section('contenido')

    <br><br>
    {!! Form::open(['route' => 'indicador.indicadorView', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'form']) !!}
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

            @foreach($indicadores as $ind)
                <tr>
                    <td align="center">
                        <div class="i-checks" style="width:10px; height:10px;"><input type="radio" name="id" id="id" value="{{ $ind->id }}">
                        </div>
                    </td>
                    <td>{{ $ind->indicador  }}</td>
                    <td>@if($ind->estado == 1) Activo @else Deshabilitado @endif</td>
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