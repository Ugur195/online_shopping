@extends('frontend.app')

@section('css')

@endsection

@section('content')

    <div class="container">
        <div class="row">

            <div class="featured-box featured-box-primary text-left mt-5">
                <div class="box-content">
                    <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">REGISTER</h4>
                    <form method="POST" action="{{ route('register') }}"
                        class="needs-validation">
                        {{csrf_field()}}


                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">Name</label>
                                <input name="name" type="text" value="{{ old('name') }}"
                                       class="form-control form-control-lg"
                                       required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">Surname</label>
                                <input name="surname" type="text" value="{{ old('surname') }}"
                                       class="form-control form-control-lg"
                                       required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">Father Name</label>
                                <input name="father_name" type="text" value="{{ old('father_name') }}"
                                       class="form-control form-control-lg"
                                       required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">Mobile</label>
                                <input name="mobile" type="text" value="{{ old('mobile') }}"
                                       class="form-control form-control-lg"
                                       required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">Facebook</label>
                                <input name="fb_profile" type="text" value="{{ old('fb_profile') }}"
                                       class="form-control form-control-lg"
                                       required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">Instagram</label>
                                <input name="inst_profile" type="text" value="{{ old('inst_profile') }}"
                                       class="form-control form-control-lg"
                                       required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">Whatsapp</label>
                                <input name="wp_profile" type="text" value="{{ old('wp_profile') }}"
                                       class="form-control form-control-lg"
                                       required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">Date of Birth</label>
                                <input name="date_of_birth" type="date" value="{{ old('date_of_birth') }}"
                                       class="form-control form-control-lg"
                                       required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">Gender</label>
                                <select name="gender" id="gender" class="form-control form-control-lg" size="0">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">Address</label>
                                <input name="address" type="text" value="{{ old('address') }}"
                                       class="form-control form-control-lg"
                                       required>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">E-mail</label>
                                <input name="email" type="text" value="{{ old('email') }}"
                                       class="form-control form-control-lg"
                                       required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label class="font-weight-bold text-dark text-2">Password</label>
                                <input name="password" type="password" value="" class="form-control form-control-lg"
                                       required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label class="font-weight-bold text-dark text-2">Re-enter
                                    Password</label>
                                <input name="password_confirmation" type="password" value=""
                                       class="form-control form-control-lg"
                                       required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-lg-9">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="terms">
                                    <label class="custom-control-label text-2" for="terms">I have
                                        read and agree to the <a href="#">terms of
                                            service</a></label>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-modern float-right">
                                        {{ __('Register') }}
                                    </button>
                                </div>
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
