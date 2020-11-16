
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | FixMaster.ng - We Fix, You Relax!</title>
    <meta name="Author" content="Anthony Joboy (Lagos, Nigeria)" />
    <meta name="Telephone" content="Tel: +234 903 554 7107" />
    <meta name="description" content="FixMaster is your best trusted one-call solution for a wide range of home maintenance, servicing and repair needs. Our well-trained & certified uniformed technicians are fully insured professionals with robust experience to provide home services to fully meet your needs with singular objective to make you totally relax while your repair requests are professionally handled." />
    <meta name="keywords" content="Home-fix, Home-improvement, Home-repairs, Cleaning-services, Modern" />
    <meta name="email" content="info@FixMaster.ng" />
    <meta name="website" content="https://FixMaster.ng" />
    <meta name="Version" content="v0.0.1" />

    <link rel="icon" href="{{ asset('assets/images/home-fix-logo.png') }}" type="image/png" sizes="16x16">
    <!-- Bootstrap -->
    <link href="{{ asset('assets/client/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="{{ asset('assets/client/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Main Css -->
    <link href="{{ asset('assets/client/css/style.css') }}" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="{{ asset('assets/client/css/colors/default.css') }}" rel="stylesheet" id="color-opt">

</head>

<body>
    <!-- Loader -->
    <!-- <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div> -->
    <!-- Loader -->
    
    <!-- Navbar STart -->
<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <div>
            <a class="logo" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/home-fix-logo.png') }}" class="l-light" height="70" alt="FixMaster dark logo">
                <img src="{{ asset('assets/images/home-fix-logo.png') }}" class="l-dark" height="70" alt="FixMaster light">
            </a>
        </div>                 
        
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->   
            <ul class="navigation-menu nav-light">
            <li class="{{ Route::currentRouteNamed('client.home') ? 'active' : '' }}"><a href="{{ route('client.home') }}">Home</a></li>
               
                <li class="has-submenu {{ Route::currentRouteNamed('client.messages', 'client.services', 'client.requests', 'client.request_details', 'client.request_invoice', 'client.messages', 'client.settings', 'client.service_quote', 'client.payments', 'client.wallet', 'client.technician_profile') ? 'active' : '' }}">
                    <a href="javascript:void(0)">Components</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li class="{{ Route::currentRouteNamed('client.services', 'client.service_quote') ? 'active' : '' }}"><a href="{{ route('client.services') }}">Book a Service</a></li>

                        <li class="{{ Route::currentRouteNamed('client.wallet') ? 'active' : '' }}"><a href="{{ route('client.wallet') }}">E-Wallet</a></li>

                        <li class="{{ Route::currentRouteNamed('client.requests', 'client.request_details', 'client.request_invoice', 'client.technician_profile') ? 'active' : '' }}"><a href="{{ route('client.requests') }}">Requests</a></li>

                        <li class="{{ Route::currentRouteNamed('client.payments') ? 'active' : '' }}"><a href="{{ route('client.payments') }}">Payments</a></li>
                        
                        <li class="{{ Route::currentRouteNamed('client.messages') ? 'active' : '' }}"><a href="{{ route('client.messages') }}">Messages</a></li>

                        <li class="{{ Route::currentRouteNamed('client.settings') ? 'active' : '' }}"><a href="{{ route('client.settings') }}">Settings</a></li>
                    </ul>
                </li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->
