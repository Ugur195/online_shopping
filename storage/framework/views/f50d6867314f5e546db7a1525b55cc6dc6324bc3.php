<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('cssValidate/sweetalert2.css')); ?>"/>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div role="main" class="main shop py-4">

        <div class="container">

            <div class="row">
                <div class="col">
                    <p>Checkout Basket</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9">
                    <form id="myForm" class="form-horizontal form-bordered" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input hidden name="user_id" value="<?php echo e(Auth::user()->id); ?>"/>

                        <div class="accordion accordion-modern" id="accordion">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne">
                                            Billing Address
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="collapse show">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label class="font-weight-bold text-dark text-2">Country</label>
                                                <select class="form-control" id="country" name="country">
                                                    <option value="">Select a country</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label class="font-weight-bold text-dark text-2">Сity</label>
                                                <select class="form-control" name="state" id="state">
                                                    <option value="">Select a city</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php if(Auth::check()): ?>
                                            <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                    <label class="font-weight-bold text-dark text-2">Name</label>
                                                    <input readonly type="text" value="<?php echo e(Auth::user()->name); ?>"
                                                           class="form-control" name="name">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="font-weight-bold text-dark text-2">Surname</label>
                                                    <input readonly type="text" value="<?php echo e(Auth::user()->surname); ?>"
                                                           class="form-control" name="surname">
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                    <label class="font-weight-bold text-dark text-2">Name</label>
                                                    <input type="text" value="" class="form-control" name="name">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="font-weight-bold text-dark text-2">Surname</label>
                                                    <input type="text" value="" class="form-control" name="surname">
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label class="font-weight-bold text-dark text-2">Address </label>
                                                <input type="text" name="address" value="<?php echo e(Auth::user()->address); ?>"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card card-default">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseThree">
                                            Review &amp; Payment
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="collapse">
                                    <div class="card-body">
                                        <table class="shop_table cart">
                                            <thead>
                                            <tr>
                                                <th class="product-thumbnail">
                                                    &nbsp;
                                                </th>
                                                <th class="product-name">
                                                    Product
                                                </th>
                                                <th class="product-price">
                                                    Price
                                                </th>
                                                <th class="product-quantity">
                                                    Count
                                                </th>
                                                <th class="product-subtotal">
                                                    Total
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $my_basket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php ($prod=\App\Products::find($mb->product_id)); ?>
                                                <tr class="cart_table_item">
                                                    <td class="product-thumbnail">
                                                        <a target="_blank" href="<?php echo e(url('/product/'.$prod->id)); ?>">
                                                            <img style='display:block;width:70px;height:70px;'
                                                                 src="data:image/jpeg;base64,<?php echo e(base64_encode($prod->images)); ?>"/>
                                                        </a>
                                                    </td>
                                                    <td class="product-name">
                                                        <a><?php echo e($prod->name); ?></a>
                                                    </td>
                                                    <td class="product-price">
                                                        <?php if($prod->discount_price!=0): ?>
                                                            <span class="amount"><?php echo e($prod->discount_price); ?></span>
                                                            <img
                                                                style="width: 14px; height:14px;"
                                                                src="<?php echo e(asset('frontendCss/img/Manat.png')); ?>"/>
                                                        <?php else: ?>
                                                            <span class="amount"><?php echo e($prod->price); ?></span>
                                                            <img
                                                                style="width: 14px; height:14px;"
                                                                src="<?php echo e(asset('frontendCss/img/Manat.png')); ?>"/>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo e($mb->product_count); ?>

                                                    </td>
                                                    <td class="product-subtotal">
                                                        <span class="amount"><?php echo e($mb->payment); ?></span>
                                                        <img
                                                            style="width: 14px; height:14px;"
                                                            src="<?php echo e(asset('frontendCss/img/Manat.png')); ?>"/>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="actions-continue">
                            <input type="submit" value="Place Order" name="proceed"
                                   class="btn btn-primary btn-modern text-uppercase mt-5 mb-5 mb-lg-0">
                        </div>
                    </form>


                </div>

                <div class="col-lg-3">
                    <h4 class="text-dark">Total Price:
                        <strong class="text-dark"><span class="amount"> <?php echo e($total_price); ?>

                                <img
                                    style="width: 15px; height:15px;"
                                    src="<?php echo e(asset('frontendCss/img/Manat.png')); ?>"/></span></strong></h4>
                </div>
            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
    <script type="text/javascript" src="<?php echo e('countryes/countries.js'); ?>"></script>

    <script>
        populateCountries("country", "state");
        populateCountries("country2", "state2");
    </script>

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
                    if (response.status == 'success') {
                        window.location.href = '/index';
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/frontend/check_out.blade.php ENDPATH**/ ?>