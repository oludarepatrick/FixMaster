
{{-- <script type="text/javascript" src="{{ asset('assets/login-signup-css/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/other-css-js/toast.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/other-css-js/toast.css') }}"/> --}}

{{-- Primary Alert --}}
@if(Session::has('primary'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Processing!</strong> {{ Session::get('primary') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif



{{-- Secondary Alert --}}
@if(Session::has('secondary'))
<div class="alert alert-secondary alert-dismissible fade show" role="alert">
  <strong>Almost there!</strong> {{ Session::get('secondary') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif


{{-- Success Alert --}}
@if($message = Session::get('success'))

<div class="notify top-right do-show" data-notification-status="success">{!! $message !!}</div>
    
  <a href="#" class="button d-none" data-type="bar-top" data-status="success"></a>

@endif

{{-- Custom Alert --}}
@if(Session::has('flash_message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> {{ Session::get('flash_message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif

{{-- Danger Alert --}}
@if(Session::has('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> {{ Session::get('danger') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif

{{-- Warning Alert --}}
@if(Session::has('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Something went wrong!</strong> {{ Session::get('warning') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif

{{-- Informational Alert --}}
@if(Session::has('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Heads Up!</strong> {{ Session::get('info') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif

{{-- Light Alert --}}
@if(Session::has('light'))
<div class="alert alert-light alert-dismissible fade show" role="alert">
  <strong>Heads Up!</strong> {{ Session::get('light') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif

{{-- Dark Alert --}}
@if(Session::has('dark'))
<div class="alert alert-dark alert-dismissible fade show" role="alert">
  <strong>Note to User!</strong> {{ Session::get('dark') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif

{{-- Authentication Alert --}}
@if(Session::has('status'))

  <div class="notify top-right do-show" data-notification-status="success">{{ Session::get('status') }}</div>
      
  <a href="#" class="button d-none" data-type="bar-top" data-status="success"></a>
@endif

{{-- If the page has any error passed to it --}}
@if(count($errors) > 0)

  @foreach($errors->all() as $error)
    {{-- <div class="notify bar-top do-show" data-notification-status="error">{{ $error }}</div> --}}

    <div class="notify top-right do-show" data-notification-status="error">{{ $error }}</div><br>
    
    <a href="#" class="button d-none" data-type="bar-top" data-status="error"></a>

  @endforeach


@endif

@if ($message = Session::get('error'))

  <div class="notify top-right do-show" data-notification-status="error">{{ $message }}</div>
    
  <a href="#" class="button d-none" data-type="bar-top" data-status="error"></a>

@endif

{{-- @if($errors->has('email'))
  <span class="invalid-feedback">
      <strong> {{ $error->('email') }} </strong>      
  </span>
@endif

@if($errors->has('password'))
  <span class="invalid-feedback">
      <strong> {{ $error->first('password') }} </strong>      
  </span>
@endif
 --}}



 {{-- <div class="notify bar-top do-show" data-notification-status="success">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, reprehenderit obcaecati itaque. Officiis libero provident perspiciatis eum fugiat laudantium sequi.</div>

<main>
  <div class="wrapper">
    <h1>CSS-only Notifications Component</h1>

    <p>
      This is a Sass mixin that provides notifications functionality using little-to-none Javascript.<br> It makes use of CSS transitions and animations to display notifications as popups or bars on different locations of the viewport.<br> The best thing
      is that it is fully customizable and easy to use. :)
    </p>

    <nav>
      <a href="#" class="button" data-type="top-left" data-status="success">Top Left</a>
      <a href="#" class="button" data-type="top-right" data-status="warning">Top Right</a>
      <a href="#" class="button" data-type="bottom-right" data-status="error">Bottom Right</a>
      <a href="#" class="button" data-type="bottom-left" data-status="notice">Bottom Left</a>
      <a href="#" class="button" data-type="bar-top" data-status="plain">Top bar</a>
      <a href="#" class="button" data-type="bar-bottom" data-status="plain">Bottom bar</a>
    </nav>
  </div>
</main> --}}