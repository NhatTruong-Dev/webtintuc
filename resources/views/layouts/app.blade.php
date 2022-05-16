<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("adminmart-master/assets/images/favicon.png") }}>
    <title>Adminmart Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="{{ asset("adminmart-master/assets/extra-libs/c3/c3.min.css") }}" rel="stylesheet">
    <link href="{{ asset("adminmart-master/assets/libs/chartist/dist/chartist.min.css") }}" rel="stylesheet">
    <link href="{{ asset("adminmart-master/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css") }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset("adminmart-master/dist/css/style.min.css") }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>


</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md">
            <div class="navbar-header" data-logobg="skin6">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-brand">
                    <!-- Logo icon -->
                    <a href="index.html">
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="{{ asset("adminmart-master/assets/images/logo-icon.png")}}" alt="homepage"
                                 class="dark-logo"/>
                            <!-- Light Logo icon -->
                            <img src="{{ asset("adminmart-master/assets/images/logo-icon.png")}}" alt="homepage"
                                 class="light-logo"/>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                                <x-jet-nav-link href="{{ route('dashboard') }}"
                                                :active="request()->routeIs('dashboard')"
                                                style="border:none;color:#5f76e8;font-size:21px;margin-right:-30px">
                                                {{ __('Dashboard Admin') }}
                                            </x-jet-nav-link>
                            </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                   data-toggle="collapse" data-target="#navbarSupportedContent"
                   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                        class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                    <!-- Notification -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                           id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <span><i data-feather="bell" class="svg-icon"></i></span>
                            <span class="badge badge-primary notify-no rounded-circle"
                                  style="width:1px;height:1px;background-color: red;margin-top:8px">.</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                            <ul class="list-style-none">
                                <li>
                                    <div class="p-6  border-b border-gray-200" id="notify"
                                         style="width:540px;height:100%">
                                        <div class="bg-blue-300 p-3 m-2" style="color: black;padding:15px 5px">

                                        </div>

                                    </div>

                                </li>
                                <li>
                                    <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                                        <strong>Check all notifications</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- End Notification -->
                    <!-- ============================================================== -->
                    <!-- create new -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="settings" class="svg-icon"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link" href="javascript:void(0)">
                            <div class="customize-input">
                                <select
                                    class="custom-select form-control bg-white custom-radius custom-shadow border-0">
                                    <option selected>EN</option>
                                    <option value="1">AB</option>
                                    <option value="2">AK</option>
                                    <option value="3">BE</option>
                                </select>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link" href="javascript:void(0)">
                            <form>
                                <div class="customize-input">
                                    <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                           type="search" placeholder="Search" aria-label="Search">
                                    <i class="form-control-icon" data-feather="search"></i>
                                </div>
                            </form>
                        </a>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">

                            <span
                                class="ml-2 d-none d-lg-inline-block"><span>Hello, {{ Auth::user()->name }}</span> <span
                                    class="text-dark"></span> <i data-feather="chevron-down"
                                                                 class="svg-icon"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">

                            <form method="POST" action="{{ route('logout') }}" style="margin:20px 0">
                                @csrf

                                <x-jet-dropdown-link style="color: #6c757d" href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>

                            </form>

                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="{{route('dashboard')}}"
                           aria-expanded="false"><i class="fa-solid fa-house"></i><span
                                class="hide-menu">Trang chủ</span></a>
                        <hr/>
                    </li>

                    <li class="nav-small-cap">
                        @can('xem-vai-tro')
                            <span class="hide-menu">Account</span>
                        @endcan
                    </li>

                    <li class="sidebar-item">
                        @can('xem-vai-tro')
                            <a class="sidebar-link" href="{{route('users.index')}}"
                               aria-expanded="false"><i class="fa-solid fa-user"></i><span
                                    class="hide-menu">Quản lí nhân viên
                                </span></a>
                        @endcan
                    </li>

                    <li class="sidebar-item">
                        @can('xem-vai-tro')
                            <a class="sidebar-link" href="{{route('role.index')}}"
                               aria-expanded="false"><i class="fa-solid fa-audio-description"></i><span
                                    class="hide-menu">Quản lí vai trò
                                </span></a>
                        @endcan
                    </li>
                    @can('xem-vai-tro')
                        <hr/>
                    @endcan
                    <li class="nav-small-cap"><span class="hide-menu">News</span></li>
                    @can('xem-danh-muc')
                        <li class="sidebar-item"><a class="sidebar-link" href="{{route('category.index')}}"
                                                    aria-expanded="false"><i class="fa-solid fa-atom"></i><span
                                    class="hide-menu">Quản lí danh mục
                                </span></a>
                        </li>
                    @endcan
                    @can('xem-chuyen-de')
                        <li class="sidebar-item"><a class="sidebar-link" href="{{route('thematic.index')}}"
                                                    aria-expanded="false"><i class="fa-solid fa-bandage"></i><span
                                    class="hide-menu">Quản lí chuyên đề
                                </span></a>
                        </li>
                    @endcan
                    <li class="sidebar-item">

                        <a class="sidebar-link sidebar-link" href="{{route('post.index')}}"
                           aria-expanded="false"><i class="fa-solid fa-newspaper"></i><span
                                class="hide-menu">Quản lí bài viết</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('crawl.index')}}"
                                                aria-expanded="false"><i class="fa-solid fa-link"></i></i><span
                                class="hide-menu">Quản lí link thu thập
                            </span></a></li>
                    @can('xem-vai-tro')
                        <hr />
                        <li class="nav-small-cap"><span class="hide-menu">Contact</span></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{route('contact-adm')}}"
                                                    aria-expanded="false"><i class="fa-solid fa-address-card"></i><span
                                    class="hide-menu">Liên hệ tòa soạn
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{route('comment.index')}}"
                                                    aria-expanded="false"><i class="fa-solid fa-comment"></i><span
                                    class="hide-menu">Quản lí bình luận
                                </span></a>
                        </li>
                    @endcan

                    <li class="list-divider"></li>
                    <li class="nav-small-cap"><span class="hide-menu">Settings</span></li>
                    <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="{{ route('profile.show') }}"
                                                aria-expanded="false"><i class="fa-solid fa-id-card"></i></i><span
                                class="hide-menu">Cài đặt tài khoản</span></a></li>

                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="container" style="margin-top:50px;margin-left:-100px">
            @yield('content')
            {{ $slot }}
            <x-jet-banner />
            @stack('modals')
            @livewireScripts
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset("adminmart-master/assets/libs/jquery/dist/jquery.min.js") }}"></script>
<script src="{{ asset("adminmart-master/assets/libs/popper.js/dist/umd/popper.min.") }}"></script>
<script src="{{ asset("adminmart-master/assets/libs/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<!-- apps -->
<!-- apps -->
<script src="{{ asset("adminmart-master/dist/js/app-style-switcher.js") }}"></script>
<script src="{{ asset("adminmart-master/dist/js/feather.min.js") }}"></script>
<script
    src="{{ asset("adminmart-master/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js") }}"></script>
<script src="{{ asset("adminmart-master/dist/js/sidebarmenu.js") }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset("adminmart-master/dist/js/custom.min.js") }}"></script>
<!--This page JavaScript -->
<script src="{{ asset("adminmart-master/assets/extra-libs/c3/d3.min.js") }}"></script>
<script src="{{ asset("adminmart-master/assets/extra-libs/c3/c3.min.js") }}"></script>
<script src="{{ asset("adminmart-master/assets/libs/chartist/dist/chartist.min.js") }}"></script>
<script
    src="{{ asset("adminmart-master/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js") }}"></script>
<script src="{{ asset("adminmart-master/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js") }}"></script>
<script src="{{ asset("adminmart-master/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js") }}"></script>
<script src="{{ asset("adminmart-master/dist/js/pages/dashboards/dashboard1.min.js") }}"></script>
<script>

    function renderHtml(data) {
        return `<div class="bg-blue-300 p-3 m-2" style="color:black;width:550px;!important;height:60px">
                            <p >${data}
                            <a href="" class="p-2 bg-red-400 rounded-lg" style="color:white;width:110px;margin-left:370px;margin-top:-32px;background-color: #F87171">Mark as read </a>
                            </p>
                            <hr style="margin-left:-20px"/>
                      </div>`
    }

    $.get("http://localhost:8000/api/notify", function (data, status) {
        let html = ``;
        data.map(item => {
            html += renderHtml(item.data)
        })
        $('#notify').html(html)
    });
</script>


</body>

</html>
