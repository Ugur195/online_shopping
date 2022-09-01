<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('cssValidate/sweetalert2.css')); ?>"/>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <!-- start: page -->
    <section role="main" class="content-body card-margin">
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title">Add Blogs</h2>
                    </header>
                    <div class="card-body">
                        <form id="myForm" class="form-horizontal form-bordered" method="post"
                              action="<?php echo e(url('admin/add_blogs')); ?>"
                              enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Images</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-image"></i>
															</span>
														</span>
                                        <input type="file" name="images[]" class="form-control" placeholder="Images"
                                               multiple/>
                                    </div>
                                </div>
                            </div>

                            <?php if(!Auth::check()): ?>
                                <input type="text" name="author" class="form-control" placeholder="Author"/>
                            <?php else: ?>
                                <input hidden type="text" id="author" name="author"
                                       value="<?php echo e(Auth::user()->name.' '.Auth::user()->surname.' '.Auth::user()->father_name); ?>"
                                       class="form-control" placeholder="Author"/>
                            <?php endif; ?>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Category</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                    	<span class="input-group-prepend">
															<span class="input-group-text">
                                                                    <i class="fas fa-stream "></i>
															</span>
														</span>
                                        <select name="blog_category" data-plugin-selectTwo
                                                class="form-control populate">
                                            <option value="0" selected disabled>Select category</option>
                                            <?php $__currentLoopData = $blog_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($bc->id); ?>"><?php echo e($bc->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Header</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <textarea class="form-control  " rows="2" id="textareaAutosize"
                                                  name="header"
                                                  data-plugin-textarea-autosize placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Description</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <textarea class="form-control  " rows="4" id="textareaAutosize"
                                                  name="description"
                                                  data-plugin-textarea-autosize placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="compose pt-3">
                                <div id="compose-field" class="compose">
                                </div>
                                <div class="text-right mt-3">
                                    <a href="<?php echo e(url('admin/blogs')); ?>" class="btn btn-info">
                                        <i class="fas fa-arrow-left"></i>
                                        Back
                                    </a>
                                    <button class="btn btn-success">
                                        <i class="fas fa-plus mr-1"></i>
                                        Add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!-- end: page -->
    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>

    <script src="<?php echo e(asset('jsValidate/jquery.form.js')); ?>"></script>
    <script src="<?php echo e(asset('jsValidate/jquery.validate.js')); ?>"></script>
    <script src="<?php echo e(asset('jsValidate/messages_az.js')); ?>"></script>
    <script src="<?php echo e(asset('jsValidate/sweetalert2.js')); ?>"></script>


    <script src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(asset('js/ckeditor/config.js')); ?>"></script>



    <script>
        $(document).ready(function () {
            $('#myForm').validate();
            $('#myForm').ajaxForm({
                beforeSubmit: function () {
                    Swal.fire({
                        title: '<i class="fa fa-spinner fa-plus fa-3x fa-fw "></i><span class="sr-only">Gozleyin...</span>',
                        text: 'Yuklenme gedir...',
                        showConfirmButton: false
                    })
                },

                success: function (response) {
                    Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.status,
                            allowOutsideClick: false
                        }
                    )
                    if (response.status == 'success') {
                        window.location.href = '/admin/blogs';
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/admin/add_blogs.blade.php ENDPATH**/ ?>