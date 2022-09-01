@extends('frontend.app')

@section('css')
@endsection
@section('content')
    <div role="main" class="main">

        <section class="page-header page-header-modern page-header-background page-header-background-pattern page-header-background-sm overlay overlay-color-dark overlay-show overlay-op-5" style="background-image: url(img/patterns/wild_oliva.png);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 align-self-center p-static order-2 text-center">
                        <h1><strong>Category's products</strong></h1>
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
                            @foreach($products as $p)
                                <div class="col-12 col-sm-6 col-lg-3 product">
                                    <a href="shop-product-sidebar-left.html">
                                        <span class="onsale">{{$p->real_count}}</span>
                                    </a>
                                    <span class="product-thumb-info border-0">
									<a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
										<span class="text-uppercase text-1">Add to Cart</span>
									</a>
										<span class="product-thumb-info-image">
											<img alt="" class="img-fluid"
                                                 src="data:image/jpeg;base64,{{base64_encode($p->images)}}">
										</span>
									<span
                                        class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
										<a href="{{url('product/'.$p->id)}}">
											<h4 class="text-4 text-primary">{{$p->name}}</h4>
											<span class="price">
												@if($p->discount_price!=0)
                                                    <del><span class="amount">{{$p->price}}</span></del>
                                                    <ins><span
                                                            class="amount text-dark font-weight-semibold">{{$p->discount_price}}</span></ins>
                                                @else
                                                    <ins><span
                                                            class="amount text-dark font-weight-semibold">{{$p->price}}</span></ins>
                                                @endif
											</span>
										</a>
									</span>
								</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>






@endsection
@section('js')
@endsection

