<?php if($request['tipo'] == 1): ?>


    <?php echo Form::open(['route' => 'categoriaDes.store', 'method' => 'POST',  'class' => 'form-horizontal']); ?>

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
                        <?php echo Form::label('lblName','Nombre de categoría',['class' => 'control-label col-md-3']); ?>

                        <div class="col-md-4">
                            <?php echo Form::text('nombre',null,['required','class' => 'form-control', 'placeholder' => 'Nombre de la categoría']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form::label('lblname','Valor',['class' => 'control-label col-md-3']); ?>

                        <div class="col-md-4">
                            <?php echo form::number('valor',null,['required','class' => 'form-control', 'placeholder' => 'Valor']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo Form::label('lblName','Descripción',['class' => 'control-label col-md-3']); ?>

                        <div class="col-md-4">
                            <?php echo Form::text('descripcion',null,['required','class' => 'form-control', 'placeholder' => 'Descripción']); ?>

                        </div>
                    </div>

                    <?php echo Form::hidden('categoriacalif_id',$request['categoriades_id']); ?>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    <?php echo Form::close(); ?>


<?php endif; ?>

<?php if($request['tipo'] == 2): ?>

    <?php echo Form::open(['route' => ['categoriaDes.update',$request['id']], 'method' => 'PUT',  'class' => 'form-horizontal']); ?>

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
                        <?php echo Form::label('lblName','Nombre de categoría',['class' => 'control-label col-md-3']); ?>

                        <div class="col-md-4">
                            <?php echo Form::text('nombre',$categoriaDes->nombre,['required','class' => 'form-control', 'placeholder' => 'Nombre de la categoría']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo form::label('lblname','Valor',['class' => 'control-label col-md-3']); ?>

                        <div class="col-md-4">
                            <?php echo form::number('valor',$categoriaDes->valor,['required','class' => 'form-control', 'placeholder' => 'Valor']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo Form::label('lblName','Descripción',['class' => 'control-label col-md-3']); ?>

                        <div class="col-md-4">
                            <?php echo Form::text('descripcion',$categoriaDes->descripcion,['required','class' => 'form-control', 'placeholder' => 'Descripción']); ?>

                        </div>
                    </div>
                    <?php echo Form::hidden('categoriacalif_id',$categoriaDes->categoriacalif_id); ?>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    <?php echo Form::close(); ?>


<?php endif; ?>
