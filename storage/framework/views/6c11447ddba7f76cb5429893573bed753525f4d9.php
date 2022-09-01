<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('cssValidate/sweetalert2.css')); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div role="main" class="main">

        <section class="page-header page-header-classic">
            <div class="container">

                <div class="text-center">
                        <h1 >My Basket Edit</h1>
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
                                    <img src="data:image/jpeg;base64,<?php echo e(base64_encode(\App\Products::find($basket->product_id)->images)); ?>"/>
                                <input  name="image" type="file" id="file" class="profile-image-input">
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-9">
                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">User</label>
                            <div class="col-lg-9">
                                <input readonly type="text" name="user_id" class="form-control" placeholder="User"
                                       value="<?php echo e(\App\User::find($basket->user_id)->name.' '.\App\User::find($basket->user_id)->surname); ?>" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Product Name</label>
                            <div class="col-lg-9">
                                <input readonly type="text" name="product_id" class="form-control" placeholder="Product Name"
                                       value="<?php echo e(\App\Products::find($basket->product_id)->name); ?>" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Payment</label>
                            <div class="col-lg-9">
                                <input readonly type="text" name="payment" class="form-control" placeholder="Payment Name"
                                       value="<?php echo e($basket->payment); ?>" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Count</label>
                            <div class="col-lg-9">
                                <input type="text" name="product_count" class="form-control" placeholder="Count"
                                       value="<?php echo e($basket->product_count); ?>" required/>
                            </div>
                        </div>




                        <div class="compose pt-3">
                            <div id="compose-field" class="compose">
                            </div>
                            <div class="text-right mt-3">
                                <a href="<?php echo e(url('/my_basket')); ?>" class="btn btn-info">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>
                                <button class="btn btn-success">
                                    <i class="fa fa-undo" aria-hidden="true"></i>
                                    Update
                                </button>

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
                            allowOutsideClick: false,
                        }
                    )
                    if(response.status=='success'){
                        window.location.href='/my_basket';
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/frontend/my_basket_edit.blade.php ENDPATH**/ ?>