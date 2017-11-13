@extends('layouts.header')
@section('titulo','Política Descripción')
@section('titulopag','Política Descripción')

@section('jsscripts')
    @include('partials._scriptscrud')

    <script>
        function ajaxselect(param,modal)
        {
            $.post("{{ route('politicades.selectPolitica') }}",{tipo:param, _token: '{{ csrf_token() }}','politica_id': '{{$politica_id}}' },function (data) {
                $(modal).html(data);
            });
        }
    </script>


@endsection

@section('contenido')


    <br><br>
    {!! Form::open(['route' => 'politicades.politicaDesView', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'form']) !!}

    {!! Form::hidden('politica_id',$politica_id) !!}
    {!! Form::hidden('tipo','1') !!}


    <div class="container table-responsive" style="width:80%">
        <table class="table table-striped table-bordered " id="tableFront" align="center">
            <thead>
            <tr>
                <th></th>
                <th>Política</th>
                <th>Factor</th>
                <th>Criterio</th>
                <th>Indicador</th>
                <th>Pregunta</th>
                <th>Actor</th>
            </tr>
            </thead>
            <tbody>

            @foreach($politicades as $poli)
                <tr>
                    <td align="center">
                        <div class="i-checks" style="width:10px; height:10px;"><input type="radio" name="id" id="politicaId" value="{{ $poli->politica_id.'**'.$poli->factor_id.'**'.$poli->criterio_id.'**'.$poli->indicador_id.'**'.$poli->pregunta_id.'**'.$poli->actor_id }}">
                        </div>
                    </td>
                    <td>{{ $poli->nompolitica  }}</td>
                    <td>{{ $poli->factor }}</td>
                    <td>{{ $poli->criterio }}</td>
                    <td>{{ $poli->indicador }}</td>
                    <td>{{ $poli->pregunta }}</td>
                    <td>{{ $poli->actor }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <div align="center">
            <button type="button" class="btn btn-success btn-sm" name="aceptar" id="aceptar" value="1">Registrar</button>
            <button type="button" class="btn btn-info btn-sm" name="editar" id="editar" value="2" onclick="javascript: enviar(2)">Editar</button>
            <button type="button" class="btn btn-danger btn-sm" name="editar" id="editar" value="2" onclick="javascript: enviar(3)">Eliminar</button>
            <a href="{{ route('politica.index') }}" class="btn btn-warning btn-sm">Regresar</a>
            </button>

        </div>
    </div>

    {!! Form::close() !!}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal"></div>


@endsection