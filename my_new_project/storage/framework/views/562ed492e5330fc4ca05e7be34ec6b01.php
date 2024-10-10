

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Fee Preset Details</h1>

        <div class="card">
            <h2>
                Preset Name: <?php echo e($feePreset->name); ?>

            </h2>
            <div class="card-body">
                <!-- رابط للعودة إلى الصفحة الرئيسية -->
                 
                <a href="<?php echo e(route('fee-presets.index')); ?>" class="btn btn-primary">Back to Fee Presets</a>
                <br>
                <br>
                <br>
                <!-- رابط لتحرير الـ preset -->
                <a href="<?php echo e(route('fee-presets.edit', $feePreset->id)); ?>" class="btn btn-secondary">Edit Fee Preset</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Laravel\my_new_project\resources\views/fee_presets/show.blade.php ENDPATH**/ ?>