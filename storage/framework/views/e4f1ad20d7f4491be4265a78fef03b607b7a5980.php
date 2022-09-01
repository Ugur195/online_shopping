<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('cssValidate/sweetalert2.css')); ?>"/>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div role="main" class="main">

        <section
            class="page-header page-header-modern page-header-background page-header-background-sm overlay overlay-color-primary overlay-show overlay-op-8 mb-5"
            style="background-image: url(img/page-header/page-header-elements.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 align-self-center p-static order-2 text-center">
                        <h1>Purchased Goods</h1>
                    </div>
                </div>
            </div>
        </section>


        <div class="container py-2">


            <h4 class="font-weight-semibold  text-6 mb-0 "> Wait price: <?php echo e($wait_payment); ?> <img
                    style="width: 20px; height:20px;" src="<?php echo e(asset('frontendCss/img/Manat.png')); ?>"></h4>


            <h4 class="font-weight-semibold text-6 mb-0 "> Send price: <?php echo e($send_payment); ?> <img
                    style="width: 20px; height:20px;" src="<?php echo e(asset('frontendCss/img/Manat.png')); ?>"></h4>

            <h4 class="font-weight-semibold text-6 mb-0 "> Delivery price:<?php echo e($delivery_payment); ?> <img
                    style="width: 20px; height:20px;" src="<?php echo e(asset('frontendCss/img/Manat.png')); ?>"></h4>


            <div class="row">
                <div class="col">

                    <div class="row">
                        <div class="col pb-3">
                            <table class="table table-bordered table-striped mb-0" id="datatable-editable">

                                <thead>
                                <tr>
                                    <th>
                                        Image
                                    </th>
                                    <th>
                                        User
                                    </th>
                                    <th>
                                        Product Name
                                    </th>
                                    <th>
                                        Count
                                    </th>
                                    <th>
                                        Payment
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Options
                                    </th>
                                </tr>
                                </thead>


                                <tbody>
                                <?php $__currentLoopData = $basket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <img style='display:block;width:100px;height:70px;'
                                                 src="data:image/jpeg;base64,<?php echo e(base64_encode(\App\Products::find($b->product_id)->images)); ?>"/>
                                        </td>


                                        <td>
                                            <?php echo e(\App\User::find($b->user_id)->name.' '.\App\User::find($b->user_id)->surname); ?>

                                        </td>


                                        <td>
                                            <?php echo e(\App\Products::find($b->product_id)->name); ?>

                                        </td>

                                        <td>
                                            <?php echo e($b->product_count); ?>

                                        </td>

                                        <td>
                                            <?php echo e($b->payment); ?>

                                        </td>
                                        <td>
                                            <?php if($b->status==2): ?>
                                                Gozlemede
                                            <?php elseif($b->status==3): ?>
                                                Gonderilib
                                            <?php elseif($b->status==4): ?>
                                                Catib
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($b->status==2): ?>
                                                <button onclick="sil(this,<?php echo e($b->user_id); ?>,'<?php echo e($b->slug); ?>','<?php echo e($b->product_id); ?>')" class="btn btn-danger"
                                                        name="btn_delete"
                                                        value="btn_delete">
                                                    Imtina
                                                </button>
                                            <?php endif; ?>
                                        </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('jsValidate/jquery.form.js')); ?>"></script>
    <script src="<?php echo e(asset('jsValidate/jquery.validate.js')); ?>"></script>
    <script src="<?php echo e(asset('jsValidate/messages_az.js')); ?>"></script>
    <script src="<?php echo e(asset('jsValidate/sweetalert2.js')); ?>"></script>


    <script src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(asset('js/ckeditor/config.js')); ?>"></script>

    <script>
        function sil(setir, id,slug,product_id) {
            var sira = setir.parentNode.parentNode.rowIndex;
            console.log(sira);
            swal.fire({
                title: 'Imtina elemek isteyirsiz?',
                text: 'Imtina etdikden sonra berpa etmek olmayacaq!',
                icon: 'warning',
                allowOutsideClick: false,
                showCancelButton: true,
                cancelButtonText: 'Bagla',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Imtina etmek',
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
                    $.ajax({
                        type: "Post",
                        url: '',
                        data: {
                            'user_id': id,
                            'slug':slug,
                            'product_id':product_id,
                            '_token': CSRF_TOKEN
                        },
                        beforeSubmit: function () {
                            Swal.fire({
                                title: '<i class="fa fa-spinner fa-plus fa-3x fa-fw "></i><span class="sr-only">Gozleyin...</span>',
                                text: 'Silinir Gozleyin...',
                                showConfirmButton: false
                            })

                        },

                        success: function (response) {
                            if (response.status == 'success') {
                                document.getElementById("datatable-editable").deleteRow(sira);
                            }

                        }
                    })
                }
            })
        }

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/frontend/purchased_goods.blade.php ENDPATH**/ ?>