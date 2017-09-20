@extends('layouts.header')
@section('titulo','Categoría de calificación')
@section('titulopag','Categoría de calificación')
@section('jsscripts')
    @include('partials._scriptscrud')
@endsection

@section('contenido')

    <br><br>
    {!! Form::open(['route' => 'categoria.categoriaView', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'form']) !!}
    {!! Form::hidden('tipo','1') !!}
    <div class="container table-responsive" style="width:80%">
        <table class="table table-striped table-bordered " id="tableFront" align="center">
            <thead>
            <tr>
                <th></th>
                <th>Nombre categoría</th>
                <th>Estado</th>
                <th>Funciones</th>
            </tr>
            </thead>
            <tbody>

            @foreach($categoria as $cat)
                <tr>
                    <td align="center">
                        <div class="i-checks" style="width:10px; height:10px;"><input type="radio" name="id" id="id" value="{{ $cat->id }}">
                        </div>
                    </td>
                    <td>{{ $cat->nomcategoria  }}</td>
                    <td>@if($cat->estado == 1) Activo @else Deshabilitado @endif</td>
                    <td><center><a href="{{ route('categoriaDes.show',['idcat'=>$cat->id]) }}" data-toggle="tooltip" data-placement="top" title="Generar instrumento" class="btn btn-warning btn-sm"><i class="fa fa-cogs" aria-hidden="true"></i></center></a></td>
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
