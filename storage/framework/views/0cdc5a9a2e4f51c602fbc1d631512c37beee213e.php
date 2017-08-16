<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>evalDocente - <?php echo $__env->yieldContent('titulo'); ?> </title>


    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/dataTables/datatables.min.css'); ?>" />
    <?php echo $__env->yieldContent('cssscripts'); ?>

    <script src="<?php echo asset('js/app.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/dataTables/datatables.min.js'); ?>"></script>
    <?php echo $__env->yieldContent('jsscripts'); ?>

</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        <?php echo $__env->make('layouts.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            <?php echo $__env->make('layouts.topnavbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- Main view  -->
            <div class="row  border-bottom white-bg dashboard-header">
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2><div id="namePage"><?php echo $__env->yieldContent('titulopag'); ?></div></h2>
                    </div>
                    <div class="col-lg-2"> </div>
                </div>
            <?php echo $__env->yieldContent('content'); ?>
            </div>


            <!-- Footer -->
            <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->




<?php echo $__env->yieldSection(); ?>

</body>
</html>
