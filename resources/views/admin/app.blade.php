<!doctype html>
<html class="fixed">

<!-- Mirrored from portotheme.com/html/porto-adminCss/3.0.0/layouts-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Sep 2021 12:21:59 GMT -->
<head>

    <!-- Basic -->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>Admin Page</title>
    <meta name="keywords" content="HTML5 Admin Template"/>
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Favicon -->
    <link rel="shortcut icon" href="#" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="{{asset('adminCss/img/apple-touch-icon.png')}}">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600,800,900|Shadows+Into+Light"
          rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('adminCss/vendor/bootstrap/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('adminCss/vendor/animate/animate.css')}}">

    <link rel="stylesheet" href="{{asset('adminCss/vendor/font-awesome/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('adminCss/vendor/magnific-popup/magnific-popup.css')}}"/>
    <link rel="stylesheet" href="{{asset('adminCss/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}"/>

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('adminCss/vendor/jquery-ui/jquery-ui.css')}}"/>
    <link rel="stylesheet" href="{{asset('adminCss/vendor/jquery-ui/jquery-ui.theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('adminCss/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css')}}"/>
    <link rel="stylesheet" href="{{asset('adminCss/vendor/morris/morris.css')}}"/>
    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="{{asset('adminCss/vendor/select2/css/select2.css')}}"/>
    <link rel="stylesheet" href="{{asset('adminCss/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('adminCss/vendor/datatables/media/css/dataTables.bootstrap4.css')}}"/>

    <!--(remove-empty-lines-end)-->

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('adminCss/css/theme.css')}}"/>


    <!--(remove-empty-lines-end)-->


    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset('adminCss/css/custom.css')}}">

@yield('css')

<!-- Head Libs -->
    <script src="{{asset('adminCss/vendor/modernizr/modernizr.js')}}"></script>

</head>
<body>
<section class="body">


    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="{{url('admin/index')}}" class="logo"> <img
                    src="data:image/jpeg;base64,{{base64_encode($setting->logo)}}"
                    width="120"
                    height="35" alt="Porto Admin"/>
            </a>
            <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
                 data-fire-event="sidebar-left-opened"><i class="fas fa-bars" aria-label="Toggle sidebar"></i></div>
        </div>

        <!-- start: search & user box -->
        <div class="header-right">

            <form action="http://portotheme.com/html/porto-admin/3.0.0/pages-search-results.html"
                  class="search nav-form">
                <div class="input-group">
                    <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                    <span class="input-group-append">
								<button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>
							</span>
                </div>
            </form>

            <span class="separator"></span>

            <ul class="notifications">
                <li>
                    <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                        <i class="fa fa-comments"></i>
                        <span class="badge">{{count(\App\Comments::where('status',0)->get())}}</span>
                    </a>

                    <div class="dropdown-menu notification-menu large">
                        <div class="notification-title">
                            <span class="float-right badge badge-default">{{count($comments)}}</span>
                            Comments
                        </div>

                        <div class="content">
                            <ul>
                                @foreach($comments as $cm)
                                    <li @if($cm->status==0) class="badge badge-default" @endif >
                                        <a href="{{url('admin/comment/'.$cm->id)}}" class="clearfix">
                                            <span class="title">{{$cm->full_name}}</span>
                                            <span class="message">{{$cm->texts}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <hr/>

                            <div class="text-right">
                                <a href="{{url('admin/comments')}}" class="view-more">View All</a>
                            </div>
                        </div>
                    </div>
                </li>


                <li>
                    <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                        <i class="fas fa-envelope"></i>
                        <span class="badge">{{count(\App\ContactUs::where('read_unread',0)->get())}}</span>
                    </a>

                    <div class="dropdown-menu notification-menu">
                        <div class="notification-title">
                            <span class="float-right badge badge-default">{{count($messages)}}</span>
                            Messages
                        </div>

                        <div class="content">
                            <ul>
                                @foreach($messages as $msj)
                                    <li @if($msj->read_unread==0) class="badge badge-default" @endif >
                                        <a href="{{url('admin/messages/'.$msj->id)}}" class="clearfix">
                                            <span class="title">{{$msj->full_name}}</span>
                                            <span class="message">{{$msj->messages}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <hr/>

                            <div class="text-right">
                                <a href="{{url('admin/messages')}}" class="view-more">View All</a>
                            </div>
                        </div>
                    </div>
                </li>


                <li>
                    <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                        <i class="fas fa-comment-alt"></i>
                        <span class="badge">{{count(\App\BlogsComments::where('status',0)->get())}}</span>
                    </a>

                    <div class="dropdown-menu notification-menu large">
                        <div class="notification-title">
                            <span class="float-right badge badge-default">{{count($blogs_comments)}}</span>
                            Blogs Comments
                        </div>

                        <div class="content">
                            <ul>
                                @foreach($blogs_comments as $bc)
                                    <li @if($bc->status==0) class="badge badge-default" @endif >
                                        <a href="{{url('admin/blogs_comments_edit/'.$bc->id)}}" class="clearfix">
                                            <span class="title">{{$bc->full_name}}</span>
                                            <span class="message">{{$bc->texts}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <hr/>

                            <div class="text-right">
                                <a href="{{url('admin/blogs_comments')}}" class="view-more">View All</a>
                            </div>
                        </div>
                    </div>
                </li>


                <li>
                    <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                        <i class="fas fa-dolly"></i>
                        <span class="badge">{{count(\App\Orders::where('status',0)->get())}}</span>
                    </a>

                    <div class="dropdown-menu notification-menu">
                        <div class="notification-title">
                            <span class="float-right badge badge-default">{{count($orders)}}</span>
                            Orders
                        </div>

                        <div class="content">
                            <ul>
                                @foreach($orders as $o)
                                    @php($user=\App\User::find($o->users_id))
                                    <li @if($o->status==0) class="badge badge-default" @endif >
                                        <a href="{{url('admin/orders_edit/'.$o->id)}}" class="clearfix">
                                            <span class="title">{{$o->name}} {{$o->surname}}</span>
                                            <span class="message">{{$o->address}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <hr/>
                            <div class="text-right">
                                <a href="{{url('admin/orders')}}" class="view-more">View All</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <span class="separator"></span>

            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="data:image/jpeg;base64,{{base64_encode(Auth::user()->image)}}"/>
                    </figure>
                    <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                        <span class="name">{{Auth::user()->name.' '.Auth::user()->surname}}</span>
                        <span class="role">{{\App\Roles::find(Auth::user()->role_id)->name}}</span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled mb-2">
                        <li class="divider"></li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{url('/admin/my_profile')}}"><i
                                    class="fas fa-user"></i>My Profile</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{url('/')}}"><i
                                    class="fas fa-globe"></i> See website</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{ url('logout') }}"><i class="fas fa-power-off"></i>
                                Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->
    <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">

            <div class="sidebar-header">
                <div class="sidebar-title">
                    Navigation
                </div>
                <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed"
                     data-target="html" data-fire-event="sidebar-left-toggle">
                    <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <div class="nano">
                <div class="nano-content">
                    <nav id="menu" class="nav-main" role="navigation">

                        <ul class="nav nav-main">
                            <li>
                                <a class="nav-link" href="{{url('/admin/index')}}">
                                    <i class="fas fa-home" aria-hidden="true"></i>
                                    <span>Home</span>
                                </a>
                            </li>

                            <li>
                                <a class="nav-link" href="{{url('/admin/users')}}">
                                    <i class="fas fa-user-friends" aria-hidden="true"></i>
                                    <span>Users</span>
                                </a>
                            </li>

                            <li>
                                <a class="nav-link" href="{{url('/admin/our_team')}}">
                                    <i class="fas fa-users" aria-hidden="true"></i>
                                    <span>Our Team</span>
                                </a>
                            </li>

                            <li>
                                <a class="nav-link" href="{{url('/admin/our_team_roles')}}">
                                    <i class="fas fa-user-tie" aria-hidden="true"></i>
                                    <span>Our Team Roles</span>
                                </a>
                            </li>

                            <li>
                                <a class="nav-link" href="{{url('/admin/orders')}}">
                                    <i class="fas fa-dolly" aria-hidden="true"></i>
                                    <span>Orders</span>
                                </a>
                            </li>

                            <li class="nav-parent">
                                <a>
                                    <i class="fas fa-paste" aria-hidden="true"></i>
                                    <span>Reports</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a class="nav-link" href="{{url('/admin/reports')}}">
                                            Full Reports
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{url('/admin/monthly_report')}}">
                                            Monthly report
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="nav-link" href="{{url('/admin/messages')}}">
                                    <i class="fas fa-envelope" aria-hidden="true"></i>
                                    <span>Messages</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{url('admin/comments/')}}">
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                    <span>Comments</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{url('/admin/menu')}}">
                                    <i class="fas fa-bars" aria-hidden="true"></i>
                                    <span>Menu</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{url('/admin/products')}}">
                                    <i class=" fas fa-box" aria-hidden="true"></i>
                                    <span>Products</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{url('/admin/brands')}}">
                                    <i class="fab fa-centos" aria-hidden="true"></i>
                                    <span>Brands</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{url('/admin/blogs')}}">
                                    <i class="fas fa-blog" aria-hidden="true"></i>
                                    <span>Blogs</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{url('/admin/blogs_comments')}}">
                                    <i class="fas fa-comment-alt" aria-hidden="true"></i>
                                    <span>Blogs Comment</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{url('/admin/categoryes')}}">
                                    <i class="fas fa-list-alt " aria-hidden="true"></i>
                                    <span>Categoryes</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{url('/admin/blog_category')}}">
                                    <i class="fas fa-stream " aria-hidden="true"></i>
                                    <span>Blog Category</span>
                                </a>

                            </li>

                            <li>
                                <a class="nav-link" href="{{url('/admin/slideshows')}}">
                                    <i class="fas fa-images " aria-hidden="true"></i>
                                    <span>Slideshows</span>
                                </a>
                            </li>

                            <li>
                                <a class="nav-link" href="{{url('/admin/setting')}}">
                                    <i class="fas fa-cogs" aria-hidden="true"></i>
                                    <span>Setting</span>
                                </a>
                            </li>

                            <li>
                                <a class="nav-link" href="{{url('/admin/about_us')}}">
                                    <i class="fa fa-info" aria-hidden="true"></i>
                                    <span>About Us</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <script>
                    // Maintain Scroll Position
                    if (typeof localStorage !== 'undefined') {
                        if (localStorage.getItem('sidebar-left-position') !== null) {
                            var initialPosition = localStorage.getItem('sidebar-left-position'),
                                sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                            sidebarLeft.scrollTop = initialPosition;
                        }
                    }
                </script>

            </div>

        </aside>
        <!-- end: sidebar -->

    @yield('content')


    <!-- Vendor -->
        <script src="{{asset('adminCss/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('adminCss/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
        <script src="{{asset('adminCss/vendor/jquery-cookie/jquery.cookie.js')}}"></script>
        <script src="{{asset('adminCss/vendor/popper/umd/popper.min.js')}}"></script>
        <script src="{{asset('adminCss/vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('adminCss/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('adminCss/vendor/common/common.js')}}"></script>
        <script src="{{asset('adminCss/vendor/nanoscroller/nanoscroller.js')}}"></script>
        <script src="{{asset('adminCss/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
        <script src="{{asset('adminCss/vendor/jquery-placeholder/jquery.placeholder.j')}}s"></script>

        <!-- Specific Page Vendor -->
        <script src="{{asset('adminCss/vendor/jquery-ui/jquery-ui.js')}}"></script>
        <script src="{{asset('adminCss/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js')}}"></script>
        <script src="{{asset('adminCss/vendor/jquery-appear/jquery.appear.js')}}"></script>
        <script src="{{asset('adminCss/vendor/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
        <script src="{{asset('adminCss/vendor/jquery.easy-pie-chart/jquery.easypiechart.js')}}"></script>
        <script src="{{asset('adminCss/vendor/flot/jquery.flot.js')}}"></script>
        <script src="{{asset('adminCss/vendor/flot.tooltip/jquery.flot.tooltip.js')}}"></script>
        <script src="{{asset('adminCss/vendor/flot/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('adminCss/vendor/flot/jquery.flot.categories.js')}}"></script>
        <script src="{{asset('adminCss/vendor/flot/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('adminCss/vendor/jquery-sparkline/jquery.sparkline.js')}}"></script>
        <script src="{{asset('adminCss/vendor/raphael/raphael.js')}}"></script>
        <script src="{{asset('adminCss/vendor/morris/morris.js')}}"></script>
        <script src="{{asset('adminCss/vendor/gauge/gauge.js')}}"></script>
        <script src="{{asset('adminCss/vendor/snap.svg/snap.svg.js')}}"></script>
        <script src="{{asset('adminCss/vendor/liquid-meter/liquid.meter.js')}}"></script>
        <script src="{{asset('adminCss/vendor/jqvmap/jquery.vmap.js')}}"></script>
        <script src="{{asset('adminCss/vendor/jqvmap/data/jquery.vmap.sampledata.js')}}"></script>
        <script src="{{asset('adminCss/vendor/jqvmap/maps/jquery.vmap.world.js')}}"></script>
        <script src="{{asset('adminCss/vendor/jqvmap/maps/continents/jquery.vmap.africa.js')}}"></script>
        <script src="{{asset('adminCss/vendor/jqvmap/maps/continents/jquery.vmap.asia.js')}}"></script>
        <script src="{{asset('adminCss/vendor/jqvmap/maps/continents/jquery.vmap.australia.js')}}"></script>
        <script src="{{asset('adminCss/vendor/jqvmap/maps/continents/jquery.vmap.europe.js')}}"></script>
        <script src="{{asset('adminCss/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js')}}"></script>
        <script src="{{asset('adminCss/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js')}}"></script>

        <!-- Specific Page Vendor -->
        <script src="{{asset('adminCss/vendor/select2/js/select2.js')}}"></script>
        <script src="{{asset('adminCss/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('adminCss/vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('adminCss/js/examples/examples.datatables.editable.js')}}"></script>

        <!-- Specific Page Vendor -->
        <script src="{{asset('adminCss/vendor/isotope/isotope.js')}}"></script>

        <!-- Examples -->
        <script src="{{asset('adminCss/js/examples/examples.mediagallery.js')}}"></script>

        <!--(remove-empty-lines-end)-->

        <!-- Theme Base, Components and Settings -->
        <script src="{{asset('adminCss/js/theme.js')}}"></script>

        <!-- Theme Custom -->
        <script src="{{asset('adminCss/js/custom.js')}}"></script>

        <!-- Theme Initialization Files -->
        <script src="{{asset('adminCss/js/theme.init.js')}}"></script>

    @yield('js')

    <!-- Analytics to Track Preview Website -->


    </div>
</section>
</body>


<!-- Mirrored from portotheme.com/html/porto-adminCss/3.0.0/layouts-default.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Sep 2021 12:21:59 GMT -->
</html>
