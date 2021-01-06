<div class="mail-content-header d-none">
    <a href="" id="mailContentClose" class="link-02 d-none d-lg-block d-xl-none mg-r-20"><i data-feather="arrow-left"></i></a>
    <div class="media">
        @if($message->sender_id == '4' || $message->userSentMessage->designation == '[SUPER_ADMIN_ROLE]' || $message->userSentMessage->designation == '[ADMIN_ROLE]')
              <div class="avatar"><img src="{{ asset('assets/images/home-fix-logo-coloredd.png') }}" class="rounded-circle" alt=""></div>
            @elseif($message->userSentMessage->designation == '[CSE_ROLE]')
                @if(!empty($message->userSentMessage->cse->avatar) && file_exists(public_path().'/assets/cse-technician-images/'.$message->userSentMessage->cse->avatar))
                <div class="avatar"><img src="{{ asset('assets/cse-technician-images/'.$message->userSentMessage->cse->avatar) }}" class="rounded-circle" alt="" /></div>
                @else
                    @if($message->userSentMessage->cse->gender == 'Male')
                        <div class="avatar"><img src="{{ asset('assets/images/default-male-avatar.png') }}" alt="Default male profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @else
                        <div class="avatar"><img src="{{ asset('assets/images/default-female-avatar.png') }}" alt="Default female profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @endif
                @endif
            @elseif($message->userSentMessage->designation == '[TECHNICIAN_ROLE]')
                @if(!empty($message->userSentMessage->technician->avatar) && file_exists(public_path().'/assets/cse-technician-images/'.$message->userSentMessage->technician->avatar))
                <div class="avatar"><img src="{{ asset('assets/cse-technician-images/'.$message->userSentMessage->technician->avatar) }}" class="rounded-circle" alt="" /></div>
                @else
                    @if($message->userSentMessage->technician->gender == 'Male')
                        <div class="avatar"><img src="{{ asset('assets/images/default-male-avatar.png') }}" alt="Default male profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @else
                        <div class="avatar"><img src="{{ asset('assets/images/default-female-avatar.png') }}" alt="Default female profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @endif
                @endif
            @elseif($message->userSentMessage->designation == '[CLIENT_ROLE]')
                @if(!empty($message->userSentMessage->client->avatar) && file_exists(public_path().'/assets/client-avatars/'.$message->userSentMessage->client->avatar))
                <div class="avatar"><img src="{{ asset('assets/client-avatars/'.$message->userSentMessage->client->avatar) }}" class="rounded-circle" alt="" /></div>
                @else
                    @if($message->userSentMessage->client->gender == 'Male')
                        <div class="avatar"><img src="{{ asset('assets/images/default-male-avatar.png') }}" alt="Default male profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @else
                        <div class="avatar"><img src="{{ asset('assets/images/default-female-avatar.png') }}" alt="Default female profile avatar" class="rounded-circle shadow d-block mx-auto" /></div>
                    @endif
                @endif
            @endif

      {{-- <div class="avatar avatar-sm"><img src="../https://via.placeholder.com/600" class="rounded-circle" alt=""></div> --}}
      <div class="media-body mg-l-10">
        <h6 class="mg-b-2 tx-13">{{ $message->userSentMessage->fullName->name }}</h6>
        <span class="d-block tx-11 tx-color-03">{{ Carbon\Carbon::parse($message->created_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }}</span>
      </div><!-- media-body -->
    </div><!-- media -->
    
  </div><!-- mail-content-header -->
  <div class="mail-content-body d-none">
    <div class="pd-20 pd-lg-25 pd-xl-30">
      <h5 class="mg-b-30">{{ $message->subject }}</h5>

      {!! $message->body !!}
    </div>
    
  </div><!-- mail-content-body -->