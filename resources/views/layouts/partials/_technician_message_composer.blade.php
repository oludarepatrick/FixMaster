<?php
use App\Models\User;
use App\Models\Technician;

    $technician = Technician::where('user_id', Auth::id())->first();
    $serviceRequests = $technician->requests;
        $ongoingJobs = $technician->requests()
                        ->where('service_request_status_id', '>', '3')
                        ->get();

?>
<style type="text/css">
  .hideDiv{
    display: none;
  }
</style>

<div class="modal fade" id="technicianMessageComposer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg wd-sm-650" role="document">
      <div class="modal-content">
        <div class="modal-body pd-x-25 pd-sm-x-30 pd-t-40 pd-sm-t-20 pd-b-15 pd-sm-b-20">
          <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
          <h5 class="mg-b-2"><strong>Send Message</strong></h5>
          <form method="POST" action="{{route('cse.save-message-data')}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
          <div class="form-row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Select User</label>

                    <select class="custom-select" onchange="updateReciever(this.value)">
                      <option value="None">Select...</option>
                      <option value="4">Fix Master</option>
                      <option value="5">On going Jobs</option>
                    </select>

                    {{-- <select class="custom-select" onchange="updateJobRefList(this.value)" id="request-sorting" name="selectedUser">
                        <option value="None">Select...</option>
                        @foreach ($serviceRequests as $serviceRequest)
                         <option value="{{$serviceRequest->technician->first_name}}">{{$serviceRequest->technician->first_name}} {{$serviceRequest->technician->last_name}}</option>
                        @endforeach
                    </select> --}}

                </div>
            </div><!--end col-->

            <div class="col-md-12 specific-date hideDiv" id="job-ref" >
                <div class="form-group position-relative ">
                    <label>Ongoing Jobs</label>

                    <select class="custom-select" required name="jobReference" onchange="updateRecieverListTech(this.value)">
                      <option value="">Select Job Reference</option>
                      @foreach ($ongoingJobs as $item)
                        <option value="{{$item->id}}">{{$item->job_reference}} </option>
                      @endforeach
                   </select>
                   
                </div>
            </div>

            <div class="col-md-12 specific-date hideDiv" id="Recipient">
              <div class="form-group position-relative ">
                  <label>Select Recipient</label>

                  {{-- <select class="custom-select" required  name="jobReference">
                    <option value="">Select Recipient</option>
                    <option value="">Admin</option>
                    <option value="">Technicians</option>                    
                    <option value="">Clients</option>
                 </select> --}}

                 <select class="custom-select" name="selectedReciever" id="assigned">
                  <option value="None">Select...</option>
                  {{-- @foreach ($ongoingJobs as $item)
                   <option value="{{$item->user->fullName->name}}">{{$item->user->fullName->name}} 
                    
                    @if($item->user->designation =='[ADMIN_ROLE]')     
                           ADMIN     
                        @elseif($item->user->designation =='[ADMIN_ROLE]')  
                           CLIENT     
                    @endif 

                  </option>
                  @endforeach --}}
              </select>

              </div>
            </div>

            <div class="form-group col-md-12">
                <label for="inputEmail4">Subject</label>
                <input type="text" class="form-control" id="inputEmail4" name="subject">
            </div>

          <div class="form-group col-md-12">
            <label for="inputAddress2">Message</label>
            <textarea rows="4" class="form-control" id="inputAddress2" name="message"></textarea>
          </div>

          <button type="submit" class="btn btn-primary hideDiv" id="Send-Message">Send Message</button>

        </div>
        </div><!-- modal-body -->
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->


  @section('scripts')
<script>
    $(document).ready(function() {

        $('#request-sorting').on('change', function (){        
                let option = $("#request-sorting").find("option:selected").val();

                if(option === 'None'){
                    $('.specific-date, .sort-by-year, .date-range').addClass('d-none');
                }

                if(option === 'Date'){
                    $('.specific-date').removeClass('d-none');
                    $('.sort-by-year, .date-range').addClass('d-none');
                }

                if(option === 'Month'){
                    $('.sort-by-year').removeClass('d-none');
                    $('.specific-date, .date-range').addClass('d-none');
                }

                if(option === 'Date Range'){
                    $('.date-range').removeClass('d-none');
                    $('.specific-date, .sort-by-year').addClass('d-none');
                }
        });
    });
   
</script>
@endsection