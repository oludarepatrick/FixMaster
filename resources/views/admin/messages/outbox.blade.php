@extends('layouts.dashboard')
@section('title', 'Messages')
@include('layouts.partials._messages')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/dashforge.mail.css') }}">

<div class="mail-wrapper ml-2">
  <div class="mail-sidebar">
    <div class="mail-sidebar-body">
    </div><!-- mail-sidebar-body -->
  </div><!-- mail-sidebar -->

  <div class="mail-group">
    <div class="mail-group-header">
      <i data-feather="search"></i>
      <div class="search-form">
        <input type="search" class="form-control" placeholder="Search mail">
      </div><!-- search-form -->
    </div><!-- mail-group-header -->
    <div class="mail-group-body">
      <div class="pd-y-15 pd-x-20 d-flex justify-content-between align-items-center">
        <h6 class="tx-uppercase tx-semibold mg-b-0">Inbox</h6>
        <div class="dropdown tx-13">
          <span class="tx-color-03">Sort:</span> <a href="" class="dropdown-link link-02">Date</a>
        </div><!-- dropdown -->
      </div>
      @foreach ($messages as $message => $values)
      <label class="mail-group-label">{{ $message }}</label>
        <ul class="list-unstyled media-list mg-b-0">
          @foreach ($values as $value) 
          <li class="media @if($value->is_read == '0') unread @endif" data-url="{{ route('admin.outbox_message_details', $value->id) }}">
            @if($value->sender_id == '4' || $value->userReceivedMessage->designation == '[SUPER_ADMIN_ROLE]' || $value->userReceivedMessage->designation == '[ADMIN_ROLE]')
              <div class="avatar"><img src="{{ asset('assets/images/home-fix-logo-coloredd.png') }}" class="rounded-circle" alt=""></div>
            @elseif($value->userReceivedMessage->designation == '[CSE_ROLE]')
                @if(!empty($value->userReceivedMessage->cse->avatar) && file_exists(public_path().'/assets/cse-technician-images/'.$value->userReceivedMessage->cse->avatar))
                <div class="avatar"><img src="{{ asset('assets/cse-technician-images/'.$value->userReceivedMessage->cse->avatar) }}" class="rounded-circle" alt="" /></div>
                @else
                    @if($value->userReceivedMessage->cse->gender == 'Male')
                        <div class="avatar"><img src="{{ asset('assets/images/default-male-avatar.png') }}" alt="Default male profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @else
                        <div class="avatar"><img src="{{ asset('assets/images/default-female-avatar.png') }}" alt="Default female profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @endif
                @endif
            @elseif($value->userReceivedMessage->designation == '[TECHNICIAN_ROLE]')
                @if(!empty($value->userReceivedMessage->technician->avatar) && file_exists(public_path().'/assets/cse-technician-images/'.$value->userReceivedMessage->technician->avatar))
                <div class="avatar"><img src="{{ asset('assets/cse-technician-images/'.$value->userReceivedMessage->technician->avatar) }}" class="rounded-circle" alt="" /></div>
                @else
                    @if($value->userReceivedMessage->technician->gender == 'Male')
                        <div class="avatar"><img src="{{ asset('assets/images/default-male-avatar.png') }}" alt="Default male profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @else
                        <div class="avatar"><img src="{{ asset('assets/images/default-female-avatar.png') }}" alt="Default female profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @endif
                @endif
            @elseif($value->userReceivedMessage->designation == '[CLIENT_ROLE]')
                @if(!empty($value->userReceivedMessage->client->avatar) && file_exists(public_path().'/assets/client-avatars/'.$value->userReceivedMessage->client->avatar))
                <div class="avatar"><img src="{{ asset('assets/client-avatars/'.$value->userReceivedMessage->client->avatar) }}" class="rounded-circle" alt="" /></div>
                @else
                    @if($value->userReceivedMessage->client->gender == 'Male')
                        <div class="avatar"><img src="{{ asset('assets/images/default-male-avatar.png') }}" alt="Default male profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @else
                        <div class="avatar"><img src="{{ asset('assets/images/default-female-avatar.png') }}" alt="Default female profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @endif
                @endif
            @endif
            {{-- <div class="avatar"><img src="../https://via.placeholder.com/350" class="rounded-circle" alt=""></div> --}}
            <div class="media-body mg-l-15">
              <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                <span class="tx-12">{{ $value->userReceivedMessage->fullName->name }}</span>
                <span class="tx-11">{{ Carbon\Carbon::parse($value->created_at, 'UTC')->isoFormat('h:mma') }}</span>
              </div>
              <h6 class="tx-13">{{ $value->subject }}</h6>
              <p class="tx-12 tx-color-03 mg-b-0">{!! strip_tags(substr($value->body, 0, 100)) !!}...</p>
            </div><!-- media-body -->
          </li>
          @endforeach
        </ul>
      @endforeach
    </div><!-- mail-group-body -->
  </div><!-- mail-group -->

  <div class="mail-content" id="mail-content">
    <!-- Message body displays here -->
    <div id="spinner-icon"></div>
  </div><!-- mail-content -->
</div><!-- mail-wrapper -->

  @push('scripts')

  <script src="{{ asset('assets/dashboard/assets/js/dashforge.mail.js') }}"></script>

  <script>
    $(document).ready(function (){
      $(document).on('click', '.mail-group-body .media', function(){
        // e.preventDefault();
        let route = $(this).attr('data-url');

        $.ajax({
            url: route,
            beforeSend: function() {
              $("#spinner-icon").html('<div class="d-flex justify-content-center mt-4 mb-4" style="margin-top: 200px !important"><span class="loadingspinner"></span></div>');
            },
            // return the result
            success: function(result) {
                $('#mail-content').html('');
                $('#mail-content').html(result);
                $('.mail-content-header, .mail-content-body').removeClass('d-none');
            },
            complete: function() {
                $("#spinner-icon").hide();
            },
            error: function(jqXHR, testStatus, error) {
                var message = error+ ' occured while trying to retireve message details.';
                var type = 'error';
                displayMessage(message, type);
                $("#spinner-icon").hide();
            },
            timeout: 8000
        });

      });
    });
  </script>

  @endpush
@endsection