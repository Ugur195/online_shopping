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
                        <h2 class="card-title">My Profile</h2>
                    </header>

                    <div class="card-body">
                        <form id="myForm" class="form-horizontal form-bordered" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="text" name="id" hidden class="form-control" placeholder="id"
                                   value="<?php echo e(Auth::user()->id); ?>"/>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Our Image</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input hidden type="text" name="last_image" class="form-control"/>
                                        <img style='display:block;width:80px;height:60px;'
                                             src="data:image/jpeg;base64,<?php echo e(base64_encode(Auth::user()->image)); ?>"/>
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
                                <label class="col-lg-3 control-label text-lg-right pt-2">Name</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-user"></i>
															</span>
														</span>
                                        <input type="text" name="name" class="form-control" placeholder="Name"
                                               value="<?php echo e(Auth::user()->name); ?>" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Surname</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-user"></i>
															</span>
														</span>
                                        <input type="text" name="surname" class="form-control" placeholder="Surname"
                                               value="<?php echo e(Auth::user()->surname); ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Father Name</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-user"></i>
															</span>
														</span>
                                        <input type="text" name="father_name" class="form-control"
                                               placeholder="Father Name"
                                               value="<?php echo e(Auth::user()->father_name); ?>" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Mobile</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-phone"></i>
															</span>
														</span>
                                        <input type="text" name="mobile" class="form-control" placeholder="Mobile"
                                               value="<?php echo e(Auth::user()->mobile); ?>" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Facebook</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fab fa-facebook-f"></i>
															</span>
														</span>
                                        <input type="text" name="fb_profile" class="form-control" placeholder="Facebook"
                                               value="<?php echo e(Auth::user()->fb_profile); ?>" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Instagram</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fab fa-instagram"></i>
															</span>
														</span>
                                        <input type="text" name="inst_profile" class="form-control"
                                               placeholder="Instagram"
                                               value="<?php echo e(Auth::user()->inst_profile); ?>" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Whatsapp</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fab fa-whatsapp"></i>
															</span>
														</span>
                                        <input type="text" name="wp_profile" class="form-control" placeholder="Whatsapp"
                                               value="<?php echo e(Auth::user()->wp_profile); ?>" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Roles</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-user"></i>
															</span>
														</span>
                                        <select name="role_id" id="role_id" data-plugin-selectTwo
                                                class="form-control populate">
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($r->id); ?>"
                                                        <?php if(Auth::user()->role_id==$r->id): ?> selected <?php endif; ?> ><?php echo e($r->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Address</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-map-marker"></i>
															</span>
														</span>
                                        <input type="text" name="address" class="form-control" placeholder="Address"
                                               value="<?php echo e(Auth::user()->address); ?>" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Gender</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        	<span class="input-group-prepend">
															<span class="input-group-text">
																 <?php if(Auth::user()->gender=='Male'): ?>
                                                                    <i class="fas fa-male"></i>
                                                                <?php else: ?>
                                                                    <i class="fas fa-female"></i>
                                                                <?php endif; ?>
															</span>
														</span>
                                        <select name="gender" id="gender" data-plugin-selectTwo
                                                class="form-control populate">
                                            <option value="Female" <?php if(Auth::user()->gender=='Female'): ?> selected <?php endif; ?> >Female</option>
                                            <option value="Male" <?php if(Auth::user()->gender=='Male'): ?> selected <?php endif; ?> >Male</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Email</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-envelope"></i>
															</span>
														</span>
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                               value="<?php echo e(Auth::user()->email); ?>" required/>
                                    </div>
                                </div>
                            </div>



                            <div class="compose pt-3">
                                <div id="compose-field" class="compose">
                                </div>
                                <div class="text-right mt-3">
                                    <a href="<?php echo e(url('admin/index')); ?>" class="btn btn-info">
                                        <i class="fas fa-arrow-left"></i>
                                        Back
                                    </a>
                                    <button class="btn btn-success">
                                        <i class="fa fa-undo" aria-hidden="true"></i>
                                        Update
                                    </button>
                                    <a href="<?php echo e(url('admin/change_password')); ?>" style=color:white type="submit" class="btn btn-facebook">
                                        <i class="	fas fa-lock-open"></i>
                                        Change Password
                                    </a>
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
                    if(response.status=='success'){
                        window.location.href='/admin/my_profile';
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/admin/my_profile.blade.php ENDPATH**/ ?>