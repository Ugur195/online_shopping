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

                        <h2 class="card-title">Edit User</h2>
                    </header>
                    <div class="card-body">
                        <form class="form-horizontal form-bordered" method="post" action="<?php echo e(url('/admin/user_edit/'. $users->id)); ?>">
                            <?php echo e(csrf_field()); ?>

                            <input type="text" name="id" hidden class="form-control" placeholder="id"
                                   value="<?php echo e($users->id); ?>"/>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Our Image</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input hidden type="text" name="last_image" class="form-control"
                                               value="<?php echo e(base64_encode($users->image)); ?>"/>
                                        <img style='display:block;width:120px;height:80px;'
                                             src="data:image/jpeg;base64,<?php echo e(base64_encode($users->image)); ?>"/>
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
                                               value="<?php echo e($users->name); ?>"/>
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
                                        <input  type="text" name="surname" class="form-control" placeholder="Surname"
                                               value="<?php echo e($users->surname); ?>"/>
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
                                        <input  type="text" name="father_name" class="form-control" placeholder="Father Name"
                                               value="<?php echo e($users->father_name); ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Mobile</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fa fa-mobile"></i>
															</span>
														</span>
                                        <input type="text" name="mobile" class="form-control" placeholder="Mobile"
                                               value="<?php echo e($users->mobile); ?>"/>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Date of Birthday</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fa fa-birthday-cake"></i>
															</span>
														</span>
                                        <input type="date" name="date_of_birth" class="form-control" placeholder="Date of Birthday"
                                               value="<?php echo e($users->date_of_birth); ?>" required/>
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
                                               value="<?php echo e($users->fb_profile); ?>" required/>
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
                                               value="<?php echo e($users->inst_profile); ?>" required/>
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
                                               value="<?php echo e($users->wp_profile); ?>" required/>
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
                                                        <?php if($users->role_id==$r->id): ?> selected <?php endif; ?> ><?php echo e($r->name); ?></option>
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
                                               value="<?php echo e($users->address); ?>" required/>
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
                                            <option value="Female" <?php if($users->gender=='Female'): ?> selected <?php endif; ?> >Female</option>
                                            <option value="Male" <?php if($users->gender=='Male'): ?> selected <?php endif; ?> >Male</option>
                                        </select>
                                    </div>
                                </div>
                            </div>




                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Status</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                    	<span class="input-group-prepend">
															<span class="input-group-text">
                                                                <?php if($users->status==1): ?>
                                                                    <i class="fas fa-eye"></i>
                                                                <?php else: ?>
                                                                    <i class="	fas fa-eye-slash"></i>
                                                                <?php endif; ?>

															</span>
														</span>
                                        <select name="status" data-plugin-selectTwo class="form-control populate">
                                            <option value="1" <?php if($users->status==1): ?> selected <?php endif; ?>>Aktiv</option>
                                            <option value="0" <?php if($users->status==0): ?> selected <?php endif; ?>>Deaktiv</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="compose pt-3">
                                <div id="compose-field" class="compose">
                                </div>
                                <div class="text-right mt-3">
                                    <a href="<?php echo e(url('admin/users')); ?>" class="btn btn-info">
                                        <i class="fas fa-arrow-left"></i>
                                        Back
                                    </a>
                                    <button href="#" class="btn btn-success">
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
        <!-- end: page -->
    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('jsValidate/jquery.form.js')); ?>"></script>
    <script src="<?php echo e(asset('jsValidate/jquery.validate.js')); ?>"></script>
    <script src="<?php echo e(asset('jsValidate/messages_az.js')); ?>"></script>
    <script src="<?php echo e(asset('jsValidate/sweetalert2.js')); ?>"></script>


    <script>
        $(document).ready(function () {
            $('form').validate();
            $('form').ajaxForm({
                beforeSubmit: function () {


                },

                success: function (response) {
                    Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.status,
                            allowOutsideClick: false,
                        }
                    )
                    if (response.status == 'success') {
                        window.location.href = '/admin/users';
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/admin/user_edit.blade.php ENDPATH**/ ?>