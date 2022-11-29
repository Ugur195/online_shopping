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
                        <h2 class="card-title">Setting</h2>
                    </header>

                    <div class="card-body">
                        <form id="myForm" class="form-horizontal form-bordered" method="post">
                            {{csrf_field()}}
                            <input type="text" name="id" hidden class="form-control" placeholder="id"
                                   value="{{$setting->id}}"/>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Our Logo</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input hidden type="text" name="last_loqo" class="form-control"
                                               value="{{base64_encode($setting->logo)}}"/>
                                        <img style='display:block;width:80px;height:60px;'
                                             src="data:image/jpeg;base64,{{base64_encode($setting->logo)}}"/>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Logo</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-image"></i>
															</span>
														</span>
                                        <input type="file" name="logo" class="form-control" placeholder="Logo"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Email</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-envelope"></i>
															</span>
														</span>
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                               value="{{$setting->email}}" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Mobile</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-phone"></i>
															</span>
														</span>
                                        <input type="text" name="mobile" class="form-control" placeholder="Mobile"
                                               value="{{$setting->mobile}}" required/>
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
                                               value="{{$setting->address}}" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Blog Video</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <textarea class="form-control " rows="3" id="textareaAutosize"
                                                  name="blog_video"
                                                  data-plugin-textarea-autosize
                                                  placeholder="Blog Video">{{$setting->blog_video}}</textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="compose pt-3">
                                <div id="compose-field" class="compose">
                                </div>
                                <div class="text-right mt-3">
                                    <a href="{{url('admin/index')}}" class="btn btn-info">
                                        <i class="fas fa-arrow-left"></i>
                                        Back
                                    </a>
                                    <button class="btn btn-success">
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
            $('#myForm').validate();
            $('#myForm').ajaxForm({
                beforeSubmit: function () {


                },
                success: function (response) {
                    Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.status,
                            allowOutsideClick: false
                        }
                    )
                }
            });
        });
    </script>
@endsection


