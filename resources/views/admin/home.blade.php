@extends('layouts.dashboard')
@section('title', 'Admin Dashboard')
@include('layouts.partials._messages')
@section('content')

<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item active">Dashboard</li>
            {{-- <li class="breadcrumb-item active" aria-current="page">Website Analytics</li> --}}
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Welcome to Fix<span style="color: #E97D1F;">Master</span> Admin Dashboard</h4>
      </div>
      {{-- <div class="d-none d-md-block">
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="save" class="wd-10 mg-r-5"></i> Save</button>
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="upload" class="wd-10 mg-r-5"></i> Export</button>
        <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="share-2" class="wd-10 mg-r-5"></i> Share</button>
        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="sliders" class="wd-10 mg-r-5"></i> Settings</button>
      </div> --}}
    </div>

    <div class="row row-xs">
      <div class="col-lg-12 col-xl-12">
        <div class="card">
          <div class="row mt-1 mb-1 ml-1 mr-1">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Sort</label>
                    <select class="custom-select" id="request-sorting">
                        <option value="None">Select...</option>
                        <option value="Date">Date</option>
                        <option value="Month">Month</option>
                        <option value="Date Range">Date Range</option>
                    </select>
                </div>
            </div><!--end col-->

            <div class="col-md-4 specific-date d-none">
                <div class="form-group position-relative">
                    <label>Specify Date <span class="text-danger">*</span></label>
                    <input name="name" id="name" type="date" class="form-control pl-5">
                </div>
            </div>

            <div class="col-md-4 sort-by-year d-none">
                <div class="form-group position-relative">
                    <label>Specify Year <span class="text-danger">*</span></label>
                    <select class="form-control custom-select" id="Sortbylist-Shop">
                        <option>Select...</option>
                        <option>2018</option>
                        <option>2019</option>
                        <option>2020</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4 sort-by-year d-none">
                <div class="form-group position-relative">
                    <label>Specify Month <span class="text-danger">*</span></label>
                    <select class="form-control custom-select" id="Sortbylist-Shop">
                        <option>Select...</option>
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4 date-range d-none">
                <div class="form-group position-relative">
                    <label>From <span class="text-danger">*</span></label>
                    <input name="name" id="name" type="date" class="form-control pl-5">
                </div>
            </div>

            <div class="col-md-4 date-range d-none">
                <div class="form-group position-relative">
                    <label>To <span class="text-danger">*</span></label>
                    <input name="name" id="name" type="date" class="form-control pl-5">
                </div>
            </div>
          </div>
          
          <div class="row row-xs col-lg-12">
            <div class="col-sm-6 col-lg-3">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Requests</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h5 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $totalRequests }}</h5>
                </div>
                
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Completed Requests</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h5 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $totalCompletedRequests }}</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Ongoing Requests</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h5 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $totalOngoingRequests }}</h5>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Cancelled Requests</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h5 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $totalCancelledRequests }}</h5>
                </div>
              </div>
            </div>
          </div>


          <div class="card-header bd-b-0 pd-t-20 pd-lg-t-25 pd-l-20 pd-lg-l-25 d-flex flex-column flex-sm-row align-items-sm-start justify-content-sm-between">
            <div>
              <h6 class="mg-b-5">Service Request Metrics</h6>
              <p class="tx-12 tx-color-03 mg-b-0">Requests made since inception.</p>
            </div>

            
            <div class="btn-group mg-t-20 mg-sm-t-0">
              {{-- <button class="btn btn-xs btn-white btn-uppercase">Day</button>
              <button class="btn btn-xs btn-white btn-uppercase">Month</button>
              <button class="btn btn-xs btn-white btn-uppercase active">Year</button> --}}
              
            </div><!-- btn-group -->
          </div><!-- card-header -->
          <div class="card-body pd-lg-25">
            <div class="row align-items-sm-end">
              <div class="col-lg-7 col-xl-8">
                <div class="chart-six"><canvas id="chartBar1"></canvas></div>
              </div>
              <div class="col-lg-5 col-xl-4 mg-t-30 mg-lg-t-0">
                <div class="row">
                  <div class="col-sm-6 col-lg-12">
                    <div class="d-flex align-items-center justify-content-between mg-b-5">
                      <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mg-b-0">Total Administrators</h6>
                      {{-- <span class="tx-10 tx-color-04">65</span> --}}
                    </div>
                    <div class="d-flex align-items-end justify-content-between mg-b-5">
                      <h5 class="tx-normal tx-rubik lh-2 mg-b-0">{{ $totalAdmins }}</h5>
                      {{-- <h6 class="tx-normal tx-rubik tx-color-03 lh-2 mg-b-0">20,000</h6> --}}
                    </div>
                    <div class="progress ht-4 mg-b-0 op-5">
                      <div class="progress-bar bg-teal wd-{{ $totalAdmins }}p" role="progressbar" aria-valuenow="{{ $totalAdmins }}" aria-valuemin="0" aria-valuemax="{{ $totalUsers }}"></div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-12 mg-t-30 mg-sm-t-0 mg-lg-t-30">
                    <div class="d-flex align-items-center justify-content-between mg-b-5">
                      <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mg-b-0">Total CSE's</h6>
                      {{-- <span class="tx-10 tx-color-04">45% goal reached</span> --}}
                    </div>
                    <div class="d-flex justify-content-between mg-b-5">
                      <h5 class="tx-normal tx-rubik mg-b-0">{{ $totalCses }}</h5>
                      {{-- <h5 class="tx-normal tx-rubik tx-color-03 mg-b-0"><small>250,000</small></h5> --}}
                    </div>
                    <div class="progress ht-4 mg-b-0 op-5">
                      <div class="progress-bar bg-orange wd-{{ $totalCses }}p" role="progressbar" aria-valuenow="{{ $totalCses }}" aria-valuemin="0" aria-valuemax="{{ $totalUsers }}"></div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-12 mg-t-30">
                    <div class="d-flex align-items-center justify-content-between mg-b-5">
                      <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mg-b-0">Total Technicians</h6>
                      {{-- <span class="tx-10 tx-color-04">20% goal reached</span> --}}
                    </div>
                    <div class="d-flex justify-content-between mg-b-5">
                      <h5 class="tx-normal tx-rubik mg-b-0">{{ $totalTechnicians }}</h5>
                      {{-- <h5 class="tx-normal tx-rubik tx-color-03 mg-b-0"><small>85,000</small></h5> --}}
                    </div>
                    <div class="progress ht-4 mg-b-0 op-5">
                      <div class="progress-bar bg-pink wd-{{ $totalTechnicians }}p" role="progressbar" aria-valuenow="{{ $totalTechnicians }}" aria-valuemin="0" aria-valuemax="{{ $totalUsers }}"></div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-12 mg-t-30">
                    <div class="d-flex align-items-center justify-content-between mg-b-5">
                      <h6 class="tx-uppercase tx-10 tx-spacing-1 tx-color-02 tx-semibold mg-b-0">Clients</h6>
                      {{-- <span class="tx-10 tx-color-04">85% goal reached</span> --}}
                    </div>
                    <div class="d-flex justify-content-between mg-b-5">
                      <h5 class="tx-normal tx-rubik mg-b-0">{{ $totalClients }}</h5>
                      {{-- <h5 class="tx-normal tx-rubik tx-color-03 mg-b-0"><small>30.50%</small></h5> --}}
                    </div>
                    <div class="progress ht-4 mg-b-0 op-5">
                      <div class="progress-bar bg-primary wd-{{ $totalClients }}p" role="progressbar" aria-valuenow="{{ $totalClients }}" aria-valuemin="0" aria-valuemax="{{ $totalUsers }}"></div>
                    </div>
                  </div>
                </div><!-- row -->

              </div>
            </div>
          </div><!-- card-body -->
        </div><!-- card -->
      </div>

      <div class="col-lg-12 col-xl-12 mg-t-10">
        <style>
          canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
          }
        </style>
        <div class="card">
          <div style="width:100%;">
            <canvas id="canvas"></canvas>
          </div>
      </div>
      </div>
      
      <div class="col-md-6 col-xl-4 mg-t-10 order-md-1 order-xl-0">
        <div class="card ht-lg-100p">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="mg-b-0">Highest Requests by L.G.A</h6>
            <div class="tx-13 d-flex align-items-center">
              {{-- <span class="mg-r-5">Country:</span> <a href="" class="d-flex align-items-center link-03 lh-0">USA <i class="icon ion-ios-arrow-down mg-l-5"></i></a> --}}
            </div>
          </div><!-- card-header -->
          <div class="card-body pd-0">
            
            <div class="table-responsive">
              <table class="table table-borderless table-dashboard table-dashboard-one">
                <thead>
                  <tr>
                    <th class="wd-40">L.G.A</th>
                    <th class="wd-25 text-right">Requests</th>
                    <th class="wd-35 text-right">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="tx-medium">Alimosho</td>
                    <td class="text-right">73</td>
                    <td class="text-right">₦150,200.80</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">Kosofe</td>
                    <td class="text-right">64</td>
                    <td class="text-right">₦138,910.20</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">Ibeju-Lekki</td>
                    <td class="text-right">58</td>
                    <td class="text-right">₦132,050.00</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">Mushin</td>
                    <td class="text-right">31</td>
                    <td class="text-right">₦127,762.10</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">Ojo</td>
                    <td class="text-right">17</td>
                    <td class="text-right">₦117,087.50</td>
                  </tr>
                </tbody>
              </table>
            </div><!-- table-responsive -->
          </div><!-- card-body -->
        </div><!-- card -->
      </div><!-- col -->

      
      <div class="col-lg-12 col-xl-8 mg-t-10">
        <div class="card mg-b-10">
          <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
            <div>
              {{-- <h6 class="mg-b-5">Your earnings since inception</h6> --}}
              <p class="tx-13 tx-color-03 mg-b-0">Your Payments gross total since inception</p>
            </div>
            <div class="d-flex mg-t-20 mg-sm-t-0">
              {{-- <div class="btn-group flex-fill">
                <button class="btn btn-white btn-xs active">Range</button>
                <button class="btn btn-white btn-xs">Period</button>
              </div> --}}
            </div>
          </div><!-- card-header -->
          <div class="card-body pd-y-30">
            <div class="d-sm-flex">
              <div class="media">
                <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-teal tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-6">
                  <i data-feather="bar-chart-2"></i>
                </div>
                <div class="media-body">
                  <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8"> Recieved</h6>
                  <h4 class="tx-20 tx-sm-18 tx-md-24 tx-normal tx-rubik mg-b-0">₦{{ number_format($totalAmount) }}</h4>
                </div>
              </div>
              <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-pink tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-5">
                  <i data-feather="bar-chart-2"></i>
                </div>
                <div class="media-body">
                  <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8"> Disbursed</h6>
                  <h4 class="tx-20 tx-sm-18 tx-md-24 tx-normal tx-rubik mg-b-0">₦0</h4>
                </div>
              </div>
              <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-primary tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-4">
                  <i data-feather="bar-chart-2"></i>
                </div>
                <div class="media-body">
                  <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8">Profit/Loss</h6>
                  <h4 class="tx-20 tx-sm-18 tx-md-24 tx-normal tx-rubik mg-b-0 text-success">₦{{ number_format($totalAmount) }}</h4>
                </div>
              </div>
            </div>
          </div><!-- card-body -->
          <div class="table-responsive">
            <h4 class="ml-4 mt-4 mb-4 mg-b-5">Highest Returning Jobs</h4>

            <table class="table table-dashboard mg-b-0">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-right">Job Ref</th>
                  <th class="text-right">Client</th>
                  <th class="text-right">Amount</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach($highestReturningJobs as $highestReturningJob)
                <tr>
                  <td class="text-center">{{ ++$i }}</td>
                  <td class="text-right">{{ $highestReturningJob->job_reference }}</td>
                  <td class="text-right">{{ $highestReturningJob->user->fullname->name }}</td>
                  <td class="tx-medium text-right">₦{{ number_format($highestReturningJob->total_amount) }}</td>
                  <td class="tx-color-03 tx-normal">{{ Carbon\Carbon::parse($highestReturningJob->created_at, 'UTC')->isoFormat('MMMM Do YYYY') }}</td>
                </tr> 
                @endforeach
              </tbody>
            </table>
          </div><!-- table-responsive -->
        </div><!-- card -->

      </div><!-- col -->

      <div class="col-md-6 col-xl-6 mg-t-10">
        <div class="card ht-100p">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="mg-b-0">Recent Payments</h6>
            {{-- <div class="d-flex tx-18">
              <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>
              <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>
            </div> --}}
          </div>
          <ul class="list-group list-group-flush tx-13">
            <li class="list-group-item d-flex pd-sm-x-20">
              <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-teal"><i class="icon ion-md-checkmark"></i></span></div>
              <div class="pd-sm-l-10">
                <p class="tx-medium mg-b-0">Payment from Femi Joseph for REF-234094623496 job</p>
                <small class="tx-12 tx-color-03 mg-b-0">Apr 3, 2020, 12:56pm</small>
              </div>
              <div class="mg-l-auto text-right">
                <p class="tx-medium mg-b-0"> ₦7,000</p>
                <small class="tx-12 tx-success mg-b-0">Completed</small>
              </div>
            </li>
            <li class="list-group-item d-flex pd-sm-x-20">
              <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-teal"><i class="icon ion-md-checkmark"></i></span></div>
              <div class="pd-sm-l-10">
                <p class="tx-medium mg-b-0">Payment from Esuruoso Favour for REF-094009623412 job</p>
                <small class="tx-12 tx-color-03 mg-b-0">Mar 21, 2020, 3:30pm</small>
              </div>
              <div class="mg-l-auto text-right">
                <p class="tx-medium mg-b-0"> ₦4,800</p>
                <small class="tx-12 tx-success mg-b-0">Completed</small>
              </div>
            </li>
            <li class="list-group-item d-flex pd-sm-x-20">
              <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-teal"><i class="icon ion-md-checkmark"></i></span></div>
              <div class="pd-sm-l-10">
                <p class="tx-medium mg-b-0">Payment from Haruna Ahmadu for REF-237290223123</p>
                <small class="tx-12 tx-color-03 mg-b-0">Feb 25, 2020, 8:17am</small>
              </div>
              <div class="mg-l-auto text-right">
                <p class="tx-medium mg-b-0"> ₦2,500</p>
                <small class="tx-12 tx-success mg-b-0">Completed</small>
              </div>
            </li>
            <li class="list-group-item d-flex pd-sm-x-20">
              <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-teal"><i class="icon ion-md-checkmark"></i></span></div>
              <div class="pd-sm-l-10">
                <p class="tx-medium mg-b-0">Payment from Oluyemi Ayotunde for REF-234094623496 job</p>
                <small class="tx-12 tx-color-03 mg-b-0">Jan 18, 2020, 7:30pm</small>
              </div>
              <div class="mg-l-auto text-right">
                <p class="tx-medium mg-b-0"> ₦1,950</p>
                <small class="tx-12 tx-success mg-b-0">Completed</small>
              </div>
            </li>
            <li class="list-group-item d-flex pd-sm-x-20">
              <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-teal"><i class="icon ion-md-checkmark"></i></span></div>
              <div class="pd-sm-l-10">
                <p class="tx-medium mg-b-0">Payment from Cynthia Akam for REF-544199238409 job</p>
                <small class="tx-12 tx-color-03 mg-b-0">Jan 8, 2020, 6:18am</small>
              </div>
              <div class="mg-l-auto text-right">
                <p class="tx-medium mg-b-0"> ₦6,000</p>
                <small class="tx-12 tx-success mg-b-0">Completed</small>
              </div>
            </li>
          </ul>
          <div class="card-footer text-center tx-13">
          <a href="{{ route('admin.received_payments') }}" class="link-03">View All Transactions <i class="icon ion-md-arrow-down mg-l-5"></i></a>
          </div><!-- card-footer -->
        </div><!-- card -->
      </div>

      <div class="col-md-6 col-xl-6 mg-t-10">
        <div class="card ht-100p">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="mg-b-0">CSE's</h6>
            {{-- <div class="d-flex align-items-center tx-18">
              <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>
              <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>
            </div> --}}
          </div>
          <ul class="list-group list-group-flush tx-13">
            <li class="list-group-item d-flex pd-x-20">
              <div class="avatar"><img src="{{ asset('assets/images/default-male-avatar.png') }}" class="rounded-circle" alt=""></div>
              <div class="pd-l-10">
                <p class="tx-medium mg-b-0">Andrew Nwankwo</p>
                <small class="tx-12 tx-color-03 mg-b-0">Completed Jobs: 12</small>
              </div>
              <div class="mg-l-auto d-flex align-self-center">
                <nav class="nav nav-icon-only">
                  <a href="" class="nav-link d-none d-sm-block" title="Revoke login access"><i data-feather="slash"></i></a>
                  <a href="" class="nav-link d-none d-sm-block" title="View Profile"><i data-feather="user"></i></a>
                </nav>
              </div>
            </li>

            <li class="list-group-item d-flex pd-x-20">
              <div class="avatar"><img src="{{ asset('assets/images/default-male-avatar.png') }}" class="rounded-circle" alt=""></div>
              <div class="pd-l-10">
                <p class="tx-medium mg-b-0">Taofeek Adedokun</p>
                <small class="tx-12 tx-color-03 mg-b-0">Completed Jobs: 9</small>
              </div>
              <div class="mg-l-auto d-flex align-self-center">
                <nav class="nav nav-icon-only">
                  <a href="" class="nav-link d-none d-sm-block" title="Revoke login access"><i data-feather="slash"></i></a>
                  <a href="" class="nav-link d-none d-sm-block" title="View Profile"><i data-feather="user"></i></a>
                </nav>
              </div>
            </li>

            <li class="list-group-item d-flex pd-x-20">
              <div class="avatar"><img src="{{ asset('assets/images/default-female-avatar.png') }}" class="rounded-circle" alt=""></div>
              <div class="pd-l-10">
                <p class="tx-medium mg-b-0">Blessing Nnamdi</p>
                <small class="tx-12 tx-color-03 mg-b-0">Completed Jobs: 8</small>
              </div>
              <div class="mg-l-auto d-flex align-self-center">
                <nav class="nav nav-icon-only">
                  <a href="" class="nav-link d-none d-sm-block" title="Revoke login access"><i data-feather="slash"></i></a>
                  <a href="" class="nav-link d-none d-sm-block" title="View Profile"><i data-feather="user"></i></a>
                </nav>
              </div>
            </li>
            <li class="list-group-item d-flex pd-x-20">
              <div class="avatar"><img src="{{ asset('assets/images/default-male-avatar.png') }}" class="rounded-circle" alt=""></div>
              <div class="pd-l-10">
                <p class="tx-medium mg-b-0">Bidemi George</p>
                <small class="tx-12 tx-color-03 mg-b-0">Completed Jobs: 6</small>
              </div>
              <div class="mg-l-auto d-flex align-self-center">
                <nav class="nav nav-icon-only">
                  <a href="" class="nav-link d-none d-sm-block" title="Revoke login access"><i data-feather="slash"></i></a>
                  <a href="" class="nav-link d-none d-sm-block" title="View Profile"><i data-feather="user"></i></a>
                </nav>
              </div>
            </li>

            <li class="list-group-item d-flex pd-x-20">
              <div class="avatar"><img src="{{ asset('assets/images/default-male-avatar.png') }}" class="rounded-circle" alt=""></div>
              <div class="pd-l-10">
                <p class="tx-medium mg-b-0">Isaac Johnson</p>
                <small class="tx-12 tx-color-03 mg-b-0">Completed Jobs: 4</small>
              </div>
              <div class="mg-l-auto d-flex align-self-center">
                <nav class="nav nav-icon-only">
                  <a href="" class="nav-link d-none d-sm-block" title="Revoke login access"><i data-feather="slash"></i></a>
                  <a href="" class="nav-link d-none d-sm-block" title="View Profile"><i data-feather="user"></i></a>
                </nav>
              </div>
            </li>
          </ul>
          <div class="card-footer text-center tx-13">
            <a href="{{ route('admin.list_cse') }}" class="link-03">View More <i class="icon ion-md-arrow-down mg-l-5"></i></a>
          </div><!-- card-footer -->
        </div><!-- card -->
      </div>
      
      <div class="col-lg-6 mg-t-10">
        <div class="card">
          <div class="card-header d-flex align-items-start justify-content-between">
            <h6 class="lh-5 mg-b-0">Total Visits</h6>
            {{-- <a href="" class="tx-13 link-03">Mar 01 - Mar 20, 2019 <i class="icon ion-ios-arrow-down"></i></a> --}}
          </div><!-- card-header -->
          <div class="card-body pd-y-15 pd-x-10">
            <div class="table-responsive">
              <table class="table table-borderless table-sm tx-13 tx-nowrap mg-b-0">
                <thead>
                  <tr class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase">
                    <th class="wd-5p">Link</th>
                    <th>Page Title</th>
                    <th class="text-right">Percentage (%)</th>
                    <th class="text-right">Value</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="align-middle text-center"><a href=""><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a></td>
                    <td class="align-middle tx-medium">Home</td>
                    <td class="align-middle text-right">
                      <div class="wd-150 d-inline-block">
                        <div class="progress ht-4 mg-b-0">
                          <div class="progress-bar bg-teal wd-65p" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-right"><span class="tx-medium">65.35%</span></td>
                  </tr>
                  <tr>
                    <td class="align-middle text-center"><a href=""><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a></td>
                    <td class="align-middle tx-medium">Services</td>
                    <td class="align-middle text-right">
                      <div class="wd-150 d-inline-block">
                        <div class="progress ht-4 mg-b-0">
                          <div class="progress-bar bg-primary wd-85p" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right"><span class="tx-medium">84.97%</span></td>
                  </tr>
                  <tr>
                    <td class="align-middle text-center"><a href=""><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a></td>
                    <td class="align-middle tx-medium">Service Details</td>
                    <td class="align-middle text-right">
                      <div class="wd-150 d-inline-block">
                        <div class="progress ht-4 mg-b-0">
                          <div class="progress-bar bg-warning wd-45p" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right"><span class="tx-medium">38.66%</span></td>
                  </tr>
                  <tr>
                    <td class="align-middle text-center"><a href=""><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a></td>
                    <td class="align-middle tx-medium">Contact Us</td>
                    <td class="align-middle text-right">
                      <div class="wd-150 d-inline-block">
                        <div class="progress ht-4 mg-b-0">
                          <div class="progress-bar bg-pink wd-15p" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right"><span class="tx-medium">16.11%</span></td>
                  </tr>
                  <tr>
                    <td class="align-middle text-center"><a href=""><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a></td>
                    <td class="align-middle tx-medium">How It Works</td>
                    <td class="align-middle text-right">
                      <div class="wd-150 d-inline-block">
                        <div class="progress ht-4 mg-b-0">
                          <div class="progress-bar bg-teal wd-60p" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </td>
                    <td class="text-right"><span class="tx-medium">59.34%</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div><!-- card-body -->
        </div><!-- card -->
      </div><!-- col -->
      
      <div class="col-lg-6 mg-t-10">
        <div class="card">
          <div class="card-header d-sm-flex align-items-start justify-content-between">
            <h6 class="lh-5 mg-b-0">Browser Used By Users</h6>
            {{-- <a href="" class="tx-13 link-03">Mar 01 - Mar 20, 2019 <i class="icon ion-ios-arrow-down"></i></a> --}}
          </div><!-- card-header -->
          <div class="card-body pd-y-15 pd-x-10">
            <div class="table-responsive">
              <table class="table table-borderless table-sm tx-13 tx-nowrap mg-b-0">
                <thead>
                  <tr class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase">
                    <th class="wd-5p">&nbsp;</th>
                    <th>Browser</th>
                    <th class="text-right">Sessions</th>
                    <th class="text-right">Bounce Rate</th>
                    <th class="text-right">Conversion Rate</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><i class="fab fa-chrome tx-primary op-6"></i></td>
                    <td class="tx-medium">Google Chrome</td>
                    <td class="text-right">13,410</td>
                    <td class="text-right">40.95%</td>
                    <td class="text-right">19.45%</td>
                  </tr>
                  <tr>
                    <td><i class="fab fa-firefox tx-orange"></i></td>
                    <td class="tx-medium">Mozilla Firefox</td>
                    <td class="text-right">1,710</td>
                    <td class="text-right">47.58%</td>
                    <td class="text-right">19.99%</td>
                  </tr>
                  <tr>
                    <td><i class="fab fa-safari tx-primary"></i></td>
                    <td class="tx-medium">Apple Safari</td>
                    <td class="text-right">1,340</td>
                    <td class="text-right">56.50%</td>
                    <td class="text-right">11.00%</td>
                  </tr>
                  <tr>
                    <td><i class="fab fa-edge tx-primary"></i></td>
                    <td class="tx-medium">Microsoft Edge</td>
                    <td class="text-right">713</td>
                    <td class="text-right">59.62%</td>
                    <td class="text-right">4.69%</td>
                  </tr>
                  <tr>
                    <td><i class="fab fa-opera tx-danger"></i></td>
                    <td class="tx-medium">Opera</td>
                    <td class="text-right">380</td>
                    <td class="text-right">52.50%</td>
                    <td class="text-right">8.75%</td>
                  </tr>
                </tbody>
              </table>
            </div><!-- table-responsive -->
          </div><!-- card-body -->
        </div><!-- card -->
      </div><!-- col -->

    </div><!-- row -->
  </div><!-- container -->
</div>


@section('scripts')
<script src="{{ asset('assets/dashboard/assets/js/chart294.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/js/utils.js') }}"></script>
{{-- <script src="https://www.chartjs.org/samples/latest/utils.js"></script> --}}

<script>
  var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  var config = {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [{
        label: 'Payments Disbursed',
        borderColor: window.chartColors.red,
        backgroundColor: window.chartColors.red,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ],
      }, {
        label: 'Requests',
        borderColor: window.chartColors.blue,
        backgroundColor: window.chartColors.blue,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ],
      }, {
        label: 'Payments Recieved',
        borderColor: window.chartColors.green,
        backgroundColor: window.chartColors.green,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ],
      }], 
    },
    options: {
      responsive: true,
      title: {
        display: true,
        text: 'Payments/Requests Chart'
      },
      tooltips: {
        mode: 'index',
      },
      hover: {
        mode: 'index'
      },
      scales: {
        xAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'Month'
          }
        }],
        yAxes: [{
          stacked: true,
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }]
      }
    }
  };

  window.onload = function() {
    var ctx = document.getElementById('canvas').getContext('2d');
    window.myLine = new Chart(ctx, config);
  };

  document.getElementById('randomizeData').addEventListener('click', function() {
    config.data.datasets.forEach(function(dataset) {
      dataset.data = dataset.data.map(function() {
        return randomScalingFactor();
      });

    });

    window.myLine.update();
  });

  var colorNames = Object.keys(window.chartColors);
  document.getElementById('addDataset').addEventListener('click', function() {
    var colorName = colorNames[config.data.datasets.length % colorNames.length];
    var newColor = window.chartColors[colorName];
    var newDataset = {
      label: 'Dataset ' + config.data.datasets.length,
      borderColor: newColor,
      backgroundColor: newColor,
      data: [],
    };

    for (var index = 0; index < config.data.labels.length; ++index) {
      newDataset.data.push(randomScalingFactor());
    }

    config.data.datasets.push(newDataset);
    window.myLine.update();
  });

  document.getElementById('addData').addEventListener('click', function() {
    if (config.data.datasets.length > 0) {
      var month = MONTHS[config.data.labels.length % MONTHS.length];
      config.data.labels.push(month);

      config.data.datasets.forEach(function(dataset) {
        dataset.data.push(randomScalingFactor());
      });

      window.myLine.update();
    }
  });

  document.getElementById('removeDataset').addEventListener('click', function() {
    config.data.datasets.splice(0, 1);
    window.myLine.update();
  });

  document.getElementById('removeData').addEventListener('click', function() {
    config.data.labels.splice(-1, 1); // remove the label first

    config.data.datasets.forEach(function(dataset) {
      dataset.data.pop();
    });

    window.myLine.update();
  });
</script>
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