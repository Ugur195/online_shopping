<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div role="main" class="main">

        <section class="page-header page-header-modern page-header-background page-header-background-pattern page-header-background-sm overlay overlay-color-dark overlay-show overlay-op-5" style="background-image: url(img/patterns/wild_oliva.png);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 align-self-center p-static order-2 text-center">
                        <h1><strong>Blogs Category</strong></h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container py-4">



            <div class="masonry-loader masonry-loader-showing">
                <div class="row products product-thumb-info-list" data-plugin-masonry
                     data-plugin-options="{'layoutMode': 'fitRows'}">
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php ($blogcat=\App\BlogCategory::find($b->category_id)); ?>
                        <div class="col-12 col-sm-6 col-lg-3 product">

                            <span class="product-thumb-info border-0">
									<a href="shop-cart.html" class="add-to-cart-product bg-color-primary"></a>

                                 <div class="post-image">
                                    <div
                                        class="owl-carousel owl-theme show-nav-hover dots-inside nav-inside nav-style-1 nav-light"
                                        data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': true}">
                                        <?php $__currentLoopData = explode('(xx)',$b->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bimg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($bimg !=""): ?>
                                                <div>
                                                   <img style="width: 850px; height: 250px"
                                                        class="img-fluid border-radius-0"
                                                        src="data:image/jpeg;base64,<?php echo e(base64_encode($bimg)); ?>"
                                                        alt="">
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>

									<span
                                        class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
                                         <a href="<?php echo e(url('categoryes_blogs/'.$blogcat->id)); ?>">
                                <span class="amount text-blue font-weight-semibold"><?php echo e($blogcat->name); ?></span>
                            </a>
									</span>
								</span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

    </div>




<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/frontend/categoryes_blogs.blade.php ENDPATH**/ ?>