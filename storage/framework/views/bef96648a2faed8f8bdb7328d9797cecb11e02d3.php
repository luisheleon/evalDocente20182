<?php $__env->startSection('titulo','Valor de calificación'); ?>
<?php $__env->startSection('titulopag','Valor de calificación'); ?>
<?php $__env->startSection('jsscripts'); ?>
    <?php echo $__env->make('partials._scriptscrud', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

    <br><br>
    <?php echo Form::open(['route' => 'categoriaDes.categoriaDesView', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'form']); ?>

    <?php echo Form::hidden('tipo','1'); ?>

    <div class="container table-responsive" style="width:80%">
        <table class="table table-striped table-bordered " id="tableFront" align="center">
            <thead>
            <tr>
                <th></th>
                <th>Nombre valor</th>
                <th>Valor</th>
                <th>Descripción</th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $categoriaDes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td align="center">
                        <div class="i-checks" style="width:10px; height:10px;"><input type="radio" name="id" id="id" value="<?php echo e($cat->id); ?>">
                        </div>
                    </td>
                    <td><?php echo e($cat->nombre); ?></td>
                    <td><?php echo e($cat->valor); ?></td>
                    <td><?php echo e($cat->descripcion); ?></td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
        <div align="center">
            <button type="button" class="btn btn-success btn-sm" name="aceptar" id="aceptar" value="1">Registrar</button>
            <button type="button" class="btn btn-info btn-sm" name="editar" id="editar" value="2" onclick="javascript: enviar(2)">Editar</button>
            <a href="<?php echo e(route('categoria.index')); ?>" class="btn btn-warning btn-sm">Regresar</a>
            </button>

        </div>
    </div>

    <?php echo Form::close(); ?>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal"></div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>