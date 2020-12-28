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
                    <tr>
                      <td class="tx-color-03 tx-center">1</td>
                      <td class="tx-medium">Mobile Phone</td>
                      <td class="tx-medium">Communication</td>
                      <td class="tx-medium text-center">2</td>
                      <td class="tx-medium text-center">3</td>
                      <td class="tx-medium text-center">8</td>
                      <td class="text-medium text-success">Active</td>
                      <td class="text-medium">May 15th 2020</td>
                      <td class=" text-center">
                        <div class="dropdown-file">
                          <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                          <a href="#serviceCategoryDetails" data-toggle="modal" class="dropdown-item details text-primary"><i class="far fa-clipboard"></i> Details</a>
                          <a href="{{ route('admin.edit_category') }}" class="dropdown-item details text-info"><i class="far fa-edit"></i> Edit</a>
                            <a href="" class="dropdown-item details text-warning"><i class="fas fa-ban"></i> Deactivate</a>
                            <a href="" class="dropdown-item details text-danger"><i class="fas fa-trash"></i> Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td class="tx-color-03 tx-center">2</td>
                      <td class="tx-medium">Generator</td>
                      <td class="tx-medium">Mechanical</td>
                      <td class="tx-medium text-center">1</td>
                      <td class="tx-medium text-center">1</td>
                      <td class="tx-medium text-center">3</td>
                      <td class="text-medium text-success">Active</td>
                      <td class="text-medium">May 15th 2020</td>
                      <td class=" text-center">
                        <div class="dropdown-file">
                          <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                          <a href="#serviceCategoryDetails" data-toggle="modal" class="dropdown-item details text-primary"><i class="far fa-clipboard"></i> Details</a>
                          <a href="{{ route('admin.edit_category') }}" class="dropdown-item details text-info"><i class="far fa-edit"></i> Edit</a>
                            <a href="" class="dropdown-item details text-warning"><i class="fas fa-ban"></i> Deactivate</a>
                            <a href="" class="dropdown-item details text-danger"><i class="fas fa-trash"></i> Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td class="tx-color-03 tx-center">2</td>
                      <td class="tx-medium">Pump</td>
                      <td class="tx-medium">Mechanical</td>
                      <td class="tx-medium text-center">1</td>
                      <td class="tx-medium text-center">0</td>
                      <td class="tx-medium text-center">1</td>
                      <td class="text-medium text-success">Active</td>
                      <td class="text-medium">May 15th 2020</td>
                      <td class=" text-center">
                        <div class="dropdown-file">
                          <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                          <a href="#serviceCategoryDetails" data-toggle="modal" class="dropdown-item details text-primary"><i class="far fa-clipboard"></i> Details</a>
                          <a href="{{ route('admin.edit_category') }}" class="dropdown-item details text-info"><i class="far fa-edit"></i> Edit</a>
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
            <h5>Mobile Phone Service</h5>
            <div class="table-responsive mt-4">
              <table class="table table-striped table-sm mg-b-0">
                <tbody>
                  <tr>
                    <td class="tx-medium">Name</td>
                    <td class="tx-color-03">Mobile Phone</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">Service</td>
                    <td class="tx-color-03">Communication</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">Status</td>
                    <td class="tx-color-03">Active</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">Standard Fee</td>
                    <td class="tx-color-03">₦3,000</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">Urgent Fee</td>
                    <td class="tx-color-03">₦5,000</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">OOH(Out of Hours) Fee</td>
                    <td class="tx-color-03">₦7,500</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">Requests</td>
                    <td class="tx-color-03">8</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">CSE's</td>
                    <td class="tx-color-03">2</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">Technicians</td>
                    <td class="tx-color-03">3</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
</div>


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