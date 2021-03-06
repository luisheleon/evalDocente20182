<?php $__env->startSection('titulo','Evaluar del decano'); ?>
<?php $__env->startSection('titulopag','Evaluación del decano'); ?>

<?php $__env->startSection('jsscripts'); ?>
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>



    <?php if($respuestasActivas == 1): ?>

        <div class="alert alert-warning alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Alerta!</strong> Ya realizo su autoevaluación </div>
     <?php else: ?>


    <?php if(isset($periodo)): ?>


    <?php echo Form::open(['route' => 'docente.store', 'method' => 'POST',  'class' => 'form-horizontal','id' => 'formPreguntas']); ?>


    <input type="hidden" name="docente_id" id="docente_id" value="<?php echo e(\Illuminate\Support\Facades\Auth::user()->id); ?>">
    <input type="hidden" name="materia_id" id="materia_id" value="0">
    <input type="hidden" name="sede_id" id="sede_id" value="<?php echo e($sede); ?>">
    <input type="hidden" name="periodo" id="periodo" value="<?php echo e($periodo); ?>">
    <input type="hidden" name="evaluacion_id" id="evaluacion_id" value="<?php echo e($idEval); ?>">
    <input type="hidden" name="actor_id" id="actor_id" value="2">


    <div class="container" style="width: 80%">


        <table class="table table-responsive table-bordered" style="background-color: white">
            <tr>
                <td colspan="2" align="center"><b>Información general</b></td>
            </tr>
            <tr align="center">
                <td width="30%"><b> Nombre del docente</b></td>
                <td><?php echo e(\Illuminate\Support\Facades\Auth::user()->nombre); ?> <?php echo e(\Illuminate\Support\Facades\Auth::user()->apellidos); ?></td>
            </tr>

        </table>



        <table class="table table-responsive table-bordered table-condensed" style="background-color: white">
            <tr align="center">
                <td style="width: 30%"><b>Categorías de calificación</b></td>
            </tr>
            <tr>
                <?php $__currentLoopData = $categoriaCalif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $califica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td style="text-align: center"><b><?php echo e($califica->nombre); ?></b></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <tr>
                <?php $__currentLoopData = $categoriaCalif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $califica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td style="text-align: center"><?php echo e($califica->descripcion); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>


        </table>


        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
            <ul id="myTabs" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab"
                                                          aria-controls="home" aria-expanded="true">
                        <td><?php echo e(\Illuminate\Support\Facades\Auth::user()->nombre); ?> <?php echo e(\Illuminate\Support\Facades\Auth::user()->apellidos); ?></td>
                    </a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                    <br><br>

                    <table id="table" class="table table-striped table-bordered " cellspacing="0" align="center">
                        <thead id="tableColor">
                        <tr>
                            <th style="text-align: center" width="60%">Pregunta</th>
                            <?php $__currentLoopData = $categoriaCalif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $califica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th style="text-align: center"><?php echo e($califica->nombre); ?></th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <th align="center">Comentario</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $preguntasTotal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preguntas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td align="center"><?php echo e($preguntas->pregunta); ?> </td>
                                <?php $__currentLoopData = $categoriaCalif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $califica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td align="center"><input class="flat-red" type="radio" id="cal[<?php echo e($preguntas->id); ?>]"
                                                              name="cal[<?php echo e($preguntas->id); ?>]"
                                                              value="<?php echo e($califica->id); ?>" required></td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <td align="center"><textarea class="form-control" name="comentario" id="comentario" rows="3" cols="25" ></textarea></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

        <div align="center">
            <button type="submit" class="btn btn-success btn-sm" name="aceptar" id="aceptar" value="1">Registrar
            </button>
        </div>

    </div>
    <?php else: ?>

        <div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Alerta!</strong> No hay evaluaciones disponible en el momento </div>
        <?php endif; ?>

    <?php endif; ?>

    <br><br>

    <?php echo Form::close(); ?>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal"></div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>