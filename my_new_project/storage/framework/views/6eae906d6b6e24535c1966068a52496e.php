

<?php $__env->startSection('content'); ?>


<h1>Fee Presets</h1>

<a href="<?php echo e(route('fee-presets.create')); ?>" class="button">Create New Preset</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="equal-width"><b>Fee presets</b></th>
            <th class="equal-width"><b>Services</b></th>
            <th class="equal-width"><b>Threesholds</b></th>
            <th class="equal-width"><b>Options</b></th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $feePreset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <!-- Fee Preset Name -->
                <td class="equal-width"><b><?php echo e($preset->name); ?></b></td>


                <?php if($preset->services->isEmpty()): ?>
                        <td class="equal-width">
                            <a href="<?php echo e(route('services.create', ['fee_preset_id' => $preset->id])); ?>" class="button">
                                Add service
                            </a>
                        </td>
                    
                <?php else: ?>
                  <!-- Services -->
                    <td class="equal-width">
                        <ul class="service-list"> <!-- New Service List -->
                            <?php $__currentLoopData = $preset->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <?php echo e($service->name); ?> <!-- Displaying the service name -->
                                    <br> 
                                    <?php if(!$loop->last): ?>
                                    <br>
                           
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </td>
                <?php endif; ?>
                    
                <!-- Thresholds -->
                <td class="equal-width">
                    <ul class="threshold-list">
                        <?php $__currentLoopData = $preset->thresholds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $threshold): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <span><?php echo e($threshold->min_value); ?> ==========> <?php echo e($threshold->max_value); ?></span>
                                <br> 
                                <?php if(!$loop->last): ?>
                                    <hr> <!-- Line between thresholds -->
                                <?php endif; ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </td>

                

              

                <!-- Edit and Delete Options -->
                <td class="equal-width text-center">
                    <div class="btn-container">
                        <a href="<?php echo e(route('fee-presets.edit', $preset->id)); ?>" class="button">Edit</a>
                        <form action="<?php echo e(route('fee-presets.destroy', $preset->id)); ?>" method="POST" style="display:inline;">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Laravel\my_new_project\resources\views/fee_presets/index.blade.php ENDPATH**/ ?>