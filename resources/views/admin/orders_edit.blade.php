@extends('admin.app')

@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection

@section('content')

    <section role="main" class="content-body content-body-modern mt-0">
        <form id="submitSend" method="post">
            {{csrf_field()}}
            <input value="{{\App\User::find($orders_edit->users_id)->id}}" name="user_id" hidden>

            <header class="page-header page-header-left-inline-breadcrumb">
                <h2 class="font-weight-bold text-6">Order Details</h2>

            </header>

            <!-- start: page -->

            <div class="row">
                <div class="col-xl-8">

                    <div class="card card-modern">
                        <div class="card-header">
                            <h2 class="card-title text-center">Addresses</h2>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-auto mr-xl-5 pr-xl-5 mb-4 mb-xl-0">
                                    <h3 class="text-color-dark  font-weight-bold text-4 line-height-1 mt-0 mb-3">
                                        BILLING</h3>
                                    @php($user=\App\User::find($orders_edit->users_id))
                                    <strong class="d-block text-color-dark">Name Surname:</strong>
                                    <a>{{$user->name}} {{$user->surname}}</a>
                                    <strong class="d-block text-color-dark">Address:</strong>
                                    <a>{{$user->address}}</a>
                                    <strong class="d-block text-color-dark">Email:</strong>
                                    <a href="mailto:">{{$user->email}}</a>
                                    <strong class="d-block text-color-dark">Phone:</strong>
                                    <a class="text-color-dark">{{$user->mobile}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="card card-modern">
                        <div class="card-header">
                            <h2 class="card-title">Products</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                    class="table table-ecommerce-simple table-ecommerce-simple-border-bottom table-striped mb-0"
                                    style="min-width: 380px;">
                                    <thead>
                                    <tr>
                                        <th width="8%" class="pl-4">Image</th>
                                        <th width="65%">Name</th>
                                        <th width="5%" class="text-center">Price</th>
                                        <th width="7%" class="text-center">Count</th>
                                        <th width="5%" class="text-center">Status</th>
                                        <th width="5%" class="text-center">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($basket as $b)
                                        @php($prod=\App\Products::find($b->product_id))

                                        <tr>
                                            <td>
                                                <img style='display:block;width:100px;height:70px;'
                                                     src="data:image/jpeg;base64,{{base64_encode(\App\Products::find($b->product_id)->images)}}"/>
                                            </td>
                                            <td>
                                                <a href="ecommerce-products-form.html"><strong>{{\App\Products::find($b->product_id)->name}}</strong></a>
                                            </td>
                                            @if($prod->discount_price!=0)
                                                <td class="text-center">{{$prod->discount_price}} </td>
                                            @else
                                                <td class="text-center"> {{$prod->price}} </td>
                                            @endif

                                            <td class="text-center">{{$b->product_count}}</td>
                                            <td>
                                                @if($b->status==2)
                                                    Gozlemede
                                                @elseif($b->status==3)
                                                    Gonderilib
                                                @elseif($b->status==4)
                                                    Catib
                                                @endif
                                            </td>
                                            <td class="text-right">{{$b->payment}}</td>

                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>

                            <div class="row justify-content-end flex-column flex-lg-row my-3">
                                <div class="col-auto">
                                    <h3 class="font-weight-bold text-color-dark text-4 mb-3">Total Price</h3>
                                    <span class="d-flex align-items-center justify-content-lg-end">
													<strong class="text-color-dark text-5">{{$total_price}} <img
                                                            style="width: 14px; height:14px;"
                                                            src="{{asset('frontendCss/img/Manat.png')}}"/></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="compose pt-3">
                <div id="compose-field" class="compose">
                </div>
                <div class="text-right mt-3">
                    <a href="{{url('admin/orders')}}" class="btn btn-info">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                    @if($orders_edit->status==1)
                        <button name="submitSend" type="submit" value="Post Send" class="btn btn-success">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                            Send
                        </button>
                    @endif
                    @if($orders_edit->status==2)
                        <button name="submitDelivered" type="submit" value="Post Delivered" class="btn btn-warning">
                            <i class="fas fa-shipping-fast" aria-hidden="true"></i>
                            Delivered
                        </button>
                    @endif
                </div>
            </div>
            <!-- end: page -->
        </form>
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
            $('#submitSend').validate();
            $('#submitSend').ajaxForm({
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
                        window.location.href = '/admin/orders';
                    }

                }
            });
        });

        $(document).ready(function () {
            $('#submitDelivered').validate();
            $('#submitDelivered').ajaxForm({
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
                        window.location.href = '/admin/orders';
                    }

                }
            });
        });
    </script>
@endsection
