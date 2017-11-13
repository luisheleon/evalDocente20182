<?php $__env->startSection('titulo','Evaluar docentes'); ?>
<?php $__env->startSection('titulopag','Materias'); ?>

<?php $__env->startSection('jsscripts'); ?>
    <?php echo $__env->make('partials._scriptscrud', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>



    <br><br>
    <?php echo Form::open(['route' => 'materiaestudiante.index', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'form']); ?>

    <?php echo Form::hidden('tipo','1'); ?>

    <div class="container table-responsive" style="width:80%">

        <?php if(isset($periodo)): ?>

        <table id="tableFront" class="table table-striped table-bordered" cellspacing="0">
            <thead id="tableColor">
            <tr>
                <th width="20%">Estado</th>
                <th width="40%">Materia</th>
                <th width="40%">Docente</th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $materiasEstuidante; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td align="center">
                            <?php if(in_array($materia->codmateria,$dataRespuesta)): ?>
                                <i class="fa fa-flag fa-5" style="color: dodgerblue;" aria-hidden="true"></i></td>
                        <?php else: ?>
                            <a href="<?php echo e(route('materias.preguntas',['docente_id'=>$materia->docente_id,'materia_id'=>$materia->codmateria,'nommateria'=>$materia->nommateria,'nomdocente'=>$materia->nombre,'apedocente'=>$materia->apellidos,'idEval'=>$idEval])); ?>"><i
                                        class="fa fa-check" style="color: forestgreen;"
                                        aria-hidden="true"></i>Calificar</a></td>
                        <?php endif; ?>
                        <td><?php echo e($materia->nommateria); ?> </td>
                        <td><?php echo e($materia->nombre); ?> <?php echo e($materia->apellidos); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

            <?php else: ?>
                <div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Alerta!</strong> No hay evaluaciones disponible en el momento </div>
            <?php endif; ?>
        </table>
    </div>

    <?php echo Form::close(); ?>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal"></div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>