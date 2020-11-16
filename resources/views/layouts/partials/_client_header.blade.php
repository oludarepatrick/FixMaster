<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <div>
        {{-- <a class="logo" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/home-fix-logo.png') }}" class="l-dark" height="70" alt="FixMaster dark logo">
                <img src="{{ asset('assets/images/home-fix-logo-new.png') }}" class="l-light" height="70" alt="FixMaster light">
            </a> --}}
            <a class="logo" href="index.html">
                <img src="{{ asset('assets/images/home-fix-logo.png') }}" class="l-dark" height="160" style="margin-top: -38px !important; margin-bottom: -38px !important;" alt="FixMaster logo">
            <img src="{{ asset('assets/images/home-fix-logo-new.png') }}" style="margin-top: -38px !important; margin-bottom: -38px !important;" class="l-light" height="160" alt="FixMaster logo">
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
               
                <li class="has-submenu {{ Route::currentRouteNamed('client.messages', 'client.services', 'client.service_quote', 'client.service_custom', 'client.requests', 'client.request_details', 'client.request_invoice', 'client.messages', 'client.payments', 'client.settings', 'client.wallet', 'client.technician_profile') ? 'active' : '' }}">
                    <a href="javascript:void(0)">Components</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li class="{{ Route::currentRouteNamed('client.services', 'client.service_quote', 'client.service_custom') ? 'active' : '' }}"><a href="{{ route('client.services') }}">Book a Service</a></li>

                        <li class="{{ Route::currentRouteNamed('client.wallet') ? 'active' : '' }}"><a href="{{ route('client.wallet') }}">E-Wallet</a></li>

                        <li class="{{ Route::currentRouteNamed('client.requests', 'client.request_details', 'client.request_invoice', 'client.technician_profile') ? 'active' : '' }}"><a href="{{ route('client.requests') }}">Requests</a></li>

                        <li class="{{ Route::currentRouteNamed('client.payments') ? 'active' : '' }}"><a href="{{ route('client.payments') }}">Payments</a></li>

                        <li class="{{ Route::currentRouteNamed('client.messages') ? 'active' : '' }}"><a href="{{ route('client.messages') }}">Messages</a></li>

                        <li class="{{ Route::currentRouteNamed('client.settings') ? 'active' : '' }}"><a href="{{ route('client.settings') }}">Settings</a></li>

                        <li><a href="{{ route('login') }}">Logout</a></li>
                    </ul>
                </li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->

<!-- Hero Start -->
<section class="bg-profile d-table w-100 bg-primary" style="background: url('{{ asset("assets/images/account/bg.png") }}') center center no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card public-profile border-0 rounded shadow" style="z-index: 1;">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-3 text-md-left text-center">
                                <img src="{{ asset('assets/images/default-male-avatar.png') }}" class="avatar avatar-large rounded-circle shadow d-block mx-auto" alt="">
                            </div><!--end col-->

                            <div class="col-lg-10 col-md-9">
                                <div class="row align-items-end">
                                    <div class="col-md-7 text-md-left text-center mt-4 mt-sm-0">
                                        <h3 class="title mb-0">Femi Joseph</h3>
                                        <small class="text-muted h6 mr-2">Accountant</small>
                                        {{-- <ul class="list-inline mb-0 mt-3">
                                            <li class="list-inline-item mr-2"><a href="javascript:void(0)" class="text-muted" title="Instagram"><i data-feather="instagram" class="fea icon-sm mr-2"></i>Femi_joseph</a></li>
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted" title="Linkedin"><i data-feather="linkedin" class="fea icon-sm mr-2"></i>Femi Joseph</a></li>
                                        </ul> --}}
                                    </div><!--end col-->
                                    <div class="col-md-5 text-md-right text-center">
                                        <ul class="list-unstyled social-icon social mb-0 mt-4">
                                            <li class="list-inline-item"><a href="{{ route('client.wallet') }}" class="rounded" data-toggle="tooltip" data-placement="bottom" title="E-Wallet"><i data-feather="credit-card" class="fea icon-sm fea-social"></i></a></li>
                                            <li class="list-inline-item"><a href="{{ route('client.messages') }}" class="rounded" data-toggle="tooltip" data-placement="bottom" title="Messages"><i data-feather="message-circle" class="fea icon-sm fea-social"></i></a></li>
                                            <li class="list-inline-item"><a href="{{ route('client.services') }}" class="rounded" data-toggle="tooltip" data-placement="bottom" title="Book a Service"><i data-feather="layers" class="fea icon-sm fea-social"></i></a></li>
                                            <li class="list-inline-item"><a href="{{ route('client.settings') }}" class="rounded" data-toggle="tooltip" data-placement="bottom" title="Settings"><i data-feather="settings" class="fea icon-sm fea-social"></i></a></li>
                                        </ul><!--end icon-->
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--ed container-->
</section><!--end section-->
<!-- Hero End -->