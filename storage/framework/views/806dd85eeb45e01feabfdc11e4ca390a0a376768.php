<?php $__env->startSection('content'); ?>

        <div class="panel panel-default">
        <div class="panel-heading">Login</div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo e(csrf_field()); ?>


                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <label for="email" class="col-md-4 control-label">Usuario</label>

                    <div class="col-md-6">
                        <input id="id" type="number" class="form-control" name="id" value="<?php echo e(old('id')); ?>" required autofocus>

                        <?php if($errors->has('id')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('id')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <label for="password" class="col-md-4 control-label">Contraseña</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Entrar
                        </button>

                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                            Olvido su contraseña?
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>