

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Edit Threshold</h1>
        <style>
        button {
            display: inline-block; /* Allows padding and margin */
            padding: 10px 20px; /* Top/bottom and left/right padding */
            font-size: 18px; /* Font size */
            color: #fff; /* Text color */
            background-color: #007BFF; /* Background color */
            text-decoration: none; /* Remove underline */
            border-radius: 5px; /* Rounded corners */
            border: none; /* Remove border */
            transition: background-color 0.3s; /* Smooth transition */
        }
    </style>

        <h2>
            Threshold amount: <?php echo e($threshold->amount); ?>

        </h2>

        <form action="<?php echo e(route('thresholds.update',$threshold -> id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field("PUT"); ?>
            <div class="form-group">
                <label for="amount">New Threshold</label>
                <input type="number" name="amount" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Laravel\my_new_project\resources\views/thresholds/edit.blade.php ENDPATH**/ ?>