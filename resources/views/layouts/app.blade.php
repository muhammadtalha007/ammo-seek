<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <title>Ammo Seek</title>

    <link rel="stylesheet" href="assets/css/webfonts.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/color.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body itemscope>
<main>
    <header class="style3">
        <div class="lg-ad-sec" style="padding: 0!important;">
            <div class="container">
                <div class="lg-ad-inr">
                    <div class="logo"><a href="{{url('/')}}" title="Logo" itemprop="url"><h4 class="mt-3">Ammo Seek</h4>
                        </a></div>
                    @if(\Illuminate\Support\Facades\Session::get('userId'))
                        <div class=" pull-right" style="margin-top: 7px;">
                            <div class="mnu-srch-sec">
                                <div class="container">
                                    <nav style="margin-left: 9px!important;">
                                        <div>
                                            <ul>
                                                <li class="menu-item-has-children"><a href="#" title=""
                                                                                      itemprop="url">{{\App\User::where('id', \Illuminate\Support\Facades\Session::get('userId'))->first()['name']}}</a>
                                                    <ul>
                                                        <li><a href="{{url('dashboard')}}" title="" itemprop="url">Dashboard</a>
                                                        </li>
{{--                                                        <li><a href="{{url('saved-searches')}}" title="" itemprop="url">Saved--}}
{{--                                                                Searches</a>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a href="{{url('manage-alerts')}}" title="" itemprop="url">Manage--}}
{{--                                                                Alerts</a>--}}
{{--                                                        </li>--}}
                                                        <li><a href="{{url('logout-user')}}" title="" itemprop="url">Logout</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    @else
                        <ul class="pull-right tp-lnks" style="margin-top: 30px">
                            <i class="fa fa-user theme-clr"></i> <a href="{{ url('/login-register-page') }}"
                                                                    title="" itemprop="url">Login</a> |
                            <i class="fa fa-user theme-clr"></i> <a href="{{ url('/login-register-page') }}"
                                                                    title="" itemprop="url">Create An Account</a>
                        </ul>
                    @endif
                </div>
            </div>
        </div><!-- Logo Add Section -->
        <div class="mnu-srch-sec">
            <div class="container">
                <nav>
                    <div>
                        <ul>
                            <li><a href="{{url('/')}}" title="" itemprop="url">HOME</a></li>
                            <li><a href="{{url('about-us')}}" title="" itemprop="url">ABOUT US</a></li>
                            <li><a href="{{url('contact')}}" title="" itemprop="url">CONTACT</a></li>
                            <li><a href="{{url('retailer-reviews')}}" title="" itemprop="url">RETAILER REVIEWS</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div><!-- Menu Search Sec -->
    </header><!-- Header -->
    <div class="res-header">
        <div class="res-header-top">
            <div class="res-top-links">
                <a href="product-details.html" title="" itemprop="url"><i class="fa fa-shopping-basket theme-clr"></i>
                    Shop</a>
                <a href="login-register.html" title="" itemprop="url"><i class="fa fa-sign-in theme-clr"></i> Login</a>
                <a href="login-register.html" title="" itemprop="url"><i class="fa fa-user theme-clr"></i> Sign Up</a>
            </div>
            <div class="res-top-links2">
                <a class="theme-bg" href="become-member.html" title="" itemprop="url">Become A Volunteer</a>
                <a class="blue-bg" href="our-events.html" title="" itemprop="url">Our Events</a>
            </div>
        </div>
        <div class="res-logo-sec">
            <div class="logo"><a href="index-2.html" title="" itemprop="url"><img src="assets/images/logo3.png"
                                                                                  alt="logo3.png" itemprop="image"></a>
            </div>
            <span class="res-menu-btn blue-bg brd-rd5"><i class="fa fa-align-justify"></i></span>
        </div>
        <div class="res-menu">
            <span class="res-menu-close brd-rd5"><i class="fa fa-close"></i></span>
            <ul>
                <li class="menu-item-has-children"><a href="#" title="" itemprop="url">HOME</a>
                    <ul>
                        <li><a href="index-2.html" title="" itemprop="url">Store Homepage</a></li>
                        <li><a href="index2.html" title="" itemprop="url">Club Homepage</a></li>
                        <li><a href="index3.html" title="" itemprop="url">Blog Homepage</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#" title="" itemprop="url">BLOG</a>
                    <ul>
                        <li><a href="our-blog.html" title="" itemprop="url">Our Blog Style 1</a></li>
                        <li><a href="our-blog2.html" title="" itemprop="url">Our Blog Style 2</a></li>
                        <li><a href="blog-list.html" title="" itemprop="url">Blog List</a></li>
                        <li><a href="blog-detail.html" title="" itemprop="url">Blog Detail</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#" title="" itemprop="url">SHOP</a>
                    <ul>
                        <li><a href="our-products.html" title="" itemprop="url">Our Products</a></li>
                        <li><a href="product-details.html" title="" itemprop="url">Product Details</a></li>
                        <li><a href="cart.html" title="" itemprop="url">Product Cart</a></li>
                        <li><a href="checkout.html" title="" itemprop="url">Product Checkout</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#" title="" itemprop="url">EVENTS</a>
                    <ul>
                        <li><a href="our-events.html" title="" itemprop="url">Our Events</a></li>
                        <li><a href="event-detail.html" title="" itemprop="url">Event Details</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#" title="" itemprop="url">PAGES</a>
                    <ul>
                        <li><a href="about-us.html" title="" itemprop="url">About Us</a></li>
                        <li><a href="become-member.html" title="" itemprop="url">Become A Member</a></li>
                        <li><a href="our-services.html" title="" itemprop="url">Our Services</a></li>
                        <li><a href="price-plan.html" title="" itemprop="url">Pricing Plan</a></li>
                        <li><a href="login-register.html" title="" itemprop="url">Login & Register</a></li>
                        <li><a href="404.html" title="" itemprop="url">Error Page</a></li>
                        <li><a href="search-found.html" title="" itemprop="url">Search Found</a></li>
                        <li><a href="search-not-found.html" title="" itemprop="url">Search Not Found</a></li>
                    </ul>
                </li>
                <li><a href="contact.html" title="" itemprop="url">CONTACT</a></li>
            </ul>
        </div>
    </div><!-- Responsive Header -->
    @yield('content')
    <footer>
        <div class="blue-bg gap">
            <div class="container">
                <div class="footer-data style2 text-center remove-ext6">
                    <div class="row">
                        <div class="col-md-4 col-sm-2 col-lg-4"></div>
                        <div class="col-md-4 col-sm-8 col-lg-4">
                            <div class="widget about-widget">
                                <div class="logo"><a  title="" itemprop="url"><h1
                                            style="color: white" class="mt-3">Ammo Seek</h1></a></div>
                                <p itemprop="description">Appreciate our broad services of Ammo Seek Searches</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-2 col-lg-4"></div>
                        <div class="col-md-2 col-sm-12 col-lg-2"></div>
                        <div class="col-md-8 col-sm-12 col-lg-8">
                            <div class="widget">
                                <div class="cnt-inf-lst style2 text-left">
                                    <div class="cnt-inf-inr">
                                        <i class="fa fa-envelope-o theme-clr"></i>
                                        <strong>EMAIL ADDRESS</strong>
                                        <a href="#" title="" itemprop="url">user@domainname.com</a>
                                        <a href="#" title="" itemprop="url">name@domain.com</a>
                                    </div>
                                    <div class="cnt-inf-inr">
                                        <i class="fa fa-phone theme-clr"></i>
                                        <strong>PHONE NO</strong>
                                        <span>+(123) 456 7890</span>
                                        <span>+(123) 456 7890</span>
                                    </div>
                                    <div class="cnt-inf-inr">
                                        <i class="fa fa-map-marker theme-clr"></i>
                                        <strong>LOCATION</strong>
                                        <span>123 New York E Block Street 2101 USA</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                <div class="bottom-bar2 text-center">--}}
                {{--                    <p itemprop="description">Copyright 2019. Design by <a class="theme-clr"--}}
                {{--                                                                           href="https://themeforest.net/user/theme-ink/portfolio"--}}
                {{--                                                                           title="Theme-Ink" itemprop="url"--}}
                {{--                                                                           target="_blank">Theme-Ink</a></p>--}}
                {{--                </div>--}}
            </div>
        </div>
    </footer>
</main><!-- Main Wrapper -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/plugins.min.js"></script>
<script src="assets/js/custom-scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</body>

</html>
