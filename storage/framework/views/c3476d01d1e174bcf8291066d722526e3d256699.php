<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('cssValidate/sweetalert2.css')); ?>"/>
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
            <form id="myForm" class="form-horizontal form-bordered" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="text" name="id" hidden class="form-control" placeholder="id"
                       value="<?php echo e(Auth::user()->id); ?>"/>

                <div class="row">
                    <div class="col-lg-3 mt-4 mt-lg-0">
                        <div class="d-flex justify-content-center mb-4">
                            <div class="profile-image-outer-container">
                                <div class="profile-image-inner-container bg-color-primary">
                                    <img src="data:image/jpeg;base64,<?php echo e(base64_encode(Auth::user()->image)); ?>"/>
                                    <span class="profile-image-button bg-color-dark">
											<i class="fas fa-camera text-light"></i>
										</span>
                                </div>
                                <input name="image" type="file" id="file" class="profile-image-input">
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-9">

                        <div class="overflow-hidden mb-1">
                            <h2 class="font-weight-normal text-7 mb-0"><strong
                                    class="font-weight-extra-bold">My</strong> Profile</h2>
                        </div>


                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Name</label>
                            <div class="col-lg-9">
                                <input type="text" name="name" class="form-control" placeholder="Name"
                                       value="<?php echo e(Auth::user()->name); ?>" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Surname</label>
                            <div class="col-lg-9">
                                <input type="text" name="surname" class="form-control" placeholder="Surname"
                                       value="<?php echo e(Auth::user()->surname); ?>" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Father
                                Name</label>
                            <div class="col-lg-9">
                                <input type="text" name="father_name" class="form-control"
                                       placeholder="Father Name"
                                       value="<?php echo e(Auth::user()->father_name); ?>" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Gender</label>
                            <div class="col-lg-9">
                                <select name="gender" id="gender" class="form-control" size="0">
                                    <option value="F" <?php if(Auth::user()->gender=='F'): ?> selected <?php endif; ?> >Female
                                    </option>
                                    <option value="M" <?php if(Auth::user()->gender=='M'): ?> selected <?php endif; ?> >Male
                                    </option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Mobile</label>
                            <div class="col-lg-9">
                                <input type="text" name="mobile" class="form-control" placeholder="Mobile"
                                       value="<?php echo e(Auth::user()->mobile); ?>" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Email</label>
                            <div class="col-lg-9">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                       value="<?php echo e(Auth::user()->email); ?>" required/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Facebook</label>
                            <div class="col-lg-9">
                                <input type="text" name="fb_profile" class="form-control" placeholder="Facebook"
                                       value="<?php echo e(Auth::user()->fb_profile); ?>" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Instagram</label>
                            <div class="col-lg-9">
                                <input type="text" name="inst_profile" class="form-control"
                                       placeholder="Instagram"
                                       value="<?php echo e(Auth::user()->inst_profile); ?>" required/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Whatsapp</label>
                            <div class="col-lg-9">
                                <input type="text" name="wp_profile" class="form-control" placeholder="Whatsapp"
                                       value="<?php echo e(Auth::user()->wp_profile); ?>" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Address</label>
                            <div class="col-lg-9">
                                <input type="text" name="address" class="form-control" placeholder="Address"
                                       value="<?php echo e(Auth::user()->address); ?>" required/>
                            </div>
                        </div>


                        <div class="compose pt-3">
                            <div id="compose-field" class="compose">
                            </div>
                            <div class="text-right mt-3">
                                <a href="<?php echo e(url('/')); ?>" class="btn btn-info">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>
                                <button class="btn btn-success">
                                    <i class="fa fa-undo" aria-hidden="true"></i>
                                    Update
                                </button>
                                <a href="<?php echo e(url('/change_password')); ?>" class="btn btn-danger">
                                    <i class="	fas fa-lock-open"></i>
                                    Change Password
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

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
                    if (response.status == 'success') {
                        window.location.href = '/my_profile';
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/frontend/my_profile.blade.php ENDPATH**/ ?>