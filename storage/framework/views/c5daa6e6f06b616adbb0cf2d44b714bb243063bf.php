<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('cssValidate/sweetalert2.css')); ?>"/>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div role="main" class="main shop py-4">
        <form id="submitComments" method="post">
            <?php echo e(csrf_field()); ?>


            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="owl-carousel owl-theme" data-plugin-options="{'items': 1}">
                            <?php $__currentLoopData = explode('(xx)',$p->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pimg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($pimg !=""): ?>
                                    <div>
                                        <img alt="" class="img-fluid"
                                             src="data:image/jpeg;base64,<?php echo e(base64_encode($pimg)); ?>"/>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="summary entry-summary">
                            <h1 class="mb-0 font-weight-bold text-7"><?php echo e($p->name); ?></h1>
                            <input name="p_name" hidden class="mb-0 font-weight-bold text-7" value="<?php echo e($p->name); ?>"/>
                            <div class="pb-0 clearfix">
                            </div>
                            <div class="pb-0 clearfix">
                                <div title="Rated 3 out of 5" class="float-left">
                                    <input type="text" class="d-none" value="3" title="" data-plugin-star-rating
                                           data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'s'}">
                                </div>

                                <div class="review-num">
                                    <span class="count" itemprop="ratingCount">2</span> reviews
                                </div>
                            </div>
                            <div class="review-num">
                                <span class="count" itemprop="ratingCount"><?php echo e($p->reviews); ?></span> reviews
                            </div>

                            <br/>


                            <p>
                            <span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
												<?php if($p->discount_price!=0): ?>
                                    <del><span class="amount"><?php echo e($p->price); ?></span></del>
                                    <ins><span style="font-size: 40px;"
                                               class="amount text-dark font-weight-semibold"><?php echo e($p->discount_price); ?></span></ins>
                                <?php else: ?>
                                    <ins><span style="font-size: 40px;"
                                               class="amount text-dark font-weight-semibold"><?php echo e($p->price); ?></span></ins>
                                <?php endif; ?>
                            </span>

                            </p>

                            <br/>


                            <div class="quantity quantity-lg">
                                <input type="button" class="minus" value="-">
                                <input type="text" class="input-text qty text" title="Qty" value="1" name="quantity"
                                       min="1" step="1">
                                <input type="button" class="plus" value="+">
                                <input value="<?php echo e($p->id); ?>" hidden name="prod_id">
                            </div>
                            <input name="addCard" type="submit" value="Add to cart"
                                   class="btn btn-primary btn-modern"
                                   data-loading-text="Loading...">


                            <div class="product-meta">
                            <span class="posted-in">Categories:
                                <a rel="tag"
                                   href="<?php echo e(url('categoryes_products/'.$p->category_id)); ?>"><?php echo e(\App\Categoryes::find($p->category_id)->name); ?></a>,
                                </span>
                                <span class="posted-in">Brands:
                                <a rel="tag"
                                   href="<?php echo e(url('brands_products/'.$p->brand_id)); ?>"><?php echo e(\App\Brands::find($p->brand_id)->name); ?></a>,
                                </span>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="tabs tabs-product mb-2">
                            <ul class="nav nav-tabs">
                                <li class="nav-item active">
                                    <a class="nav-link py-3 px-4" href="#productDescription"
                                       data-toggle="tab">Description</a>
                                </li>
                                <li class="nav-item"><a class="nav-link py-3 px-4" href="#productInfo"
                                                        data-toggle="tab">Rating</a>
                                </li>
                                <li class="nav-item"><a class="nav-link py-3 px-4" href="#productReviews"
                                                        data-toggle="tab">Comments
                                        (<?php echo e(count($comment)); ?>)</a>
                                </li>
                            </ul>
                            <div class="tab-content p-0">
                                <div class="tab-pane p-4 active" id="productDescription">
                                    <p><?php echo e($p->description); ?></p>
                                </div>
                                <div class="tab-pane p-4" id="productInfo">
                                    <ul class="list meta-rate">
                                        <li>
                                            <ul class="list star-list">
                                                <?php $say = 0; ?>
                                                <?php for($i=1; $i<=$p->raitng; $i++): ?>
                                                    <span class="fa fa-star checked"></span>
                                                    <?php $say++ ?>
                                                <?php endfor; ?>
                                                <?php if($p->raitng>$say): ?>
                                                    <span class="fa fa-star-half checked"></span>
                                                <?php endif; ?>

                                            </ul>
                                        </li>
                                    </ul>
                                </div>


                                <div class="tab-pane p-4" id="productReviews">
                                    <ul class="comments">
                                        <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <?php ($user=$c->myUsersForComment); ?>
                                                <?php if($c->parent_id==0): ?>
                                                    <div class="comment">
                                                        <div class="img-thumbnail border-0 p-0 d-none d-md-block">
                                                            <img style="width: 80px;height: 80px" alt=""
                                                                 class="img-fluid"
                                                                 src="<?php if($c->user_id!=0): ?>
                                                                     data:image/jpeg;base64,<?php echo e(base64_encode($c->myUsersForComment->image)); ?>

                                                                 <?php else: ?>
                                                                 <?php echo e(asset('uploads/img/user.png')); ?>

                                                                 <?php endif; ?>"/>
                                                        </div>
                                                        <div class="comment-block">
                                                            <div class="comment-arrow"></div>
                                                            <span class="comment-by">
															<strong>
                                                                <?php if($c->user_id==0): ?>
                                                                    <?php echo e($c->full_name); ?>

                                                                <?php else: ?>
                                                                    <?php echo e($user->name); ?> <?php echo e($user->surname); ?>

                                                                <?php endif; ?>
                                                            </strong>
														</span>
                                                            <p><?php echo e($c->texts); ?></p>
                                                            <?php ($vaxt=$c->created_at); ?>
                                                            <?php ($vaxt->setLocale('az')); ?>
                                                            <span
                                                                class="date float-right"><?php echo e($vaxt->diffForHumans()); ?>

                                                            </span>
                                                            <div class="review-num">
                                                                <a onclick="parentComment('<?php echo e($c->id); ?>')"><i
                                                                        style="color: #0aa1e8" class="fas fa-reply"></i>
                                                                    Reply</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php $__currentLoopData = $c->myParentComment->where('status',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php ($user=$cc->myUsersForComment); ?>
                                                    <ul class="comments reply">
                                                        <li>
                                                            <div class="comment">
                                                                <div
                                                                    class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                                    <img style="width: 80px;height: 80px" alt=""
                                                                         class="img-fluid"
                                                                         src="<?php if($cc->user_id!=0): ?>
                                                                             data:image/jpeg;base64,<?php echo e(base64_encode($user->image)); ?>

                                                                         <?php else: ?>
                                                                         <?php echo e(asset('uploads/img/user.png')); ?>

                                                                         <?php endif; ?>"/>
                                                                </div>
                                                                <div class="comment-block">
                                                                    <div class="comment-arrow"></div>
                                                                    <span class="comment-by">
																		<strong><?php echo e($cc->full_name); ?></strong>
																	</span>
                                                                    <p><?php echo e($cc->texts); ?></p>
                                                                    <span
                                                                        <?php ($vaxt=$cc->created_at); ?>
                                                                        <?php ($vaxt->setLocale('az')); ?>
                                                                        class="date float-right"><?php echo e($vaxt->diffForHumans()); ?></span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <hr id="writeComment" class="solid my-5">
                                    <h4>Add comment</h4>
                                    <div id="forParentComment"></div>
                                    <div class="row">
                                        <div class="col">
                                            <?php if(!Auth::check()): ?>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-6">

                                                        <label class="required font-weight-bold text-dark">Name</label>
                                                        <input type="text" value="" maxlength="100"
                                                               class="form-control" name="name" id="name" required>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label class="required font-weight-bold text-dark">Email
                                                            Address</label>
                                                        <input type="email" value="" maxlength="100"
                                                               class="form-control" name="email" id="email"
                                                               required>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="required font-weight-bold text-dark">Comment</label>
                                                    <textarea maxlength="5000"
                                                              rows="8"
                                                              class="form-control " name="comment" id="comment"
                                                              required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col mb-0">
                                                    <input name="submitComments" type="submit" value="Post Comment"
                                                           class="btn btn-primary btn-modern"
                                                           data-loading-text="Loading...">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <hr class="solid my-5">

                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('jsValidate/jquery.form.js')); ?>"></script>
    <script src="<?php echo e(asset('jsValidate/jquery.validate.js')); ?>"></script>
    <script src="<?php echo e(asset('jsValidate/messages_az.js')); ?>"></script>
    <script src="<?php echo e(asset('jsValidate/sweetalert2.js')); ?>"></script>


    <script src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(asset('js/ckeditor/config.js')); ?>"></script>

    <script>
        function parentComment(id) {
            var parent_id = '<input type="hidden" value="' + id + '" name="parent_id" id="parent_id"  />';
            document.getElementById("forParentComment").innerHTML = parent_id;
            $('html, body').animate({
                scrollTop: $("#writeComment").offset().top
            }, 2000);
        }
    </script>


    <script>
        $(document).ready(function () {
            $('#submitComments').validate();
            $('#submitComments').ajaxForm({
                beforeSubmit: function () {
                    Swal.fire({
                        title: '<i class="fa fa-spinner fa-plus fa-3x fa-fw "></i><span class="sr-only">Gozleyin...</span>',
                        text: 'Yuklenme gedir...',
                        showConfirmButton: false
                    })


                },

                beforeSeriaLize: function () {
                    for (var instance in CKEDITOR.instances) CKEDITOR.instances[instance].updateElement();

                },
                success: function (response) {
                    Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.status,
                            allowOutsideClick: false
                        }
                    )
                    if (response.status == 'success') {
                        window.location.href = '/product/<?php echo e($p->id); ?>';
                    }
                    if (response.status_login == 'error') {
                        window.location.href = '/sign_in';
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineShoppingUgur\resources\views/frontend/single_product.blade.php ENDPATH**/ ?>