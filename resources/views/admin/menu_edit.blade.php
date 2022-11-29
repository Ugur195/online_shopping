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

                        <h2 class="card-title">Edit Menu</h2>
                    </header>
                    <div class="card-body">
                        <form class="form-horizontal form-bordered" method="post" action="{{url('/admin/menu_edit/ $menu->id')}}">
                            {{csrf_field()}}
                            <input type="text" name="id" hidden class="form-control" placeholder="email"
                                   value="{{$menu->id}}"/>
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
                                               value="{{$menu->name}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Page</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-file-alt"></i>
															</span>
														</span>
                                        <input type="text" name="page" class="form-control" placeholder="Page"
                                               value="{{$menu->page}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Status</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                    	<span class="input-group-prepend">
															<span class="input-group-text">
                                                                @if($menu->status==1)
																<i class="fas fa-eye"></i>
                                                                @else
                                                                    <i class="	fas fa-eye-slash"></i>
                                                                @endif

															</span>
														</span>
                                    <select name="status" data-plugin-selectTwo class="form-control populate">
                                            <option value="1" @if($menu->status==1) selected @endif>Aktiv</option>
                                            <option value="0" @if($menu->status==0) selected @endif>Deaktiv</option>
                                    </select>
                                    </div>
                                </div>
                            </div>

                            <div class="compose pt-3">
                                <div id="compose-field" class="compose">
                                </div>
                                <div class="text-right mt-3">
                                    <a href="{{url('admin/menu')}}" class="btn btn-info">
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
                    if(response.status=='success'){
                        window.location.href='/admin/menu_edit/{id}';
                    }
                }
            });
        });
    </script>
@endsection


