<?php if($request['tipo'] == 1): ?>

    <?php echo Form::open(['route' => 'criterio.store', 'method' => 'POST',  'class' => 'form-horizontal']); ?>

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
                        <?php echo Form::label('lblName','Nombre del criterio',['class' => 'control-label col-md-3']); ?>

                        <div class="col-md-4">
                            <?php echo Form::text('criterio',null,['required','class' => 'form-control', 'placeholder' => 'Nombre del criterio']); ?>

                        </div>
                        <?php echo Form::hidden('estado',1); ?>

                    </div>


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

    <?php echo Form::open(['route' => ['criterio.update',$criterio->id], 'method' => 'PUT',  'class' => 'form-horizontal']); ?>

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo Factor</h4>
            </div>
            <div class="modal-body">
                <div class="container">


                    <div class="form-group">
                        <?php echo Form::label('lblName','Nombre del criterio',['class' => 'control-label col-md-3']); ?>

                        <div class="col-md-4">
                            <?php echo Form::text('factor',$criterio->criterio,['required','class' => 'form-control', 'placeholder' => 'Nombre del criterio']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo Form::label('lblName','Estado',['class' => 'control-label col-md-3']); ?>

                        <div class="col-md-4">
                            <?php echo Form::select('estado', ['1' => 'Activo', '2' => 'Inhabilitado'], $criterio->estado,['required','class'=>'form-control']); ?>

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
    <?php echo Form::close(); ?>


<?php endif; ?>
