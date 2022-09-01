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

                        <h2 class="card-title">Messages</h2>
                    </header>
                    <div class="card-body">
                        <form id="myForm" class="form-horizontal form-bordered" method="post">
                            <?php echo e(csrf_field()); ?>


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
                                               value="<?php echo e($message->full_name); ?>"/>
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
                                               value="<?php echo e($message->email); ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Subject</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-pencil-alt"></i>
															</span>
														</span>
                                        <input type="text" name="subject" class="form-control" placeholder="Subject"
                                               readonly="readonly"
                                               value="<?php echo e($message->subject); ?>"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2"
                                       for="textareaAutosize">Message</label>
                                <div class="col-lg-6">
                                <textarea class="form-control" rows="3" id="textareaAutosize" name="message"
                                          data-plugin-textarea-autosize
                                          readonly="readonly"><?php echo e($message->messages); ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2"
                                       for="textareaAutosize">Answer</label>
                                <div class="col-lg-6">
                                <textarea class="form-control " rows="3" id="textareaAutosize" name="answer"
                                          data-plugin-textarea-autosize placeholder="Answer"></textarea>
                                </div>
                            </div>

                            <div class="compose pt-3">
                                <div id="compose-field" class="compose">
                                </div>
                                <div class="text-right mt-3">
                                    <a href="<?php echo e(url('admin/messages')); ?>" class="btn btn-info">
                                        <i class="fas fa-arrow-left"></i>
                                        Back
                                    </a>
                                    <button href="#" class="btn btn-success">
                                        <i class="fas fa-paper-plane mr-1"></i>
                                        Send
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
                        window.location.href = '/admin/messages';
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/admin/message.blade.php ENDPATH**/ ?>