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

                        <h2 class="card-title">Edit Product</h2>
                    </header>
                    <div class="card-body">
                        <form class="form-horizontal form-bordered" method="post"
                              action="<?php echo e(url('/admin/product_edit/ $products->id')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <input type="text" name="id" hidden class="form-control" placeholder="email"
                                   value="<?php echo e($products->id); ?>"/>

                            <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
                                <?php $__currentLoopData = explode('(xx)',$products->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pimg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($pimg !=""): ?>
                                        <div class="isotope-item document col-sm-6 col-md-4 col-lg-3">
                                            <div class="thumbnail">
                                                <div class="thumb-preview">
                                                        <img style="width: 300px; height: 200px" alt="" class="img-fluid"
                                                             src="data:image/jpeg;base64,<?php echo e(base64_encode($pimg)); ?>"/>

                                                    <button onclick="sil('<?php echo e(base64_encode($pimg)); ?>','<?php echo e($products->id); ?>')" type="button" class="btn btn-danger"><i
                                                            class="fas fa-trash"></i></button>
                                                    <div class="mg-thumb-options">
                                                        <div class="mg-toolbar">
                                                            <div class="mg-group float-right">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Name</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fab fa-paypal"></i>
                                </span>
                            </span>
                                        <input type="text" name="name" class="form-control" placeholder="Name"
                                               value="<?php echo e($products->name); ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Real Price</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                            </span>
                                        <input step="any" type="number" name="real_price" class="form-control"
                                               placeholder="Real Price"
                                               value="<?php echo e($products->real_price); ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Price</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                            </span>
                                        <input step="any" type="number" name="price" class="form-control"
                                               placeholder="Price"
                                               value="<?php echo e($products->price); ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Discount Price</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-tag "></i>
                                </span>
                            </span>
                                        <input step="any" type="number" name="discount price" class="form-control"
                                               placeholder="Discount Price"
                                               value="<?php echo e($products->discount_price); ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Count</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-calculator fa-lg"></i>
                                </span>
                            </span>
                                        <input type="number" name="count" class="form-control" placeholder="Count"
                                               value="<?php echo e($products->count); ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Brand</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
            <span class="input-group-prepend">
                                <span class="input-group-text">
                                        <i class="fab fa-centos"></i>
                                </span>
                            </span>
                                        <select name="brands" data-plugin-selectTwo class="form-control populate">
                                            <option value="0" selected disabled>Select brands</option>
                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($products->brand_id==$b->id): ?> selected
                                                        <?php endif; ?> value="<?php echo e($b->id); ?>"><?php echo e($b->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Categoryes</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
            <span class="input-group-prepend">
                                <span class="input-group-text">
                                        <i class="fas fa-sliders-h"></i>
                                </span>
                            </span>
                                        <select name="categoryes" data-plugin-selectTwo class="form-control populate">
                                            <option value="0" selected disabled>Select categoryes</option>
                                            <?php $__currentLoopData = $categoryes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($products->category_id==$c->id): ?> selected
                                                        <?php endif; ?> value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <?php if($products->status==1): ?>
                                        <i class="fas fa-eye"></i>
                                    <?php else: ?>
                                        <i class="	fas fa-eye-slash"></i>
                                    <?php endif; ?>

                                </span>
                            </span>
                                        <select name="status" data-plugin-selectTwo class="form-control populate">
                                            <option value="1" <?php if($products->status==1): ?> selected <?php endif; ?>>Aktiv</option>
                                            <option value="0" <?php if($products->status==0): ?> selected <?php endif; ?>>Deaktiv</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="compose pt-3">
                                <div id="compose-field" class="compose">
                                </div>
                                <div class="text-right mt-3">
                                    <a href="<?php echo e(url('admin/products')); ?>" class="btn btn-info">
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
        function sil(setir, id) {
            console.log(setir);
            swal.fire({
                title: 'Sekli silmek isteyirsinizmi?',
                text: 'Sildikden sonra berpa etmek olmayacaq!',
                icon: 'warning',
                allowOutsideClick: false,
                showCancelButton: true,
                cancelButtonText: 'Bagla',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sil',
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
                    $.ajax({
                        type: "Post",
                        url: '/admin/delete_image',
                        data: {
                            'id': id,
                            'sekil': setir,
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
                            swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: response.status,
                                allowOutsideClick: false
                            })
                            if(response.status=='success'){
                                window.location.href='/admin/product_edit/<?php echo e($products->id); ?>';
                            }

                        }

                    })
                }
            })
        }

    </script>


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
                        window.location.href = '/admin/products';
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/admin/product_edit.blade.php ENDPATH**/ ?>