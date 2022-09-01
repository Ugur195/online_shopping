@extends('admin.app')

@section('css')
    <link rel="stylesheet" href="{{asset('cssValidate/sweetalert2.css')}}"/>
@endsection

@section('content')
    <section class="body">
        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Blogs</h2>
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
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <a href="{{url('admin/add_blogs')}}" class="btn btn-success">Add <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped mb-0" id="datatable-editable">
                        <thead>
                        <tr>
                            <th>Images</th>
                            <th>ID</th>
                            <th>Header</th>
                            <th>Description</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Options</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $b)
                            @php($user=\App\User::find($b->author))
                            <tr data-item-id="1">
                                <td><img style='display:block;width:80px;height:60px;'src="data:image/jpeg;base64,{{base64_encode($b->images)}}"/></td>
                                <td>{{$b->id}}</td>
                                <td>{{$b->header}}</td>
                                <td>{{$b->description}}</td>
                                <td>{{$user->name}} {{$user->surname}}</td>
                                <td>{{\App\BlogCategory::find($b->category_id)->name}}</td>
                                <td>
                                    @if($b->status==1)
                                        Aktiv
                                    @else
                                        Deaktiv
                                    @endif
                                </td>
                                <td class="actions">
                                    <a href="{{url('admin/blogs_edit/'.$b->id)}}" class="btn btn-success"
                                       style="color: white"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <button onclick="sil(this, {{$b->id}})" type="button" class="btn btn-danger"><i
                                            class="fas fa-trash"></i></button>
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
                            swal.file({
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




