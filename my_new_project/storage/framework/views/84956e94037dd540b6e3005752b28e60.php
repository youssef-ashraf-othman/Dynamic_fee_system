

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Create New Service</h2>

    <form action="<?php echo e(route('services.store')); ?>" method="POST" class="form-container" onsubmit="return validateForm()">
        <?php echo csrf_field(); ?>

        <!-- Service Name Section -->
        <br> <br>
        <div class="form-group mb-4">
            <label for="name" class="form-label">Service Name:</label>
            <input type="text" name="name" class="form-control" required oninput="checkFormValidity()">
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
                    <option value="<?php echo e($preset->id); ?>"><?php echo e($preset->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <br><br><br>
        <hr>
        <br><br><br>

        <!-- Percentage Section -->
        <div class="form-group mb-4">
            <label for="percentage" class="form-label">Fee Percentage:</label>
            <input type="number" name="percentage" class="form-control"  step="0.01">
        </div>


        <!-- Submit Button -->
        <div class="crtbtn">
            <button type="submit" class="btn btn-primary" id="create-service-btn" style="margin-top: 10px;" disabled>Create Service</button>
        </div>
    </form>
</div>

<!-- Script for Form Validation -->
<script>
    function checkFormValidity() {
        const serviceName = document.querySelector('input[name="name"]').value.trim();
        const feePreset = document.querySelector('select[name="fee_preset_id"]').value;
        const percentage = document.querySelector('input[name="percentage"]').value.trim();
        const createServiceBtn = document.getElementById('create-service-btn');

        // Check if all fields are filled
        const allFilled = serviceName.length > 0 && feePreset.length > 0 && percentage.length > 0;

        // Enable or disable the Create Service button
        createServiceBtn.disabled = !allFilled; // Enable button only if all fields are filled
    }

    // Initial check for enabling/disabling the Create Service button
    checkFormValidity();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Laravel\my_new_project\resources\views/services/create.blade.php ENDPATH**/ ?>