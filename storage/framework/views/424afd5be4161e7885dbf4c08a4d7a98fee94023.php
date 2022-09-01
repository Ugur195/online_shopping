<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div role="main" class="main">
        <section
            class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7"
            style="background-image: url('frontendCss/img/page-header/page-header-about-us.jpg')">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-12 align-self-center p-static order-2 text-center">
                        <h1 class="text-9 font-weight-bold">About Us</h1>
                        <span class="sub-title"><?php echo e($about_us->title); ?></span>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row pt-5">
                <div class="col">
                    <div class="row text-center pb-5">
                        <div class="col-md-9 mx-md-auto">
                            <div class="overflow-hidden mb-3">
                                <h1 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation"
                                    data-appear-animation="maskUp">
                                    <span class="word-rotator-words bg-primary"></span>
                                </h1>
                            </div>
                            <div class="overflow-hidden mb-3">
                                <p class="lead mb-0 appear-animation" data-appear-animation="maskUp"
                                   data-appear-animation-delay="200">
                                    <?php echo e($about_us->description); ?>

                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 mb-5">
                        <div class="col-md-4 appear-animation" data-appear-animation="fadeInLeftShorter"
                             data-appear-animation-delay="800">
                            <div class="tab-content">
                                <h3 class="font-weight-bold text-4 mb-2">Our Mission</h3>
                                <p><?php echo e($about_us->our_mission); ?></p>
                            </div>


                        </div>
                        <div class="col-md-4 appear-animation" data-appear-animation="fadeIn"
                             data-appear-animation-delay="600">
                            <div class="tab-content">
                                <h3 class="font-weight-bold text-4 mb-2">Our Vision</h3>
                                <p><?php echo e($about_us->our_vision); ?></p>
                            </div>
                        </div>
                        <div class="col-md-4 appear-animation" data-appear-animation="fadeInRightShorter"
                             data-appear-animation-delay="800">
                            <div class="tab-content">
                                <h3 class="font-weight-bold text-4 mb-2">Why Us</h3>
                                <p><?php echo e($about_us->why_us); ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <section class="section section-height-3 bg-color-grey-scale-1 m-0 border-0">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 pb-sm-4 pb-lg-0 pr-lg-5 mb-sm-5 mb-lg-0">
                        <h2 class="text-color-dark font-weight-normal text-6 mb-2">Who <strong
                                class="font-weight-extra-bold">We Are</strong></h2>
                        <p><?php echo e($about_us->who_we_are); ?></p>
                    </div>

                    <div class="col-sm-8 col-md-6 col-lg-4 offset-sm-4 offset-md-4 offset-lg-2 mt-sm-5"
                         style="top: 1.7rem;">
                        <img src="data:image/jpeg;base64,<?php echo e(base64_encode($about_us->image)); ?>"
                             class="img-fluid position-relative d-none d-sm-block appear-animation"
                             data-appear-animation="expandIn" data-appear-animation-delay="300"
                             style="top: 10%; left: -10%;" alt=""/>
                    </div>
                </div>
            </div>
        </section>

        <div class="container appear-animation" data-appear-animation="fadeInUpShorter"
             data-appear-animation-delay="300">
            <div class="row pt-5 pb-4 my-5">
                <div class="col-md-6 order-2 order-md-1 text-center text-md-left">
                    <div class="owl-carousel owl-theme nav-style-1 nav-center-images-only stage-margin mb-0"
                         data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 2}, '1200': {'items': 2}}, 'margin': 25, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">

                        <?php $__currentLoopData = $our_team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php ($user=\App\User::find($ot->user_id)); ?>
                            <?php ($role=\App\OurTeamRoles::find($ot->our_team_role_id)); ?>

                            <div>
                                <img class="img-fluid rounded-0 mb-4"
                                     src="data:image/jpeg;base64,<?php echo e(base64_encode($user->image)); ?>" alt=""/>
                                <h3 class="font-weight-bold text-color-dark text-4 mb-0">
                                    <?php echo e($user->name.' '.$user->surname.' '.$user->father_name); ?>

                                </h3>
                                <p class="text-2 mb-0"><?php echo e($user->name); ?></p>
                                <span class="thumb-info-social-icons mb-4">
											<a target="_blank" href="<?php echo e($user->fb_profile); ?>"><i
                                                    class="fab fa-facebook-f"></i><span>Facebook</span></a>
											<a target="_blank" href="<?php echo e($user->inst_profile); ?>"><i
                                                    class="fab fa-instagram"></i><span>Instagram</span></a>
											<a target="_blank" href="https://wa.me/"<?php echo e($user->wp_profile); ?>><i
                                                    class="fab fa-whatsapp"></i><span>Whatsapp</span></a>
										</span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
                <div class="col-md-6 order-1 order-md-2 text-center text-md-left mb-5 mb-md-0">
                    <div class="tab-content">
                    <h2 class="text-color-dark font-weight-normal text-6 mb-2 pb-1">Meet <strong
                            class="font-weight-extra-bold">Our Team</strong></h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit massa enim. Nullam id varius
                        nunc.</p>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa
                        enim. Nullam id varius nunc. Vivamus bibendum magna ex, et faucibus lacus venenatis eget.</p>
                    </div>
                </div>
            </div>
        </div>

        <section class="section bg-color-grey-scale-1 section-height-3 border-0 m-0">
            <div class="container pb-2">
                <div class="row">
                    <div class="col-lg-6 text-center text-md-left mb-5 mb-lg-0">
                        <h2 class="text-color-dark font-weight-normal text-6 mb-2">About <strong
                                class="font-weight-extra-bold">Our Clients</strong></h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit massa enim. Nullam id
                            varius nunc.</p>

                        <div class="row justify-content-center my-5">
                            <div class="col-8 text-center col-md-4">
                                <img src= "img/logos/logo-1.png" class="img-fluid hover-effect-3" alt=""/>
                            </div>
                            <div class="col-8 text-center col-md-4 my-3 my-md-0">
                                <img src="img/logos/logo-2.png" class="img-fluid hover-effect-3" alt=""/>
                            </div>
                            <div class="col-8 text-center col-md-4">
                                <img src="img/logos/logo-3.png" class="img-fluid hover-effect-3" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="owl-carousel owl-theme nav-style-1 stage-margin"
                             data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 1}, '1200': {'items': 1}}, 'loop': true, 'nav': false, 'dots': false, 'stagePadding': 40, 'autoplay': true, 'autoplayTimeout': 6000, 'loop': true}">
                            <div>
                                <div
                                    class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark testimonial-remove-right-quote pl-md-4 mb-0">
                                    <div class="testimonial-author">
                                        <img src="img/clients/client-1.jpg" class="img-fluid rounded-circle mb-0"
                                             alt="">
                                    </div>
                                    <blockquote>
                                        <p class="text-color-dark text-4 line-height-5 mb-0">Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit. Morbi vitae metus tellus. Curabitur non lorem
                                            at odio tempus consectetur vel eu lacus. Morbi.</p>
                                    </blockquote>
                                    <div class="testimonial-author">
                                        <p><strong class="font-weight-extra-bold text-2">John
                                                Smith</strong><span>Okler</span></p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div
                                    class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark testimonial-remove-right-quote pl-md-4 mb-0">
                                    <div class="testimonial-author">
                                        <img src="img/clients/client-1.jpg" class="img-fluid rounded-circle mb-0"
                                             alt="">
                                    </div>
                                    <blockquote>
                                        <p class="text-color-dark text-4 line-height-5 mb-0">Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit. Morbi vitae metus tellus. Curabitur non lorem
                                            at odio tempus consectetur vel eu lacus. Morbi.</p>
                                    </blockquote>
                                    <div class="testimonial-author">
                                        <p><strong class="font-weight-extra-bold text-2">John
                                                Smith</strong><span>Okler</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/frontend/about_us.blade.php ENDPATH**/ ?>