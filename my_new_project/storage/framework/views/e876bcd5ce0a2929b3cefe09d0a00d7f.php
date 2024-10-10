

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 align = 'center'>Edit Service</h1>

    <form action="<?php echo e(route('services.update', $service->id)); ?>" method="POST" class="form-container" onsubmit="return validateForm()">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Service Name Section -->
        <br><br>
        <div class="form-group mb-4">
            <label for="name" class="form-label">Service Name:</label>
            <input type="text" size =100 name="name" class="form-control" value="<?php echo e($service->name); ?>" required oninput="checkFormValidity()">
        </div>
        <br><br><br>

        <hr>
        <br><br><br>
        <!-- Fee Preset Selection -->
        <div class="form-group mb-4">
            <label for="fee_preset_id" class="form-label">Select Fee Preset:</label>
            <select name="fee_preset_id" class="form-control" required onchange="checkFormValidity()">
                <option value="">Select a preset</option>
                <?php $__currentLoopData = $feePresets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($preset->id); ?>" <?php echo e($preset->id == $service->fee_preset_id ? 'selected' : ''); ?>>
                        <?php echo e($preset->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <br><br><br>

        <hr>
        <br><br><br>

        <!-- Percentage Section -->
        <div class="form-group mb-4">
            <label for="percentage" class="form-label">Fee Percentage:</label>
            <input type="number" name="percentage" class="form-control" value="<?php echo e($service->percentage); ?>" required oninput="checkFormValidity()" step="0.01">
        </div>

        <!-- Submit Button -->
        <div class="crtbtn">
            <button type="submit" class="btn btn-primary" id="update-service-btn" style="margin-top: 10px;">Update Service</button>
        </div>
    </form>
</div>

<!-- Script for Form Validation -->
<script>
    function checkFormValidity() {
        const serviceName = document.querySelector('input[name="name"]').value.trim();
        const feePreset = document.querySelector('select[name="fee_preset_id"]').value;
        const percentage = document.querySelector('input[name="percentage"]').value.trim();
        const updateServiceBtn = document.getElementById('update-service-btn');

        // Check if all fields are filled
        const allFilled = serviceName.length > 0 && feePreset.length > 0 && percentage.length > 0;

        // Enable or disable the Update Service button
        updateServiceBtn.disabled = !allFilled;
    }

    // Initial check for enabling/disabling the Update Service button
    checkFormValidity();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Laravel\my_new_project\resources\views/services/edit.blade.php ENDPATH**/ ?>