@extends('admin.app')

@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection

@section('content')
    <!-- start: page -->
    <section role="main" class="content-body card-margin">
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title">Edit User</h2>
                    </header>
                    <div class="card-body">
                        <form class="form-horizontal form-bordered" method="post" action="{{url('/admin/user_edit/'. $users->id)}}">
                            {{csrf_field()}}
                            <input type="text" name="id" hidden class="form-control" placeholder="id"
                                   value="{{$users->id}}"/>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Our Image</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input hidden type="text" name="last_image" class="form-control"
                                               value="{{base64_encode($users->image)}}"/>
                                        <img style='display:block;width:120px;height:80px;'
                                             src="data:image/jpeg;base64,{{base64_encode($users->image)}}"/>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Image</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        	<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-image"></i>
															</span>
														</span>
                                        <input type="file" name="image" class="form-control" placeholder="Image"
                                               value=""/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Name</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-user"></i>
															</span>
														</span>
                                        <input type="text" name="name" class="form-control" placeholder="Name"
                                               value="{{$users->name}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Surname</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-user"></i>
															</span>
														</span>
                                        <input  type="text" name="surname" class="form-control" placeholder="Surname"
                                               value="{{$users->surname}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Father Name</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-user"></i>
															</span>
														</span>
                                        <input  type="text" name="father_name" class="form-control" placeholder="Father Name"
                                               value="{{$users->father_name}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Mobile</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fa fa-mobile"></i>
															</span>
														</span>
                                        <input type="text" name="mobile" class="form-control" placeholder="Mobile"
                                               value="{{$users->mobile}}"/>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Date of Birthday</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fa fa-birthday-cake"></i>
															</span>
														</span>
                                        <input type="date" name="date_of_birth" class="form-control" placeholder="Date of Birthday"
                                               value="{{$users->date_of_birth}}" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Facebook</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fab fa-facebook-f"></i>
															</span>
														</span>
                                        <input type="text" name="fb_profile" class="form-control" placeholder="Facebook"
                                               value="{{$users->fb_profile}}" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Instagram</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fab fa-instagram"></i>
															</span>
														</span>
                                        <input type="text" name="inst_profile" class="form-control"
                                               placeholder="Instagram"
                                               value="{{$users->inst_profile}}" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Whatsapp</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fab fa-whatsapp"></i>
															</span>
														</span>
                                        <input type="text" name="wp_profile" class="form-control" placeholder="Whatsapp"
                                               value="{{$users->wp_profile}}" required/>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Roles</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-user"></i>
															</span>
														</span>
                                        <select name="role_id" id="role_id" data-plugin-selectTwo
                                                class="form-control populate">
                                            @foreach($roles as $r)
                                                <option value="{{$r->id}}"
                                                        @if($users->role_id==$r->id) selected @endif >{{$r->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Address</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-map-marker"></i>
															</span>
														</span>
                                        <input type="text" name="address" class="form-control" placeholder="Address"
                                               value="{{$users->address}}" required/>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Gender</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        	<span class="input-group-prepend">
															<span class="input-group-text">
																 @if(Auth::user()->gender=='Male')
                                                                    <i class="fas fa-male"></i>
                                                                @else
                                                                    <i class="fas fa-female"></i>
                                                                @endif
															</span>
														</span>
                                        <select name="gender" id="gender" data-plugin-selectTwo
                                                class="form-control populate">
                                            <option value="Female" @if($users->gender=='Female') selected @endif >Female</option>
                                            <option value="Male" @if($users->gender=='Male') selected @endif >Male</option>
                                        </select>
                                    </div>
                                </div>
                            </div>




                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Status</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                    	<span class="input-group-prepend">
															<span class="input-group-text">
                                                                @if($users->status==1)
                                                                    <i class="fas fa-eye"></i>
                                                                @else
                                                                    <i class="	fas fa-eye-slash"></i>
                                                                @endif

															</span>
														</span>
                                        <select name="status" data-plugin-selectTwo class="form-control populate">
                                            <option value="1" @if($users->status==1) selected @endif>Aktiv</option>
                                            <option value="0" @if($users->status==0) selected @endif>Deaktiv</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="compose pt-3">
                                <div id="compose-field" class="compose">
                                </div>
                                <div class="text-right mt-3">
                                    <a href="{{url('admin/users')}}" class="btn btn-info">
                                        <i class="fas fa-arrow-left"></i>
                                        Back
                                    </a>
                                    <button href="#" class="btn btn-success">
                                        <i class="fa fa-undo" aria-hidden="true"></i>
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!-- end: page -->
    </section>

@endsection


@section('js')
    <script src="{{asset('jsValidate/jquery.form.js')}}"></script>
    <script src="{{asset('jsValidate/jquery.validate.js')}}"></script>
    <script src="{{asset('jsValidate/messages_az.js')}}"></script>
    <script src="{{asset('jsValidate/sweetalert2.js')}}"></script>


    <script>
        $(document).ready(function () {
            $('form').validate();
            $('form').ajaxForm({
                beforeSubmit: function () {


                },

                success: function (response) {
                    Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.status,
                            allowOutsideClick: false,
                        }
                    )
                    if (response.status == 'success') {
                        window.location.href = '/admin/users';
                    }
                }
            });
        });
    </script>
@endsection

