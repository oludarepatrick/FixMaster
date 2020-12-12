@extends('layouts.dashboard')
@section('title', 'Activity Log')
@include('layouts.partials._messages')
@section('content')
<div class="content-body">
    <div class="container pd-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('cse.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Activity Log</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">All Activity Log</h4>
        </div>
      </div>

      <div class="row row-xs">
        <div class="col-lg-12 col-xl-12 mg-t-10">
          <div class="card mg-b-10">
            <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
              <div>
                <h6 class="mg-b-5">Activity Log</h6>
                <p class="tx-13 tx-color-03 mg-b-0">Use the select dropdowns to sort Activity Logs.</p>
              </div>
              
            </div><!-- card-header -->
           
            <div class="table-responsive">
              <div class="row mt-1 mb-1 ml-1 mr-1">
                <div class="col-md-3">
                  <div class="form-group">
                      <label>Sort Type</label>
                      <select class="custom-select">
                          <option selected value="None">Select...</option>
                          <option value="Date Range">Others</option>
                          <option value="Date">Payments</option>
                          <option value="Month">Requests</option>
                      </select>
                  </div>
                </div><!--end col-->
  
  
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Sort Date</label>
                        <select class="custom-select" id="request-sorting">
                            <option value="None">Select...</option>
                            <option value="Date">Date</option>
                            <option value="Month">Month</option>
                            <option value="Date Range">Date Range</option>
                        </select>
                    </div>
                </div><!--end col-->
    
                <div class="col-md-3 specific-date d-none">
                    <div class="form-group position-relative">
                        <label>Specify Date <span class="text-danger">*</span></label>
                        <input name="name" id="name" type="date" class="form-control pl-5">
                    </div>
                </div>
    
                <div class="col-md-3 sort-by-year d-none">
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
    
                <div class="col-md-3 sort-by-year d-none">
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
    
                <div class="col-md-3 date-range d-none">
                    <div class="form-group position-relative">
                        <label>From <span class="text-danger">*</span></label>
                        <input name="name" id="name" type="date" class="form-control pl-5">
                    </div>
                </div>
    
                <div class="col-md-3 date-range d-none">
                    <div class="form-group position-relative">
                        <label>To <span class="text-danger">*</span></label>
                        <input name="name" id="name" type="date" class="form-control pl-5">
                    </div>
                </div>
              </div>
  
              <table class="table table-dashboard mg-b-0" id="basicExample">
                <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="20%">Date Created</th>
                    <th width="75%">Message</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($activityLogs as $activityLog)
                    <tr>
                    <td class="tx-color-03">{{ ++$i }}</td>
                    <td class="tx-medium">{{ Carbon\Carbon::parse($activityLog->created_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }}</td>
                    <td class="tx-medium text-success">{{ $activityLog->message }}</td>
                    </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div><!-- table-responsive -->

            {{-- <div class="float-right">
              <span class="d-flex justify-content-end">{{ $activityLogs->links() }}</span>
            </div> --}}
          </div><!-- card -->
          
        </div><!-- col -->
      </div><!-- row -->
      
    </div>
</div>
@endsection