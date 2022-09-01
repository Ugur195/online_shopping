<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div role="main" class="main">

        <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 align-self-center p-static order-2 text-center">

                        <h1 class="text-dark font-weight-bold text-8">Blog</h1>
                        <span
                            class="sub-title text-dark">Her mehsul haqqinda melumat bizim blogda elde ede bilersiz</span>
                    </div>

                    <div class="col-md-12 align-self-center order-1">

                    </div>
                </div>
            </div>
        </section>

        <div class="container py-4">

            <div class="row">
                <div class="col-lg-3 order-lg-2">
                    <aside class="sidebar">
                        <form action="https://preview.oklerthemes.com/porto/7.3.0/page-search-results.html"
                              method="get">
                            <div class="input-group mb-3 pb-1">
                                <input class="form-control text-1"
                                       placeholder="Search..." name="s" id="s"
                                       type="text"> <span class="input-group-append"><button
                                        type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>										</span>
                            </div>
                        </form>
                        <h5 class="font-weight-bold pt-4">Categories</h5>
                        <ul class="nav nav-list flex-column mb-5">
                            <?php $__currentLoopData = $blog_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item"><a class="nav-link"
                                                        href="<?php echo e(url('/blogs_categoryes/'.$bc->id)); ?>"><?php echo e($bc->name); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                        <h5 class="font-weight-bold pt-4">About Us</h5>
                        <?php $__currentLoopData = $about_us; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p>
                                <?php echo e($ab->why_us); ?>

                            </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </aside>
                </div>

                <div class="col-lg-9 order-lg-1">
                    <div class="blog-posts">

                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php ($user=\App\User::find($b->author)); ?>
                            <?php ($blogcat=\App\BlogCategory::find($b->category_id)); ?>
                            <?php ( $blogs_comments = \App\BlogsComments::where(['blog_id'=>$b->id,'status' => 1])->get()); ?>

                            <article class="post post-large">
                                <div class="post-image">
                                    <div
                                        class="owl-carousel owl-theme show-nav-hover dots-inside nav-inside nav-style-1 nav-light"
                                        data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': true}">
                                        <?php $__currentLoopData = explode('(xx)',$b->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bimg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($bimg !=""): ?>
                                                <div>
                                                    <div class="img-thumbnail border-0 p-0 d-block">
                                                        <img style="width: 800px; height: 400px"
                                                             class="img-fluid border-radius-0"
                                                             src="data:image/jpeg;base64,<?php echo e(base64_encode($bimg)); ?>"
                                                             alt="">
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>

                                <div class="post-date">
                                    <span class="day"><?php echo e($b->created_at->formatLocalized('%d')); ?></span>
                                    <span class="month"><?php echo e($b->created_at->formatLocalized('%b')); ?></span>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-6 line-height-3 mb-3"><a
                                            href="<?php echo e(url('single_blog/'.$b->id)); ?>"><?php echo e($b->header); ?></a></h2>
                                    <p><?php echo e($b->description); ?></p>

                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i> By <a
                                                href="<?php echo e(url('/blogs_user/'.$user->id)); ?>"><?php echo e($user->name); ?> <?php echo e($user->surname); ?></a> </span>

                                        <span>
                                            <i class="far fa-folder"></i>
                                                <a href="<?php echo e(url('/blogs_categoryes/'.$blogcat->id)); ?>"><?php echo e($blogcat->name); ?></a></span>

                                        <span><i class="far fa-comments"></i> <a href="<?php echo e(url('single_blog/'.$b->id)); ?>">(<?php echo e(count($blogs_comments)); ?>) Comments</a></span>
                                        <span class="d-block d-sm-inline-block float-sm-right mt-3 mt-sm-0">
                                            <a href="<?php echo e(url('single_blog/'.$b->id)); ?>"
                                               class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <ul class="pagination float-right">
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/frontend/blogs.blade.php ENDPATH**/ ?>