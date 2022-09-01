<?php $__env->startSection('css'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('cssValidate/sweetalert2.css')); ?>"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="body">
        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Comments</h2>
            </header>

            <!-- start: page -->
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-editable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name Surname</th>
                            <th>Email</th>
                            <th>Texts</th>
                            <th>Product Name</th>
                            <th>Parent ID</th>
                            <th>Status</th>
                            <th>Options</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-item-id="1">
                                <td hidden><input name="msg_id value="><?php echo e($cm->id); ?>"</td>
                                <td><?php echo e($cm->id); ?></td>
                                <td><?php echo e($cm->full_name); ?></td>
                                <td><?php echo e($cm->email); ?></td>
                                <td><?php echo e($cm->texts); ?></td>
                                <td><?php echo e(\App\Products::find($cm->product_id)->name); ?></td>
                                <td><?php echo e($cm->parent_id); ?></td>
                                <td>
                                    <?php if($cm->status==1): ?>
                                        Aktiv
                                    <?php else: ?>
                                        Deaktiv
                                    <?php endif; ?>
                                </td>
                                <td class="actions">
                                    <button onclick="publish('<?php echo e($cm->email); ?>', '<?php echo e($cm->full_name); ?>', <?php echo e($cm->id); ?>)" class="btn btn-success"
                                            style="color: white"><i class="fas fa-check"></i></button>
                                    <button onclick="sil(this, <?php echo e($cm->id); ?>)" type="button" class="btn btn-danger"><i
                                            class="fas fa-trash "></i></button>
                                    <a href="<?php echo e(url('admin/comment/'.$cm->id)); ?>" class="btn btn-info"
                                       style="color: white"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- end: page -->
        </section>

        <aside id="sidebar-right" class="sidebar-right">
            <div class="nano">
                <div class="nano-content">
                    <a href="#" class="mobile-close d-md-none">
                        Collapse <i class="fas fa-chevron-right"></i>
                    </a>

                    <div class="sidebar-right-wrapper">

                        <div class="sidebar-widget widget-calendar">
                            <h6>Upcoming Tasks</h6>
                            <div data-plugin-datepicker data-plugin-skin="dark"></div>

                            <ul>
                                <li>
                                    <time datetime="2017-04-19T00:00+00:00">04/19/2017</time>
                                    <span>Company Meeting</span>
                                </li>
                            </ul>
                        </div>

                        <div class="sidebar-widget widget-friends">
                            <h6>Friends</h6>
                            <ul>
                                <li class="status-online">
                                    <figure class="profile-picture">
                                        <img src="img/%21sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                    </figure>
                                    <div class="profile-info">
                                        <span class="name">Joseph Doe Junior</span>
                                        <span class="title">Hey, how are you?</span>
                                    </div>
                                </li>
                                <li class="status-online">
                                    <figure class="profile-picture">
                                        <img src="img/%21sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                    </figure>
                                    <div class="profile-info">
                                        <span class="name">Joseph Doe Junior</span>
                                        <span class="title">Hey, how are you?</span>
                                    </div>
                                </li>
                                <li class="status-offline">
                                    <figure class="profile-picture">
                                        <img src="img/%21sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                    </figure>
                                    <div class="profile-info">
                                        <span class="name">Joseph Doe Junior</span>
                                        <span class="title">Hey, how are you?</span>
                                    </div>
                                </li>
                                <li class="status-offline">
                                    <figure class="profile-picture">
                                        <img src="img/%21sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                    </figure>
                                    <div class="profile-info">
                                        <span class="name">Joseph Doe Junior</span>
                                        <span class="title">Hey, how are you?</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </aside>
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
                                window.location.href = '/admin/comments';
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
                                document.getElementById("datatable-editable").deleteRow(sira);
                            }
                            swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: response.status,
                                allowOutsideClick: false
                            })

                        }
                    })
                }
            })
        }

    </script>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/admin/comments.blade.php ENDPATH**/ ?>