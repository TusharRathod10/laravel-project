<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent='destroyCategory'>
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this data? </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes! Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                    <h3>Category List
                        <a href="<?php echo e(url('admin/category/create')); ?>" class="btn btn-outline-primary float-right">
                            Add
                            Category</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th class="h5">Id</th>
                            <th class="h5">Name</th>
                            <th class="h5">Status</th>
                            <th class="h5">Image</th>
                            <th class="h5">Edit</th>
                            <th class="h5">Remove</th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($category->id); ?></td>
                                <td><?php echo e($category->name); ?></td>
                                <td><?php echo e($category->status == '1' ? 'Hidden' : 'Visible'); ?></td>
                                <td><img src="<?php echo e(asset('/assets/category/' . $category->image)); ?>" alt="image"
                                        class="border" height="70px" width="70px"></td>
                                <td><a href="<?php echo e(url('admin/category/'.$category->id.'/edit')); ?>"
                                        class="btn btn-sm btn-primary">Edit</a></td>
                                <td><a href="#" wire:click="deleteCategory(<?php echo e($category->id); ?>)" data-toggle="modal"
                                        data-target="#deleteModal" class="btn btn-sm btn-danger">Delete</a></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="float-right">
                        <?php echo e($categories->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('script'); ?>
<script>
    window.addEventListener('close-modal',event=>{
            $("#deleteModal").modal('hide');
        })
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\laravelProject\resources\views/livewire/admin/category/index.blade.php ENDPATH**/ ?>