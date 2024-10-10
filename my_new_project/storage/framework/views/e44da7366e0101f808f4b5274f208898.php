

<?php $__env->startSection('content'); ?>
    <h1 align = "center">Calculate your fees</h1>
    <div class="container">
            <form action="<?php echo e(route('fee_percentages.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div>
                <label for="fee_preset_id"><b>Fee Preset:</b></label>
                <select name="fee_preset_id" required>
                    <?php $__currentLoopData = $feePresets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($preset->id); ?>"><?php echo e($preset->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <br><br>
            <div>
                <label for="service_id"><b>Service:</b></label>
                <select name="service_id" required>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <br><br>
            <div>
                <label for="threshold_amount"><b>Amount:</b></label>
                <input type="number" name="threshold_amount" id="threshold_amount" required min="0" step="any">
            </div>
            <br>
            <button type="submit">Calculate</button>
            
            <!-- Display Validation Errors -->
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
        </form>
    </div>
    

    <script>
        document.getElementById('fee_preset_id').addEventListener('change', function() {
            const presetId = this.value;
            const serviceSelect = document.getElementById('service_id');
            serviceSelect.innerHTML = '<option value="">Select a Service</option>'; // Clear previous options

            if (presetId) {
                fetch(`/get-services/${presetId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.services.forEach(service => {
                            const option = document.createElement('option');
                            option.value = service.id;
                            option.textContent = service.name;
                            serviceSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching services:', error));
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Laravel\my_new_project\resources\views/fee_percentages/create.blade.php ENDPATH**/ ?>