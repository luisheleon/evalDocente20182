@if($request['tipo'] == 1)

    {!! Form::open(['route' => 'categoria.store', 'method' => 'POST',  'class' => 'form-horizontal']) !!}
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nueva categoría de calificación</h4>
            </div>
            <div class="modal-body">
                <div class="container">


                    <div class="form-group">
                        {!! Form::label('lblName','Nombre de categoría',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::text('nomcategoria',null,['required','class' => 'form-control', 'placeholder' => 'Nombre de la categoría']) !!}
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


    {!! Form::open(['route' => ['categoria.update',$categoria->id], 'method' => 'PUT',  'class' => 'form-horizontal']) !!}
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar categoría de calificación</h4>
            </div>
            <div class="modal-body">
                <div class="container">


                    <div class="form-group">
                        {!! Form::label('lblName','Nombre de la categoría',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::text('nomcategoria',$categoria->nomcategoria,['required','class' => 'form-control', 'placeholder' => 'Nombre de la categoría']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lblName','Estado',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::select('estado', ['1' => 'Activo', '2' => 'Inhabilitado'], $categoria->estado,['required','class'=>'form-control']) !!}
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
