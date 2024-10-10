<!-- resources/views/fee_percentage/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Fee</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body>
    <div class="container">
        <h1>Calculate Fee</h1>
        <form action="<?php echo e(route('fee_percentage.calculate')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="preset_id">Select Fee Preset:</label>
                <select name="preset_id" id="preset_id" class="form-control" required>
                    <option value="">Select a preset</option>
                    <?php $__currentLoopData = $feePresets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($preset->id); ?>"><?php echo e($preset->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="service_id">Select Service:</label>
                <select name="service_id" id="service_id" class="form-control" required>
                    <option value="">Select a service</option>
                    <!-- Services will be populated using JavaScript -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Calculate Fee</button>
        </form>
    </div>

    <script>
        const presetSelect = document.getElementById('preset_id');
        const serviceSelect = document.getElementById('service_id');

        presetSelect.addEventListener('change', function() {
            const selectedPresetId = this.value;

            // Clear the service select
            serviceSelect.innerHTML = '<option value="">Select a service</option>';

            // Fetch services associated with the selected preset
            if (selectedPresetId) {
                fetch(`/api/presets/${selectedPresetId}/services`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(service => {
                            const option = document.createElement('option');
                            option.value = service.id;
                            option.textContent = service.name;
                            serviceSelect.appendChild(option);
                        });
                    });
            }
        });
    </script>
</body>
</html>
<?php /**PATH F:\Laravel\my_new_project\resources\views/fee_percentage/index.blade.php ENDPATH**/ ?>