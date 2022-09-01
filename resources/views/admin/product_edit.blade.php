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

                        <h2 class="card-title">Edit Product</h2>
                    </header>
                    <div class="card-body">
                        <form class="form-horizontal form-bordered" method="post"
                              action="{{url('/admin/product_edit/ $products->id')}}">
                            {{csrf_field()}}
                            <input type="text" name="id" hidden class="form-control" placeholder="email"
                                   value="{{$products->id}}"/>

                            <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
                                @foreach(explode('(xx)',$products->images) as $pimg)
                                    @if($pimg !="")
                                        <div class="isotope-item document col-sm-6 col-md-4 col-lg-3">
                                            <div class="thumbnail">
                                                <div class="thumb-preview">
                                                    <img style="width: 300px; height: 200px" alt="" class="img-fluid"
                                                         src="data:image/jpeg;base64,{{base64_encode($pimg)}}"/>

                                                    <button
                                                        onclick="sil('{{base64_encode($pimg)}}','{{$products->id}}')"
                                                        type="button" class="btn btn-danger"><i
                                                            class="fas fa-trash"></i></button>
                                                    <div class="mg-thumb-options">
                                                        <div class="mg-toolbar">
                                                            <div class="mg-group float-right">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
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
                                               value="{{$products->name}}"/>
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
                                               placeholder="Real Price"
                                               value="{{$products->real_price}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Price</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                            </span>
                                        <input step="any" type="number" name="price" class="form-control"
                                               placeholder="Price"
                                               value="{{$products->price}}"/>
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
                                               value="{{$products->discount_price}}"/>
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
                                               value="{{$products->count}}"/>
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
                                                <option @if($products->brand_id==$b->id) selected
                                                        @endif value="{{$b->id}}">{{$b->name}}</option>
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
                                                <option @if($products->category_id==$c->id) selected
                                                        @endif value="{{$c->id}}">{{$c->name}}</option>
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
                                    @if($products->status==1)
                                        <i class="fas fa-eye"></i>
                                    @else
                                        <i class="	fas fa-eye-slash"></i>
                                    @endif

                                </span>
                            </span>
                                        <select name="status" data-plugin-selectTwo class="form-control populate">
                                            <option value="1" @if($products->status==1) selected @endif>Aktiv</option>
                                            <option value="0" @if($products->status==0) selected @endif>Deaktiv</option>
                                        </select>
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
        function sil(setir, id) {
            console.log(setir);
            swal.fire({
                title: 'Sekli silmek isteyirsinizmi?',
                text: 'Sildikden sonra berpa etmek olmayacaq!',
                icon: 'warning',
                allowOutsideClick: false,
                showCancelButton: true,
                cancelButtonText: 'Bagla',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sil',
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
                    $.ajax({
                        type: "Post",
                        url: '/admin/delete_image',
                        data: {
                            'id': id,
                            'sekil': setir,
                            '_token': CSRF_TOKEN
                        },
                        beforeSubmit: function () {
                            Swal.fire({
                                title: '<i class="fa fa-spinner fa-plus fa-3x fa-fw "></i><span class="sr-only">Gozleyin...</span>',
                                text: 'Silinir Gozleyin...',
                                showConfirmButton: false
                            })

                        },

                        success: function (response) {
                            swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: response.status,
                                allowOutsideClick: false
                            })
                            if (response.status == 'success') {
                                window.location.href = '/admin/product_edit/{{$products->id}}';
                            }

                        }

                    })
                }
            })
        }

    </script>


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
                        window.location.href = '/admin/products';
                    }
                }
            });
        });
    </script>
@endsection

