<?php $__env->startSection('titulo','Política Descripción'); ?>
<?php $__env->startSection('titulopag','Política Descripción'); ?>

<?php $__env->startSection('jsscripts'); ?>
    <?php echo $__env->make('partials._scriptscrud', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script>
        function ajaxselect(param,modal)
        {
            $.post("<?php echo e(route('politicades.selectPolitica')); ?>",{tipo:param, _token: '<?php echo e(csrf_token()); ?>','politica_id': '<?php echo e($politica_id); ?>' },function (data) {
                $(modal).html(data);
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>


    <br><br>
    <?php echo Form::open(['route' => 'politicades.politicaDesView', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'form']); ?>


    <?php echo Form::hidden('politica_id',$politica_id); ?>

    <?php echo Form::hidden('tipo','1'); ?>



    <div class="container table-responsive" style="width:80%">
        <table class="table table-striped table-bordered " id="tableFront" align="center">
            <thead>
            <tr>
                <th></th>
                <th>Política</th>
                <th>Factor</th>
                <th>Criterio</th>
                <th>Indicador</th>
                <th>Pregunta</th>
                <th>Actor</th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $politicades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poli): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td align="center">
                        <div class="i-checks" style="width:10px; height:10px;"><input type="radio" name="id" id="politicaId" value="<?php echo e($poli->politica_id.'**'.$poli->factor_id.'**'.$poli->criterio_id.'**'.$poli->indicador_id.'**'.$poli->pregunta_id.'**'.$poli->actor_id); ?>">
                        </div>
                    </td>
                    <td><?php echo e($poli->nompolitica); ?></td>
                    <td><?php echo e($poli->factor); ?></td>
                    <td><?php echo e($poli->criterio); ?></td>
                    <td><?php echo e($poli->indicador); ?></td>
                    <td><?php echo e($poli->pregunta); ?></td>
                    <td><?php echo e($poli->actor); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
        <div align="center">
            <button type="button" class="btn btn-success btn-sm" name="aceptar" id="aceptar" value="1">Registrar</button>
            <button type="button" class="btn btn-info btn-sm" name="editar" id="editar" value="2" onclick="javascript: enviar(2)">Editar</button>
            <button type="button" class="btn btn-danger btn-sm" name="editar" id="editar" value="2" onclick="javascript: enviar(3)">Eliminar</button>
            <a href="<?php echo e(route('politica.index')); ?>" class="btn btn-warning btn-sm">Regresar</a>
            </button>

        </div>
    </div>

    <?php echo Form::close(); ?>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal"></div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>