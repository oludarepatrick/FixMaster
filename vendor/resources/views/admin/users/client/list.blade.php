@extends('layouts.dashboard')
@section('title', 'Client List')
@include('layouts.partials._messages')
@section('content')

<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Client List</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Client List</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card mg-b-10">
          <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
            <div>
              <h6 class="mg-b-5">Clients as of {{ date('M, d Y') }}</h6>
              <p class="tx-13 tx-color-03 mg-b-0">This table displays a list of all FixMaster Clients.</p>
            </div>
            
          </div><!-- card-header -->
         
          <div class="table-responsive">
            
            <table class="table table-hover mg-b-0" id="basicExample">
              <thead class="thead-primary">
                <tr>
                  <th class="text-center">#</th>
                  <th>Full Name</th>
                  <th>E-Mail</th>
                  <th>Phone Number</th>
                  <th>Status</th>
                  <th>Requests</th>
                  <th>Date Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="tx-color-03 tx-center">1</td>
                  <td class="tx-medium">Haruna Ahmadu</td>
                  <td class="tx-medium">akhmadharuna@gmail.com</td>
                  <td class="tx-medium">07034776388</td>
                  <td class="text-medium text-success">Active</td>
                  <td class="text-medium text-center">6</td>
                  <td class="text-medium">May 15th 2020</td>
                  <td class=" text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                      <a href="{{ route('admin.summary_client') }}" class="dropdown-item details text-primary"><i class="far fa-user"></i> Summary</a>
                      <a href="" class="dropdown-item details text-warning"><i class="fas fa-ban"></i> Deactivate</a>
                      <a href="" class="dropdown-item details text-danger"><i class="fas fa-trash"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td class="tx-color-03 tx-center">2</td>
                  <td class="tx-medium">Esuruoso Favour</td>
                  <td class="tx-medium">fesuruoso@gmail.com</td>
                  <td class="tx-medium">08034516890</td>
                  <td class="text-medium text-success">Active</td>
                  <td class="text-medium text-center">10</td>
                  <td class="text-medium">May 15th 2020</td>
                  <td class=" text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                      <a href="{{ route('admin.summary_client') }}" class="dropdown-item details text-primary"><i class="far fa-user"></i> Summary</a>
                      <a href="" class="dropdown-item details text-warning"><i class="fas fa-ban"></i> Deactivate</a>
                      <a href="" class="dropdown-item details text-danger"><i class="fas fa-trash"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
              
                <tr>
                  <td class="tx-color-03 tx-center">3</td>
                  <td class="tx-medium">Oluyemi Ayotunde</td>
                  <td class="tx-medium">ayotundeoluyemi99@gmail.com	</td>
                  <td class="tx-medium">08034516890</td>
                  <td class="text-medium text-danger">Inactive</td>
                  <td class="text-medium text-center">3</td>
                  <td class="text-medium">May 15th 2020</td>
                  <td class=" text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                      <a href="{{ route('admin.summary_client') }}" class="dropdown-item details text-primary"><i class="far fa-user"></i> Summary</a>
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
    </div><!-- row -->

  </div><!-- container -->
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