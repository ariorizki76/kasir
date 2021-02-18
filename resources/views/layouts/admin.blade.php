<!DOCTYPE html>
<html lang="en" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo.png') }}">
    <title>@yield('title') - Ini Cafe</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('ela/css/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('ela/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('ela/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('cafe/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('cafe/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('cafe/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('cafe/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('cafe/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('cafe/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('cafe/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('cafe/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('cafe/css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('cafe/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('cafe/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('cafe/css/style.css')}}">
    
    <script src="{{ asset('ela/js/lib/jquery/jquery.min.js') }}"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style type="text/css">
        .sidebar-nav > ul > li > a.active{
            background: #faebcd;
        }
    </style>
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav>
                <!-- Logo -->
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Messages -->
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('images/profil')}}/@yield('foto_admin')" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="{{URL('admin/pengaturan')}}"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="{{URL('admin/logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar" style="background: #faebcd">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav" style="background: #faebcd">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Admin</li>

                        <li class="{{{(Request::is('admin') ? 'active' : '')}}}"> <a href="{{URL('admin')}}" aria-expanded="false"><i class="fa fa-tachometer"></i>Dashboard</a></li>

                        <li class="{{{(Request::is('admin/pemesanan') ? 'active' : '')}}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-list-ul"></i><span class="hide-menu">Pemesanan</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL('admin/pemesanan')}}">Semua Pemesanan</a></li>
                                <li><a href="{{URL('admin/pemesanan/create')}}">Buat Pemesanan</a></li>
                            </ul>
                        </li>
                        <li class="{{{(Request::is('admin/pelanggan') ? 'active' : '')}}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Pelanggan</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL('admin/pelanggan')}}">Semua Pelanggan</a></li>
                                <li><a href="{{URL('admin/pelanggan/create')}}">Buat Akun Pelanggan</a></li>
                            </ul>
                        </li>
                        <li class="{{{(Request::is('admin/kasir') ? 'active' : '')}}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Kasir</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL('admin/kasir')}}">Semua Kasir</a></li>
                                <li><a href="{{URL('admin/kasir/create')}}">Buat Akun Kasir</a></li>
                            </ul>
                        </li>
                        <li class="{{{(Request::is('admin/waiter') ? 'active' : '')}}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Waiter</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL('admin/waiter')}}">Semua waiter</a></li>
                                <li><a href="{{URL('admin/waiter/create')}}">Buat Akun waiter</a></li>
                            </ul>
                        </li>
                        <li class="{{{(Request::is('admin/admin') ? 'active' : '')}}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Admin</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL('admin/admin')}}">Semua Admin</a></li>
                                <li><a href="{{URL('admin/admin/create')}}">Buat Akun Admin</a></li>
                            </ul>
                        </li>
                        <li class="{{{(Request::is('admin/owner') ? 'active' : '')}}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Owner</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL('admin/owner')}}">Semua Owner</a></li>
                                <li><a href="{{URL('admin/owner/create')}}">Buat Akun Owner</a></li>
                            </ul>
                        </li>
                        <li class="{{{(Request::is('admin/hidangan') ? 'active' : '')}}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-fire"></i><span class="hide-menu">Hidangan</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL('admin/hidangan')}}">Semua Hidangan</a></li>
                                <li><a href="{{URL('admin/hidangan/create')}}">Tambah Hidangan</a></li>
                            </ul>
                        </li>
                        <li class="{{{(Request::is('admin/meja') ? 'active' : '')}}}"> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Meja</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL('admin/meja')}}">Semua Meja</a></li>
                                <li><a href="{{URL('admin/meja/create')}}">Tambah Meja</a></li>
                            </ul>
                        </li>
                        <li class="{{{(Request::is('admin/pengaturan') ? 'active' : '')}}}"> <a href="{{URL('admin/pengaturan')}}" aria-expanded="false"><i class="fa fa-gears"></i>Profil</a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles" style="margin: 0;">
                <div class="col-md-5 align-self-center">
                    <h3 style="color: #5e493a">@yield('title')</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="ftco-counter ftco-bg-dark img">
                <!-- Start Page Content -->
                @yield('content')
                <!-- /# row -->
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer" style="text-align: center"> © 2021 All rights reserved. Ini Cafe <a href="https://colorlib.com">Team</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('ela/js/lib/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('ela/js/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('ela/js/jquery.slimscroll.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('ela/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('ela/js/lib/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('ela/js/custom.min.js') }}"></script>

</body>

</html>