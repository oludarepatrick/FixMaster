@extends('layouts.dashboard')
@section('title', 'Services List')
@include('layouts.partials._messages')
@section('content')
<div class="content-body">
    <div class="container pd-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Services List</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Services List</h4>
        </div>
      </div>

      <div class="row row-xs">
        <div class="col-12 justify-content-center text-center align-items-center">
          <a href="#addService" class="btn btn-primary float-right" data-toggle="modal"><i class="fas fa-plus"></i> Add New</a>
        </div>

        <div class="col-lg-12 col-xl-12 mg-t-10">
            <div class="card mg-b-10">
              <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <div>
                  <h6 class="mg-b-5">Services as of {{ date('M, d Y') }}</h6>
                  <p class="tx-13 tx-color-03 mg-b-0">This table displays a list of all FixMaster core Services.</p>
                </div>
                
              </div><!-- card-header -->
             
              <div class="table-responsive">
                
                <table class="table table-hover mg-b-0" id="basicExample">
                  <thead class="thead-primary">
                    <tr>
                      <th class="text-center">#</th>
                      <th>Name</th>
                      <th>Created By</th>
                      <th class="text-center">Categories</th>
                      <th>Status</th>
                      <th>Date Created</th>
                      <th>Last Edited</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($services as $service)
                      <tr>
                        <td class="tx-color-03 tx-center">{{ ++$i }}</td>
                        <td class="tx-medium">{{ $service->name }}</td>
                        <td class="tx-medium">{{ $createdBy->find($service->user_id)->name }}</td>
                        <td class="tx-medium text-center">{{ $service->categories()->count() }}</td>
                        @if($service->is_active == '1') 
                        <td class="text-medium text-success">Active</td>
                        @else 
                          <td class="text-medium text-danger">Inactive</td>
                        @endif
                        <td class="text-medium">{{ Carbon\Carbon::parse($service->created_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }}</td>
                        <td class="text-medium">
                          @if(!empty($service->updated_at)) {{ Carbon\Carbon::parse($service->updated_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }} @else Never @endif
                        </td>
                        <td class=" text-center">
                          <div class="dropdown-file">
                            <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                            <a href="#serviceDetails" data-toggle="modal" class="dropdown-item details text-primary" title="View {{ $service->name}} details" data-url="{{ route('admin.service_details', $service->id) }}" data-service-name="{{ $service->name}}" id="service-details"><i class="far fa-clipboard"></i> Details</a>

                            <a href="#editService" data-toggle="modal" id="service-edit" title="Edit {{ $service->name }}" data-url="{{ route('admin.update_service', $service->id) }}" data-service-name="{{ $service->name }}" data-id="{{ $service->id }}" class="dropdown-item details text-info"><i class="far fa-edit"></i> Edit</a>

                            @if($service->is_active == '1')
                              <a href="{{ route('admin.deactivate_service', $service->id) }}" class="dropdown-item details text-warning" title="Deactivate {{ $service->name}}"><i class="fas fa-ban"></i> Deactivate</a>
                            @else
                              <a href="{{ route('admin.reinstate_service', $service->id) }}" class="dropdown-item details text-success" title="Reinstate {{ $service->name}}"><i class="fas fa-undo"></i> Reinstate</a>
                            @endif
                            @if($service->categories()->count() > 0)
                              <a href="#serviceReassign" data-toggle="modal" class="dropdown-item details text-danger" id="service-reassign" data-url="{{ route('admin.reassign_service', $service->id) }}" data-service-name="{{ $service->name}}" title="Reassign {{ $service->name}} categories"><i class="fas fa-trash"></i> Delete</a>
                            @else
                              <a href="{{ route('admin.delete_service', $service->id) }}" class="dropdown-item details text-danger" title="Delete {{ $service->name}}"><i class="fas fa-trash"></i> Delete</a>
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

<div class="modal fade" id="serviceDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content tx-14">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel2">Service Details</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-body">
            <!-- Modal displays here -->
            <div id="spinner-icon"></div>
        </div>
        <div class="modal-footer"></div>
      </div>
    </div>
</div>

<div class="modal fade" id="serviceReassign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content tx-14">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel2">Service Details</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-reassign-body">
          <!-- Modal displays here -->
          <div id="spinner-icon-2"></div>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>

<div class="modal fade" id="addService" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered wd-sm-650" role="document">
      <div class="modal-content">
        <div class="modal-body pd-x-25 pd-sm-x-30 pd-t-40 pd-sm-t-20 pd-b-15 pd-sm-b-20">
          <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
          <form method="POST" action="{{ route('admin.store_services') }}">
            @csrf
            <h5 class="mg-b-2"><strong>Create New Service</strong></h5>
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
              <button type="submit" class="btn btn-primary">Create Service</button>
            </div>
          </form>
        </div><!-- modal-body -->
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->

<div class="modal fade" id="editService" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered wd-sm-650" role="document">
      <div class="modal-content">
        <div class="modal-body pd-x-25 pd-sm-x-30 pd-t-40 pd-sm-t-20 pd-b-15 pd-sm-b-20">
          <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
          <div class="modal-body" id="modal-edit-body">
            <!-- Modal displays here -->
            <div id="spinner-icon-3"></div>

            {{-- <form method="POST" action="" id="edit-form">
              @csrf @method('PUT') --}}
              <h5 class="mg-b-2"><strong>Editing <span id="edit-service-name"></span> Service</strong></h5>
              <div class="form-row mt-4">
              <div class="form-group col-md-12">
                  <label for="name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="edit-name" name="name" value="{{ old('phone_number') }}" placeholder="Name" autocomplete="off">
                  <input type="hidden" id="edit-id">

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <button type="button" id="update-service" class="btn btn-primary">Update</button>
            {{-- <form> --}}

        </div>
        </div>
        </div><!-- modal-body -->
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->


@section('scripts')
<script>
  $(document).ready(function() {
    $(document).on('click', '#service-details', function(event) {
      event.preventDefault();
      let route = $(this).attr('data-url');
      let serviceName = $(this).attr('data-service-name');
      
      $.ajax({
          url: route,
          beforeSend: function() {
            $("#spinner-icon").html('<div class="d-flex justify-content-center mt-4 mb-4"><span class="loadingspinner"></span></div>');
          },
          // return the result
          success: function(result) {
              $('#modal-body').html('');
              $('#modal-body').modal("show");
              $('#modal-body').html(result).show();
          },
          complete: function() {
              $("#spinner-icon").hide();
          },
          error: function(jqXHR, testStatus, error) {
              var message = error+ ' occured while trying to retireve '+ serviceName +' service details.';
              var type = 'error';
              displayMessage(message, type);
              $("#spinner-icon").hide();
          },
          timeout: 8000
      })
    });

    $(document).on('click', '#service-reassign', function(event) {
      event.preventDefault();
      let route = $(this).attr('data-url');
      let serviceName = $(this).attr('data-service-name');

      $.ajax({
          url: route,
          beforeSend: function() {
            $("#spinner-icon-2").html('<div class="d-flex justify-content-center mt-4 mb-4"><span class="loadingspinner"></span></div>');
          },
          // return the result
          success: function(result) {
              $('#modal-reassign-body').html('');
              $('#modal-reassign-body').modal("show");
              $('#modal-reassign-body').html(result).show();
          },
          complete: function() {
              $("#spinner-icon-2").hide();
          },
          error: function(jqXHR, testStatus, error) {
              var message = error+ ' occured while trying to reassign categories assigned to '+ serviceName;
              var type = 'error';
              displayMessage(message, type);
              $("#spinner-icon-2").hide();
          },
          timeout: 8000
      })
    });

    $(document).on('click', '#service-edit', function(event) {
      event.preventDefault();

      let route = $(this).attr('data-url');
      let id = $(this).attr('data-id');
      let serviceName = $(this).attr('data-service-name');

      $('#edit-form').attr('action', route);
      $('#edit-service-name').text(serviceName);
      $('#edit-name').val(serviceName);
      $('#edit-id').val(id);
    });

    $('#update-service').click(function() {
      let id = $('#edit-id').val();
      let serviceName = $('#edit-name').val();

      $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
        url: "{{ route('admin.update_service') }}",
        method: 'POST',
        data: {"id": id, "serviceName": serviceName },
        beforeSend : function(){
            $("#spinner-icon-3").html('<div class="d-flex justify-content-center mt-4 mb-4"><span class="loadingspinner"></span></div>'); 
        },
        success: function (data){
            if(data == 'success'){

              // $("#spinner-icon-3").hide();
              $('#editService').modal("hide");

              var message = 'Service has been updated';
              var type = 'success';
              displayMessage(message, type);

              setTimeout(function() {
                window.location.reload();

              }, 3000);

            }else {
              var message = error+ ' occured while trying to edit '+ serviceName;
              var type = 'error';
              displayMessage(message, type);
            }            
        },
        // complete: function() {
        //       $("#spinner-icon-3").hide();
        // },
        // error: function(jqXHR, testStatus, error) {
        //     var message = error+ ' occured while trying to edit '+ serviceName;
        //     var type = 'error';
        //     displayMessage(message, type);
        //     $("#spinner-icon-3").hide();
        // },
        timeout: 8000
      });
    });

    $('.close').click(function (){
      $(".modal-backdrop").remove();
    });

  });
</script>
@endsection

@endsection