@extends('layouts.app')

@section('titulo','Factores')

@section('cssscripts')

@endsection

@section('titulopag','Factores')

@section('content')


    <br><br>
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

            @foreach($factores as $fac)
                <tr>
                    <td align="center">
                        <div class="i-checks" style="width:10px; height:10px;"><input type="radio" name="radio"
                                                                                      value="{{ $fac->id }}">
                        </div>
                    </td>
                    <td>{{ $fac->factor  }}</td>
                    <td>@if($fac->estado == 1) Activo @else Deshabilitado @endif</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


@endsection

@section('jsscripts')

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();

            $("#tableFront").DataTable({

                pageLength: 10,
                responsive: true,
                pagingType: "full_numbers",
                aaSorting: [['1', 'asc']],
                "scrollX": false,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {
                        extend: 'copy',
                        text: '<i data-toggle="tooltip" title="Copiar"  class="glyphicon glyphicon-copy"></i>'
                    },
                    {
                        extend: 'csv',
                        text: '<i data-toggle="tooltip" title="csv"  class="fa fa-table"></i>',
                        title: 'evalDocente'
                    },
                    {
                        extend: 'excel',
                        text: '<i data-toggle="tooltip" title="Excel"  class="fa fa-file-excel-o"></i>',
                        title: 'evalDocente'
                    },
                    {
                        extend: 'pdf',
                        text: '<i data-toggle="tooltip" title="PDF"  class="fa fa-file-pdf-o"></i>',
                        title: 'evalDocente'
                    }

                ]

            });
        });
    </script>


@endsection



