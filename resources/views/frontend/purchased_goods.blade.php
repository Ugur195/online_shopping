@extends('frontend.app')

@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection


@section('content')
    <div role="main" class="main">

        <section
            class="page-header page-header-modern page-header-background page-header-background-sm overlay overlay-color-primary overlay-show overlay-op-8 mb-5"
            style="background-image: url(img/page-header/page-header-elements.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 align-self-center p-static order-2 text-center">
                        <h1>Purchased Goods</h1>
                    </div>
                </div>
            </div>
        </section>


        <div class="container py-2">


            <h4 class="font-weight-semibold  text-6 mb-0 "> Wait price: {{$wait_payment}} <img
                    style="width: 20px; height:20px;" src="{{asset('frontendCss/img/Manat.png')}}"></h4>


            <h4 class="font-weight-semibold text-6 mb-0 "> Send price: {{$send_payment}} <img
                    style="width: 20px; height:20px;" src="{{asset('frontendCss/img/Manat.png')}}"></h4>

            <h4 class="font-weight-semibold text-6 mb-0 "> Delivery price:{{$delivery_payment}} <img
                    style="width: 20px; height:20px;" src="{{asset('frontendCss/img/Manat.png')}}"></h4>


            <div class="row">
                <div class="col">

                    <div class="row">
                        <div class="col pb-3">
                            <table class="table table-bordered table-striped mb-0" id="datatable-editable">

                                <thead>
                                <tr>
                                    <th>
                                        Image
                                    </th>
                                    <th>
                                        User
                                    </th>
                                    <th>
                                        Product Name
                                    </th>
                                    <th>
                                        Count
                                    </th>
                                    <th>
                                        Payment
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Options
                                    </th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($basket as $b)
                                    <tr>
                                        <td>
                                            <img style='display:block;width:100px;height:70px;'
                                                 src="data:image/jpeg;base64,{{base64_encode(\App\Products::find($b->product_id)->images)}}"/>
                                        </td>


                                        <td>
                                            {{\App\User::find($b->user_id)->name.' '.\App\User::find($b->user_id)->surname}}
                                        </td>


                                        <td>
                                            {{\App\Products::find($b->product_id)->name}}
                                        </td>

                                        <td>
                                            {{$b->product_count}}
                                        </td>

                                        <td>
                                            {{$b->payment}}
                                        </td>
                                        <td>
                                            @if($b->status==2)
                                                Gozlemede
                                            @elseif($b->status==3)
                                                Gonderilib
                                            @elseif($b->status==4)
                                                Catib
                                            @endif
                                        </td>
                                        <td>
                                            @if($b->status==2)
                                                <button onclick="sil(this,{{$b->user_id}},'{{$b->slug}}','{{$b->product_id}}')" class="btn btn-danger"
                                                        name="btn_delete"
                                                        value="btn_delete">
                                                    Imtina
                                                </button>
                                            @endif
                                        </td>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
    <script src="{{asset('jsValidate/jquery.form.js')}}"></script>
    <script src="{{asset('jsValidate/jquery.validate.js')}}"></script>
    <script src="{{asset('jsValidate/messages_az.js')}}"></script>
    <script src="{{asset('jsValidate/sweetalert2.js')}}"></script>


    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/ckeditor/config.js')}}"></script>

    <script>
        function sil(setir, id,slug,product_id) {
            var sira = setir.parentNode.parentNode.rowIndex;
            console.log(sira);
            swal.fire({
                title: 'Imtina elemek isteyirsiz?',
                text: 'Imtina etdikden sonra berpa etmek olmayacaq!',
                icon: 'warning',
                allowOutsideClick: false,
                showCancelButton: true,
                cancelButtonText: 'Bagla',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Imtina etmek',
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
                    $.ajax({
                        type: "Post",
                        url: '',
                        data: {
                            'user_id': id,
                            'slug':slug,
                            'product_id':product_id,
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
                            if (response.status == 'success') {
                                document.getElementById("datatable-editable").deleteRow(sira);
                            }

                        }
                    })
                }
            })
        }

    </script>
@endsection

