
<div class="modal fade" id="adminMessageComposer" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg wd-sm-650" role="document">
      <div class="modal-content">
        <div class="modal-body pd-x-25 pd-sm-x-30 pd-t-40 pd-sm-t-20 pd-b-15 pd-sm-b-20">
          <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
          <h5 class="mg-b-2"><strong>Send Message</strong></h5>
          <form method="POST" action="{{route('cse.save-message-data')}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
          <div class="form-row mt-4">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Select Recipient Type</label>
                    <select class="custom-select" id="user-type">
                        <option value="" select>Select...</option>
                        {{-- <option value="All">All Users</option> --}}
                        <option value="Admin" data-url="{{ route('administrators_list') }}">Admins</option>
                        <option value="Client" data-url="{{ route('clients_list') }}">Clients</option>
                        <option value="CSE" data-url="{{ route('cses_list') }}">CSEs</option>
                        <option value="Technician" data-url="{{ route('technicians_list') }}">Technicians</option>
                        <option value="Ongoing" data-url="{{ route('ongoing_service_request_list') }}">Ongoing Service Request</option>
                    </select>
                </div>
            </div><!--end col-->

            <div class="col-md-12" id="admin-list"><div id="spinner-icon-admin"></div></div>
            <div class="col-md-12" id="request-list"><div id="spinner-icon-request"></div></div>

            <div class="col-md-12 specific-date d-none">
                <div class="form-group position-relative">
                    <label>Ongoing Jobs</label>
                    <select class="custom-select" id="request-sorting">
                        <option value="None">Select...</option>
                        <option value="Date">REF-234094623496</option>
                        <option value="Month">REF-094009623412</option>
                        <option value="Month">REF-237290223123</option>
                        <option value="Month">REF-234094623496</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="inputEmail4">Subject</label>
                <input type="text" class="form-control" id="inputEmail4">
            </div>

          <div class="form-group col-md-12">
            <label for="message_body">Message</label>
            <textarea rows="4" class="form-control" id="message_body"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Send Message</button>

        </div>
        </div><!-- modal-body -->
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->
