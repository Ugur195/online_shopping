@extends('frontend.app')


@section('css')
@endsection


@section('content')
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
                    @foreach($blogs as $b)
                        @php($blogcat=\App\BlogCategory::find($b->category_id))
                        <div class="col-12 col-sm-6 col-lg-3 product">

                            <span class="product-thumb-info border-0">
									<a href="shop-cart.html" class="add-to-cart-product bg-color-primary"></a>

                                 <div class="post-image">
                                    <div
                                        class="owl-carousel owl-theme show-nav-hover dots-inside nav-inside nav-style-1 nav-light"
                                        data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': true}">
                                        @foreach(explode('(xx)',$b->images) as $bimg)
                                            @if($bimg !="")
                                                <div>
                                                   <img style="width: 850px; height: 250px"
                                                        class="img-fluid border-radius-0"
                                                        src="data:image/jpeg;base64,{{base64_encode($bimg)}}"
                                                        alt="">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

									<span
                                        class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
                                         <a href="{{url('categoryes_blogs/'.$blogcat->id)}}">
                                <span class="amount text-blue font-weight-semibold">{{$blogcat->name}}</span>
                            </a>
									</span>
								</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>




@endsection



@section('js')
@endsection





