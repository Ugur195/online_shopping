@extends('frontend.app')

@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection


@section('content')
    <div role="main" class="main">
        <form id="submitBlogsComments" method="post">
            {{csrf_field()}}

            <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 align-self-center p-static order-2 text-center">
                            <h1 class="text-dark font-weight-bold text-8">Single Blog</h1>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container py-4">

                <div class="row">
                    <div class="col">
                        <div class="blog-posts single-post">
                            <article class="post post-large blog-single-post border-0 m-0 p-0">
                                <div
                                    class="owl-carousel owl-theme show-nav-hover dots-inside nav-inside nav-style-1 nav-light"
                                    data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': true}">
                                    @foreach(explode('(xx)',$blogs->images) as $bimg)
                                        @if($bimg !="")
                                            <div>
                                                <img
                                                    class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0"
                                                    src="data:image/jpeg;base64,{{base64_encode($bimg)}}"
                                                    alt="">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="post-date ml-0">
                                    <span class="day">10</span>
                                    <span class="month">Jan</span>
                                </div>

                                <div class="post-content ml-0">

                                    <h2 class="font-weight-bold"><a href="blog-post.html">{{$blogs->header}}</a></h2>

                                    <div class="post-meta">
                                        @php($user=\App\User::find($blogs->author))
                                        <span><i class="far fa-user"></i> By <a
                                                href="{{url('/blogs_user/'.$user->id)}}">{{$user->name.' '.$user->surname}}</a> </span>
                                        @php($blogcat=\App\BlogCategory::find($blogs->category_id))
                                        <span><i class="far fa-folder"></i> <a
                                                href="{{url('/blogs_categoryes/'.$blogcat->id)}}">{{$blogcat->name}}</a></span>
                                    </div>

                                    <p>{{$blogs->description}}</p>

                                </div>

                                <div id="comments" class="post-block mt-5 post-comments">
                                    <h4 class="mb-3">Comments ({{count($blogs_comments)}})</h4>
                                    <ul class="comments">
                                        @foreach($blogs_comments as $bc)
                                            <li>
                                                @php($user=$bc->myUsersForBlogsComments)
                                                @if($bc->parent_id==0)
                                                    <div class="comment">
                                                        <div
                                                            class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                            <img style="width: 80px;height: 80px" alt=""
                                                                 class="img-fluid"
                                                                 src="@if($bc->user_id!=0)
                                                                     data:image/jpeg;base64,{{base64_encode($bc->myUsersForBlogsComments->image)}}
                                                                 @else
                                                                 {{asset('uploads/img/user.png')}}
                                                                 @endif"/>
                                                        </div>
                                                        <div class="comment-block">
                                                            <div class="comment-arrow"></div>
                                                            <span class="comment-by">
																<strong>
                                                                      @if($bc->user_id==0)
                                                                        {{$bc->full_name}}
                                                                    @else
                                                                        {{$user->name}} {{$user->surname}}
                                                                    @endif
                                                                </strong>
															</span>
                                                            <p>{{$bc->texts}}</p>
                                                            @php($vaxt=$bc->created_at)
                                                            @php($vaxt->setLocale('az'))
                                                            <span
                                                                class="date float-right">{{$vaxt->diffForHumans()}}
                                                            </span>

                                                            <div class="review-num">
                                                                <a onclick="parentBlogsComments('{{$bc->id}}')"><i
                                                                        style="color: #0aa1e8" class="fas fa-reply">
                                                                        Reply</i></a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endif
                                                @foreach($bc->myParentBlogsComments->where('status',1) as $bb)
                                                    @php($user=$bb->myUsersForBlogsComments)
                                                    <ul class="comments reply">
                                                        <li>
                                                            <div class="comment">
                                                                <div
                                                                    class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">
                                                                    <img style="width: 80px;height: 80px" alt=""
                                                                         class="img-fluid"
                                                                         src="@if($bb->user_id!=0)
                                                                             data:image/jpeg;base64,{{base64_encode($user->image)}}
                                                                         @else
                                                                         {{asset('uploads/img/user.png')}}
                                                                         @endif"/>
                                                                </div>
                                                                <div class="comment-block">
                                                                    <div class="comment-arrow"></div>
                                                                    <span class="comment-by">
																		<strong>{{$bb->full_name}}</strong>
																	</span>
                                                                    <p>{{$bb->texts}}</p>
                                                                    <span
                                                                        @php($vaxt=$bb->created_at)
                                                                        @php($vaxt->setLocale('az'))
                                                                        class="date float-right">{{$vaxt->diffForHumans()}}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="post-block mt-5 post-leave-comment">
                                    <hr id="writeBlogsComments" class="solid my-5">
                                    <h4 class="mb-3">Leave a comment</h4>
                                    <div id="forParentBlogsComments"></div>
                                    <div class="p-2">
                                        @if(!Auth::check())
                                            <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                    <label class="required font-weight-bold text-dark">Full
                                                        Name</label>
                                                    <input type="text" value=""
                                                           data-msg-required="Please enter your name."
                                                           maxlength="100"
                                                           class="form-control" name="name" id="name" required>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="required font-weight-bold text-dark">Email
                                                        Address</label>
                                                    <input type="email" value=""
                                                           data-msg-required="Please enter your email address."
                                                           data-msg-email="Please enter a valid email address."
                                                           maxlength="100" class="form-control" name="email"
                                                           id="email"
                                                           required>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label class="required font-weight-bold text-dark">Comment</label>
                                                <textarea maxlength="5000"
                                                          data-msg-required="Please enter your message." rows="8"
                                                          class="form-control" name="comment" id="comment"
                                                          required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col mb-0">
                                                <input name="submitBlogsComments" type="submit" value="Post Comment"
                                                       class="btn btn-primary btn-modern"
                                                       data-loading-text="Loading...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
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
        function parentBlogsComments(id) {
            var parent_id = '<input type="hidden" value="' + id + '" name="parent_id" id="parent_id"  />';
            document.getElementById("forParentBlogsComments").innerHTML = parent_id;
            $('html, body').animate({
                scrollTop: $("#writeBlogsComments").offset().top
            }, 2000);
        }
    </script>

    <script>
        $(document).ready(function () {
            $('#submitBlogsComments').validate();
            $('#submitBlogsComments').ajaxForm({
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
                    if(response.status=='success'){
                        window.location.href='/single_blog/{{$blogs->id}}';
                    }
                }
            });
        });
    </script>


@endsection



