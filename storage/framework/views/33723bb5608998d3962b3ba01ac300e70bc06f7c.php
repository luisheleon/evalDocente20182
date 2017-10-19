<?php if($request['tipo'] == 1): ?>

    <?php echo Form::open(['route' => 'perfil.store', 'method' => 'POST',  'class' => 'form-horizontal']); ?>

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo perfil</h4>
            </div>
            <div class="modal-body">
                <div class="container">


                    <div class="form-group">
                        <?php echo Form::label('lblName','Perfil',['class' => 'control-label col-md-3']); ?>

                        <div class="col-md-4">
                            <?php echo Form::text('perfil',null,['required','class' => 'form-control', 'placeholder' => 'Nombre del perfil']); ?>

                        </div>
                    </div>

                    <?php echo e(Form::hidden('sede_id',$perfil->sede_id)); ?>



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

    <?php echo Form::open(['route' => ['perfil.update',$perfil->id], 'method' => 'PUT',  'class' => 'form-horizontal']); ?>

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
                        <?php echo Form::label('lblName','Nombre del perfil',['class' => 'control-label col-md-3']); ?>

                        <div class="col-md-4">
                            <?php echo Form::text('perfil',$perfil->perfil,['required','class' => 'form-control', 'placeholder' => 'Perifl']); ?>

                        </div>
                    </div>

                    <?php echo form::hidden('sede_id',$perfil->sede_id); ?>



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
