@extends('admin.app')

@section('css')
@endsection

@section('content')
    <section class="body">
        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Monthly Report</h2>
            </header>

            <form id="myForm" class="form-horizontal form-bordered" method="post"
                  action="{{url('admin/monthly_report')}}"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                <label class="col-lg-3 control-label text-lg-right pt-2">From Date</label>
                <div class="col-lg-6">
                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-calendar-alt"></i>
															</span>
														</span>
                        <input name="from_date" type="text" data-plugin-datepicker class="form-control">
                    </div>
                </div>

                <label class="col-lg-3 control-label text-lg-right pt-2">To Date</label>
                <div class="col-lg-6">
                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-calendar-alt"></i>
															</span>
														</span>
                        <input name="to_date" type="text" data-plugin-datepicker class="form-control">
                    </div>
                </div>
                <br/>
                <div class="col-lg-6">
                    <div name="search" class="input-group">
                        <button class="btn btn-info">
                            <i class="fas fa-search"></i>
                            Search
                        </button>
                    </div>
                </div>
                <hr/>
            </form>


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
                        <tr class="text-center">
                            <th>Profit</th>
                            <th>Created date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reports as $r)
                            <tr data-item-id="1" class="text-center">
                                <td>{{$r->profit}}</td>
                                <td>{{$r->created_at}}</td>
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

@endsection



