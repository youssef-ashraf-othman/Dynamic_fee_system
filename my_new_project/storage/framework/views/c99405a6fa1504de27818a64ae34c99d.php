

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Create New Fee Preset</h2>

    <form action="<?php echo e(route('fee_presets.store')); ?>" method="POST" class="form-container" onsubmit="return validateForm()">
        <?php echo csrf_field(); ?>

        <!-- Preset Name Section -->
        <div class="form-group mb-4">
            <label for="name" class="form-label">Preset Name:</label>
            <input type="text" name="name" class="form-control" required oninput="checkFormValidity()">
        </div>

        <!-- Thresholds Section -->
        <h4 class="mb-3">Thresholds:</h4>
        <div id="thresholds">
            <div class="threshold-group">
                <input type="number" name="threshold_min[]" class="form-input" placeholder="From" required oninput="checkFormValidity()">
                <input type="number" name="threshold_max[]" class="form-input" placeholder="To" required oninput="checkFormValidity()">
                <input type="number" name="threshold_fee[]" class="form-input" placeholder="Fee Percentage" step="0.01" required oninput="checkFormValidity()">
                
            </div>
        </div>

        <!-- Add Another Threshold Button -->
        <div class="mb-4">
            <button type="button" class="btn btn-primary" onclick="addThreshold()">Add Threshold</button>
        </div>

        <!-- Submit Button -->
        <div class = "crtbtn">
            <button type="submit" class="btn btn-primary" id="create-preset-btn" style="margin-top: 10px;" disabled>Create Preset</button>
        </div>
    </form>
</div>


<!-- Script to Add and Remove Thresholds -->
<script>
    function addThreshold() {
        // Create a new threshold group
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Laravel\my_new_project\resources\views/fee_presets/create.blade.php ENDPATH**/ ?>