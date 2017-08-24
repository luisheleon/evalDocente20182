@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
        <div class="panel-heading">Registrar</div>

        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Nombres</label>

                <div class="col-md-6">
                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required
                           autofocus>

                    @if ($errors->has('nombre'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Apellidos</label>

                <div class="col-md-6">
                    <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}" required
                           autofocus>

                    @if ($errors->has('apellidos'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Documento</label>

                <div class="col-md-6">
                    <input id="id" type="number" class="form-control" name="id" value="{{ old('id') }}" required
                           autofocus>

                    @if ($errors->has('id'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('perfil_id') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Perfil</label>

                <div class="col-md-6">
                    <input id="perfil_id" type="number" class="form-control" name="perfil_id" value="{{ old('perfil_id') }}" required
                           autofocus>

                    @if ($errors->has('perfil_id'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('perfil_id') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                           required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>



@endsection
