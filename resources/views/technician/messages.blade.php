@extends('layouts.dashboard')
@section('title', 'Messages')
@include('layouts.partials._messages')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/dashforge.mail.css') }}">

  <div class="content-body pd-0">
    <div class="mail-wrapper mail-wrapper-tw">
      {{-- <div class="mail-sidebar d-none">
        <div class="mail-sidebar-body">
          
        </div><!-- mail-sidebar-body -->
      </div><!-- mail-sidebar --> --}}

      <div class="ml-3 mail-sidebar mail-group">
        <div class="mail-group-header justify-content-between">
          <h6 class="tx-uppercase tx-semibold mg-b-0">Inbox</h6>
          <div class="dropdown tx-13">
            <span class="tx-color-03">Sort:</span> <a href="" class="dropdown-link link-02">Date</a>
          </div><!-- dropdown -->
        </div><!-- mail-group-header -->
        <div class="mail-group-body">

          <label class="mail-group-label">Today</label>
          <ul class="list-unstyled media-list mg-b-0">
            <li class="media unread">
              <div class="avatar"><span class="avatar-initial rounded-circle bg-indigo">d</span></div>
              <div class="media-body mg-l-15">
                <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                  <span class="tx-12">Olabunmi Akinpelumi</span>
                  <span class="tx-11">1:20pm</span>
                </div>
                <h6 class="tx-13">Just asking questions</h6>
                <p class="tx-12 tx-color-03 mg-b-0"> Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with 'real' content. </p>
              </div><!-- media-body -->
            </li>
            <li class="media">
              <div class="avatar"><img src="{{ asset('assets/images/default-female-avatar.png') }}" class="rounded-circle" alt=""></div>
              <div class="media-body mg-l-15">
                <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                  <span class="tx-12">Favour Essien</span>
                  <span class="tx-11">11:40am</span>
                </div>
                <h6 class="tx-13">30 Seconds Survey to Your Next Job</h6>
                <p class="tx-12 tx-color-03 mg-b-0"> Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with 'real' content. </p>
              </div><!-- media-body -->
            </li>
            <li class="media">
              <div class="avatar"><img src="{{ asset('assets/images/default-male-avatar.png') }}" class="rounded-circle" alt=""></div>
              <div class="media-body mg-l-15">
                <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                  <span class="tx-12">Femi Joseph</span>
                  <span class="tx-11">10:54am</span>
                </div>
                <h6 class="tx-13">Watch, Listen and Play Longer</h6>
                <p class="tx-12 tx-color-03 mg-b-0"> Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with 'real' content. </p>
              </div><!-- media-body -->
            </li>
            <li class="media">
              <div class="avatar"><img src="{{ asset('assets/images/home-fix-logo.png') }}" class="rounded-circle" alt=""></div>
              <div class="media-body mg-l-15">
                <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                  <span class="tx-12">FixMaster</span>
                  <span class="tx-11">09:50am</span>
                </div>
                <h6 class="tx-13">Pre-Order Sale: Mastering CSS</h6>
                <p class="tx-12 tx-color-03 mg-b-0">A Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with 'real' content.</p>
              </div><!-- media-body -->
            </li>
          </ul>
          
        </div><!-- mail-group-body -->
      </div><!-- mail-group -->

      <div class="mail-content">
        <div class="mail-content-header">
          <a href="" id="mailContentClose" class="link-02 d-none d-lg-block d-xl-none mg-r-20"><i data-feather="arrow-left"></i></a>
          <div class="media">
            <div class="avatar avatar-sm"><img src="{{ asset('assets/images/default-female-avatar.png') }}" class="rounded-circle" alt=""></div>
            <div class="media-body mg-l-10">
              <h6 class="mg-b-2 tx-13">Reynante Labares</h6>
              <span class="d-block tx-11 tx-color-03">Today, 11:40am</span>
            </div><!-- media-body -->
          </div><!-- media -->
         
        </div><!-- mail-content-header -->
        <div class="mail-content-body">
          <div class="pd-20 pd-lg-25 pd-xl-30">
            <h5 class="mg-b-30">30 Seconds Survey to Your Next Job</h5>

            <h6 class="tx-semibold mg-b-0">Ms. Katherine Lumaad</h6>
            <span class="tx-color-03">ThemePixels, Inc.</span>
            <p class="tx-color-03">San Francisco, CA, United States</p>

            <p>Greetings!</p>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
            <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. </p>
            <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem.</p>
            <p>
              <span>Sincerely yours,</span><br>
              <strong>Envato Design Team</strong>
            </p>
          </div>
          <div class="pd-20 pd-lg-25 pd-xl-30 pd-t-0-f">
            <div id="editor-container" class="tx-13 tx-lg-14 ht-100">
              Type here to <u>Reply</u> or <u>Forward</u>
            </div>
            <div class="d-flex align-items-center justify-content-between mg-t-10">
              <div id="toolbar-container" class="bd-0-f pd-0-f">
                <span class="ql-formats">
                  <button class="ql-bold"></button>
                  <button class="ql-italic"></button>
                  <button class="ql-underline"></button>
                </span>
                <span class="ql-formats">
                  <button class="ql-link"></button>
                  <button class="ql-image"></button>
                </span>
              </div>
              <button class="btn btn-primary">Reply</button>
            </div>
          </div>
        </div><!-- mail-content-body -->
      </div><!-- mail-content -->
    </div><!-- mail-wrapper -->
  </div>

  @section('scripts')
  <script src="{{ asset('assets/dashboard/lib/quill/quill.min.js') }}"></script>

  <script src="{{ asset('assets/dashboard/assets/js/dashforge.mail.js') }}"></script>
  @endsection
@endsection