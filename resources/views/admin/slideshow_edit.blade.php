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

                        <h2 class="card-title">Edit Slideshow</h2>
                    </header>
                    <div class="card-body">
                        <form class="form-horizontal form-bordered" method="post"
                              action="{{url('/admin/slideshow_edit/'. $slideshow->id)}}">
                            {{csrf_field()}}
                            <input type="text" name="id" hidden class="form-control" placeholder="email"
                                   value="{{$slideshow->id}}"/>


                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Our Image</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input hidden type="text" name="last_loqo" class="form-control"
                                               value="{{base64_encode($slideshow->image)}}"/>
                                        <img style='display:block;width:80px;height:60px;'
                                             src="data:image/jpeg;base64,{{base64_encode($slideshow->image)}}"/>
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
                                        <input type="file" name="image" class="form-control" placeholder="Logo"
                                               value=""/>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Title</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-user"></i>
															</span>
														</span>
                                        <input type="text" name="title" class="form-control" placeholder="Title"
                                               value="{{$slideshow->title}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Description</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-file-alt"></i>
															</span>
														</span>
                                        <input type="text" name="description" class="form-control"
                                               placeholder="Description"
                                               value="{{$slideshow->description}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Url</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-file-alt"></i>
															</span>
														</span>
                                        <input type="text" name="url" class="form-control" placeholder="Url"
                                               value="{{$slideshow->url}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Status</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                    	<span class="input-group-prepend">
															<span class="input-group-text">
                                                                @if($slideshow->status==1)
                                                                    <i class="fas fa-eye"></i>
                                                                @else
                                                                    <i class="	fas fa-eye-slash"></i>
                                                                @endif

															</span>
														</span>
                                        <select name="status" data-plugin-selectTwo class="form-control populate">
                                            <option value="1" @if($slideshow->status==1) selected @endif>Aktiv</option>
                                            <option value="0" @if($slideshow->status==0) selected @endif>Deaktiv
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="compose pt-3">
                                <div id="compose-field" class="compose">
                                </div>
                                <div class="text-right mt-3">
                                    <a href="{{url('admin/slideshows')}}" class="btn btn-info">
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
                        window.location.href = '/admin/slideshows';
                    }
                }
            });
        });
    </script>
@endsection



