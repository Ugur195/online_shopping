@extends('frontend.app')

@section('css')

@endsection


@section('content')
    <div role="main" class="main">

        <div class="slider-container rev_slider_wrapper" style="height: 600px;">
            <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider
                 data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 600, 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,500], 'parallax': { 'type': 'scroll', 'origo': 'enterpoint', 'speed': 1000, 'levels': [2,3,4,5,6,7,8,9,12,50], 'disable_onmobile': 'on' }, 'navigation' : {'arrows': { 'enable': false }, 'bullets': {'enable': true, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 70, 'h_offset': 0}}}">
                <ul>
                    @foreach($slide as $s)
                        <li class="slide-overlay slide-overlay-primary" data-transition="fade">
                            <img src="data:image/jpeg;base64,{{base64_encode($s->image)}}"
                                 alt=""
                                 data-bgposition="center center"
                                 data-bgfit="cover"
                                 data-bgrepeat="no-repeat"
                                 class="rev-slidebg">

                            <div class="tp-caption"
                                 data-x="center" data-hoffset="['-150','-150','-150','-240']"
                                 data-y="center" data-voffset="['-50','-50','-50','-75']"
                                 data-start="1000"
                                 data-transform_in="x:[-300%];opacity:0;s:500;"
                                 data-transform_idle="opacity:0.2;s:500;">
                                <img src="{{asset('frontendCss/img/slides/slide-title-border.png')}}"
                                     alt=""></div>

                            <div class="tp-caption d-none d-md-block"
                                 data-frames='[{"delay":2200,"speed":500,"frame":"0","from":"opacity:0;x:10%;","to":"opacity:1;x:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                 data-x="center" data-hoffset="['80','80','80','135']"
                                 data-y="center" data-voffset="['-33','-33','-33','-55']">
                                <img src="{{asset('frontendCss/img/slides/slide-white-line.png')}}" alt=""></div>

                            <div class="tp-caption"
                                 data-x="center" data-hoffset="['150','150','150','240']"
                                 data-y="center" data-voffset="['-50','-50','-50','-75']"
                                 data-start="1000"
                                 data-transform_in="x:[300%];opacity:0;s:500;"
                                 data-transform_idle="opacity:0.2;s:500;"><img
                                    src="{{asset('frontendCss/img/slides/slide-title-border.png')}}"
                                    alt=""></div>

                            <h1 class="tp-caption font-weight-extra-bold text-color-light negative-ls-2"
                                data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                data-x="center"
                                data-y="center"
                                data-fontsize="['50','50','50','90']"
                                data-lineheight="['55','55','55','95']">{{$s->title}}</h1>

                            <div class="tp-caption text-light font-weight-light"
                                 data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                 data-x="center"
                                 data-y="center" data-voffset="['40','40','40','80']"
                                 data-fontsize="['18','18','18','50']"
                                 data-lineheight="['20','20','20','55']">
                                {{$s->description}}
                            </div>
                            <div class="tp-caption text-light font-weight-light"
                                 data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                 data-x="center"
                                 data-y="center" data-voffset="['80','40','40','80']"
                                 data-fontsize="['18','18','18','50']"
                                 data-lineheight="['20','20','20','55']">
                                <a type="button" class="btn btn-dark btn-with-arrow mb-2"
                                   href="{{$s->url}}">Etrafli<span>
                                        <i class="fas fa-chevron-right"></i></span></a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

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
									<a href="product/{{$p->id}}" class="add-to-cart-product bg-color-primary">
										<span class="text-uppercase text-1">Add to Cart</span>
									</a>
										<span class="product-thumb-info-image">
											<img alt="" class="img-fluid"
                                                 src="data:image/jpeg;base64,{{base64_encode($p->images)}}">
										</span>
									<span
                                        class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
										<a href="product/{{$p->id}}">
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


        <section class="section section-primary border-top-0 mb-0">
            <div class="container">
                <div class="row counters counters-sm counters-text-light">
                    <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="counter">
                            <strong data-to="30000" data-append="+">0</strong>
                            <label class="opacity-5 text-4 mt-1">Happy Clients</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
                        <div class="counter">
                            <strong data-to="3500" data-append="+">0</strong>
                            <label class="opacity-5 text-4 mt-1">Answered Tickets</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-5 mb-sm-0">
                        <div class="counter">
                            <strong data-to="16">0</strong>
                            <label class="opacity-5 text-4 mt-1">Pre-made Demos</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="counter">
                            <strong data-to="3000" data-append="+">0</strong>
                            <label class="opacity-5 text-4 mt-1">Development Hours</label>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section
            class="video section section-height-3 section-text-light section-video section-center overlay overlay-show overlay-op-7 mt-0"
            data-video-path="video/dark" data-plugin-video-background
            data-plugin-options="{'posterType': 'jpg', 'position': '50% 50%', 'overlay': true}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div
                            class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-remove-right-quote mb-0">
                            <div class="testimonial-author">
                                <img src="img/clients/client-1.jpg" class="img-fluid rounded-circle" alt="">
                            </div>
                            <blockquote>
                                <p class="mb-0">Your time is limited, so don’t waste it living someone else’s life.
                                    Don’t be trapped by dogma - which is living with the results of other people’s
                                    thinking. </p>
                            </blockquote>
                            <div class="testimonial-author">
                                <p class="text-2"><strong class="text-color-light opacity-10">John Doe</strong>Okler</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container pt-2">
            <div class="row my-5 pb-5">
                <div class="col-lg-6 pr-5">
                    <h2 class="font-weight-normal text-6 mb-2 pb-1"><strong class="font-weight-extra-bold">Who</strong>
                        We Are</h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa
                        enikklam id valorem ipsum dolor sit amet, consectetur adipiscing. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit.</p>
                    <p>Phasellus blandit massa enim. Nullam id varius elit. blandit massa enim d varius blandit massa
                        enimariusi d varius elit.</p>
                    <a href="#" class="font-weight-semibold text-decoration-none learn-more text-2">VIEW MORE <i
                            class="fas fa-chevron-right ml-2"></i></a>
                </div>
                <div class="col-lg-6">
                    <div class="progress-bars mt-5">
                        <div class="progress-label">
                            <span>HTML/CSS</span>
                        </div>
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-primary" data-appear-progress-animation="100%">
                                <span class="progress-bar-tooltip">100%</span>
                            </div>
                        </div>
                        <div class="progress-label">
                            <span>Design</span>
                        </div>
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-primary" data-appear-progress-animation="85%"
                                 data-appear-animation-delay="300">
                                <span class="progress-bar-tooltip">85%</span>
                            </div>
                        </div>
                        <div class="progress-label">
                            <span>WordPress</span>
                        </div>
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-primary" data-appear-progress-animation="75%"
                                 data-appear-animation-delay="600">
                                <span class="progress-bar-tooltip">75%</span>
                            </div>
                        </div>
                        <div class="progress-label">
                            <span>Photoshop</span>
                        </div>
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-primary" data-appear-progress-animation="85%"
                                 data-appear-animation-delay="900">
                                <span class="progress-bar-tooltip">85%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
							<span class="thumb-info thumb-info-hide-wrapper-bg">
								<span class="thumb-info-wrapper">
									<a href="about-me.html">
										<img src="img/team/team-1.jpg" class="img-fluid" alt="">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">John Doe</span>
											<span class="thumb-info-type">CEO</span>
										</span>
									</a>
								</span>
								<span class="thumb-info-caption">
									<span class="thumb-info-caption-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula mi, non suscipitaccumsan</span>
									<span class="thumb-info-social-icons">
										<a target="_blank" href="http://www.facebook.com/"><i class="fab fa-facebook-f"></i><span>Facebook</span></a>
										<a href="http://www.twitter.com/"><i class="fab fa-twitter"></i><span>Twitter</span></a>
										<a href="http://www.linkedin.com/"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a>
									</span>
								</span>
							</span>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter"
                     data-appear-animation-delay="200">
							<span class="thumb-info thumb-info-hide-wrapper-bg">
								<span class="thumb-info-wrapper">
									<a href="about-me.html">
										<img src="img/team/team-2.jpg" class="img-fluid" alt="">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">Jessica Doe</span>
											<span class="thumb-info-type">Marketing</span>
										</span>
									</a>
								</span>
								<span class="thumb-info-caption">
									<span class="thumb-info-caption-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula mi, non suscipitaccumsan</span>
									<span class="thumb-info-social-icons">
										<a target="_blank" href="http://www.facebook.com/"><i
                                                class="fab fa-facebook-f"></i><span>Facebook</span></a>
										<a href="http://www.twitter.com/"><i
                                                class="fab fa-twitter"></i><span>Twitter</span></a>
										<a href="http://www.linkedin.com/"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a>
									</span>
								</span>
							</span>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4 mb-sm-0 appear-animation" data-appear-animation="fadeInRightShorter"
                     data-appear-animation-delay="400">
							<span class="thumb-info thumb-info-hide-wrapper-bg">
								<span class="thumb-info-wrapper">
									<a href="about-me.html">
										<img src="img/team/team-3.jpg" class="img-fluid" alt="">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">Rick Edward Doe</span>
											<span class="thumb-info-type">Developer</span>
										</span>
									</a>
								</span>
								<span class="thumb-info-caption">
									<span class="thumb-info-caption-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula mi, non suscipitaccumsan</span>
									<span class="thumb-info-social-icons">
										<a target="_blank" href="http://www.facebook.com/"><i
                                                class="fab fa-facebook-f"></i><span>Facebook</span></a>
										<a href="http://www.twitter.com/"><i
                                                class="fab fa-twitter"></i><span>Twitter</span></a>
										<a href="http://www.linkedin.com/"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a>
									</span>
								</span>
							</span>
                </div>
                <div class="col-sm-6 col-lg-3 appear-animation" data-appear-animation="fadeInRightShorter"
                     data-appear-animation-delay="600">
							<span class="thumb-info thumb-info-hide-wrapper-bg">
								<span class="thumb-info-wrapper">
									<a href="about-me.html">
										<img src="img/team/team-4.jpg" class="img-fluid" alt="">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">Melinda Wolosky</span>
											<span class="thumb-info-type">Design</span>
										</span>
									</a>
								</span>
								<span class="thumb-info-caption">
									<span class="thumb-info-caption-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula mi, non suscipitaccumsan</span>
									<span class="thumb-info-social-icons">
										<a target="_blank" href="http://www.facebook.com/"><i
                                                class="fab fa-facebook-f"></i><span>Facebook</span></a>
										<a href="http://www.twitter.com/"><i
                                                class="fab fa-twitter"></i><span>Twitter</span></a>
										<a href="http://www.linkedin.com/"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a>
									</span>
								</span>
							</span>
                </div>
            </div>
        </div>

        <section
            class="call-to-action call-to-action-default with-button-arrow content-align-center call-to-action-in-footer call-to-action-in-footer-margin-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-9">
                        <div class="call-to-action-content">
                            <h2 class="font-weight-normal text-6 mb-0">Porto is <strong class="font-weight-extra-bold">everything</strong>
                                you need to create an <strong class="font-weight-extra-bold">awesome</strong> website!
                            </h2>
                            <p class="mb-0">The <strong class="font-weight-extra-bold">Best</strong> HTML Site Template
                                on ThemeForest</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <div class="call-to-action-btn">
                            <a href="http://themeforest.net/item/porto-responsive-html5-template/4106987"
                               target="_blank" class="btn btn-dark btn-lg text-3 font-weight-semibold px-4 py-3">Get
                                Started Now</a><span class="arrow hlb d-none d-md-block"
                                                     data-appear-animation="rotateInUpLeft"
                                                     style="top: -40px; left: 70%;"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection

@section('js')
@endsection

