@extends('layouts.header')
@section('titulo','Valor de calificación')
@section('titulopag','Valor de calificación')
@section('jsscripts')
    @include('partials._scriptscrud')
@endsection

@section('contenido')

    <br><br>

    {!! Form::open(['route' => 'categoriaDes.categoriaDesView', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'form']) !!}
    {!! Form::hidden('tipo','1') !!}
    {!! Form::hidden('categoriades_id',$categoriades_id) !!}

    <div class="container table-responsive" style="width:80%">
        <table class="table table-striped table-bordered " id="tableFront" align="center">
            <thead>
            <tr>
                <th></th>
                <th>Nombre valor</th>
                <th>Valor</th>
                <th>Descripción</th>
            </tr>
            </thead>
            <tbody>

            @foreach($categoriaDes as $cat)
                <tr>
                    <td align="center">
                        <div class="i-checks" style="width:10px; height:10px;"><input type="radio" name="id" id="id" value="{{ $cat->id }}">
                    </td>
                    <td>{{ $cat->nombre  }}</td>
                    <td>{{ $cat->valor  }}</td>
                    <td>{{ $cat->descripcion  }}</td>

                </tr>
            @endforeach

            </tbody>
        </table>
        <div align="center">
            <button type="button" class="btn btn-success btn-sm" name="aceptar" id="aceptar" value="1">Registrar</button>
            <button type="button" class="btn btn-info btn-sm" name="editar" id="editar" value="2" onclick="javascript: enviar(2)">Editar</button>
            <a href="{{ route('categoria.index') }}" class="btn btn-warning btn-sm">Regresar</a>
            </button>

        </div>
    </div>

    {!! Form::close() !!}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal"></div>


@endsection
