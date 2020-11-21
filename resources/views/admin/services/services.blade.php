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
                      <th class="text-center">Categories</th>
                      <th>Status</th>
                      <th>Date Created</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="tx-color-03 tx-center">1</td>
                      <td class="tx-medium">Communication</td>
                      <td class="tx-medium text-center">1</td>
                      <td class="text-medium text-success">Active</td>
                      <td class="text-medium">May 15th 2020</td>
                      <td class=" text-center">
                        <div class="dropdown-file">
                          <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                          <a href="#serviceDetails" data-toggle="modal" class="dropdown-item details text-primary"><i class="far fa-clipboard"></i> Details</a>
                          <a href="#editService" data-toggle="modal" class="dropdown-item details text-info"><i class="far fa-edit"></i> Edit</a>
                            <a href="" class="dropdown-item details text-warning"><i class="fas fa-ban"></i> Deactivate</a>
                            <a href="" class="dropdown-item details text-danger"><i class="fas fa-trash"></i> Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                        <td class="tx-color-03 tx-center">1</td>
                        <td class="tx-medium">Electrical</td>
                        <td class="tx-medium text-center">6</td>
                        <td class="text-medium text-success">Active</td>
                        <td class="text-medium">May 15th 2020</td>
                        <td class=" text-center">
                          <div class="dropdown-file">
                            <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                            <a href="#serviceDetails" data-toggle="modal" class="dropdown-item details text-primary"><i class="far fa-clipboard"></i> Details</a>
                            <a href="#editService" data-toggle="modal" class="dropdown-item details text-info"><i class="far fa-edit"></i> Edit</a>
                              <a href="" class="dropdown-item details text-warning"><i class="fas fa-ban"></i> Deactivate</a>
                              <a href="" class="dropdown-item details text-danger"><i class="fas fa-trash"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>

                      <tr>
                        <td class="tx-color-03 tx-center">3</td>
                        <td class="tx-medium">Mechanical</td>
                        <td class="tx-medium text-center">2</td>
                        <td class="text-medium text-success">Active</td>
                        <td class="text-medium">May 15th 2020</td>
                        <td class=" text-center">
                          <div class="dropdown-file">
                            <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                            <a href="#serviceDetails" data-toggle="modal" class="dropdown-item details text-primary"><i class="far fa-clipboard"></i> Details</a>
                            <a href="#editService" data-toggle="modal" class="dropdown-item details text-info"><i class="far fa-edit"></i> Edit</a>
                              <a href="" class="dropdown-item details text-warning"><i class="fas fa-ban"></i> Deactivate</a>
                              <a href="" class="dropdown-item details text-danger"><i class="fas fa-trash"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>
    
    
                  </tbody>
                </table>
              </div><!-- table-responsive -->
            </div><!-- card -->
    
          </div><!-- col -->

      </div>

    </div>
</div>

<div class="modal fade" id="serviceDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content tx-14">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel2">Service Details</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h5>Communication Service</h5>
            <div class="table-responsive mt-4">
                <table class="table table-hover mg-b-0" id="basicExample">
                  <thead class="thead-primary">
                    <tr>
                      <th class="text-center">#</th>
                      <th>Category Name</th>
                      <th class="text-center">Requests</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="tx-color-03 tx-center">1</td>
                      <td class="tx-medium">Mobile Phone</td>
                      <td class="tx-medium text-center"">3</td>
                    </tr>
    
                  </tbody>
                </table>
            </div><!-- table-responsive -->
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="addService" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered wd-sm-650" role="document">
      <div class="modal-content">
        <div class="modal-body pd-x-25 pd-sm-x-30 pd-t-40 pd-sm-t-20 pd-b-15 pd-sm-b-20">
          <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
          <h5 class="mg-b-2"><strong>Create New Service</strong></h5>
          <div class="form-row mt-4">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Name">
            </div>
          <button type="submit" class="btn btn-primary">Create</button>

        </div>
        </div><!-- modal-body -->
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->



<div class="modal fade" id="editService" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered wd-sm-650" role="document">
      <div class="modal-content">
        <div class="modal-body pd-x-25 pd-sm-x-30 pd-t-40 pd-sm-t-20 pd-b-15 pd-sm-b-20">
          <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
          <h5 class="mg-b-2"><strong>Editing Communication Service</strong></h5>
          <div class="form-row mt-4">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" id="inputEmail4" value="Communication">
            </div>
          <button type="submit" class="btn btn-primary">Update</button>

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

@endsection