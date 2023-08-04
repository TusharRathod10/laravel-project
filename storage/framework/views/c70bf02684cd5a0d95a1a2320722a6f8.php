<?php $__env->startSection('content'); ?>

<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Product
                    <a href="<?php echo e(url('admin/product')); ?>" class="btn btn-outline-primary float-right">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <?php if($errors->any()): ?>
                <div class="alert alert-warning mt-2">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h6><?php echo e($error); ?></h6>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
                <?php if(session('message')): ?>
                <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                    <div class="alert alert-success">
                        <h5><?php echo e(session('message')); ?></h5>
                    </div>
                </div>
                <?php endif; ?>
                <form action="<?php echo e(url('admin/product/' . $product->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active h5" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link h5" id="seo-tab" data-toggle="tab" href="#seo" role="tab"
                                aria-controls="seo" aria-selected="false">SEO Tags</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link h5" id="details-tab" data-toggle="tab" href="#details" role="tab"
                                aria-controls="details" aria-selected="false">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link h5" id="pro_image-tab" data-toggle="tab" href="#pro_image" role="tab"
                                aria-controls="pro_image" aria-selected="false">Product Image</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link h5" id="pro_color-tab" data-toggle="tab" href="#pro_color" role="tab"
                                aria-controls="pro_color" aria-selected="false">Product Color</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="h6">Product Name : </label>
                                    <input type="text" name="name" id="" class="form-control"
                                        value="<?php echo e($product->name); ?>">
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"> <?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="h6">Product Slug : </label>
                                    <input type="text" name="slug" id="" class="form-control"
                                        value="<?php echo e($product->slug); ?>">
                                    <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"> <?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="h6">Category : </label>
                                    <select name="category_id" id="" class="form-control">
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php echo e($category->id == $product->category_id ?
                                            'selected' : ''); ?>>
                                            <?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"> <?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="h6">Brand : </label>
                                    <select name="brand" id="" class="form-control">
                                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($brand->id); ?>" <?php echo e($brand->name == $product->brand ? 'selected'
                                            : ''); ?>>
                                            <?php echo e($brand->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"> <?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="h6">Small Description : </label>
                                    <textarea name="small_description" id="" rows="3"
                                        class="form-control"><?php echo e($product->small_description); ?></textarea>
                                    <?php $__errorArgs = ['small_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"> <?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="" class="h6">Description : </label>
                                    <textarea name="description" id="" class="form-control" cols="30"
                                        rows="4"><?php echo e($product->description); ?></textarea>
                                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"> <?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="" class="h6">Meta-Title : </label>
                                    <input type="text" name="meta_title" id="" class="form-control"
                                        value="<?php echo e($product->meta_title); ?>">
                                    <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"> <?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="h6">Meta-Keyword : </label>
                                    <textarea name="meta_keyword" id="" rows="3"
                                        class="form-control"><?php echo e($product->meta_keyword); ?></textarea>
                                    <?php $__errorArgs = ['meta_keyword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"> <?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="" class="h6">Meta-Description : </label>
                                    <textarea name="meta_description" id="" class="form-control" cols="30"
                                        rows="4"><?php echo e($product->meta_description); ?></textarea>
                                    <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"> <?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="" class="h6">Original Price : </label>
                                    <input type="text" name="original_price" id="" class="form-control"
                                        value="<?php echo e($product->original_price); ?>">
                                    <?php $__errorArgs = ['original_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"> <?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="h6">Selling Price : </label>
                                    <input type="text" name="selling_price" id="" class="form-control"
                                        value="<?php echo e($product->selling_price); ?>">
                                    <?php $__errorArgs = ['selling_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"> <?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="h6">Quantity : </label>
                                    <input type="number" name="quantity" id="" class="form-control"
                                        value="<?php echo e($product->quantity); ?>">
                                    <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"> <?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="" class="h6">Trending : </label><br>
                                    <input type="checkbox" name="trending" id="" style="width: 20px;height: 20px;" <?php echo e($product->trending == '1' ? 'checked' : ''); ?>>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="" class="h6">Status : </label><br>
                                    <input type="checkbox" name="status" id="" style="width: 20px;height: 20px;" <?php echo e($product->status == '1' ? 'checked' : ''); ?>>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="pro_image" role="tabpanel" aria-labelledby="pro_image-tab">
                            <div class="col-md-6 mb-3">
                                <label for="" class="h6">Product Images : </label>
                                <input type="file" name="image[]" id="" class="form-control" multiple>
                                <?php if($product->productImages): ?>

                                <?php $__currentLoopData = $product->productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="btn-group-vertical m-2 p-2 border rounded">
                                    <img src="<?php echo e(asset($image->image)); ?>" alt="image" class="m-1" height="70px"
                                        width="70px">
                                    <a class="btn text-danger px-2 py-1 mt-1" href=<?php echo e(url('admin/product-image/'.$image->id.'/delete')); ?>>
                                        <i class="fa fa-trash"></i></a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php else: ?>
                                <h5>No Image Added</h5>
                                <?php endif; ?>
                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"> <?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pro_color" role="tabpanel" aria-labelledby="pro_color-tab">
                            <label for="" class="h4 mb-3">Select Color : </label>
                            <div class="row d-flex justify-content-center">
                                <?php $__empty_1 = true; $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-md-2 mx-3 my-4 p-2 border rounded">
                                    <h5>Color : </h5><input type="checkbox" name="color[<?php echo e($color->id); ?>]" id=""
                                        value="<?php echo e($color->id); ?>">&nbsp;<?php echo e($color->name); ?><span class="float-right"
                                        style="height: 20px; width: 20px; background-color:<?php echo e($color->code); ?>; border:1px solid gray"></span>
                                    <br><br>
                                    <h5>Quantity : </h5><input type="number" name="color_quantity[<?php echo e($color->id); ?>]"
                                        id="" class="form-control">
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="col-md-12">
                                    <h2>No Color Found</h2>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary px-4 py-2" value="submit">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelProject\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>