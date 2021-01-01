@extends('layouts.dashboard')
@section('title', 'Service Request Status')
@include('layouts.partials._messages')
@section('content')
<div class="content-body">
    <div class="container pd-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Service Request Status</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Service Request Status</h4>
        </div>
      </div>

      <div class="row row-xs">
        <div class="col-12 justify-content-center text-center align-items-center">
          <a href="#addInventory" class="btn btn-primary float-right" data-toggle="modal"><i class="fas fa-plus"></i> Add New</a>
        </div>

        <div class="col-lg-12 col-xl-12 mg-t-10">
            <div class="card mg-b-10">
              <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <div>
                  <h6 class="mg-b-5">Service Request Statuses as of {{ date('M, d Y') }}</h6>
                  <p class="tx-13 tx-color-03 mg-b-0">This table displays a list of all FixMaster Service Request Statuses created.</p>
                </div>
                
              </div><!-- card-header -->
             
              <div class="table-responsive">
                
                <table class="table table-hover mg-b-0" id="basicExample">
                  <thead class="thead-primary">
                    <tr>
                      <th class="text-center">#</th>
                      <th>Name</th>
                      <th class="text-center">Created By</th>
                      <th>Date Created</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($serviceRequestStatuses as $serviceRequestStatus)

                    <tr>
                      <td class="tx-color-03 tx-center">{{ ++$i }}</td>
                      <td class="tx-medium">{{ $serviceRequestStatus->name }}</td>
                      <td class="tx-medium text-center">{{ $serviceRequestStatus->user->fullName->name }}</td>
                      <td class="text-medium">{{ Carbon\Carbon::parse($serviceRequestStatus->created_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }}</td>
                      <td class=" text-center">
                        <div class="dropdown-file">
                          @if($serviceRequestStatus->can_delete == 1)
                          <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                          <a href="#editInventory" data-toggle="modal" class="dropdown-item details text-info" data-url="{{ route('admin.edit_service_request_status', $serviceRequestStatus->id) }}" data-status-name="{{ $serviceRequestStatus->name }}" data-id="{{ $serviceRequestStatus->id }}" id="edit-status"><i class="far fa-edit"></i> Edit</a>
                          <a href="{{ route('admin.delete_service_request_status', $serviceRequestStatus->id) }}" class="dropdown-item details text-danger" title="Delete {{ $serviceRequestStatus->name}}"><i class="fas fa-trash"></i> Delete</a>
                          @endif
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div><!-- table-responsive -->
            </div><!-- card -->
    
          </div><!-- col -->

      </div>

    </div>
</div>


<div class="modal fade" id="addInventory" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered wd-sm-650" role="document">
      <div class="modal-content">
        <div class="modal-body pd-x-25 pd-sm-x-30 pd-t-40 pd-sm-t-20 pd-b-15 pd-sm-b-20">
          <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
          <form method="POST" action="{{ route('admin.store_service_request_status') }}">
            @csrf
            <h5 class="mg-b-2"><strong>Create New Status</strong></h5>
            <div class="form-row mt-4">
              <div class="form-group col-md-12">
                  <label for="name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}" autocomplete="off" required>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>

        </div>
        </div><!-- modal-body -->
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->



<div class="modal fade" id="editInventory" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered wd-sm-650" role="document">
      <div class="modal-content">
        <div class="modal-body pd-x-25 pd-sm-x-30 pd-t-40 pd-sm-t-20 pd-b-15 pd-sm-b-20">
          <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
          <div class="modal-body" id="modal-edit-body">
              <!-- Modal displays here -->
              <div id="spinner-icon"></div>
          </div>
        </div><!-- modal-body -->
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->


@push('scripts')
<script>
  $(document).ready(function() {
    $(document).on('click', '#edit-status', function(event) {
      event.preventDefault();
      let route = $(this).attr('data-url');
      let statusName = $(this).attr('data-status-name');
      
      $.ajax({
          url: route,
          beforeSend: function() {
            $("#spinner-icon").html('<div class="d-flex justify-content-center mt-4 mb-4"><span class="loadingspinner"></span></div>');
          },
          // return the result
          success: function(result) {
              $('#modal-edit-body').modal("show");
              $('#modal-edit-body').html('');
              $('#modal-edit-body').html(result).show();
          },
          complete: function() {
              $("#spinner-icon").hide();
          },
          error: function(jqXHR, testStatus, error) {
              var message = error+ 'An error occured while trying to retireve '+ statusName +' statusStatus.';
              var type = 'error';
              displayMessage(message, type);
              $("#spinner-icon").hide();
          },
          timeout: 8000
      })
    });


    $('.close').click(function (){
      $(".modal-backdrop").remove();
    });

  });
</script>
@endpush
@endsection