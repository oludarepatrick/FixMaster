<div class="modal fade" id="locationRequest" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered wd-sm-650" role="document">
      <div class="modal-content">
        <div class="modal-body pd-x-25 pd-sm-x-30 pd-t-40 pd-sm-t-20 pd-b-15 pd-sm-b-20">
          <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
          <h5 class="mg-b-2"><strong>Location Request</strong></h5>
          
          <div class="col-12 col-md-12 col-lg-12 col-xs-12 mt-4">
              <div class="form-row">
                  <div class="col-md-12">
                      <label for="password">Job Reference</label>
                      {{-- <select class="custom-select select2 form-control">
                          <option label="Select..."></option>
                          <option value="REF-234094623496">REF-234094623496</option>
                          <option value="REF-094009623412">REF-094009623412</option>
                          <option value="REF-237290223123">REF-237290223123</option>
                          <option value="REF-234094623496">REF-234094623496</option>
                      </select> --}}

                      <select class="custom-select">
                        <option value="" selected>Select Job Reference</option>
                        @foreach ($serviceRequests as $item)
                          <option value="{{$item->id}}">{{$item->job_reference}} </option> 
                        @endforeach
                     </select>

                  </div>
              </div>
              <div class="form-row mt-4">
                <div class="col-md-12">
                    <label for="password">CSE/Technician</label>
                    <select class="custom-select" name="recipientRole" onchange="updateRecipientList(this.value)">
                        <option label="Select...">Select Recipient</option>
                        <option value="CSE">CSE</option>
                        <option value="Technician">Technician</option>
                    </select>
                </div>
            </div>
              <div class="form-row mt-4">
                <div class="col-md-12">
                    <label for="inputEmail4">Full Name</label>
                    <input class="form-control" name="recipient_id" value="Godfrey Diwa" disabled readonly>
                </div>
              </div>
              
              <button type="submit" class="btn btn-primary mt-2">Submit</button>
          </div>
        </div><!-- modal-body -->
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->

  @push('scripts')
  <script>

function updateRecipientList(jobRef){
    // console.log(jobRef);
        $.ajax({
            url: $("#path_backEnd").val()+"/cse/getUserAssigned"+"/"+jobRef,
            responseData: { },
            success: function( responseData ) {
                document.getElementById("assigned").innerHTML = responseData;
            }
        });
    }

    //    $(document).on('change', '.recipientRole', function(){
    //     var recipientRole = $("input[name='recipientRole']").val();
    //     console.log(recipientRole);
    //    });

  </script>
  @endpush