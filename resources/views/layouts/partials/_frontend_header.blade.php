<style>
.buy-btn-two{
    box-shadow: 0 3px 5px 0 rgba(233, 125, 31, 0.3) !important;
    border-color: #E97D1F !important;
    background-color: #E97D1F !important;
    color: #fff !important;
}
.buy-btn-two:hover{
    box-shadow: 0 3px 5px 0 rgba(233, 125, 31, 0.3) !important;
    border-color: #E97D1F !important;
    background-color: #E97D1F !important;
    color: #fff !important;
}
.btn.btn-light {
    color: #fff !important;
    border: 1px solid #e97d1f !important;
}



</style>

<header id="topnav" class="defaultscroll sticky navbar-dark">
    <div class="container">
        <!-- Logo container-->
        <div>
        <a class="logo" href="{{ route('page.home') }}">
            {{-- <img src="{{ asset('assets/images/home-fix-logo.png') }}" height="70" alt=""> --}}
            {{-- <img src="{{ asset('assets/images/home-fix-logo.png') }}" style="margin-top: -38px !important; margin-bottom: -38px !important;" height="160" alt="FixMaster logo"> --}}
            <img src="{{ asset('assets/images/home-fix-logo-colored.png') }}" style="margin-top: -38px !important; margin-bottom: -38px !important;" height="140" alt="FixMaster logo">
            
            </a>
        </div>
        @if(Route::currentRouteNamed('page.home', 'page.about', 'page.contact', 'page.home', 'page.how_it_works', 'page.why_home_fix', 'page.careers', 'page.faq', 'page.services'))
            <div class="buy-button">
                <a href="{{ route('page.services') }}">
                    <div class="btn btn-primary login-btn-primary">Book a Service</div>
                    <div class="btn btn-light login-btn-light buy-btn-two">Book a Service</div>
                </a>
            </div><!--end login button-->
        @endif
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
            <ul class="navigation-menu">
                <li><a class="{{ Route::currentRouteNamed('page.home') ? 'selected' : '' }}" href="{{ route('page.home') }}">Home</a></li>
                <li><a class="{{ Route::currentRouteNamed('page.about') ? 'selected' : '' }}" href="{{ route('page.about') }}">About Us</a></li>

                {{-- <li><a class="{{ Route::currentRouteNamed('page.how_it_works') ? 'selected' : '' }}" href="{{ route('page.how_it_works') }}">How it works</a></li> --}}

                {{-- <li><a class="{{ Route::currentRouteNamed('page.why_home_fix') ? 'selected' : '' }}" href="{{ route('page.why_home_fix') }}">Why FixMaster?</a></li>  --}}

                {{-- <li><a class="{{ Route::currentRouteNamed('page.careers') ? 'selected' : '' }}" href="{{ route('page.careers') }}">Join Us</a></li> --}}

                {{-- @if(Route::currentRouteNamed('page.services', 'page.services_details'))
                    <li><a class="{{ Route::currentRouteNamed('page.services', 'page.services_details') ? 'selected' : '' }}"  href="{{ route('page.services') }}">Services</a></li>
                @endif --}}
                {{-- <li><a class="{{ Route::currentRouteNamed('page.faq') ? 'selected' : '' }}" href="{{ route('page.faq') }}">FAQ</a></li> --}}

                <li class="has-submenu {{ Route::currentRouteNamed('page.how_it_works', 'page.faq') ? 'selected' : '' }}">
                    <a href="javascript:void(0)">How it works</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a class="{{ Route::currentRouteNamed('page.how_it_works') ? 'selected' : '' }}" href="{{ route('page.how_it_works') }}">How It Works</a></li>
                        <li><a class="{{ Route::currentRouteNamed('page.faq') ? 'selected' : '' }}" href="{{ route('page.faq') }}">FAQ</a></li>
                    </ul>
                </li>
                
                <li><a class="{{ Route::currentRouteNamed('page.contact') ? 'selected' : '' }}" href="{{ route('page.contact') }}">Contact</a></li>

                
                <li class="has-submenu {{ Route::currentRouteNamed('page.careers', 'login', 'register') ? 'selected' : '' }}"">
                    <a href="javascript:void(0)">Get started</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{ route('register') }}">Register</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li class="has-submenu"><a href="javascript:void(0)"> Apply <span class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ route('page.careers') }}">CSE</a></li>
                                {{-- <li><a href="{{ route('page.careers') }}">Franchisee</a></li>
                                <li><a href="{{ route('page.careers') }}">Intern</a></li>
                                <li><a href="{{ route('page.careers') }}">Service Partner</a></li> --}}
                                <li><a href="{{ route('page.careers') }}">Supplier</a></li>
                                {{-- <li><a href="{{ route('page.careers') }}">Trainee</a></li> --}}
                                <li><a href="{{ route('page.careers') }}">Technician</a></li>
                            </ul> 
                        </li>
                    </ul>
                </li>
                
            </ul><!--end navigation menu-->
            
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->