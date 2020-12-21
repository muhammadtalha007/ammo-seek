<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <link href="{{asset('bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/stylesheet.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('bootstrap.min.js')}}"></script>
    <script type="text/javascript"
            src="{{ \Illuminate\Support\Facades\URL::asset('jquery/3.5.1/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('popper/popper.min.js')}}"></script>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a style="float: right !important;" class="dropdown-item" href="{{ route('logout-user') }}">
                    {{ __('Logout') }}
                </a>
            </form>
        </div>
    </nav>

    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a class="navbar-brand" href="{{ url('/home') }}" style="font-size: 16px!important;">Ammo Seek App</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded"
                             src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                             alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                                <strong>Welcome Admin</strong>
                            </span>
                        <span class="user-name">
{{--                                <strong>{{\App\Customer::where('id', \Illuminate\Support\Facades\Session::get('userId'))->first()['first_name']}}</strong>--}}
                            </span>
                        <span class="user-name">
{{--                            <strong>{{\App\Customer::where('id', \Illuminate\Support\Facades\Session::get('userId'))->first()['sure_name']}}</strong>--}}
                            </span>
                    </div>
                </div>

                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="">
                            <a href="{{url('/home')}}">
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('/ammo')}}">
                                <i class="fas fa-fighter-jet"></i>
                                <span>Ammo</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('/retailer')}}">
                                <i class="fas fa-male"></i>
                                <span>Retailer</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('/caliber')}}">
                                <i class="fas fa-search"></i>
                                <span>Caliber</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('/ammo-tracking')}}">
                                <i class="fas fa-flag-checkered"></i>
                                <span>Ammo Tracking</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('/users')}}">
                                <i class="fas fa-users"></i>
                                <span>Manage Users</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('/subscribed-users')}}">
                                <i class="fas fa-user-plus"></i>
                                <span>Subscribed Users</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('/contact-us')}}">
                                <i class="fas fa-address-book"></i>
                                <span>Contact Us</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
        <!-- page-content" -->
    </div>

</div>
<script>
    function logoutUser() {
        event.preventDefault();
        document.getElementById('logoutbtn').click();
    }

    jQuery(function ($) {

        $(".sidebar-dropdown > a").click(function () {
            $(".sidebar-submenu").slideUp(200);
            if (
                $(this)
                    .parent()
                    .hasClass("active")
            ) {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .parent()
                    .removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .next(".sidebar-submenu")
                    .slideDown(200);
                $(this)
                    .parent()
                    .addClass("active");
            }
        });

        $("#close-sidebar").click(function () {
            $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function () {
            $(".page-wrapper").addClass("toggled");
        });

    });
</script>
</body>
</html>
