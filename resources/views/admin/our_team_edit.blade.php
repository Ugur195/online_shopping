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

                        <h2 class="card-title">Edit Our Team</h2>
                    </header>
                    <div class="card-body">
                        <form class="form-horizontal form-bordered" method="post"
                              action="{{url('/admin/our_team_edit/'. $our_team->id)}}">
                            {{csrf_field()}}
                            <input type="text" name="id" hidden class="form-control" placeholder="id"
                                   value="{{$our_team->id}}"/>


                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Users</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-user"></i>
															</span>
														</span>
                                        <select name="user_id" id="user_id" data-plugin-selectTwo
                                                class="form-control populate">
                                            <option value="0" disabled>Chose users</option>
                                            @foreach($users as $u)
                                                <option @if($our_team->user_id==$u->id) selected
                                                        @endif value="{{$u->id}}">{{$u->name}} {{$u->surname}}  </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Roles</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-user"></i>
															</span>
														</span>
                                        <select name="our_team_role_id" id="our_team_role_id" data-plugin-selectTwo
                                                class="form-control populate">
                                            <option value="0" disabled>Chose users</option>
                                            @foreach($our_team_role_id as $otr)
                                                <option @if($our_team->our_team_role_id==$otr->id) selected @endif  value="{{$otr->id}}"> {{$otr->name}}  </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2" for="textareaAutosize">Description</label>
                                <div class="col-lg-6">
                                <textarea class="form-control " rows="3" id="textareaAutosize" name="description"
                                          data-plugin-textarea-autosize
                                          placeholder="Description">{{$our_team->description}}</textarea>
                                </div>
                            </div>


                            <div class="compose pt-3">
                                <div id="compose-field" class="compose">
                                </div>
                                <div class="text-right mt-3">
                                    <a href="{{url('admin/our_team')}}" class="btn btn-info">
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
                        window.location.href = '/admin/our_team';
                    }
                }
            });
        });
    </script>
@endsection


