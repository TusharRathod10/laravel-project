<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/bootstrap.min.css')); ?>" />
    <!-- site css -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/style.css')); ?>" />
    <!-- responsive css -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/responsive.css')); ?>" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/bootstrap-select.css')); ?>" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/perfect-scrollbar.css')); ?>" />
    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/custom.css')); ?>" />
    <?php echo \Livewire\Livewire::styles(); ?>


</head>

<body >

    <div class="full_container">
        <div class="inner_container">
            <?php echo $__env->make('layouts.inc.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div id="content">
                <?php echo $__env->make('layouts.inc.admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="midde_cont">
                    <div class="container-fluid">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                    <?php echo $__env->make('layouts.inc.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo e(asset('admin/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/bootstrap.min.js')); ?>"></script>
    <!-- wow animation -->
    <script src="<?php echo e(asset('admin/js/animate.js')); ?>"></script>
    <!-- select country -->
    <script src="<?php echo e(asset('admin/js/bootstrap-select.js')); ?>"></script>
    <!-- custom js -->
    <script src="<?php echo e(asset('admin/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/chart_custom_style1.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/alpine.min.js')); ?>"></script>
    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php echo $__env->yieldPushContent('script'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\laravelProject\resources\views/layouts/admin.blade.php ENDPATH**/ ?>