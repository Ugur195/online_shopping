@extends('frontend.app')

@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection


@section('content')

    <div role="main" class="main shop py-4">

        <div class="container">

            <div class="row">
                <div class="col">
                    <p>Checkout Basket</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9">
                    <form id="myForm" class="form-horizontal form-bordered" method="post">
                        {{csrf_field()}}
                        <input hidden name="user_id" value="{{Auth::user()->id}}"/>

                        <div class="accordion accordion-modern" id="accordion">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne">
                                            Billing Address
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="collapse show">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label class="font-weight-bold text-dark text-2">Country</label>
                                                <select class="form-control" id="country" name="country">
                                                    <option value="">Select a country</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label class="font-weight-bold text-dark text-2">Сity</label>
                                                <select class="form-control" name="state" id="state">
                                                    <option value="">Select a city</option>
                                                </select>
                                            </div>
                                        </div>
                                        @if(Auth::check())
                                            <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                    <label class="font-weight-bold text-dark text-2">Name</label>
                                                    <input readonly type="text" value="{{Auth::user()->name}}"
                                                           class="form-control" name="name">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="font-weight-bold text-dark text-2">Surname</label>
                                                    <input readonly type="text" value="{{Auth::user()->surname}}"
                                                           class="form-control" name="surname">
                                                </div>
                                            </div>
                                        @else
                                            <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                    <label class="font-weight-bold text-dark text-2">Name</label>
                                                    <input type="text" value="" class="form-control" name="name">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label class="font-weight-bold text-dark text-2">Surname</label>
                                                    <input type="text" value="" class="form-control" name="surname">
                                                </div>
                                            </div>
                                        @endif

                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label class="font-weight-bold text-dark text-2">Address </label>
                                                <input type="text" name="address" value="{{Auth::user()->address}}"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card card-default">
                                <div class="card-header">
                                    <h4 class="card-title m-0">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseThree">
                                            Review &amp; Payment
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="collapse">
                                    <div class="card-body">
                                        <table class="shop_table cart">
                                            <thead>
                                            <tr>
                                                <th class="product-thumbnail">
                                                    &nbsp;
                                                </th>
                                                <th class="product-name">
                                                    Product
                                                </th>
                                                <th class="product-price">
                                                    Price
                                                </th>
                                                <th class="product-quantity">
                                                    Count
                                                </th>
                                                <th class="product-subtotal">
                                                    Total
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($my_basket as $mb)
                                                @php($prod=\App\Products::find($mb->product_id))
                                                <tr class="cart_table_item">
                                                    <td class="product-thumbnail">
                                                        <a target="_blank" href="{{url('/product/'.$prod->id)}}">
                                                            <img style='display:block;width:70px;height:70px;'
                                                                 src="data:image/jpeg;base64,{{base64_encode($prod->images)}}"/>
                                                        </a>
                                                    </td>
                                                    <td class="product-name">
                                                        <a>{{$prod->name}}</a>
                                                    </td>
                                                    <td class="product-price">
                                                        @if($prod->discount_price!=0)
                                                            <span class="amount">{{$prod->discount_price}}</span>
                                                            <img
                                                                style="width: 14px; height:14px;"
                                                                src="{{asset('frontendCss/img/Manat.png')}}"/>
                                                        @else
                                                            <span class="amount">{{$prod->price}}</span>
                                                            <img
                                                                style="width: 14px; height:14px;"
                                                                src="{{asset('frontendCss/img/Manat.png')}}"/>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        {{$mb->product_count}}
                                                    </td>
                                                    <td class="product-subtotal">
                                                        <span class="amount">{{$mb->payment}}</span>
                                                        <img
                                                            style="width: 14px; height:14px;"
                                                            src="{{asset('frontendCss/img/Manat.png')}}"/>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="actions-continue">
                            <input type="submit" value="Place Order" name="proceed"
                                   class="btn btn-primary btn-modern text-uppercase mt-5 mb-5 mb-lg-0">
                        </div>
                    </form>


                </div>

                <div class="col-lg-3">
                    <h4 class="text-dark">Total Price:
                        <strong class="text-dark"><span class="amount"> {{$total_price}}
                                <img
                                    style="width: 15px; height:15px;"
                                    src="{{asset('frontendCss/img/Manat.png')}}"/></span></strong></h4>
                </div>
            </div>

        </div>

    </div>
@endsection



@section('js')
    <script type="text/javascript" src="{{'countryes/countries.js'}}"></script>

    <script>
        populateCountries("country", "state");
        populateCountries("country2", "state2");
    </script>

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
                            allowOutsideClick: false,
                        }
                    )
                    if (response.status == 'success') {
                        window.location.href = '/index';
                    }
                }
            });
        });
    </script>
@endsection

