<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>evalDocente - @yield('titulo') </title>


    <link rel="icon" type="image/ico" href="{{ asset('images/escudo.ico') }}"/>
    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dataTables/datatables.min.css') }}" />





    @yield('cssscripts')

    <script src="{{ asset('js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('js/pace/pace.min.js') }}"></script>
    <script src="{{ asset('js/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/iCheck/icheck.min.js') }}"></script>

    <script>
        $('#checkId').iCheck();
    </script>

    @include('partials._datatables')
    @yield('jsscripts')



</head>
<body>

<!-- Wrapper-->
<div id="wrapper">

    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Page wraper -->
    <div id="page-wrapper" class="gray-bg">

        <!-- Page wrapper -->
        @include('layouts.topnavbar')

        <!-- Main view  -->
        <div class="row  border-bottom white-b  g dashboard-header">
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><div id="namePage">@yield('titulopag')</div></h2>
                </div>
                <div class="col-lg-2"> </div>
            </div>

            <div id="contenidoApp">


                <div class="row wrapper border-bottom white-bg page-heading">
                    <br>
                    @include('partials._messages')

                @yield('contenido')

                </div>

            </div>

        </div>


        <!-- Footer -->
        @include('layouts.footer')

    </div>
    <!-- End page wrapper-->

</div>
<!-- End wrapper-->




@show

</body>
</html>
