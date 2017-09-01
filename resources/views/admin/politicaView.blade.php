@if($request['tipo'] == 1)

    {!! Form::open(['route' => 'politica.store', 'method' => 'POST',  'class' => 'form-horizontal']) !!}
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nueva política</h4>
            </div>
            <div class="modal-body">
                <div class="container">


                    <div class="form-group">
                        {!! Form::label('lblName','Nombre política',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::text('nompolitica',null,['required','class' => 'form-control', 'placeholder' => 'Nombre del politica']) !!}
                        </div>
                        {!! Form::hidden('estado',1) !!}
                        {!! Form::hidden('sede_id',session()->get('perfil')->sede_id) !!}
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


    {!! Form::open(['route' => ['politica.update',$politica->id], 'method' => 'PUT',  'class' => 'form-horizontal']) !!}
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar politica</h4>
            </div>
            <div class="modal-body">
                <div class="container">


                    <div class="form-group">
                        {!! Form::label('lblName','Nombre política',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::text('nompolitica',$politica->nompolitica,['required','class' => 'form-control', 'placeholder' => 'Nombre del politica']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lblName','Estado',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::select('estado', ['1' => 'Activo', '2' => 'Inhabilitado'], $politica->estado,['required','class'=>'form-control']) !!}
                        </div>
                    </div>
                    {!! Form::hidden('sede_id',session()->get('perfil')->sede_id) !!}

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
