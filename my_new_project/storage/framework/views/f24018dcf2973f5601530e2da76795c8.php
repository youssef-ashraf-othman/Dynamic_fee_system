<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'My APP'); ?></title>

    <!-- Link to the compiled CSS file -->
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('fee_percentages.index')); ?>">Calculate Fee Percentage</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('fee-presets.index')); ?>">Manage Fee presets</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('services.index')); ?>">Manage Services</a>
            </li>
           
        </ul>
    </div>
</nav>
    <div class="app-container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html>
<?php /**PATH F:\Laravel\my_new_project\resources\views/layouts/app.blade.php ENDPATH**/ ?>