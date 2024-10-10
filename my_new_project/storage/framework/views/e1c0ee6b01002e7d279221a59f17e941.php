

<?php $__env->startSection('content'); ?>
    <div class="landing-container">
        <div class="link-container">
            <a href="<?php echo e(route('fee_percentages.index')); ?>" class="link-btn">Calculate Fee Percentage</a>
            <br>
            <a href="<?php echo e(route('fee_presets.index')); ?>" class="link-btn">Manage Fee Presets</a>
            <br>
            <a href="<?php echo e(route('services.index')); ?>" class="link-btn">Manage Services</a>
            <br>
        </div>
    </div>
    <h1>Threshold</h1>

    <a href="<?php echo e(route('thresholds.create')); ?>" class="btn btn-primary">Create New Threshold</a>


    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $threshold; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $threshold): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($threshold->amount); ?></td>
                    <td>
                        <a href="<?php echo e(route('thresholds.edit', $threshold->id)); ?>" class="btn btn-warning">Edit</a>
                        <form action="<?php echo e(route('thresholds.destroy', $threshold->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Laravel\my_new_project\resources\views/thresholds/index.blade.php ENDPATH**/ ?>