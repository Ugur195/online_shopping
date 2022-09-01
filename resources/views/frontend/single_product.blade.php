@extends('frontend.app')

@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection


@section('content')
    <div role="main" class="main shop py-4">
        <form id="submitComments" method="post">
            {{csrf_field()}}

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="owl-carousel owl-theme" data-plugin-options="{'items': 1}">
                            @foreach(explode('(xx)',$p->images) as $pimg)
                                @if($pimg !="")
                                    <div>
                                        <img alt="" class="img-fluid"
                                             src="data:image/jpeg;base64,{{base64_encode($pimg)}}"/>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="summary entry-summary">
                            <h1 class="mb-0 font-weight-bold text-7">{{$p->name}}</h1>
                            <input name="p_name" hidden class="mb-0 font-weight-bold text-7" value="{{$p->name}}"/>
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
                                <span class="count" itemprop="ratingCount">{{$p->reviews}}</span> reviews
                            </div>

                            <br/>


                            <p>
                            <span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
												@if($p->discount_price!=0)
                                    <del><span class="amount">{{$p->price}}</span></del>
                                    <ins><span style="font-size: 40px;"
                                               class="amount text-dark font-weight-semibold">{{$p->discount_price}}</span></ins>
                                @else
                                    <ins><span style="font-size: 40px;"
                                               class="amount text-dark font-weight-semibold">{{$p->price}}</span></ins>
                                @endif
                            </span>

                            </p>

                            <br/>


                            <div class="quantity quantity-lg">
                                <input type="button" class="minus" value="-">
                                <input type="text" class="input-text qty text" title="Qty" value="1" name="quantity"
                                       min="1" step="1">
                                <input type="button" class="plus" value="+">
                                <input value="{{$p->id}}" hidden name="prod_id">
                            </div>
                            <input name="addCard" type="submit" value="Add to cart"
                                   class="btn btn-primary btn-modern"
                                   data-loading-text="Loading...">


                            <div class="product-meta">
                            <span class="posted-in">Categories:
                                <a rel="tag"
                                   href="{{url('categoryes_products/'.$p->category_id)}}">{{\App\Categoryes::find($p->category_id)->name}}</a>,
                                </span>
                                <span class="posted-in">Brands:
                                <a rel="tag"
                                   href="{{url('brands_products/'.$p->brand_id)}}">{{\App\Brands::find($p->brand_id)->name}}</a>,
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
                                        ({{count($comment)}})</a>
                                </li>
                            </ul>
                            <div class="tab-content p-0">
                                <div class="tab-pane p-4 active" id="productDescription">
                                    <p>{{$p->description}}</p>
                                </div>
                                <div class="tab-pane p-4" id="productInfo">
                                    <ul class="list meta-rate">
                                        <li>
                                            <ul class="list star-list">
                                                <?php $say = 0; ?>
                                                @for($i=1; $i<=$p->raitng; $i++)
                                                    <span class="fa fa-star checked"></span>
                                                    <?php $say++ ?>
                                                @endfor
                                                @if($p->raitng>$say)
                                                    <span class="fa fa-star-half checked"></span>
                                                @endif

                                            </ul>
                                        </li>
                                    </ul>
                                </div>


                                <div class="tab-pane p-4" id="productReviews">
                                    <ul class="comments">
                                        @foreach($comment as $c)
                                            <li>
                                                @php($user=$c->myUsersForComment)
                                                @if($c->parent_id==0)
                                                    <div class="comment">
                                                        <div class="img-thumbnail border-0 p-0 d-none d-md-block">
                                                            <img style="width: 80px;height: 80px" alt=""
                                                                 class="img-fluid"
                                                                 src="@if($c->user_id!=0)
                                                                     data:image/jpeg;base64,{{base64_encode($c->myUsersForComment->image)}}
                                                                 @else
                                                                 {{asset('uploads/img/user.png')}}
                                                                 @endif"/>
                                                        </div>
                                                        <div class="comment-block">
                                                            <div class="comment-arrow"></div>
                                                            <span class="comment-by">
															<strong>
                                                                @if($c->user_id==0)
                                                                    {{$c->full_name}}
                                                                @else
                                                                    {{$user->name}} {{$user->surname}}
                                                                @endif
                                                            </strong>
														</span>
                                                            <p>{{$c->texts}}</p>
                                                            @php($vaxt=$c->created_at)
                                                            @php($vaxt->setLocale('az'))
                                                            <span
                                                                class="date float-right">{{$vaxt->diffForHumans()}}
                                                            </span>
                                                            <div class="review-num">
                                                                <a onclick="parentComment('{{$c->id}}')"><i
                                                                        style="color: #0aa1e8" class="fas fa-reply"></i>
                                                                    Reply</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @foreach($c->myParentComment->where('status',1) as $cc)
                                                    @php($user=$cc->myUsersForComment)
                                                    <ul class="comments reply">
                                                        <li>
                                                            <div class="comment">
                                                                <div
                                                                    class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                                    <img style="width: 80px;height: 80px" alt=""
                                                                         class="img-fluid"
                                                                         src="@if($cc->user_id!=0)
                                                                             data:image/jpeg;base64,{{base64_encode($user->image)}}
                                                                         @else
                                                                         {{asset('uploads/img/user.png')}}
                                                                         @endif"/>
                                                                </div>
                                                                <div class="comment-block">
                                                                    <div class="comment-arrow"></div>
                                                                    <span class="comment-by">
																		<strong>{{$cc->full_name}}</strong>
																	</span>
                                                                    <p>{{$cc->texts}}</p>
                                                                    <span
                                                                        @php($vaxt=$cc->created_at)
                                                                        @php($vaxt->setLocale('az'))
                                                                        class="date float-right">{{$vaxt->diffForHumans()}}</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </li>
                                        @endforeach
                                    </ul>
                                    <hr id="writeComment" class="solid my-5">
                                    <h4>Add comment</h4>
                                    <div id="forParentComment"></div>
                                    <div class="row">
                                        <div class="col">
                                            @if(!Auth::check())
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
                                            @endif
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
@endsection


@section('js')
    <script src="{{asset('jsValidate/jquery.form.js')}}"></script>
    <script src="{{asset('jsValidate/jquery.validate.js')}}"></script>
    <script src="{{asset('jsValidate/messages_az.js')}}"></script>
    <script src="{{asset('jsValidate/sweetalert2.js')}}"></script>


    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/ckeditor/config.js')}}"></script>

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
                        window.location.href = '/product/{{$p->id}}';
                    }
                    if (response.status_login == 'error') {
                        window.location.href = '/sign_in';
                    }
                }
            });
        });
    </script>
@endsection
