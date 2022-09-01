<!DOCTYPE html>
<html>

<!-- Mirrored from preview.oklerthemes.com/porto/7.3.0/index-classic-color.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Mar 2019 07:34:02 GMT -->
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>TuranShopping</title>

    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Porto - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Favicon -->
    <link rel="shortcut icon" href="#" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="#">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontendCss/vendor/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontendCss/vendor/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontendCss/vendor/animate/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontendCss/vendor/simple-line-icons/css/simple-line-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontendCss/vendor/owl.carousel/assets/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontendCss/vendor/owl.carousel/assets/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontendCss/vendor/magnific-popup/magnific-popup.min.css')); ?>">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontendCss/css/theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontendCss/css/theme-elements.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontendCss/css/theme-blog.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontendCss/css/theme-shop.css')); ?>">

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontendCss/vendor/rs-plugin/css/settings.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontendCss/vendor/rs-plugin/css/layers.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontendCss/vendor/rs-plugin/css/navigation.css')); ?>">

    <!-- Demo CSS -->


    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontendCss/css/skins/default.css')); ?>">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontendCss/css/custom.css')); ?>">
<?php echo $__env->yieldContent('css'); ?>

<!-- Head Libs -->
    <script src="<?php echo e(asset('frontendCss/vendor/modernizr/modernizr.min.js')); ?>"></script>

</head>
<body>

<div class="body">
    <header id="header" class="header-effect-shrink"
            data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 70}">
        <div class="header-body border-color-primary header-body-bottom-border">
            <div class="header-top header-top-default border-bottom-0">
                <div class="container">
                    <div class="header-row py-2">
                        <div class="header-column justify-content-start">
                        </div>
                        <div class="header-column justify-content-end">
                            <div class="header-row">
                                <nav class="header-nav-top">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <select id="local" name="local" onchange="local()">
                                                <option <?php if(App::isLocale('az')): ?> selected <?php endif; ?> value="az">Az</option>
                                                <option <?php if(App::isLocale('en')): ?> selected <?php endif; ?> value="en">En</option>
                                            </select>
                                        </li>
                                        <li class="nav-item">
                                            <a href="mailto:mail@domain.com"><i
                                                    class="far fa-envelope text-4 text-color-primary"
                                                    style="top: 1px;"></i> <?php echo e($setting->email); ?></a>
                                        </li>


                                        <li class="nav-item">
                                            <a href="tel:<?php echo e($setting->mobile); ?>"><i
                                                    class="fab fa-whatsapp text-4 text-color-primary"
                                                    style="top: 0;"></i><?php echo e($setting->mobile); ?></a>
                                        </li>


                                        <?php if(Auth::check()): ?>
                                            <img style='display:block;width:45px;height:40px;'
                                                 src="data:image/jpeg;base64,<?php echo e(base64_encode(Auth::user()->image)); ?>"/>
                                        <?php endif; ?>

                                        <li class="nav-item dropdown">
                                            <?php if(Auth::check()): ?>
                                                <a id="navbarDropdown" href="#"
                                                   role="button" data-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="false" v-pre>
                                                    <?php echo e(Auth::user()->name.' '.Auth::user()->surname); ?> <span
                                                        class="caret"></span>

                                                    <i class="fa fa-caret-down text-color-primary"></i>
                                                </a>

                                                <?php if(Auth::user()->role_id==1): ?>
                                                    <a target="_blank" href="<?php echo e(url('/admin/index')); ?>">Admin Page</a>
                                                <?php endif; ?>


                                                <div class="dropdown-menu dropdown-menu-right"
                                                     aria-labelledby="navbarDropdown">

                                                    <a class="dropdown-item" href="<?php echo e(url('my_profile')); ?>">
                                                        <i style="color: #0aa1e8" class="fas fa-user"> My Profile </i>
                                                    </a>


                                                    <a class="dropdown-item" href="<?php echo e(url('my_basket')); ?>">
                                                        <i style="color: #0aa1e8" class="fa fa-shopping-basket"> My
                                                            Basket </i>
                                                    </a>

                                                    <a class="dropdown-item" href="<?php echo e(url('purchased_goods')); ?>">
                                                        <i style="color: #0aa1e8" class="fa fa-shopping-basket">Purchased
                                                            goods</i>
                                                    </a>


                                                    <a class="dropdown-item" href="<?php echo e(url('logout')); ?>">
                                                        <i style="color: #0aa1e8" class="fas fa-power-off"> Logout </i>
                                                    </a>
                                                </div>
                                        <?php else: ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(url('/sign_in')); ?>"><?php echo e(__('Login')); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                   href="<?php echo e(url('/sign_up')); ?>"><?php echo e(__('Register')); ?></a>
                                            </li>
                                            <?php endif; ?>
                                            </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-container container">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-logo">
                                <a href="<?php echo e(url('/index')); ?>">
                                    <img alt="Porto" width="160" height="55"
                                         src="data:image/jpeg;base64,<?php echo e(base64_encode($setting->logo)); ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <div class="header-nav header-nav-links order-2 order-lg-1">
                                <div
                                    class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                    <nav class="collapse">
                                        <ul class="nav nav-pills" id="mainNav">
                                            <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle active"
                                                       href="/<?php echo e($m->page); ?>"> <?php echo e($m->name); ?> </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </nav>
                                </div>
                                <ul class="header-social-icons social-icons d-none d-sm-block">
                                    <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank"
                                                                         title="Facebook"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank"
                                                                        title="Twitter"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank"
                                                                         title="Linkedin"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                                <button class="btn header-btn-collapse-nav" data-toggle="collapse"
                                        data-target=".header-nav-main nav">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </div>
                            <div
                                class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
                                <div class="header-nav-feature header-nav-features-search d-inline-flex"><a href="#"
                                                                                                            class="header-nav-features-toggle"
                                                                                                            data-focus="headerSearch"><i
                                            class="fas fa-search header-nav-top-icon"></i></a>
                                    <div class="header-nav-features-dropdown" id="headerTopSearchDropdown">
                                        <form role="search"
                                              action="https://preview.oklerthemes.com/porto/7.3.0/page-search-results.html"
                                              method="get">
                                            <div class="simple-search input-group"><input class="form-control text-1"
                                                                                          id="headerSearch" name="q"
                                                                                          type="search" value=""
                                                                                          placeholder="Search..."> <span
                                                    class="input-group-append"><button
                                                        class="btn" type="submit"><i
                                                            class="fa fa-search header-nav-top-icon"></i></button></span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-nav-feature header-nav-features-cart d-inline-flex ml-2"><a href="#"
                                                                                                               class="header-nav-features-toggle">
                                        <img src="img/icons/icon-cart.svg" width="14" alt=""
                                             class="header-nav-top-icon-img"> <span class="cart-info d-none"><span
                                                class="cart-qty">1</span></span>
                                    </a>
                                    <div class="header-nav-features-dropdown" id="headerTopCartDropdown">
                                        <ol class="mini-products-list">
                                            <li class="item"><a href="#" title="Camera X1000" class="product-image"><img
                                                        src="img/products/product-1.jpg" alt="Camera X1000"></a>
                                                <div class="product-details"><p class="product-name"><a href="#">Camera
                                                            X1000 </a></p>
                                                    <p class="qty-price"> 1X <span class="price">$890</span></p>
                                                    <a href="#" title="Remove This Item" class="btn-remove"><i
                                                            class="fas fa-times"></i></a></div>
                                            </li>
                                        </ol>
                                        <div class="totals"><span class="label">Total:</span> <span class="price-total"><span
                                                    class="price">$890</span></span></div>
                                        <div class="actions"><a class="btn btn-dark" href="#">View Cart</a> <a
                                                class="btn btn-primary" href="#">Checkout</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php echo $__env->yieldContent('content'); ?>


    <footer id="footer">
        <div class="container">
            <div class="footer-ribbon"><span>Get in Touch</span></div>
            <div class="row py-5 my-4">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0"><h5 class="text-3 mb-3">NEWSLETTER</h5>
                    <p class="pr-1">Keep up on our always evolving product features and technology. Enter your e-mail
                        address and subscribe to our newsletter.</p>
                    <div class="alert alert-success d-none" id="newsletterSuccess"><strong>Success!</strong> You've been
                        added to our email list.
                    </div>
                    <div class="alert alert-danger d-none" id="newsletterError"></div>
                    <form id="newsletterForm"
                          action="https://preview.oklerthemes.com/porto/7.3.0/php/newsletter-subscribe.php"
                          method="POST" class="mr-4 mb-3 mb-md-0">
                        <div class="input-group input-group-rounded"><input
                                class="form-control form-control-sm bg-light" placeholder="Email Address"
                                name="newsletterEmail" id="newsletterEmail" type="text"> <span
                                class="input-group-append">										<button
                                    class="btn btn-light text-color-dark"
                                    type="submit"><strong>GO!</strong></button></span>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0"><h5 class="text-3 mb-3">LATEST TWEETS</h5>
                    <div id="tweet" class="twitter" data-plugin-tweets
                         data-plugin-options="{'username': 'oklerthemes', 'count': 2}"><p>Please wait...</p></div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <div class="contact-details"><h5 class="text-3 mb-3">CONTACT US</h5>
                        <ul class="list list-icons list-icons-lg">
                            <li class="mb-1"><i class="far fa-dot-circle text-color-primary"></i>
                                <p class="m-0">Nizami Street , 56</p></li>
                            <li class="mb-1"><i class="fab fa-whatsapp text-color-primary"></i>
                                <p class="m-0"><a href="tel:8001234567">(800) 123-4567</a></p></li>
                            <li class="mb-1"><i class="far fa-envelope text-color-primary"></i>
                                <p class="m-0"><a href="mailto:mail@example.com">mail@example.com</a></p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2"><h5 class="text-3 mb-3">FOLLOW US</h5>
                    <ul class="social-icons">
                        <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank"
                                                             title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank"
                                                            title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank"
                                                             title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container py-2">
                <div class="row py-4">
                    <div
                        class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
                        <a href="index.html" class="logo pr-0 pr-lg-3"> <img alt="Porto Website Template"
                                                                             src="img/logo-footer.png" class="opacity-5"
                                                                             height="33"> </a></div>
                    <div
                        class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                        <p>© Copyright 2019. All Rights Reserved.</p></div>
                    <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                        <nav id="sub-menu">
                            <ul>
                                <li><i class="fas fa-angle-right"></i><a href="page-faq.html"
                                                                         class="ml-1 text-decoration-none"> FAQ's</a>
                                </li>
                                <li><i class="fas fa-angle-right"></i><a href="sitemap.html"
                                                                         class="ml-1 text-decoration-none"> Sitemap</a>
                                </li>
                                <li><i class="fas fa-angle-right"></i><a href="contact-us.html"
                                                                         class="ml-1 text-decoration-none"> Contact
                                        Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Vendor -->
<script src="<?php echo e(asset('frontendCss/vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/jquery.appear/jquery.appear.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/jquery.easing/jquery.easing.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/jquery.cookie/jquery.cookie.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/popper/umd/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/bootstrap-star-rating/js/star-rating.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/common/common.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/jquery.validation/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/jquery.gmap/jquery.gmap.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/jquery.lazyload/jquery.lazyload.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/isotope/jquery.isotope.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/owl.carousel/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/magnific-popup/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/vide/jquery.vide.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/vivus/vivus.min.js')); ?>"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?php echo e(asset('frontendCss/js/theme.js')); ?>"></script>

<!-- Current Page Vendor and Views -->
<script src="<?php echo e(asset('frontendCss/vendor/rs-plugin/js/jquery.themepunch.tools.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontendCss/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js')); ?>"></script>

<!-- Theme Custom -->
<script src="<?php echo e(asset('frontendCss/js/custom.js')); ?>"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo e(asset('frontendCss/js/theme.init.js')); ?>"></script>

<!-- Examples -->
<script src="<?php echo e(asset('frontendCss/js/examples/examples.portfolio.js')); ?>"></script>

<script>
    function local() {
        var l = document.getElementById('local').value;
        console.log(l);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "Post",
            url: '/locale',
            data: {
                'local': l,
                '_token': CSRF_TOKEN
            }
        });
    }
</script>

<?php echo $__env->yieldContent('js'); ?>

</body>

<!-- Mirrored from preview.oklerthemes.com/porto/7.3.0/index-classic-color.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Mar 2019 07:34:07 GMT -->
</html>

<?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/frontend/app.blade.php ENDPATH**/ ?>