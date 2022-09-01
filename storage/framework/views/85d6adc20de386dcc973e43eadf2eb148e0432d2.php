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
                        <h2 class="card-title">About Us</h2>
                    </header>

                    <div class="card-body">
                        <form id="myForm" class="form-horizontal form-bordered" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="text" name="id" hidden class="form-control" placeholder="id"
                                   value="<?php echo e($about_us->id); ?>"/>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Our Image</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input hidden type="text" name="last_image" class="form-control"/>
                                        <img style='display:block;width:80px;height:60px;'
                                             src="data:image/jpeg;base64,<?php echo e(base64_encode($about_us->image)); ?>"/>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Image</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-image"></i>
															</span>
														</span>
                                        <input type="file" name="image" class="form-control" placeholder="Image"
                                               value=""/>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Title</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                       <textarea class="form-control " rows="1" id="textareaAutosize"
                                                 name="description"
                                                 data-plugin-textarea-autosize
                                                 placeholder="Description"><?php echo e($about_us->title); ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Description</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <textarea class="form-control " rows="1" id="textareaAutosize"
                                                  name="description"
                                                  data-plugin-textarea-autosize
                                                  placeholder="Description"><?php echo e($about_us->description); ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Our Mission</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                         <textarea class="form-control " rows="2" id="textareaAutosize"
                                                   name="our_mission"
                                                   data-plugin-textarea-autosize
                                                   placeholder="Our Mission"><?php echo e($about_us->our_mission); ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Our Vision</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <textarea class="form-control " rows="2" id="textareaAutosize" name="our_vision"
                                                  data-plugin-textarea-autosize
                                                  placeholder="Our Vision"><?php echo e($about_us->our_vision); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Who We are</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <textarea class="form-control " rows="5" id="textareaAutosize" name="who_we_are"
                                                  data-plugin-textarea-autosize
                                                  placeholder="Who We are"><?php echo e($about_us->who_we_are); ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Why Us</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <textarea class="form-control " rows="5" id="textareaAutosize" name="why_us"
                                                  data-plugin-textarea-autosize
                                                  placeholder="Why Us"><?php echo e($about_us->why_us); ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="compose pt-3">
                                <div id="compose-field" class="compose">
                                </div>
                                <div class="text-right mt-3">
                                    <a href="<?php echo e(url('/admin/index')); ?>" class="btn btn-info">
                                        <i class="fas fa-arrow-left"></i>
                                        Back
                                    </a>
                                    <button class="btn btn-success">
                                        <i class="fa fa-undo" aria-hidden="true"></i>
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- end: page -->

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('jsValidate/jquery.form.js')); ?>"></script>
    <script src="<?php echo e(asset('jsValidate/jquery.validate.js')); ?>"></script>
    <script src="<?php echo e(asset('jsValidate/messages_az.js')); ?>"></script>
    <script src="<?php echo e(asset('jsValidate/sweetalert2.js')); ?>"></script>


    <script>
        $(document).ready(function () {
            $('#myForm').validate();
            $('#myForm').ajaxForm({
                beforeSubmit: function () {


                },
                success: function (response) {
                    Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.status,
                            allowOutsideClick: false
                        }
                    )
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/admin/about_us.blade.php ENDPATH**/ ?>