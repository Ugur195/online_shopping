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

                        <h2 class="card-title">Add Products</h2>
                    </header>
                    <div class="card-body">
                        <form id="myForm" class="form-horizontal form-bordered" method="post"
                              action="{{url('admin/add_product')}}"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Images</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-image"></i>
															</span>
														</span>
                                        <input type="file" name="images[]" class="form-control" placeholder="Images"
                                               multiple/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Name</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fab fa-paypal"></i>
															</span>
														</span>
                                        <input type="text" name="name" class="form-control" placeholder="Name"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Real Price</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-dollar-sign"></i>
															</span>
														</span>
                                        <input step="any" type="number" name="real_price" class="form-control"
                                               placeholder="Price"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Sales Price</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-dollar-sign"></i>
															</span>
														</span>
                                        <input step="any" type="number" name="price" class="form-control"
                                               placeholder="Sales Price"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Discount Price</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fa fa-tag "></i>
															</span>
														</span>
                                        <input step="any" type="number" name="discount price" class="form-control"
                                               placeholder="Discount Price"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Count</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fa fa-calculator fa-lg"></i>
															</span>
														</span>
                                        <input type="number" name="count" class="form-control" placeholder="Count"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Brand</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                    	<span class="input-group-prepend">
															<span class="input-group-text">
                                                                    <i class="fab fa-centos"></i>
															</span>
														</span>
                                        <select name="brands" data-plugin-selectTwo class="form-control populate">
                                            <option value="0" selected disabled>Select brands</option>
                                            @foreach($brands as $b)
                                                <option value="{{$b->id}}">{{$b->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Categoryes</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                    	<span class="input-group-prepend">
															<span class="input-group-text">
                                                                    <i class="fas fa-sliders-h"></i>
															</span>
														</span>
                                        <select name="categoryes" data-plugin-selectTwo class="form-control populate">
                                            <option value="0" selected disabled>Select categoryes</option>
                                            @foreach($categoryes as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Description</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <textarea class="form-control  " rows="5" id="textareaAutosize"
                                                  name="description"
                                                  data-plugin-textarea-autosize placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="compose pt-3">
                                <div id="compose-field" class="compose">
                                </div>
                                <div class="text-right mt-3">
                                    <a href="{{url('admin/products')}}" class="btn btn-info">
                                        <i class="fas fa-arrow-left"></i>
                                        Back
                                    </a>
                                    <button class="btn btn-success">
                                        <i class="fas fa-plus mr-1"></i>
                                        Add
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


    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/ckeditor/config.js')}}"></script>



    <script>
        $(document).ready(function () {
            $('#myForm').validate();
            $('#myForm').ajaxForm({
                beforeSubmit: function () {
                    Swal.fire({
                        title: '<i class="fa fa-spinner fa-plus fa-3x fa-fw "></i><span class="sr-only">Gozleyin...</span>',
                        text: 'Yuklenme gedir...',
                        showConfirmButton: false
                    })


                },

                beforeSeriaLize: function () {
                    for (var instance in CKEDITOR.instances) CKEDITOR.instances[instance].updateElement();

                },
                success: function (response) {
                    Swal.fire({
                            title: response.title,
                            text: response.message,
                            icon: response.status,
                            allowOutsideClick: false
                        }
                    )
                    if (response.status == 'success') {
                        window.location.href = '/admin/products';
                    }
                }
            });
        });
    </script>
@endsection


