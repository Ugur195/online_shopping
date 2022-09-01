@extends('admin.app')

@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection

@section('content')
    <section role="main" class="content-body content-body-modern mt-0">
        <header class="page-header page-header-left-inline-breadcrumb">
            <h2 class="font-weight-bold text-6">Orders</h2>

        </header>

        <!-- start: page -->
        <div class="row">
            <div class="col">

                <div class="card card-modern">
                    <div class="card-body">
                        <div class="datatables-header-footer-wrapper">
                            <table class="table table-ecommerce-simple table-striped mb-0" id="datatable-editable"
                                   style="min-width: 640px;">
                                <thead>
                                <tr class="text-center">
                                    <th width="8%">User</th>
                                    <th width="28%">Address</th>
                                    <th width="18%">Created date</th>
                                    <th width="18%">Updated date</th>
                                    <th width="15%">Status</th>
                                    <th width="18%">Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $o)
                                    <tr class="text-center">
                                        <td>{{\App\User::find($o->users_id)->name}} {{\App\User::find($o->users_id)->surname}}</td>
                                        <td>{{$o->address}}</td>
                                        <td>{{$o->created_at}}</td>
                                        <td>{{$o->updated_at}}</td>
                                        <td>
                                            @if($o->status==0)
                                                Yeni Sifarish
                                            @elseif ($o->status==1)
                                                Gozlemede
                                            @elseif($o->status==2)
                                                Gonderilib
                                            @elseif($o->status==3)
                                                Catib
                                            @endif
                                        </td>
                                        <td class="actions">
                                            <a href="{{url('admin/orders_edit/'.$o->id)}}" class="btn btn-success"
                                               style="color: white"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <button onclick="sil(this, {{$o->users_id}}, '{{$o->slug}}')" type="button"
                                                    class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></button>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: page -->
        </div>
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
        function sil(setir, id, slug) {
            var sira = setir.parentNode.parentNode.rowIndex;
            console.log(sira);
            swal.fire({
                title: 'Silmek Isteyirsinizmi?',
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
                        url: '',
                        data: {
                            'user_id': id,
                            'slug': slug,
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
