

<?php $__env->startSection('content'); ?>

    <h1>Fee Calculator</h1>
    <a href="<?php echo e(route('fee_percentages.create')); ?>" class="button">Calculate Fee</a>
    <br><br>
    
    <?php if($lastFeePercentage): ?>
        <?php if($calculatedAmount!=0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="equal-width text-center">Fee Preset</th>
                        <th class="equal-width text-center">Service</th>
                        <th class="equal-width text-center">Fee Percentage</th>
                        <th class="equal-width text-center">Fee</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="equal-width text-center"><?php echo e($lastFeePercentage->feePreset->name); ?></td><!-- fee preset name-->
                        <td class="equal-width text-center"><?php echo e($lastFeePercentage->service->name); ?></td><!-- Display service name-->
                        <td class="equal-width text-center"><?php echo e(number_format((($lastFeePercentage->threshold->fee_percentage + $lastFeePercentage->service->percentage) / 2), 2)); ?>%</td><!-- Display average percentage -->
                        <td class="equal-width text-center"><?php echo e(number_format($calculatedAmount)); ?> EGP</td> <!-- Display the calculated fee amount formatted to 2 decimal places -->
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <h2>No transactions available.</h2>
        <?php endif; ?>
    <?php else: ?>
        <h2>No transactions available.</h2>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Laravel\my_new_project\resources\views/fee_percentages/index.blade.php ENDPATH**/ ?>