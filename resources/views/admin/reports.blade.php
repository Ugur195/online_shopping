@extends('admin.app')

@section('css')
@endsection

@section('content')
    <section class="body">
        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Reports</h2>
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
                            <th>Image</th>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Count</th>
                            <th>Real Price</th>
                            <th> Sales Price</th>
                            <th>Discount price</th>
                            <th>Profit</th>
                            <th>Created date</th>
                            <th>Updated date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reports as $r)
                            @php($prod=\App\Products::find($r->product_id))
                            @php($basket=\App\Basket::where('product_id',$r->product_id)->first())
                            <tr data-item-id="1">
                                <td><img style='display:block;width:80px;height:60px;'
                                         src="data:image/jpeg;base64,{{base64_encode($prod->images)}}"/>
                                </td>
                                <td>{{$r->id}}</td>
                                <td>{{$prod->name}}</td>
                                <td>{{$basket->product_count}}</td>
                                <td>{{$prod->real_price}}</td>
                                <td>{{$prod->price}}</td>
                                <td>{{$prod->discount_price}}</td>
                                <td>{{$r->profit}}</td>
                                <td>{{$r->created_at}}</td>
                                <td>{{$r->updated_at}}</td>
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


