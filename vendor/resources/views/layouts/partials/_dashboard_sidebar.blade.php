<!-- START CSE SIDEBAR MENU -->
@if(Route::currentRouteNamed('cse.home', 'cse.requests', 'cse.requests_ongoing', 'cse.requests_completed', 'cse.requests_cancelled', 'cse.request_details', 'cse.request_ongoing_details', 'cse.request_completed_details', 'cse.payments', 'cse.messages', 'cse.messages_sent', 'cse.view_profile', 'cse.edit_profile', 'cse.technicians', 'cse.technicians_profile', 'cse.location_request'))
<aside class="aside aside-fixed" id="sidebarMenu">
  <div class="aside-header">
      <a href="{{ route('cse.home')}}" class="aside-logo">
      {{-- dash<span>forge</span> --}}
      {{-- <img src="{{ asset('assets/images/home-fix-logo.png') }}" alt="FixMaster Logo" height="160"  style="margin-top: -40px; margin-bottom: -38px;"> --}}
      {{-- <img src="{{ asset('assets/images/home-fix-logo-colored.png') }}" alt="FixMaster Logo" height="120"> --}}

    </a>
    <a href="" class="aside-menu-link">
      <i data-feather="menu"></i>
      <i data-feather="x"></i>
    </a>
  </div>
  <div class="aside-body">
    <div class="aside-loggedin">
      <div class="d-flex align-items-center justify-content-start">
        <a href="" class="avatar"><img src="{{ asset('assets/images/default-male-avatar.png') }}" class="rounded-circle" alt="Male Avatar"></a>
        <div class="aside-alert-link">
        <a href="{{ route('cse.messages') }}" class="new" data-toggle="tooltip" title="You have 2 unread messages"><i data-feather="message-square"></i></a>
          {{-- <a href="" class="new" data-toggle="tooltip" title="You have 4 new notifications"><i data-feather="bell"></i></a> --}}
          <a href="" data-toggle="tooltip" title="Sign out"><i data-feather="log-out"></i></a>
        </div>
      </div>
      <div class="aside-loggedin-user">
        <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
          <h6 class="tx-semibold mg-b-0">Godfrey Diwa</h6>
          <i data-feather="chevron-down"></i>
        </a>
        {{-- <p class="tx-color-03 tx-12 mg-b-0">Ludwig Enterprise (CSE)</p> --}}
        <p class="tx-color-03 tx-12 mg-b-0">CSE</p>
      </div>
      <div class="collapse" id="loggedinMenu">
        <ul class="nav nav-aside mg-b-0">
          {{-- <li class="nav-item"><a href="" class="nav-link"><i data-feather="edit"></i> <span>Edit Profile</span></a></li> --}}
          <li class="nav-item {{ Route::currentRouteNamed('cse.view_profile') ? 'active' : '' }}"><a href="{{ route('cse.view_profile') }}" class="nav-link"><i data-feather="user"></i> <span>View Profile</span></a></li>

          <li class="nav-item {{ Route::currentRouteNamed('cse.edit_profile') ? 'active' : '' }}"><a href="{{ route('cse.edit_profile') }}" class="nav-link"><i data-feather="settings"></i> <span>Account Settings</span></a></li>
        </ul>
      </div>
    </div><!-- aside-loggedin -->
    <ul class="nav nav-aside">
      <li class="nav-label">Components</li>
      <li class="nav-item {{ Route::currentRouteNamed('cse.home') ? 'active' : '' }}"><a href="{{ route('cse.home') }}" class="nav-link"><i data-feather="airplay"></i> <span>Home</span></a></li>
      
      
      <li class="nav-label mg-t-25">Adminstration</li>

      <li class="nav-item {{ Route::currentRouteNamed('cse.location_request') ? 'active show' : '' }}""><a href="{{ route('cse.location_request') }}" class="nav-link"><i data-feather="map-pin"></i> <span>Location Request</span></a></li>


      <li class="nav-item with-sub {{ Route::currentRouteNamed('cse.messages', 'cse.messages_sent') ? 'active show' : '' }}">
        <a href="" class="nav-link"><i data-feather="message-circle"></i> <span>Messages</span></a>
        <ul> 
          <li class="{{ Route::currentRouteNamed('cse.messages') ? 'active' : '' }}"><a href="{{ route('cse.messages') }}">Inbox</a></li>
          <li class="{{ Route::currentRouteNamed('cse.messages_sent') ? 'active' : '' }}"><a href="{{ route('cse.messages_sent') }}">Sent</a></li>
          <li><a href="#cseMessageComposer" data-toggle="modal">Compose</a></li>
        </ul>
      </li>

      <li class="nav-item with-sub {{ Route::currentRouteNamed('cse.requests', 'cse.requests_ongoing', 'cse.requests_completed', 'cse.requests_cancelled', 'cse.request_details', 'cse.request_ongoing_details', 'cse.request_completed_details') ? 'active show' : '' }}">
        <a href="" class="nav-link"><i data-feather="git-pull-request"></i> <span>Requests</span></a>
        <ul>
        <li class="{{ Route::currentRouteNamed('cse.requests', 'cse.request_details') ? 'active' : '' }}"><a href="{{ route('cse.requests') }}">New</a></li>
          <li class="{{ Route::currentRouteNamed('cse.requests_ongoing', 'cse.request_ongoing_details') ? 'active' : '' }}"><a href="{{ route('cse.requests_ongoing') }}">Ongoing</a></li>
          <li class="{{ Route::currentRouteNamed('cse.requests_completed', 'cse.request_completed_details') ? 'active' : '' }}"><a href="{{ route('cse.requests_completed') }}">Completed</a></li>
          <li class="{{ Route::currentRouteNamed('cse.requests_cancelled') ? 'active' : '' }}"><a href="{{ route('cse.requests_cancelled') }}">Cancelled</a></li>
        </ul>
      </li>


      <li class="nav-item {{ Route::currentRouteNamed('cse.payments') ? 'active show' : '' }}"><a href="{{ route('cse.payments') }}" class="nav-link"><i data-feather="credit-card"></i> <span>Payments</span></a></li>

      

      {{-- <li class="nav-item with-sub">
        <a href="" class="nav-link"><i data-feather="credit-card"></i> <span>Payments</span></a>
        <ul>
          <li><a href="#">CSE</a></li>
          <li><a href="#">Technicians</a></li>
        </ul>
      </li> --}}
      
    </ul>
</aside>
@endif
<!-- END CSE SIDEBAR MENU -->

<!-- START TECHINICIAN SIDEBAR MENU -->
@if(Route::currentRouteNamed('technician.home', 'technician.requests', 'technician.request_details', 'technician.payments', 'technician.messages', 'technician.messages_sent', 'technician.view_profile', 'technician.edit_profile', 'technician.location_request'))
<aside class="aside aside-fixed" id="sidebarMenu">
  <div class="aside-header">
      <a href="{{ route('technician.home')}}" class="aside-logo">
      {{-- dash<span>forge</span> --}}
      {{-- <img src="{{ asset('assets/images/home-fix-logo.png') }}" alt="FixMaster Logo"  style="margin-top: -3px; width: 25%"> --}}
      {{-- <img src="{{ asset('assets/images/home-fix-logo-colored.png') }}" alt="FixMaster Logo" height="120"> --}}
    </a>
    <a href="" class="aside-menu-link">
      <i data-feather="menu"></i>
      <i data-feather="x"></i>
    </a>
  </div>
  <div class="aside-body">
    <div class="aside-loggedin">
      <div class="d-flex align-items-center justify-content-start">
        <a href="" class="avatar"><img src="{{ asset('assets/images/default-male-avatar.png') }}" class="rounded-circle" alt="Male Avatar"></a>
        <div class="aside-alert-link">
        <a href="{{ route('technician.messages') }}" class="new" data-toggle="tooltip" title="You have 2 unread messages"><i data-feather="message-square"></i></a>
          {{-- <a href="" class="new" data-toggle="tooltip" title="You have 4 new notifications"><i data-feather="bell"></i></a> --}}
          <a href="" data-toggle="tooltip" title="Sign out"><i data-feather="log-out"></i></a>
        </div>
      </div>
      <div class="aside-loggedin-user">
        <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
          <h6 class="tx-semibold mg-b-0">Andrew Nwankwo</h6>
          <i data-feather="chevron-down"></i>
        </a>
        {{-- <p class="tx-color-03 tx-12 mg-b-0">Ludwig Enterprise (TECHNICIAN)</p> --}}
        <p class="tx-color-03 tx-12 mg-b-0">Technician</p>
      </div>
      <div class="collapse" id="loggedinMenu">
        <ul class="nav nav-aside mg-b-0">
          {{-- <li class="nav-item"><a href="" class="nav-link"><i data-feather="edit"></i> <span>Edit Profile</span></a></li> --}}
          <li class="nav-item {{ Route::currentRouteNamed('technician.view_profile') ? 'active' : '' }}"><a href="{{ route('technician.view_profile') }}" class="nav-link"><i data-feather="user"></i> <span>View Profile</span></a></li>

          <li class="nav-item {{ Route::currentRouteNamed('technician.edit_profile') ? 'active' : '' }}"><a href="{{ route('technician.edit_profile') }}" class="nav-link"><i data-feather="settings"></i> <span>Account Settings</span></a></li>
        </ul>
      </div>
    </div><!-- aside-loggedin -->
    <ul class="nav nav-aside">
      <li class="nav-label">Components</li>
      <li class="nav-item {{ Route::currentRouteNamed('technician.home') ? 'active' : '' }}"><a href="{{ route('technician.home') }}" class="nav-link"><i data-feather="airplay"></i> <span>Home</span></a></li>
      
      
      <li class="nav-label mg-t-25">Adminstration</li>

      {{-- <li class="nav-item with-sub {{ Route::currentRouteNamed('technician.messages', 'technician.messages_sent') ? 'active show' : '' }}">
        <a href="" class="nav-link"><i data-feather="message-circle"></i> <span>Messages</span></a>
        <ul> 
          <li class="{{ Route::currentRouteNamed('technician.messages') ? 'active' : '' }}"><a href="{{ route('technician.messages') }}">Inbox</a></li>
          <li class="{{ Route::currentRouteNamed('technician.messages_sent') ? 'active' : '' }}"><a href="{{ route('technician.messages_sent') }}">Sent</a></li>
          <li><a href="#cseMessageComposer" data-toggle="modal">Compose</a></li>
        </ul>
      </li> --}}
      <li class="nav-item {{ Route::currentRouteNamed('technician.location_request') ? 'active show' : '' }}""><a href="{{ route('technician.location_request') }}" class="nav-link"><i data-feather="map-pin"></i> <span>Location Request</span></a></li>

      <li class="nav-item {{ Route::currentRouteNamed('technician.requests', 'technician.request_details') ? 'active show' : '' }}"><a href="{{ route('technician.requests') }}" class="nav-link"><i data-feather="git-pull-request"></i> <span>Requests</span></a></li>


      <li class="nav-item {{ Route::currentRouteNamed('technician.payments') ? 'active show' : '' }}"><a href="{{ route('technician.payments') }}" class="nav-link"><i data-feather="credit-card"></i> <span>Payments</span></a></li>

    </ul>
  </div>
</aside>
@endif
<!-- END TECHINICIAN SIDEBAR MENU -->
{{-- {{ dd($user->adminPermissions) }} --}}

<!-- START ADMIN SIDEBAR MENU -->
{{-- @if(Route::currentRouteNamed('admin.home', 'admin.requests', 'admin.requests_ongoing', 'admin.requests_completed', 'admin.requests_cancelled', 'admin.request_details', 'admin.request_ongoing_details', 'admin.request_completed_details', 'admin.payments', 'admin.messages', 'admin.messages_sent', 'admin.view_profile', 'admin.edit_profile', 'admin.technicians', 'admin.technicians_profile', 'admin.add_admin', 'admin.list_admin', 'admin.summary_admin', 'admin.edit_admin', 'admin.activity_log_admin', 'admin.add_cse', 'admin.list_cse', 'admin.summary_cse', 'admin.edit_cse', 'admin.activity_log_cse', 'admin.list_client', 'admin.summary_client', 'admin.utility_reset_password', 'admin.utility_service_request_status', 'admin.utility_verify_payment', 'admin.add_technician', 'admin.list_technician', 'admin.summary_technician', 'admin.edit_technician', 'admin.activity_log_technician', 'admin.add_franchise', 'admin.edit_franchise', 'admin.list_franchise', 'admin.tools_request', 'admin.tools_inventory', 'admin.rfq', 'admin.services', 'admin.add_category', 'admin.edit_category', 'admin.list_category', 'admin.review_category', 'admin.disbursed_payments', 'admin.received_payments', 'admin.category_ratings', 'admin.job_ratings', 'admin.location_request', 'admin.add_payment_gateway', 'admin.list_payment_gateway', 'admin.edit_payment_gateway')) --}}
{{-- {{ dd($user) }} --}}
@if($user->designation === '[SUPER_ADMIN_ROLE]' || $user->designation === '[ADMIN_ROLE]')
<aside class="aside aside-fixed" id="sidebarMenu">
  <div class="aside-header">
      <a href="{{ route('admin.home')}}" class="aside-logo">
      {{-- dash<span>forge</span> --}}
      {{-- <img src="{{ asset('assets/images/home-fix-logo.png') }}" alt="FixMaster Logo" height="160"  style="margin-top: -40px; margin-bottom: -38px;"> --}}
      {{-- <img src="{{ asset('assets/images/home-fix-logo-colored.png') }}" alt="FixMaster Logo" height="120"> --}}

    </a>
    <a href="" class="aside-menu-link">
      <i data-feather="menu"></i>
      <i data-feather="x"></i>
    </a>
  </div>
  <div class="aside-body">
    <div class="aside-loggedin">
      <div class="d-flex align-items-center justify-content-start">
        <a href="" class="avatar"><img src="{{ asset('assets/images/home-fix-logo-coloredd.png') }}" class="rounded-circle" alt="Male Avatar"></a>
        <div class="aside-alert-link">
        <a href="{{ route('admin.messages') }}" class="new" data-toggle="tooltip" title="You have 2 unread messages"><i data-feather="message-square"></i></a>
          {{-- <a href="" class="new" data-toggle="tooltip" title="You have 4 new notifications"><i data-feather="bell"></i></a> --}}
        <a href="{{ route('logout') }}" data-toggle="tooltip" title="Sign out"><i data-feather="log-out"></i></a>
        </div>
      </div>
      <div class="aside-loggedin-user">
        <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
        <h6 class="tx-semibold mg-b-0"> {{ $user->fullName->name }}</h6>
          <i data-feather="chevron-down"></i>
        </a>
        <p class="tx-color-03 tx-12 mg-b-0">@if($user->designation === '[SUPER_ADMIN_ROLE]') Super Adminstrator @else Adminstrator @endif</p>
      </div>
      <div class="collapse" id="loggedinMenu">
        <ul class="nav nav-aside mg-b-0">
          {{-- <li class="nav-item"><a href="" class="nav-link"><i data-feather="edit"></i> <span>Edit Profile</span></a></li> --}}
          {{-- <li class="nav-item {{ Route::currentRouteNamed('admin.view_profile') ? 'active' : '' }}"><a href="{{ route('admin.view_profile') }}" class="nav-link"><i data-feather="user"></i> <span>View Profile</span></a></li> --}}

          <li class="nav-item {{ Route::currentRouteNamed('admin.edit_profile') ? 'active' : '' }}"><a href="{{ route('admin.edit_profile') }}" class="nav-link"><i data-feather="settings"></i> <span>Account Settings</span></a></li>
        </ul>
      </div>
    </div><!-- aside-loggedin -->
    <ul class="nav nav-aside">
      <li class="nav-label">Components</li>
      <li class="nav-item {{ Route::currentRouteNamed('admin.home') ? 'active' : '' }}"><a href="{{ route('admin.home') }}" class="nav-link"><i data-feather="airplay"></i> <span>Home</span></a></li>
      
      
      <li class="nav-label mg-t-25">Adminstration</li>

      {{-- <li class="nav-item with-sub {{ Route::currentRouteNamed('admin.add_franchise', 'admin.edit_franchise', 'admin.list_franchise') ? 'active show' : '' }}">
        <a href="" class="nav-link"><i data-feather="trello"></i> <span>Franchise</span></a>
        <ul>
        <li class="{{ Route::currentRouteNamed('admin.add_franchise') ? 'active' : '' }}"><a href="{{ route('admin.add_franchise') }}">Add</a></li>
        <li class="{{ Route::currentRouteNamed('admin.edit_franchise', 'admin.list_franchise') ? 'active' : '' }}"><a href="{{ route('admin.list_franchise') }}">List</a></li>
        </ul>
      </li> --}}

      @if(Auth::user()->designation == '[SUPER_ADMIN_ROLE]')
        <li class="nav-item {{ Route::currentRouteNamed('admin.activity_log') ? 'active show' : '' }}"><a href="{{ route('admin.activity_log') }}" class="nav-link"><i data-feather="activity"></i> <span>Activity Log</span></a></li>
      @endif

      @if($user->adminPermissions->location_request == 1)
        <li class="nav-item {{ Route::currentRouteNamed('admin.location_request') ? 'active show' : '' }}"><a href="{{ route('admin.location_request') }}" class="nav-link"><i data-feather="map-pin"></i> <span>Location Request</span></a></li>
      @endif

      <li class="nav-item with-sub {{ Route::currentRouteNamed('admin.messages', 'admin.messages_sent') ? 'active show' : '' }}">
        <a href="" class="nav-link"><i data-feather="message-circle"></i> <span>Messages</span></a>
        <ul> 
          <li class="{{ Route::currentRouteNamed('admin.messages') ? 'active' : '' }}"><a href="{{ route('admin.messages') }}">Inbox</a></li>
          <li class="{{ Route::currentRouteNamed('admin.messages_sent') ? 'active' : '' }}"><a href="{{ route('admin.messages_sent') }}">Sent</a></li>
          <li><a href="#admin.essageComposer" data-toggle="modal">Compose</a></li>
        </ul>
      </li>
      
      @if($user->adminPermissions->payments == 1)
        <li class="nav-item with-sub {{ Route::currentRouteNamed('admin.disbursed_payments', 'admin.received_payments') ? 'active show' : '' }}">
          <a href="" class="nav-link"><i data-feather="credit-card"></i> <span>Payments</span></a>
          <ul> 
            <li class="{{ Route::currentRouteNamed('admin.disbursed_payments') ? 'active' : '' }}"><a href="{{ route('admin.disbursed_payments') }}">Disbursed</a></li>
            <li class="{{ Route::currentRouteNamed('admin.received_payments') ? 'active' : '' }}"><a href="{{ route('admin.received_payments') }}">Received</a></li>
          </ul>
        </li>
      @endif
      
      @if(Auth::id() == 1)
        <li class="nav-item with-sub {{ Route::currentRouteNamed('admin.add_payment_gateway', 'admin.list_payment_gateway', 'admin.edit_payment_gateway') ? 'active show' : '' }}">
          <a href="" class="nav-link"><i data-feather="credit-card"></i> <span>Payment Gateway</span></a>
          <ul> 
            <li class="{{ Route::currentRouteNamed('admin.add_payment_gateway') ? 'active' : '' }}"><a href="{{ route('admin.add_payment_gateway') }}">Add</a></li>
            <li class="{{ Route::currentRouteNamed('admin.list_payment_gateway', 'admin.edit_payment_gateway') ? 'active' : '' }}"><a href="{{ route('admin.list_payment_gateway') }}">List</a></li>
          </ul>
        </li>
      @endif

      @if($user->adminPermissions->ratings == 1)
        <li class="nav-item with-sub {{ Route::currentRouteNamed('admin.category_ratings', 'admin.job_ratings') ? 'active show' : '' }}">
          <a href="" class="nav-link"><i data-feather="star"></i> <span>Rating</span></a>
          <ul> 
            <li class="{{ Route::currentRouteNamed('admin.category_ratings') ? 'active' : '' }}"><a href="{{ route('admin.category_ratings') }}">Category Rating</a></li>
            <li class="{{ Route::currentRouteNamed('admin.job_ratings') ? 'active' : '' }}"><a href="{{ route('admin.job_ratings') }}">Job Rating</a></li>
          </ul>
        </li>
      @endif

      @if($user->adminPermissions->requests == 1)
        <li class="nav-item with-sub {{ Route::currentRouteNamed('admin.requests', 'admin.requests_ongoing', 'admin.requests_completed', 'admin.requests_cancelled', 'admin.request_details', 'admin.request_ongoing_details', 'admin.request_completed_details') ? 'active show' : '' }}">
          <a href="" class="nav-link"><i data-feather="git-pull-request"></i> <span>Requests</span></a>
          <ul>
            <li class="{{ Route::currentRouteNamed('admin.requests', 'admin.request_details') ? 'active' : '' }}"><a href="{{ route('admin.requests') }}">New</a></li>
            <li class="{{ Route::currentRouteNamed('admin.requests_ongoing', 'admin.request_ongoing_details') ? 'active' : '' }}"><a href="{{ route('admin.requests_ongoing') }}">Ongoing</a></li>
            <li class="{{ Route::currentRouteNamed('admin.requests_completed', 'admin.request_completed_details') ? 'active' : '' }}"><a href="{{ route('admin.requests_completed') }}">Completed</a></li>
            <li class="{{ Route::currentRouteNamed('admin.requests_cancelled') ? 'active' : '' }}"><a href="{{ route('admin.requests_cancelled') }}">Cancelled</a></li>
          </ul>
        </li>
      @endif

      @if($user->adminPermissions->rfqs == 1)
        <li class="nav-item {{ Route::currentRouteNamed('admin.rfq') ? 'active show' : '' }}"><a href="{{ route('admin.rfq') }}" class="nav-link"><i data-feather="file-text"></i> <span>RFQ's</span></a></li>
      @endif

      @if($user->adminPermissions->service_categories == 1)
        <li class="nav-item with-sub {{ Route::currentRouteNamed('admin.services', 'admin.add_category', 'admin.edit_category', 'admin.list_category', 'admin.review_category') ? 'active show' : '' }}">
          <a href="" class="nav-link"><i data-feather="aperture"></i> <span>Service & Category</span></a>
          <ul>
            <li class="{{ Route::currentRouteNamed('admin.add_category') ? 'active' : '' }}"><a href="{{ route('admin.add_category') }}">Add Category</a></li>
            <li class="{{ Route::currentRouteNamed('admin.edit_category', 'admin.list_category') ? 'active' : '' }}"><a href="{{ route('admin.list_category') }}">Category List</a></li>
            <li class="{{ Route::currentRouteNamed('admin.review_category') ? 'active' : '' }}"><a href="{{ route('admin.review_category') }}">Category Review</a></li>
            <li class="{{ Route::currentRouteNamed('admin.services') ? 'active' : '' }}"><a href="{{ route('admin.services') }}">Services</a></li>
            </ul>
        </li>
      @endif

      @if($user->adminPermissions->tools == 1)
        <li class="nav-item with-sub {{ Route::currentRouteNamed('admin.tools_request', 'admin.tools_inventory') ? 'active show' : '' }}">
          <a href="" class="nav-link"><i data-feather="box"></i> <span>Tools</span></a>
          <ul>
            <li class="{{ Route::currentRouteNamed('admin.tools_inventory') ? 'active' : '' }}"><a href="{{ route('admin.tools_inventory') }}">Inventory</a></li>
            <li class="{{ Route::currentRouteNamed('admin.tools_request') ? 'active' : '' }}"><a href="{{ route('admin.tools_request') }}">Requests</a></li>
          </ul>
        </li>
     @endif

     @if($user->adminPermissions->utilities == 1)
      <li class="nav-item with-sub {{ Route::currentRouteNamed('admin.utility_reset_password', 'admin.utility_service_request_status', 'admin.utility_verify_payment') ? 'active show' : '' }}">
        <a href="" class="nav-link"><i data-feather="sliders"></i> <span>Utilities</span></a>
        <ul>
          <li class="{{ Route::currentRouteNamed('admin.utility_service_request_status') ? 'active' : '' }}"><a href="{{ route('admin.utility_service_request_status') }}">Service Request Status</a></li>
          <li><a href="#">Referral</a></li>
          <li class="{{ Route::currentRouteNamed('admin.utility_reset_password') ? 'active' : '' }}"><a href="{{ route('admin.utility_reset_password') }}">Reset Password</a></li>
          <li class="{{ Route::currentRouteNamed('admin.utility_verify_payment') ? 'active' : '' }}"><a href="{{ route('admin.utility_verify_payment') }}">Verify Payment</a></li>
        </ul>
      </li>
     @endif
      
      <li class="nav-label mg-t-25">Users</li>
      @if($user->adminPermissions->administrators == 1)
      <li class="nav-item with-sub {{ Route::currentRouteNamed('admin.add_admin', 'admin.list_admin', 'admin.summary_admin', 'admin.edit_admin', 'admin.activity_log_admin') ? 'active show' : '' }}">
        <a href="" class="nav-link"><i data-feather="user-check"></i> <span>Adminstrators</span></a>
        <ul> 
          <li class="{{ Route::currentRouteNamed('admin.add_admin') ? 'active' : '' }}"><a href="{{ route('admin.add_admin') }}">Add</a></li>
          <li class="{{ Route::currentRouteNamed('admin.list_admin', 'admin.summary_admin', 'admin.edit_admin', 'admin.activity_log_admin') ? 'active' : '' }}"><a href="{{ route('admin.list_admin') }}">List</a></li>
        </ul>
      </li>
      @endif

      @if($user->adminPermissions->clients == 1)
        <li class="nav-item {{ Route::currentRouteNamed('admin.list_client', 'admin.summary_client') ? 'active show' : '' }}"><a href="{{ route('admin.list_client') }}" class="nav-link"><i data-feather="users"></i> <span>Clients</span></a></li>
      @endif

      @if($user->adminPermissions->cses == 1)
        <li class="nav-item with-sub {{ Route::currentRouteNamed('admin.add_cse', 'admin.list_cse', 'admin.summary_cse', 'admin.edit_cse', 'admin.activity_log_cse') ? 'active show' : '' }}">
          <a href="" class="nav-link"><i data-feather="wind"></i> <span>CSE</span></a>
          <ul> 
            <li class="{{ Route::currentRouteNamed('admin.add_cse') ? 'active' : '' }}"><a href="{{ route('admin.add_cse') }}">Add</a></li>
            <li class="{{ Route::currentRouteNamed('admin.list_cse', 'admin.summary_cse', 'admin.edit_cse', 'admin.activity_log_cse') ? 'active' : '' }}"><a href="{{ route('admin.list_cse') }}">List</a></li>
          </ul>
        </li>
      @endif

      @if($user->adminPermissions->technicians == 1)
        <li class="nav-item with-sub {{ Route::currentRouteNamed('admin.add_technician', 'admin.list_technician', 'admin.summary_technician', 'admin.edit_technician', 'admin.activity_log_technician') ? 'active show' : '' }}">
          <a href="" class="nav-link"><i data-feather="zap"></i> <span>Technicians</span></a>
          <ul> 
            <li class="{{ Route::currentRouteNamed('admin.add_technician') ? 'active' : '' }}"><a href="{{ route('admin.add_technician') }}">Add</a></li>
            <li class="{{ Route::currentRouteNamed('admin.list_technician', 'admin.summary_technician', 'admin.edit_technician', 'admin.activity_log_technician') ? 'active' : '' }}"><a href="{{ route('admin.list_technician') }}">List</a></li>
          </ul>
        </li>
      @endif

    </ul>
</aside>
@endif
<!-- END ADMIN SIDEBAR MENU -->
