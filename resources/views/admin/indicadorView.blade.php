@if($request['tipo'] == 1)

    {!! Form::open(['route' => 'indicador.store', 'method' => 'POST',  'class' => 'form-horizontal']) !!}
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo indicador</h4>
            </div>
            <div class="modal-body">
                <div class="container">


                    <div class="form-group">
                        {!! Form::label('lblName','Nombre del indicador',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::text('indicador',null,['required','class' => 'form-control', 'placeholder' => 'Nombre del indicador']) !!}
                        </div>
                        {!! Form::hidden('estado',1) !!}
                    </div>


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

    {!! Form::open(['route' => ['indicador.update',$indicador->id], 'method' => 'PUT',  'class' => 'form-horizontal']) !!}
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar indicador</h4>
            </div>
            <div class="modal-body">
                <div class="container">


                    <div class="form-group">
                        {!! Form::label('lblName','Nombre del indicador',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::text('indicador',$indicador->indicador,['required','class' => 'form-control', 'placeholder' => 'Nombre del indicador']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lblName','Estado',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::select('estado', ['1' => 'Activo', '2' => 'Inhabilitado'], $indicador->estado,['required','class'=>'form-control']) !!}
                        </div>
                    </div>

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
