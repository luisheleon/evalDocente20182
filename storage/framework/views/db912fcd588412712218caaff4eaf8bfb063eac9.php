<?php if(session()->has('msn')): ?>

    <div class="alert alert-<?php echo e(session()->has('tipoAlert') ? session()->get('tipoAlert') : 'success'); ?> alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>Alert!</strong> <?php echo e(session()->get('msn')); ?>.
    </div>

<?php endif; ?>