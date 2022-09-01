@extends('frontend.app')

@section('css')

@endsection

@section('content')

    <div class="container">
        <div class="row">


            <div class="featured-box featured-box-primary text-left mt-5">
                <div class="box-content">
                    <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">{{trans('giris_ucun.title')}}</h4>
                    <form action="{{ route('login') }}" method="post"
                          class="needs-validation">
                        {{csrf_field()}}

                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">{{trans('giris_ucun.email')}}</label>
                                <input id="email" type="email"
                                       class="form-control form-control-lg @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">{{trans('giris_ucun.password')}}</label>
                                <input id="password" type="password"
                                       class="form-control form-control-lg  @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="current-password"/>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <div class="custom-control custom-checkbox">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{trans('giris_ucun.remember')}}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <button type="submit" class="btn btn-primary btn-modern float-right">
                                    {{trans('giris_ucun.login')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
    <script src="{{asset('jsValidate/jquery.form.js')}}"></script>
    <script src="{{asset('jsValidate/jquery.validate.js')}}"></script>
    <script src="{{asset('jsValidate/messages_az.js')}}"></script>
@endsection
