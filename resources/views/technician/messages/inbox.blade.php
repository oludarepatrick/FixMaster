@extends('layouts.dashboard')
@section('title', 'Messages')
@include('layouts.partials._messages')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/dashforge.mail.css') }}">

@include('layouts.partials._technician_message_composer')
<div class="mail-wrapper ml-2">
  <div class="mail-sidebar">
    <div class="mail-sidebar-body">
    </div><!-- mail-sidebar-body -->
  </div><!-- mail-sidebar -->

  <div class="mail-group">
    <div class="mail-group-header">
      {{-- <i data-feather="search"></i>
      <div class="search-form">
        <input type="search" class="form-control" placeholder="Search mail">
      </div><!-- search-form --> --}}
      <div class="pd-10">
        <a href="#technicianMessageComposer" data-toggle="modal" class="btn btn-primary btn-block tx-uppercase tx-10 tx-medium tx-sans tx-spacing-4">Compose</a>
      </div>

      
    </div><!-- mail-group-header -->
    <div class="mail-group-body">
      <div class="pd-y-15 pd-x-20 d-flex justify-content-between align-items-center">
        <h6 class="tx-uppercase tx-semibold mg-b-0">Inbox</h6>
        <div class="dropdown tx-13">
          {{-- <span class="tx-color-03">Sort:</span> <a href="" class="dropdown-link link-02">Date</a> --}}
        </div>
      </div>
      @foreach ($messages as $message => $values)
      <label class="mail-group-label">{{ $message }}</label>
        <ul class="list-unstyled media-list mg-b-0">
          @foreach ($values as $value) 
          <li class="media @if($value->is_read == '0') unread @endif" data-url="{{ route('inbox_message_details', $value->id) }}">
            @if($value->sender_id == '4' || $value->userSentMessage->designation == '[SUPER_ADMIN_ROLE]' || $value->userSentMessage->designation == '[ADMIN_ROLE]')
              <div class="avatar"><img src="{{ asset('assets/images/home-fix-logo-coloredd.png') }}" class="rounded-circle" alt=""></div>
            @elseif($value->userSentMessage->designation == '[CSE_ROLE]')
                @if(!empty($value->userSentMessage->cse->avatar) && file_exists(public_path().'/assets/cse-technician-images/'.$value->userSentMessage->cse->avatar))
                <div class="avatar"><img src="{{ asset('assets/cse-technician-images/'.$value->userSentMessage->cse->avatar) }}" class="rounded-circle" alt="" /></div>
                @else
                    @if($value->userSentMessage->cse->gender == 'Male')
                        <div class="avatar"><img src="{{ asset('assets/images/default-male-avatar.png') }}" alt="Default male profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @else
                        <div class="avatar"><img src="{{ asset('assets/images/default-female-avatar.png') }}" alt="Default female profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @endif
                @endif
            @elseif($value->userSentMessage->designation == '[TECHNICIAN_ROLE]')
                @if(!empty($value->userSentMessage->technician->avatar) && file_exists(public_path().'/assets/cse-technician-images/'.$value->userSentMessage->technician->avatar))
                <div class="avatar"><img src="{{ asset('assets/cse-technician-images/'.$value->userSentMessage->technician->avatar) }}" class="rounded-circle" alt="" /></div>
                @else
                    @if($value->userSentMessage->technician->gender == 'Male')
                        <div class="avatar"><img src="{{ asset('assets/images/default-male-avatar.png') }}" alt="Default male profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @else
                        <div class="avatar"><img src="{{ asset('assets/images/default-female-avatar.png') }}" alt="Default female profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @endif
                @endif
            @elseif($value->userSentMessage->designation == '[CLIENT_ROLE]')
                @if(!empty($value->userSentMessage->client->avatar) && file_exists(public_path().'/assets/client-avatars/'.$value->userSentMessage->client->avatar))
                <div class="avatar"><img src="{{ asset('assets/client-avatars/'.$value->userSentMessage->client->avatar) }}" class="rounded-circle" alt="" /></div>
                @else
                    @if($value->userSentMessage->client->gender == 'Male')
                        <div class="avatar"><img src="{{ asset('assets/images/default-male-avatar.png') }}" alt="Default male profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @else
                        <div class="avatar"><img src="{{ asset('assets/images/default-female-avatar.png') }}" alt="Default female profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @endif
                @endif
            @endif
            {{-- <div class="avatar"><img src="../https://via.placeholder.com/350" class="rounded-circle" alt=""></div> --}}
            <div class="media-body mg-l-15">
              <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                <span class="tx-12">{{ $value->userSentMessage->fullName->name }}</span>
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

{{-- @include('admin.messages._admin_message_composer') --}}

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

              if(window.matchMedia('(max-width: 1199px)').matches) {
                $('body').addClass('mail-content-show');
              }

              if(window.matchMedia('(min-width: 768px)').matches) {
                $('#mailSidebar').removeClass('d-md-none');
                $('#mainMenuOpen').removeClass('d-md-flex');
              }
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

    //Get list of users by a particular designation
    $('#user-type').on('change',function () {
        let user = $(this).find('option:selected').val();
        let route = $(this).find('option:selected').data('url');

        $.ajaxSetup({
            headers: {
                'X-CSRF_TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: route,
            beforeSend: function() {
                $("#spinner-icon-admin").html('<div class="d-flex justify-content-center mt-4 mb-4" style="margin-left: 40px !important"><span class="loadingspinner"></span></div>');
            },
            // return the result
            success: function(result) {

                // $('.admin-list').removeClass('d-none');
                $('#admin-list').html('');
                $('#admin-list').html(result);
            },
            complete: function() {
                $("#spinner-icon").hide();
            },
            error: function(jqXHR, testStatus, error) {
                var message = error+ ' occured while trying to retireve '+ user +' list.';
                var type = 'error';
                displayMessage(message, type);
                $("#spinner-icon-admin").hide();
            },
            timeout: 8000
        })  
    });

    //Get list of users by a particular service request reference
    $('#ongoing_requests').on('change',function () {
        let user = $(this).find('option:selected').val();
        let route = $(this).find('option:selected').data('url');

        $.ajaxSetup({
            headers: {
                'X-CSRF_TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: route,
            beforeSend: function() {
                $("#spinner-icon-admin").html('<div class="d-flex justify-content-center mt-4 mb-4" style="margin-left: 40px !important"><span class="loadingspinner"></span></div>');
            },
            // return the result
            success: function(result) {

                // $('.admin-list').removeClass('d-none');
                $('#admin-list').html('');
                $('#admin-list').html(result);
            },
            complete: function() {
                $("#spinner-icon").hide();
            },
            error: function(jqXHR, testStatus, error) {
                var message = error+ ' occured while trying to retireve '+ user +' list.';
                var type = 'error';
                displayMessage(message, type);
                $("#spinner-icon-admin").hide();
            },
            timeout: 8000
        })  
    });


  });
</script>

@endpush
@endsection
