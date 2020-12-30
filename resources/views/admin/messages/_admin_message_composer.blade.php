
<div class="modal fade" id="adminMessageComposer" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <select class="custom-select" id="request-sorting">
                        <option value="" select>Select...</option>
                        <option value="Admin">All Users</option>
                        <option value="Admin">Admin</option>
                        <option value="Client">Client</option>
                        <option value="CSE">CSE</option>
                        <option value="Technician">Technician</option>
                        <option value="Ongoing">Ongoing Service Request</option>
                    </select>
                </div>
            </div><!--end col-->

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

{{-- @section('scripts')
<script src="{{ asset('assets/dashboard/assets/js/tinymce_5.2.0/jquery.tinymce.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/js/tinymce_5.2.0/tinymce-setup.js') }}"></script>
@endsection --}}