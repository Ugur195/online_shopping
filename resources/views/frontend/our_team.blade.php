@extends('frontend.app')

@section('css')

@endsection

@section('content')
    <div role="main" class="main">
        <section
            class="page-header page-header-modern page-header-background page-header-background-pattern page-header-background-sm overlay overlay-color-dark overlay-show overlay-op-5"
            style="background-image: url(frontendCss/img/patterns/wild_oliva.png);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 align-self-center p-static order-2 text-center">
                        <h1>Meet the <strong>Team</strong></h1>
                    </div>

                </div>
            </div>
        </section>

        <div class="container py-4">

            <ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="team"
                data-option-key="filter">
                <li class="nav-item active" data-option-value="*"><a class="nav-link text-1 text-uppercase active"
                                                                     href="">Show All</a></li>
                @foreach($our_team_roles as $otr)
                    <li class="nav-item" data-option-value=".{{$otr->name}}"><a class="nav-link text-1 text-uppercase"
                                                                                href="#">{{$otr->name}}</a>
                    </li>
                @endforeach

            </ul>


            <div class="sort-destination-loader sort-destination-loader-showing mt-4 pt-2">
                <div class="row team-list sort-destination" data-sort-id="team">
                    @foreach($our_team as $ot)
                        @php($user=\App\User::find($ot->user_id))
                        @php($our_team_role=\App\OurTeamRoles::find($ot->our_team_role_id))
                        <div class="col-12 col-sm-6 col-lg-3 isotope-item {{$our_team_role->name}} ">
                            <span class="thumb-info thumb-info-hide-wrapper-bg mb-4">
									<span class="thumb-info-wrapper">
										<a href="about-me.html">
											<img
                                                src="data:image/jpeg;base64,{{base64_encode(\App\User::find($ot->user_id)->image)}}"
                                                class="img-fluid" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">{{$user->name}} {{$user->surname}}</span>
												<span class="thumb-info-type">{{$our_team_role->name}}</span>
											</span>
										</a>
									</span>
									<span class="thumb-info-caption">
										<span class="thumb-info-caption-text">{{$ot->description}}</span>
										<span class="thumb-info-social-icons mb-4">
											<a target="_blank" href="{{\App\User::find($ot->user_id)->fb_profile}}"><i
                                                    class="fab fa-facebook-f"></i><span>Facebook</span></a>
                                            <a target="_blank" href="{{\App\User::find($ot->user_id)->inst_profile}}"><i
                                                    class="fab fa-instagram"></i><span>Instagram</span></a>
											<a target="_blank" href="https://wa.me/"{{\App\User::find($ot->user_id)->wp_profile}}"><i
                                                class="fab fa-whatsapp"></i><span>Whatsapp</span></a>
										</span>
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

