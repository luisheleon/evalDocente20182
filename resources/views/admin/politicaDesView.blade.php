@if($request['tipo'] == 1)



    {!! Form::open(['route' => 'politicades.store', 'method' => 'POST',  'class' => 'form-horizontal']) !!}
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
                        {!! Form::label('lblName','Actor',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::select('actor_id',$actor, null,['required','class'=>'form-control','placeholder' => 'Seleccione','id'=>'actor_id']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('lblName','Factor',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::select('factor_id',$factor, null,['required','class'=>'form-control','placeholder' => 'Seleccione','id'=>'factor_id']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lblName','Criterio',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::select('criterio_id',$criterio, null,['required','class'=>'form-control','placeholder' => 'Seleccione','id'=>'criterio_id']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lblName','Indicador',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::select('indicador_id',$indicador, null,['required','class'=>'form-control','placeholder' => 'Seleccione','id'=>'indicador_id']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lblName','Pregunta',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::select('pregunta_id',$pregunta, null,['required','class'=>'form-control','placeholder' => 'Seleccione','id'=>'pregunta_id']) !!}
                        </div>
                    </div>

                    {!! Form::hidden('politica_id',$request['politica_id']) !!}

                    <div id="divCriterio"></div>
                    <div id="divIndicador"></div>
                    <div id="divPregunta"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    <script>
        $(document).ready(function() {
            $('#actor_id').select2();
            //$('.js-example-basic-single').select2();
        });
    </script>

    {!! Form::close() !!}

@endif

@if($request['tipo'] == 2)



    {!! Form::open(['route' => ['politicades.update',$idupdate], 'method' => 'PUT',  'class' => 'form-horizontal']) !!}
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
                        {!! Form::label('lblName','Actor',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::select('actor_id',$actor, $iddescript[5],['required','class'=>'form-control','placeholder' => 'Seleccione']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lblName','Factor',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::select('factor_id',$factor, $iddescript[1],['required','class'=>'form-control','placeholder' => 'Seleccione']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lblName','Criterio',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::select('criterio_id',$criterio, $iddescript[2],['required','class'=>'form-control','placeholder' => 'Seleccione']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lblName','Indicador',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::select('indicador_id',$indicador, $iddescript[3],['required','class'=>'form-control','placeholder' => 'Seleccione']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('lblName','Pregunta',['class' => 'control-label col-md-3']) !!}
                        <div class="col-md-4">
                            {!! Form::select('pregunta_id',$pregunta, $iddescript[4],['required','class'=>'form-control','placeholder' => 'Seleccione']) !!}
                        </div>
                    </div>

                    {!! Form::hidden('politica_id', $iddescript[0]) !!}

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

<!--
    Se crean los select en cadena de la generación de evaluaciones
-->

    <!--Criterio-->
@if($request['tipo']==3)


    <div class="form-group">
        {!! Form::label('lblName','Criterio',['class' => 'control-label col-md-3']) !!}
        <div class="col-md-4">
            {!! Form::select('criterio_id',$criterios, null,['required','class'=>'form-control','onchange'=>"ajaxselect(4,'#divIndicador')",'placeholder' => 'Seleccione']) !!}
        </div>
    </div>

@endif

    <!--indicador-->
@if($request['tipo']==4)

    <div class="form-group">
        {!! Form::label('lblName','Indicador',['class' => 'control-label col-md-3']) !!}
        <div class="col-md-4">
            {!! Form::select('indicador_id',$indicadores, null,['required','class'=>'form-control','onchange'=>"ajaxselect(5,'#divPregunta')",'placeholder' => 'Seleccione']) !!}
        </div>
    </div>

@endif

@if($request['tipo']==5)
    <div class="form-group">
        {!! Form::label('lblName','Pregunta',['class' => 'control-label col-md-3']) !!}
        <div class="col-md-4">
            {!! Form::select('pregunta_id',$preguntas, null,['required','class'=>'form-control','placeholder' => 'Seleccione']) !!}
        </div>
    </div>

@endif
