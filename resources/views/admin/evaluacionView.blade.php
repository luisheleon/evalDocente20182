@if($request['tipo'] == 1)


    {!! Form::open(['route' => 'evaluacion.store', 'method' => 'POST',  'class' => 'form-horizontal']) !!}
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo Criterio</h4>
            </div>
            <div class="modal-body">
                <div class="container">

                    <div class="form-group">
                        {!! Form::label('lblName','Nombre de evaluación',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::text('nombre',null,['required','class' => 'form-control', 'placeholder' => 'Nombre de la evaluación']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('lblName','Política',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!!  Form::select('politica_id', $politica, null, ['placeholder' => 'Seleccione una opción','class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('lblName','Periodo',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!!  Form::select('periodo', $periodo, null, ['placeholder' => 'Seleccione una opción','class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('lblName','Categoria de calificación',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!!  Form::select('categoriacalif_id', $categoria, null, ['placeholder' => 'Seleccione una opción','class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('lblName','Fecha de inicio',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!!  Form::date('fecha_inicio', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('lblName','Fecha final',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!!  Form::date('fecha_final', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                        </div>
                    </div>

                    {!! Form::hidden('estado','1') !!}
                    {!! Form::hidden('sede_id',$perfil->sede_id) !!}

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    {!! Form::close() !!}

@endif

@if($request['tipo'] == 2)


    {!! Form::open(['route' => ['evaluacion.update',$evaluacion->id], 'method' => 'PUT',  'class' => 'form-horizontal']) !!}
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar evaluación</h4>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="form-group">
                        {!! Form::label('lblName','Nombre de evaluación',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::text('nombre',$evaluacion->nombre,['required','class' => 'form-control', 'placeholder' => 'Nombre de la evaluación']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('lblName','Política',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!!  Form::select('politica_id', $politica, $evaluacion->politica_id, ['placeholder' => 'Seleccione una opción','class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('lblName','Periodo',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!!  Form::select('periodo', $periodo, $evaluacion->periodo, ['placeholder' => 'Seleccione una opción','class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('lblName','Categoria de calificación',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!!  Form::select('categoriacalif_id', $categoria, $evaluacion->categoriacalif_id, ['placeholder' => 'Seleccione una opción','class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('lblName','Fecha de inicio',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!!  Form::date('fecha_inicio', \Carbon\Carbon::createFromFormat('Y-m-d h:i:s', $evaluacion->fecha_inicio),['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('lblName','Fecha final',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!!  Form::date('fecha_final', \Carbon\Carbon::createFromFormat('Y-m-d h:i:s', $evaluacion->fecha_final),['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('lblName','Estado',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!!  Form::select('estado', $estado, $evaluacion->estado, ['placeholder' => 'Seleccione una opción','class'=>'form-control']) !!}
                        </div>
                    </div>


                    {!! Form::hidden('sede_id',$perfil->sede_id) !!}



                    @if(session()->get('msn') != null)
                    <div class="container col-md-8 center-block">
                        <div class="form-group">
                            <div class="alert alert-warning alert-dismissible fade in " role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                <strong>Alerta!</strong> {{ session()->get('msn') }}.
                            </div>
                        </div>
                    </div>
                    @endisset


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    {!! Form::close() !!}

@endif
