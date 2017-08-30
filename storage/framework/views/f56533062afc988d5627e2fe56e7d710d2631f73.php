<?php $__env->startSection('titulo','Criterio'); ?>
<?php $__env->startSection('titulopag','Criterio'); ?>

<?php $__env->startSection('jsscripts'); ?>
    <?php echo $__env->make('admin._scriptscrud', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

    <br><br>
    <?php echo Form::open(['route' => 'factor.factorView', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'form']); ?>

    <div class="container table-responsive" style="width:80%">
        <table class="table table-striped table-bordered " id="tableFront" align="center">
            <thead>
            <tr>
                <th></th>
                <th>Perfil</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $criterio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td align="center">
                        <div class="i-checks" style="width:10px; height:10px;"><input type="radio" name="id" id="factorId" value="<?php echo e($cri->id); ?>">
                        </div>
                    </td>
                    <td><?php echo e($cri->criterio); ?></td>
                    <td><?php if($cri->estado == 1): ?> Activo <?php else: ?> Deshabilitado <?php endif; ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
        <div align="center">
            <button type="button" class="btn btn-success btn-sm" name="aceptar" id="aceptar" value="1">Registrar</button>
            <button type="button" class="btn btn-info btn-sm" name="editar" id="editar" value="2" onclick="javascript: enviar(2)">Editar</button>
            </button>

        </div>
    </div>

    <?php echo Form::close(); ?>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal"></div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>