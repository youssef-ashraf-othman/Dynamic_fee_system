

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Edit Fee Percentage</h1>

        <form action="<?php echo e(route('fee_percentages.update', $feePercentage->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="fee_preset_id">Fee Preset</label>
                <select name="fee_preset_id" id="fee_preset_id" class="form-control" required>
                    <?php $__currentLoopData = $feePresets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($preset->id); ?>" <?php echo e($preset->id == $feePercentage->fee_preset_id ? 'selected' : ''); ?>>
                            <?php echo e($preset->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="service_id">Service</label>
                <select name="service_id" id="service_id" class="form-control" required>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($service->id); ?>" <?php echo e($service->id == $feePercentage->service_id ? 'selected' : ''); ?>>
                            <?php echo e($service->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="threshold_id">Threshold</label>
                <select name="threshold_id" id="threshold_id" class="form-control" required>
                    <?php $__currentLoopData = $thresholds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $threshold): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($threshold->id); ?>" <?php echo e($threshold->id == $feePercentage->threshold_id ? 'selected' : ''); ?>>
                            <?php echo e($threshold->amount); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Percentage Field -->
            <div class="form-group">
                <label for="percentage">Percentage</label>
                <input type="number" name="percentage" id="percentage" class="form-control" step="0.01" value="<?php echo e(old('percentage', $feePercentage->percentage)); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Laravel\my_new_project\resources\views/fee_percentages/edit.blade.php ENDPATH**/ ?>