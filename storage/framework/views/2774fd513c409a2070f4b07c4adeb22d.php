<?php $__env->startSection('content'); ?>
<div class="row mt-3">
    <div class="col-md-12">
        <?php if(session('message')): ?>
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
            <div class="alert alert-success">
                <h5><?php echo e(session('message')); ?></h5>
            </div>
        </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <h3>Product List
                    <a href="<?php echo e(url('admin/product/create')); ?>" class="btn btn-outline-primary float-right">Add
                        Product</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th class="h5">Id</th>
                        <th class="h5">Category_Id</th>
                        <th class="h5">Name</th>
                        <th class="h5">Price</th>
                        <th class="h5">Quantity</th>
                        <th class="h5">Status</th>
                        <th class="h5">Edit</th>
                        <th class="h5">Remove</th>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($product->id); ?></td>
                            <td><?php echo e($product->category->name); ?></td>
                            <td><?php echo e($product->name); ?></td>
                            <td><?php echo e($product->selling_price); ?></td>
                            <td><?php echo e($product->quantity); ?></td>
                            <td><?php echo e($product->status == '1' ? 'Hidden' : 'Visible'); ?></td>
                            <td><a href="<?php echo e(url('admin/product/'.$product->id.'/edit')); ?>"
                                    class="btn btn-sm btn-primary">Edit</a></td>
                            <td><a href="<?php echo e(url('admin/product/'.$product->id.'/delete')); ?>" onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8">
                                No Product Available
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="float-right">
                    <?php echo e($products->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelProject\resources\views/admin/product/index.blade.php ENDPATH**/ ?>