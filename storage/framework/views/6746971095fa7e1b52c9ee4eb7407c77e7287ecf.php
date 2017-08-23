<?php $__env->startSection('titulo','Factores'); ?>

<?php $__env->startSection('cssscripts'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('titulopag','Factores'); ?>

<?php $__env->startSection('content'); ?>


    <br><br>
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

            <?php $__currentLoopData = $factores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td align="center">
                        <div class="i-checks" style="width:10px; height:10px;"><input type="radio" name="radio"
                                                                                      value="<?php echo e($fac->id); ?>">
                        </div>
                    </td>
                    <td><?php echo e($fac->factor); ?></td>
                    <td><?php if($fac->estado == 1): ?> Activo <?php else: ?> Deshabilitado <?php endif; ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsscripts'); ?>

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();

            $("#tableFront").DataTable({

                pageLength: 10,
                responsive: true,
                pagingType: "full_numbers",
                aaSorting: [['1', 'asc']],
                "scrollX": false,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {
                        extend: 'copy',
                        text: '<i data-toggle="tooltip" title="Copiar"  class="glyphicon glyphicon-copy"></i>'
                    },
                    {
                        extend: 'csv',
                        text: '<i data-toggle="tooltip" title="csv"  class="fa fa-table"></i>',
                        title: 'evalDocente'
                    },
                    {
                        extend: 'excel',
                        text: '<i data-toggle="tooltip" title="Excel"  class="fa fa-file-excel-o"></i>',
                        title: 'evalDocente'
                    },
                    {
                        extend: 'pdf',
                        text: '<i data-toggle="tooltip" title="PDF"  class="fa fa-file-pdf-o"></i>',
                        title: 'evalDocente'
                    }

                ]

            });
        });
    </script>


<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>