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

                        <h2 class="card-title">Blogs Comments Edit</h2>
                    </header>

                    <div class="card-body">
                        <?php echo e(csrf_field()); ?>

                        <input type="text" name="id" hidden class="form-control" placeholder="id"
                               value="<?php echo e($blogs_comments_edit->id); ?>"/>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Full Name</label>
                            <div class="col-lg-6">
                                <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-user"></i>
															</span>
														</span>
                                    <input type="text" name="full_name" class="form-control" placeholder="Full Name"
                                           readonly="readonly"
                                           value="<?php echo e($blogs_comments_edit->full_name); ?>"/>
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
                                    <input type="text" name="email" class="form-control" placeholder="Email"
                                           readonly="readonly"
                                           value="<?php echo e($blogs_comments_edit->email); ?>"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2"
                                   for="textareaAutosize">Texts</label>
                            <div class="col-lg-6">
                                <textarea class="form-control" rows="3" id="textareaAutosize" name="texts"
                                          data-plugin-textarea-autosize
                                          readonly="readonly"><?php echo e($blogs_comments_edit->texts); ?></textarea>
                            </div>
                        </div>

                        <div class="compose pt-3">
                            <div id="compose-field" class="compose">
                            </div>
                            <div class="text-right mt-3">
                                <a href="<?php echo e(url('admin/blogs_comments/')); ?>" class="btn btn-info">
                                    <i class="fas fa-arrow-left"></i>
                                    Back
                                </a>

                                <button
                                    onclick="publish('<?php echo e($blogs_comments_edit->email); ?>', '<?php echo e($blogs_comments_edit->full_name); ?>',
                                    <?php echo e($blogs_comments_edit->id); ?>)"
                                    class="btn btn-success" name="btn_publish" value="btn_publish">
                                    <i class="fa fa-upload"></i>
                                    Publish
                                </button>

                                <button onclick="sil(this,<?php echo e($blogs_comments_edit->id); ?>)" class="btn btn-danger"
                                        name="btn_delete"
                                        value="btn_delete">
                                    <i class="fas fa-trash mr-1"></i>
                                    Delete
                                </button>
                            </div>
                        </div>
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
        function publish(email, full_name, id) {
            console.log(email);
            console.log(full_name);
            console.log(id);
            swal.fire({
                title: 'Yayinlamaq Isteyirsinizmi?',
                text: 'Bu rey yayinlandiqdan sonra saytda gorunecek!',
                icon: 'question',
                allowOutsideClick: false,
                showCancelButton: true,
                cancelButtonText: 'Bagla',
                confirmButtonColor: '#0ccb27',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yayinla',
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
                    $.ajax({
                        type: "Post",
                        url: '',
                        data: {
                            'email': email,
                            'full_name': full_name,
                            'id': id,
                            'btn_publish': 'btn_publish',
                            '_token': CSRF_TOKEN
                        },
                        beforeSubmit: function () {
                            Swal.fire({
                                title: '<i class="fa fa-spinner fa-plus fa-3x fa-fw "></i><span class="sr-only">Gozleyin...</span>',
                                text: 'Yayinlanir Gozleyin...',
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
                            if (response.status == 'success') {
                                window.location.href = '/admin/blogs_comments';
                            }
                        }
                    })
                }
            })
        }

        function sil(setir, id) {
            var sira = setir.parentNode.parentNode.rowIndex;
            console.log(sira);
            swal.fire({
                title: 'Silmek Isteyirsinizmi?',
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
                        url: '',
                        data: {
                            'id': id,
                            'btn_delete': 'btn_delete',
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
                            }
                            swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: response.status,
                                allowOutsideClick: false
                            })
                            if (response.status == 'success') {
                                window.location.href = '/admin/blogs_comments';
                            }

                        }
                    })
                }
            })
        }

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/admin/blogs_comments_edit.blade.php ENDPATH**/ ?>