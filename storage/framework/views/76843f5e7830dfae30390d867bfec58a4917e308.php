<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div role="main" class="main">
        <section class="page-header page-header-classic">
            <div class="container">

                <div class="row">
                    <div class="col p-static">
                        <h1 data-title-border>User Profile</h1>

                    </div>
                </div>
            </div>
        </section>

        <div class="container py-2">
                <div class="row">
                    <div class="col-lg-3 mt-4 mt-lg-0">
                        <div class="d-flex justify-content-center mb-4">
                            <div class="profile-image-outer-container">
                                <div class="profile-image-inner-container bg-color-primary">
                                    <img src="data:image/jpeg;base64,<?php echo e(base64_encode($user->image)); ?>"/>
                                    <span class="profile-image-button bg-color-dark">
											<i class="fas fa-camera text-light"></i>
										</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-9">

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Name</label>
                            <div class="col-lg-9">
                                <input readonly="readonly" type="text" name="name" class="form-control" placeholder="Name"
                                       value="<?php echo e($user->name); ?>" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Surname</label>
                            <div class="col-lg-9">
                                <input readonly="readonly" type="text" name="surname" class="form-control" placeholder="Surname"
                                       value="<?php echo e($user->surname); ?>" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Father Name</label>
                            <div class="col-lg-9">
                                <input readonly="readonly" type="text" name="father_name" class="form-control"
                                       placeholder="Father Name"
                                       value="<?php echo e($user->father_name); ?>" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Father Name</label>
                            <div class="col-lg-9">
                                <input readonly="readonly" type="text" name="gender" class="form-control"
                                       placeholder="Father Name"
                                       value="<?php if($user->gender=='M'): ?> Male <?php else: ?> Female <?php endif; ?>" required/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Mobile</label>
                            <div class="col-lg-9">
                                <input readonly="readonly" type="text" name="mobile" class="form-control" placeholder="Mobile"
                                       value="<?php echo e($user->mobile); ?>" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Email</label>
                            <div class="col-lg-9">
                                <input readonly="readonly" type="email" name="email" class="form-control" placeholder="Email"
                                       value="<?php echo e($user->email); ?>" required/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Facebook</label>
                            <div class="col-lg-9">
                                <input readonly="readonly" type="text" name="fb_profile" class="form-control" placeholder="Facebook"
                                       value="<?php echo e($user->fb_profile); ?>" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Instagram</label>
                            <div class="col-lg-9">
                                <input readonly="readonly" type="text" name="inst_profile" class="form-control"
                                       placeholder="Instagram"
                                       value="<?php echo e($user->inst_profile); ?>" required/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Whatsapp</label>
                            <div class="col-lg-9">
                                <input readonly="readonly" type="text" name="wp_profile" class="form-control" placeholder="Whatsapp"
                                       value="<?php echo e($user->wp_profile); ?>" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Address</label>
                            <div class="col-lg-9">
                                <input readonly="readonly" type="text" name="address" class="form-control" placeholder="Address"
                                       value="<?php echo e($user->address); ?>" required/>
                            </div>
                        </div>

                        <div class="text-right mt-3">
                            <a href="<?php echo e(url('/blogs')); ?>" class="btn btn-info">
                                <i class="fas fa-arrow-left"></i>
                                Back
                            </a>

                        </div>

                    </div>
                </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/frontend/blogs_user.blade.php ENDPATH**/ ?>