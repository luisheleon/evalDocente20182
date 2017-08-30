<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Evaldocente | 404 Error</title>

    <link rel="icon" type="image/ico" href="{{ asset('images/escudo.ico') }}"/>
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}"/>


</head>

<body class="gray-bg">


<div class="middle-box text-center animated fadeInDown">
    <h1>404</h1>
    <h3 class="font-bold">Pagina no encontrada</h3>

    <div class="error-desc">
        Lo sentimos, pero la página que está buscando no ha sido encontrada. Comprueba la URL, luego pulsa el botón de actualización en tu navegador .
        <form class="form-inline m-t" role="form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Buscar en la página">
            </div>
            <button type="submit" class="btn btn-primary">Regresar</button>
        </form>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

</body>

</html>
