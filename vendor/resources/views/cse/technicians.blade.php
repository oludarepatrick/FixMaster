@extends('layouts.dashboard')
@section('title', 'Technicians')
@include('layouts.partials._messages')
@section('content')

<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('cse.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Technicians</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Technicians</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card mg-b-10">
          <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
            <div>
              <h6 class="mg-b-5">Your Most Recent Requets</h6>
            <p class="tx-13 tx-color-03 mg-b-0">This table displays a list of <strong>Technicians</strong> assigned  as of <strong>{{ date('l jS F Y') }}</strong>.</p>
            </div>
            
          </div><!-- card-header -->
          <div class="card-body pd-y-30">
            <div class="d-sm-flex">
              <div class="media">
                <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-teal tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-6">
                  <i data-feather="bar-chart-2"></i>
                </div>
                <div class="media-body">
                  <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8">Total Technician/Artisans</h6>
                  <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0">8</h4>
                </div>
              </div>
              
            </div>
          </div><!-- card-body -->
          <div class="table-responsive">
            <table class="table table-hover mg-b-0" id="basicExample">
              <thead class="thead-primary">
                <tr>
                  <th class="text-center">#</th>
                  <th>Full Name</th>
                  <th>Technician ID</th>
                  <th>E-Mail</th>
                  <th class="text-center">Jobs Completed</th>
                  <th>Status</th>
                  <th class="text-center">Date Created</th>
                  <th class=" text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="tx-color-03 tx-center">1</td>
                  <td class="tx-medium">Andrew Nwankwo</td>
                  <td class="tx-medium">TECH-2397329759</td>
                  <td class="tx-medium">andrew.nwankwo@gmail.com</td>
                  <td class="text-medium text-center">12</td>
                  <td class="text-medium text-success">Active</td>
                  <td class="text-medium">May 15th 2020</td>
                  <td class=" text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('cse.technicians_profile') }}" class="dropdown-item details"><i class="far fa-clipboard"></i> Details</a>
                        {{-- <a href="#" class="dropdown-item details text-warning"><i class="fas fa-user-lock"></i> Deactivate</a>
                        <a href="#" class="dropdown-item details text-danger"><i class="far fa-trash-alt"></i> Delete</a> --}}
                      </div>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td class="tx-color-03 tx-center">2</td>
                  <td class="tx-medium">Taofeek Adedokun</td>
                  <td class="tx-medium">TECH-08435784394</td>
                  <td class="tx-medium">taofeek.adedokun@gmail.com</td>
                  <td class="text-medium text-center">9</td>
                  <td class="text-medium text-success">Active</td>
                  <td class="text-medium">May 12th 2020</td>
                  <td class=" text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('cse.technicians_profile') }}" class="dropdown-item details"><i class="far fa-clipboard"></i> Details</a>
                        {{-- <a href="#" class="dropdown-item details text-warning"><i class="fas fa-user-lock"></i> Deactivate</a>
                        <a href="#" class="dropdown-item details text-danger"><i class="far fa-trash-alt"></i> Delete</a> --}}
                      </div>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td class="tx-color-03 tx-center">3</td>
                  <td class="tx-medium">Blessing Nnamdi</td>
                  <td class="tx-medium">TECH-237290223123</td>
                  <td class="tx-medium">blessing.nnamdi@yahoo.com</td>
                  <td class="text-medium text-center">8</td>
                  <td class="text-medium text-success">Active</td>
                  <td class="text-medium">May 11th 2020</td>
                  <td class=" text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('cse.technicians_profile') }}" class="dropdown-item details"><i class="far fa-clipboard"></i> Details</a>
                        {{-- <a href="#" class="dropdown-item details text-warning"><i class="fas fa-user-lock"></i> Deactivate</a>
                        <a href="#" class="dropdown-item details text-danger"><i class="far fa-trash-alt"></i> Delete</a> --}}
                      </div>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td class="tx-color-03 tx-center">4</td>
                  <td class="tx-medium">Bidemi George</td>
                  <td class="tx-medium">TECH-234094623496</td>
                  <td class="tx-medium">bidemi.george@yahoo.com</td>
                  <td class="text-medium text-center">6</td>
                  <td class="text-medium text-success">Active</td>
                  <td class="text-medium">May 11th 2020</td>
                  <td class=" text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('cse.technicians_profile') }}" class="dropdown-item details"><i class="far fa-clipboard"></i> Details</a>
                        {{-- <a href="#" class="dropdown-item details text-warning"><i class="fas fa-user-lock"></i> Deactivate</a>
                        <a href="#" class="dropdown-item details text-danger"><i class="far fa-trash-alt"></i> Delete</a> --}}
                      </div>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td class="tx-color-03 tx-center">5</td>
                  <td class="tx-medium">Isaac Johnson</td>
                  <td class="tx-medium">TECH-874214626696</td>
                  <td class="tx-medium">isaac.johnson@outlook.co.uk</td>
                  <td class="text-medium text-center">4</td>
                  <td class="text-medium text-danger">Inactive</td>
                  <td class="text-medium">May 11th 2020</td>
                  <td class=" text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                      <a href="{{ route('cse.technicians_profile') }}" class="dropdown-item details"><i class="far fa-clipboard"></i> Details</a>
                      {{-- <a href="#" class="dropdown-item details text-primary"><i class="fas fa-unlock-alt"></i> Activate</a>
                      <a href="#" class="dropdown-item details text-danger"><i class="far fa-trash-alt"></i> Delete</a> --}}
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

@endsection