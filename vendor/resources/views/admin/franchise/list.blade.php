@extends('layouts.dashboard')
@section('title', 'Franchise List')
@include('layouts.partials._messages')
@section('content')

<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Franchise List</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Franchise List</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card mg-b-10">
          <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
            <div>
              <h6 class="mg-b-5">Franchises as of {{ date('M, d Y') }}</h6>
              <p class="tx-13 tx-color-03 mg-b-0">This table displays a list of all FixMaster Franchises.</p>
            </div>
            
          </div><!-- card-header -->
         
          <div class="table-responsive">
            
            <table class="table table-hover mg-b-0" id="basicExample">
              <thead class="thead-primary">
                <tr>
                  <th class="text-center">#</th>
                  <th>Name</th>
                  <th>E-Mail</th>
                  <th>Phone Number</th>
                  <th>Status</th>
                  <th>CSE</th>
                  <th>Technician</th>
                  <th>Date Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="tx-color-03 tx-center">1</td>
                  <td class="tx-medium">Demo Franchise</td>
                  <td class="tx-medium">demo.franchise@gmail.com</td>
                  <td class="tx-medium">09069644983</td>
                  <td class="text-medium text-success">Active</td>
                  <td class="text-medium text-center">6</td>
                  <td class="text-medium text-center">2</td>
                  <td class="text-medium">May 15th 2020</td>
                  <td class=" text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                      <a href="#franchiseDetails" data-toggle="modal" class="dropdown-item details text-primary"><i class="far fa-clipboard"></i> Details</a>
                      <a href="{{ route('admin.edit_franchise') }}" class="dropdown-item details text-info"><i class="far fa-edit"></i> Edit</a>
                      {{-- <a href="{{ route('admin.activity_log_cse') }}" class="dropdown-item details"><i class="fas fa-address-card"></i> Activitiy Log</a> --}}
                        <a href="" class="dropdown-item details text-warning"><i class="fas fa-ban"></i> Deactivate</a>
                        <a href="" class="dropdown-item details text-danger"><i class="fas fa-trash"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td class="tx-color-03 tx-center">2</td>
                  <td class="tx-medium">Demo Franchise 2</td>
                  <td class="tx-medium">demo.franchise2@gmail.com</td>
                  <td class="tx-medium">08034516890</td>
                  <td class="text-medium text-success">Active</td>
                  <td class="text-medium text-center">2</td>
                  <td class="text-medium text-center">3</td>
                  <td class="text-medium">May 15th 2020</td>
                  <td class=" text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                      <a href="#franchiseDetails" data-toggle="modal" class="dropdown-item details text-primary"><i class="far fa-clipboard"></i> Details</a>
                      <a href="{{ route('admin.edit_cse') }}" class="dropdown-item details text-info"><i class="far fa-edit"></i> Edit</a>
                      {{-- <a href="{{ route('admin.activity_log_cse') }}" class="dropdown-item details"><i class="fas fa-address-card"></i> Activitiy Log</a> --}}
                      <a href="" class="dropdown-item details text-warning"><i class="fas fa-ban"></i> Deactivate</a>
                        <a href="" class="dropdown-item details text-danger"><i class="fas fa-trash"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
              
                <tr>
                  <td class="tx-color-03 tx-center">3</td>
                  <td class="tx-medium">Demo Franchise 3</td>
                  <td class="tx-medium">demo.franchise3@gmail.com</td>
                  <td class="tx-medium">08034516890</td>
                  <td class="text-medium text-danger">Inactive</td>
                  <td class="text-medium text-center">3</td>
                  <td class="text-medium text-center">3</td>
                  <td class="text-medium">May 15th 2020</td>
                  <td class=" text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                      <a href="#franchiseDetails" data-toggle="modal" class="dropdown-item details text-primary"><i class="far fa-clipboard"></i> Details</a>
                      <a href="{{ route('admin.edit_cse') }}" class="dropdown-item details text-info"><i class="far fa-edit"></i> Edit</a>
                      {{-- <a href="{{ route('admin.activity_log_cse') }}" class="dropdown-item details"><i class="fas fa-address-card"></i> Activitiy Log</a> --}}
                        <a href="" class="dropdown-item details text-success"><i class="fas fa-undo"></i> Reinstate</a>
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
    </div><!-- row -->

  </div><!-- container -->

  <div class="modal fade" id="franchiseDetails" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content bd-0 bg-transparent">
        <div class="modal-body pd-0">
          <a href="" role="button" class="close pos-absolute t-15 r-15 z-index-10" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>

          <div class="row no-gutters">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 bg-white rounded-right">
              <div class="ht-100p d-flex flex-column justify-content-center pd-20 pd-sm-30 pd-md-40">
                <img src="{{ asset('assets/images/cleaning-franchise.png') }}" class="wd-sm-200 rounded float-sm-right" alt="">

                <h3 class="tx-16 tx-sm-20 tx-md-24 mg-b-15 mg-md-b-20">Demo Franchise</h3>
                <p class="tx-14 tx-md-16 tx-color-02">Franchise description ....</p>
                <div class="table-responsive">
                  <table class="table table-striped table-sm mg-b-0">
                    <tbody>
                      <tr>
                        <td class="tx-medium">CAC Number</td>
                        <td class="tx-color-03">2347923074732</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">Date Established</td>
                        <td class="tx-color-03">May 15th 1999</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">E-Mail</td>
                        <td class="tx-color-03">demo.franchise2@gmail.com</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">Phone Number</td>
                        <td class="tx-color-03">09069644983</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">Other Phone Number</td>
                        <td class="tx-color-03"></td>
                      </tr>
                      <tr>
                        <td class="tx-medium">State</td>
                        <td class="tx-color-03">Lagos</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">L.G.A</td>
                        <td class="tx-color-03">Mushin</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">Town/City</td>
                        <td class="tx-color-03">Abule-Ijesha</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">Full Address</td>
                        <td class="tx-color-03">7, Abagbo Close, Victoria Island, Lagos, Nigeria</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">Service Category</td>
                        <td class="tx-color-03">Mobile Phone, Light Fittings, Wiring Repair, Computer</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">Status</td>
                        <td class="tx-color-03">Active</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">CSE's</td>
                        <td class="tx-color-03">2</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">Technicians</td>
                        <td class="tx-color-03">3</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">Date Created</td>
                        <td class="tx-color-03">May 15 2020</td>
                      </tr>
                      
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- modal-body -->
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->

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