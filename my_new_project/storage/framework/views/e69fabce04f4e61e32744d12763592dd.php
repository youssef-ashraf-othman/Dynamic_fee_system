<?php $__env->startSection('content'); ?>
    <style>
        .landing-container {
            text-align: center;
            margin: 50px;
        }

        .link-container {
            margin-top: 20px;
        }

        .link-btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 15px 25px;
            margin: 10px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .link-btn:hover {
            background-color: #0056b3;
        }

    </style>
    <div class="landing-container">
        <h1>Welcome to the Dynamic Fee Structure System</h1>
        <p>Select an option below to proceed:</p>
        <div class="link-container">
            <a href="<?php echo e(route('fee_percentages.create')); ?>" class="link-btn">Get Started</a>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Laravel\my_new_project\resources\views/welcome.blade.php ENDPATH**/ ?>