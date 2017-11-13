<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="icon" type="image/ico" href="{{ asset('images/escudo.ico') }}"/>
    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('css')
    <!-- Mainly scripts -->
    <script src="{{ asset('js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('js/pace/pace.min.js') }}"></script>
    <script src="{{ asset('js/toastr/toastr.min.js') }}"></script>
    @yield('scripts')


</head>
<body style="background-color:#39507a">
<div class="middle-box text-center animated fadeInDown">
    <div>
        <div>
            <h2 class="logo-name" id="animacion">EDU</h2>
        </div>
        <h3 style="color:#FFFFFF">Evaluación docente Universidad Santo Tomás</h3>
        <img alt="image" class="img-circle" src="{{ asset('images/Escudo_Usta.png') }}" style="width:30%; height:30%"/>
        <p style="color:#FFFFFF">Módulo de administración </p>


            @yield('content')


        <p class="m-t" style="color:#FFFFFF; padding-top:70px">
            <small>Universidad Santo Tomás &copy; 2016</small>
        </p>
    </div>
</div>
<script>
    $(document).ready(function (e) {
        $('#animacion').addClass('animated rubberBand');
    });
</script>
</body>
</html>