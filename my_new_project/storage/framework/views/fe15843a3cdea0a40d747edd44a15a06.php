

<?php $__env->startSection('content'); ?>


<h1>Manage Services</h1>

<a href="<?php echo e(route('services.create')); ?>" class="button">Create New Service</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="equal-width"><b>Service Name</b></th>
            <th class="equal-width"><b>Fee Preset</b></th>
            <th class="equal-width"><b>Fee Percentage</b></th>
            <th class="equal-width"><b>Options</b></th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <!-- Service Name -->
                <td class="equal-width"><b><?php echo e($service->name); ?></b></td>

                <!-- Fee Preset Name -->
                <td class="equal-width">
                    <?php echo e($service->feePreset->name); ?>

                </td>

                <!-- Fee Percentage -->
                <td class="equal-width">
                    <?php echo e($service->percentage); ?>%
                </td>

                <!-- Edit and Delete Options -->
                <td class="equal-width text-center">
                    <div class="btn-container">
                        <a href="<?php echo e(route('services.edit', $service->id)); ?>" class="button">Edit</a>
                        <form action="<?php echo e(route('services.destroy', $service->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <br>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Laravel\my_new_project\resources\views/services/index.blade.php ENDPATH**/ ?>