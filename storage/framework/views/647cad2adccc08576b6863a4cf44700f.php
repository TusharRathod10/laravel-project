<div>
    <?php echo $__env->make('livewire.admin.brand.modal-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                    <h3>Brand List
                        <a href="" class="btn btn-outline-primary float-right" data-toggle="modal"
                            data-target="#addbrandModal"> Add
                            Brand</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th class="h5">Id</th>
                            <th class="h5">Name</th>
                            <th class="h5">Slug</th>
                            <th class="h5">Status</th>
                            <th class="h5">Edit</th>
                            <th class="h5">Remove</th>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($brand->id); ?></td>
                                <td><?php echo e($brand->name); ?></td>
                                <td><?php echo e($brand->slug); ?></td>
                                <td><?php echo e($brand->status == '1' ? 'Hidden' : 'Visible'); ?></td>
                                <td><a href="#" wire:click="editBrand(<?php echo e($brand->id); ?>)" data-toggle="modal"
                                        data-target="#updatebrandModal" class="btn btn-sm btn-primary">Edit</a></td>
                                <td><a href="#" data-toggle="modal" wire:click="deleteBrand(<?php echo e($brand->id); ?>)"
                                        data-target="#deletebrandModal" class="btn btn-sm btn-danger">Delete</a></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6">No Brands Found</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="float-right">
                        <?php echo e($brands->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('script'); ?>
<script>
    window.addEventListener('close-modal',event=>{
            $("#addbrandModal").modal('hide');
            $("#updatebrandModal").modal('hide');
            $("#deletebrandModal").modal('hide');
        })
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\laravelProject\resources\views/livewire/admin/brand/index.blade.php ENDPATH**/ ?>