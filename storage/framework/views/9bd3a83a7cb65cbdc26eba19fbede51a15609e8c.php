<?php $__env->startSection('titulo','Política Descripción'); ?>
<?php $__env->startSection('titulopag','Política Descripción'); ?>

<?php $__env->startSection('jsscripts'); ?>
    <?php echo $__env->make('partials._scriptscrud', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

    <br><br>
    <?php echo Form::open(['route' => 'politicades.politicaDesView', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'form']); ?>

    <div class="container table-responsive" style="width:80%">
        <table class="table table-striped table-bordered " id="tableFront" align="center">
            <thead>
            <tr>
                <th></th>
                <th>Política</th>
                <th>Sede</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $politicades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poli): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td align="center">
                        <div class="i-checks" style="width:10px; height:10px;"><input type="radio" name="id" id="politicaId" value="<?php echo e($poli->id); ?>">
                        </div>
                    </td>
                    <td><?php echo e($poli->nompolitica); ?></td>
                    <td><?php echo e($poli->sede->sede); ?></td>
                    <td><?php if($poli->estado == 1): ?> Activo <?php else: ?> Deshabilitado <?php endif; ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
        <div align="center">
            <button type="button" class="btn btn-success btn-sm" name="aceptar" id="aceptar" value="1">Registrar</button>
            <button type="button" class="btn btn-info btn-sm" name="editar" id="editar" value="2" onclick="javascript: enviar(2)">Editar</button>
            <a href="<?php echo e(route('politica.index')); ?>" class="btn btn-danger btn-sm">Regresar</a>
            </button>

        </div>
    </div>

    <?php echo Form::close(); ?>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal"></div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>