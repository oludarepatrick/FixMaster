@extends('layouts.dashboard')
@section('title', 'Service Category List')
@include('layouts.partials._messages')
@section('content')
<div class="content-body">
    <div class="container pd-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Service Category List</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Service Category List</h4>
        </div>
        <div class="d-md-block">
          <a href="{{ route('admin.add_category') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
        </div>
      </div>

      <div class="row row-xs">
       
        <div class="col-lg-12 col-xl-12 mg-t-10">
            <div class="card mg-b-10">
              <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
                <div>
                  <h6 class="mg-b-5">Service Categories as of {{ date('M, d Y') }}</h6>
                  <p class="tx-13 tx-color-03 mg-b-0">This table displays a list of all FixMaster Service Categories.</p>
                </div>
                
              </div><!-- card-header -->
             
              <div class="table-responsive">
                
                <table class="table table-hover mg-b-0" id="basicExample">
                  <thead class="thead-primary">
                    <tr>
                      <th class="text-center">#</th>
                      <th>Name</th>
                      <th>Service</th>
                      <th class="text-center">CSE's</th>
                      <th class="text-center">Technicians</th>
                      <th class="text-center">Requests</th>
                      <th>Status</th>
                      <th>Date Created</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $category)
                    <tr>
                      <td class="tx-color-03 tx-center">{{ ++$i }}</td>
                      <td class="tx-medium">{{ $category->name }}</td>
                      <td class="tx-medium">{{ $category->service->name }}</td>
                      <td class="tx-medium text-center">2</td>
                      <td class="tx-medium text-center">3</td>
                      <td class="tx-medium text-center">{{ $category->requests()->count() }}</td>
                      @if($category->is_active == '1') 
                        <td class="text-medium text-success">Active</td>
                      @else 
                        <td class="text-medium text-danger">Inactive</td>
                      @endif
                      <td class="text-medium">{{ Carbon\Carbon::parse($category->created_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }}</td>
                      <td class=" text-center">
                        <div class="dropdown-file">
                          <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                          <a href="#serviceCategoryDetails" data-toggle="modal" class="dropdown-item details text-primary" title="View {{ $category->name}} details" data-url="{{ route('admin.category_details', $category->id) }}" data-category-name="{{ $category->name}}" id="category-details"><i class="far fa-clipboard"></i> Details</a>
                          <a href="{{ route('admin.edit_category', $category->id) }}" class="dropdown-item details text-info"><i class="far fa-edit"></i> Edit</a>
                          @if($category->is_active == '1')
                            <a href="{{ route('admin.deactivate_category', $category->id) }}" class="dropdown-item details text-warning" title="Deactivate {{ $category->name}}"><i class="fas fa-ban"></i> Deactivate</a>
                          @else
                            <a href="{{ route('admin.reinstate_category', $category->id) }}" class="dropdown-item details text-success" title="Reinstate {{ $category->name}}"><i class="fas fa-undo"></i> Reinstate</a>
                          @endif
                          <a href="{{ route('admin.delete_category', $category->id) }}" class="dropdown-item details text-danger" title="Delete {{ $category->name}}"><i class="fas fa-trash"></i> Delete</a>
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

<div class="modal fade" id="serviceCategoryDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content tx-14">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel2">Service Category Details</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="modal-body" id="modal-body">
            <!-- Modal displays here -->
            <div id="spinner-icon"></div>
        </div>
        </div>
      </div>
    </div>
</div>


  @section('scripts')
<script>
    $(document).ready(function() {

      $(document).on('click', '#category-details', function(event) {
        event.preventDefault();
        let route = $(this).attr('data-url');
        let categoryeName = $(this).attr('data-category-name');
        
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
                var message = error+ ' occured while trying to retireve '+ categoryeName +' category details.';
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
@endsection

@endsection