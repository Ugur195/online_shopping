@extends('admin.app')

@section('css')

    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>

@endsection

@section('content')
    <section class="body">
        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Comments</h2>
            </header>

            <!-- start: page -->
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-editable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name Surname</th>
                            <th>Email</th>
                            <th>Texts</th>
                            <th>Product Name</th>
                            <th>Parent ID</th>
                            <th>Status</th>
                            <th>Options</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $cm)
                            <tr data-item-id="1">
                                <td hidden><input name="msg_id value=">{{$cm->id}}"</td>
                                <td>{{$cm->id}}</td>
                                <td>{{$cm->full_name}}</td>
                                <td>{{$cm->email}}</td>
                                <td>{{$cm->texts}}</td>
                                <td>{{\App\Products::find($cm->product_id)->name}}</td>
                                <td>{{$cm->parent_id}}</td>
                                <td>
                                    @if($cm->status==1)
                                        Aktiv
                                    @else
                                        Deaktiv
                                    @endif
                                </td>
                                <td class="actions">
                                    <button onclick="publish('{{$cm->email}}', '{{$cm->full_name}}', {{$cm->id}})" class="btn btn-success"
                                            style="color: white"><i class="fas fa-check"></i></button>
                                    <button onclick="sil(this, {{$cm->id}})" type="button" class="btn btn-danger"><i
                                            class="fas fa-trash "></i></button>
                                    <a href="{{url('admin/comment/'.$cm->id)}}" class="btn btn-info"
                                       style="color: white"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- end: page -->
        </section>

        <aside id="sidebar-right" class="sidebar-right">
            <div class="nano">
                <div class="nano-content">
                    <a href="#" class="mobile-close d-md-none">
                        Collapse <i class="fas fa-chevron-right"></i>
                    </a>

                    <div class="sidebar-right-wrapper">

                        <div class="sidebar-widget widget-calendar">
                            <h6>Upcoming Tasks</h6>
                            <div data-plugin-datepicker data-plugin-skin="dark"></div>

                            <ul>
                                <li>
                                    <time datetime="2017-04-19T00:00+00:00">04/19/2017</time>
                                    <span>Company Meeting</span>
                                </li>
                            </ul>
                        </div>

                        <div class="sidebar-widget widget-friends">
                            <h6>Friends</h6>
                            <ul>
                                <li class="status-online">
                                    <figure class="profile-picture">
                                        <img src="img/%21sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                    </figure>
                                    <div class="profile-info">
                                        <span class="name">Joseph Doe Junior</span>
                                        <span class="title">Hey, how are you?</span>
                                    </div>
                                </li>
                                <li class="status-online">
                                    <figure class="profile-picture">
                                        <img src="img/%21sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                    </figure>
                                    <div class="profile-info">
                                        <span class="name">Joseph Doe Junior</span>
                                        <span class="title">Hey, how are you?</span>
                                    </div>
                                </li>
                                <li class="status-offline">
                                    <figure class="profile-picture">
                                        <img src="img/%21sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                    </figure>
                                    <div class="profile-info">
                                        <span class="name">Joseph Doe Junior</span>
                                        <span class="title">Hey, how are you?</span>
                                    </div>
                                </li>
                                <li class="status-offline">
                                    <figure class="profile-picture">
                                        <img src="img/%21sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                    </figure>
                                    <div class="profile-info">
                                        <span class="name">Joseph Doe Junior</span>
                                        <span class="title">Hey, how are you?</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </aside>
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

        function publish(email, full_name, id) {
            console.log(email);
            console.log(full_name);
            console.log(id);
            swal.fire({
                title: 'Yayinlamaq Isteyirsinizmi?',
                text: 'Bu rey yayinlandiqdan sonra saytda gorunecek!',
                icon: 'question',
                allowOutsideClick: false,
                showCancelButton: true,
                cancelButtonText: 'Bagla',
                confirmButtonColor: '#0ccb27',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yayinla',
            }).then((result) => {
                if (result.isConfirmed) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
                    $.ajax({
                        type: "Post",
                        url: '',
                        data: {
                            'email': email,
                            'full_name': full_name,
                            'id': id,
                            'btn_publish': 'btn_publish',
                            '_token': CSRF_TOKEN
                        },
                        beforeSubmit: function () {
                            Swal.fire({
                                title: '<i class="fa fa-spinner fa-plus fa-3x fa-fw "></i><span class="sr-only">Gozleyin...</span>',
                                text: 'Yayinlanir Gozleyin...',
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
                                window.location.href = '/admin/comments';
                            }
                        }
                    })
                }
            })
        }


        function sil(setir, id) {
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
                            'id': id,
                            'btn_delete': 'btn_delete',
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
                            swal.fire({
                                title: response.title,
                                text: response.message,
                                icon: response.status,
                                allowOutsideClick: false
                            })

                        }
                    })
                }
            })
        }

    </script>

@endsection



