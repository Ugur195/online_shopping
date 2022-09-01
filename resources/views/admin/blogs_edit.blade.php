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

                        <h2 class="card-title">Edit Blogs</h2>
                    </header>
                    <div class="card-body">
                        <form class="form-horizontal form-bordered" method="post" action="{{url('/admin/blogs_edit/ $blogs->id')}}">
                            {{csrf_field()}}
                            <input type="text" name="id" hidden class="form-control" placeholder="id"
                                   value="{{$blogs->id}}"/>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Category</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                    	<span class="input-group-prepend">
															<span class="input-group-text">
                                                                    <i class="fas fa-sliders-h"></i>
															</span>
														</span>
                                        <select name="blog_category" data-plugin-selectTwo class="form-control populate">
                                            <option value="0" selected disabled >Select category</option>
                                            @foreach($blog_category as $bc)
                                                <option @if($blogs->category_id==$bc->id) selected @endif value="{{$bc->id}}">{{$bc->name}}</option>
                                            @endforeach
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
                                                                @if($blogs->status==1)
                                                                    <i class="fas fa-eye"></i>
                                                                @else
                                                                    <i class="	fas fa-eye-slash"></i>
                                                                @endif

															</span>
														</span>
                                        <select name="status" data-plugin-selectTwo class="form-control populate">
                                            <option value="1" @if($blogs->status==1) selected @endif>Aktiv</option>
                                            <option value="0" @if($blogs->status==0) selected @endif>Deaktiv</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Header</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <textarea class="form-control  " rows="2" id="textareaAutosize"
                                                  name="header"
                                                  data-plugin-textarea-autosize placeholder="Header">{{$blogs->header}}"</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Description</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <textarea class="form-control  " rows="4" id="textareaAutosize"
                                                  name="description"
                                                  data-plugin-textarea-autosize placeholder="Description">{{$blogs->description}}</textarea>
                                    </div>
                                </div>
                            </div>




                            <div class="compose pt-3">
                                <div id="compose-field" class="compose">
                                </div>
                                <div class="text-right mt-3">
                                    <a href="{{url('admin/blogs')}}" class="btn btn-info">
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
                        window.location.href = '/admin/blogs';
                    }
                }
            });
        });
    </script>
@endsection



