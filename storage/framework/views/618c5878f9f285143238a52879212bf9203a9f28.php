
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold"><?php echo e(Auth::user()->nombre); ?> <?php echo e(Auth::user()->apellidos); ?></strong>
                            </span> <span class="text-muted text-xs block"><?php echo e($perfil->perfil); ?> <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                                Logout
                            </a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    EVAL
                </div>
            </li>
            <?php $__currentLoopData = $modulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="">
                    <a href="index.html"><i class="fa <?php echo e($mod->image); ?>"></i> <span class="nav-label"><?php echo e($mod->modulo); ?></span> <span class="fa arrow"></span></a>

                    <ul class="nav nav-second-level collapse" style="height: 0px;">
                        <?php $__currentLoopData = $paginas[$mod->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pagi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e($pagi[2]); ?>"><?php echo e($pagi[0]); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>

    </div>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo e(csrf_field()); ?>

    </form>
</nav>



