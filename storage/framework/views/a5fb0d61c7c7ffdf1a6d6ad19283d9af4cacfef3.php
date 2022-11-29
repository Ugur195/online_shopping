<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div role="main" class="main">

        <section class="page-header page-header-modern page-header-background page-header-background-pattern page-header-background-sm overlay overlay-color-dark overlay-show overlay-op-5" style="background-image: url(img/patterns/wild_oliva.png);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 align-self-center p-static order-2 text-center">
                        <h1><strong>Brand's products</strong></h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container py-4">



            <div role="main" class="main shop py-4">

                <div class="container">

                    <div class="masonry-loader masonry-loader-showing">
                        <div class="row products product-thumb-info-list" data-plugin-masonry
                             data-plugin-options="{'layoutMode': 'fitRows'}">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12 col-sm-6 col-lg-3 product">
                                    <a href="shop-product-sidebar-left.html">
                                        <span class="onsale"><?php echo e($p->real_count); ?></span>
                                    </a>
                                    <span class="product-thumb-info border-0">
									<a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
										<span class="text-uppercase text-1">Add to Cart</span>
									</a>
										<span class="product-thumb-info-image">
											<img alt="" class="img-fluid"
                                                 src="data:image/jpeg;base64,<?php echo e(base64_encode($p->images)); ?>">
										</span>
									<span
                                        class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
										<a href="<?php echo e(url('product/'.$p->id)); ?>">
											<h4 class="text-4 text-primary"><?php echo e($p->name); ?></h4>
											<span class="price">
												<?php if($p->discount_price!=0): ?>
                                                    <del><span class="amount"><?php echo e($p->price); ?></span></del>
                                                    <ins><span
                                                            class="amount text-dark font-weight-semibold"><?php echo e($p->discount_price); ?></span></ins>
                                                <?php else: ?>
                                                    <ins><span
                                                            class="amount text-dark font-weight-semibold"><?php echo e($p->price); ?></span></ins>
                                                <?php endif; ?>
											</span>
										</a>
									</span>
								</span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/frontend/brands_products.blade.php ENDPATH**/ ?>