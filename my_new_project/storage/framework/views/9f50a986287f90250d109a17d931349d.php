

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Edit Fee Preset</h2>

    <form action="<?php echo e(route('fee-presets.update', $feePreset->id)); ?>" method="POST" class="form-container" onsubmit="return validateForm()">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Preset Name Section -->
        <div class="form-group mb-4">
            <label for="name" class="form-label">Preset Name:</label>
            <input type="text" name="name" class="form-control" value="<?php echo e($feePreset->name); ?>" required oninput="checkFormValidity()">
        </div>

        <!-- Thresholds Section -->
        <h4 class="mb-3">Thresholds:</h4>
        <div id="thresholds">
            <?php $__currentLoopData = $feePreset->thresholds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $threshold): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="threshold-group">
                    <input type="hidden" name="threshold_ids[]" value="<?php echo e($threshold->id); ?>">
                    <input type="number" name="threshold_min[]" class="form-input" placeholder="From" value="<?php echo e($threshold->min_value); ?>" required oninput="checkFormValidity()">
                    <input type="number" name="threshold_max[]" class="form-input" placeholder="To" value="<?php echo e($threshold->max_value); ?>" required oninput="checkFormValidity()">
                    <input type="number" name="threshold_fee[]" class="form-input" placeholder="Fee Percentage" step="0.01" value="<?php echo e($threshold->fee_percentage); ?>" required oninput="checkFormValidity()">
                    <button type="button" class="btn btn-danger delete-btn" onclick="removeThreshold(this)">Delete</button>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Add Another Threshold Button -->
        <div class="mb-4">
            <button type="button" class="btn btn-primary" onclick="addThreshold()">Add Threshold</button>
        </div>

        <!-- Submit Button -->
        <div class="crtbtn">
            <button type="submit" class="btn btn-primary" id="create-preset-btn" style="margin-top: 10px;" disabled>Update Preset</button>
        </div>
    </form>
</div>

<!-- Script to Add and Remove Thresholds -->
<script>
    function addThreshold() {
        // Create a new threshold group without a hidden ID (for new thresholds)
        var newThreshold = document.createElement('div');
        newThreshold.classList.add('threshold-group');
        newThreshold.innerHTML = `
            <input type="number" name="threshold_min[]" class="form-input" placeholder="From" required oninput="checkFormValidity()">
            <input type="number" name="threshold_max[]" class="form-input" placeholder="To" required oninput="checkFormValidity()">
            <input type="number" name="threshold_fee[]" class="form-input" placeholder="Fee Percentage" step="0.01" required oninput="checkFormValidity()">
            <button type="button" class="btn btn-danger delete-btn" onclick="removeThreshold(this)">Delete</button>
        `;
        document.getElementById('thresholds').appendChild(newThreshold);
        
        // Check if the form is valid after adding the new threshold
        checkFormValidity();
    }

    function removeThreshold(button) {
        button.closest('.threshold-group').remove();
        checkFormValidity(); // Check validity after removing a threshold
    }

    function checkFormValidity() {
        const presetName = document.querySelector('input[name="name"]').value.trim();
        const thresholds = document.querySelectorAll('.threshold-group');
        const createPresetBtn = document.getElementById('create-preset-btn');

        // Check if all fields are filled
        let allFilled = presetName.length > 0 && Array.from(thresholds).every(threshold => {
            const minValue = threshold.querySelector('input[name="threshold_min[]"]').value.trim();
            const maxValue = threshold.querySelector('input[name="threshold_max[]"]').value.trim();
            const feePercentage = threshold.querySelector('input[name="threshold_fee[]"]').value.trim();

            return minValue && maxValue && feePercentage;
        });

        // Enable or disable the Create Preset button
        createPresetBtn.disabled = !allFilled; // Enable button only if all fields are filled
    }

    // Initial check for enabling/disabling the Create Preset button
    checkFormValidity();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Laravel\my_new_project\resources\views/fee_presets/edit.blade.php ENDPATH**/ ?>