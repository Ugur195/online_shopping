<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('cssValidate/sweetalert2.css')); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div role="main" class="main">

        <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
        <div id="googlemaps" class="google-map mt-0" style="height: 500px;"></div>

        <div class="container">

            <div class="row py-4">
                <div class="col-lg-6">

                    <div class="overflow-hidden mb-1">
                        <h2 class="font-weight-normal text-7 mt-2 mb-0 appear-animation" data-appear-animation="maskUp"
                            data-appear-animation-delay="200"><strong class="font-weight-extra-bold">Contact</strong> Us
                        </h2>
                    </div>
                    <div class="overflow-hidden mb-4 pb-3">
                        <p class="mb-0 appear-animation" data-appear-animation="maskUp"
                           data-appear-animation-delay="400">Feel free to ask for details, don't save any questions!</p>
                    </div>

                    <form id="myForm" class="contact-form"
                          action="<?php echo e(url('/contact_us')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <div class="contact-form-success alert alert-success d-none mt-4" id="contactSuccess">
                            <strong>Success!</strong> Your message has been sent to us.
                        </div>

                        <div class="contact-form-error alert alert-danger d-none mt-4" id="contactError">
                            <strong>Error!</strong> There was an error sending your message.
                            <span class="mail-error-message text-1 d-block" id="mailErrorMessage"></span>
                        </div>

                        <?php if(!Auth::check()): ?>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label class="required font-weight-bold text-dark text-2">Full Name</label>
                                    <input type="text" value="" maxlength="100"
                                           class="form-control" name="full_name" id="full_name" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="required font-weight-bold text-dark text-2">Email Address</label>
                                    <input type="email" value="" maxlength="100" class="form-control" name="email"
                                           id="email" required>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label class="required font-weight-bold text-dark text-2">Full Name</label>
                                    <input readonly type="text" value="<?php echo e(Auth::user()->name.' '.Auth::user()->surname.' '.Auth::user()->father_name); ?>" maxlength="100"
                                           class="form-control" name="full_name" id="full_name" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="required font-weight-bold text-dark text-2">Email Address</label>
                                    <input readonly type="email" value="<?php echo e(Auth::user()->email); ?>" maxlength="100" class="form-control" name="email"
                                           id="email" required>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">Subject</label>
                                <input type="text" value="" maxlength="100" class="form-control" name="subject"
                                       id="subject" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="required font-weight-bold text-dark text-2">Message</label>
                                <textarea maxlength="5000" rows="8"
                                          class="form-control" name="messages" id="messages" required></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="submit" value="Send Message" class="btn btn-primary btn-modern"
                                       data-loading-text="Loading...">
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col-lg-6">

                    <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800">
                        <h4 class="mt-2 mb-1">Bizim <strong>Ofis</strong></h4>
                        <ul class="list list-icons list-icons-style-2 mt-2">
                            <li><i class="fas fa-map-marker-alt top-6"></i> <strong class="text-dark">Address:</strong>
                                <?php echo e($setting->address); ?>

                            </li>
                            <li><i class="fas fa-phone top-6"></i> <strong class="text-dark">Phone:</strong>
                                <?php echo e($setting->mobile); ?>

                            </li>
                            <li><i class="fas fa-envelope top-6"></i> <strong class="text-dark">Email:</strong> <a
                                    href="mailto:<?php echo e($setting->email); ?>"><?php echo e($setting->email); ?></a></li>
                        </ul>
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
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/frontend/contact_us.blade.php ENDPATH**/ ?>