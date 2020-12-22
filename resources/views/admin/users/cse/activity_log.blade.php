@extends('layouts.dashboard')
@section('title', 'Godfrey Diwa\'s Summary')
@include('layouts.partials._messages')
@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.list_cse') }}">CSE List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Activity Log</li>
          </ol>
        </nav>
        {{-- <h4 class="mg-b-0 tx-spacing--1">Administrators List</h4> --}}
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
                        <option value="None">Select...</option>
                        <option selected value="Date Range">Others</option>
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
                <tr>
                  <td class="tx-color-03">1</td>
                  <td class="tx-medium">June 20th 2018, 7:15:29 am</td>
                  <td class="tx-medium">Logged In successfully</td>
                </tr>

                <tr>
                  <td class="tx-color-03">2</td>
                  <td class="tx-medium">June 18th 2018, 6:18:56 pm</td>
                  <td class="tx-medium">Updated profile</td>
                </tr>

                <tr>
                  <td class="tx-color-03">3</td>
                  <td class="tx-medium">June 18th 2018, 5:34:15 pm</td>
                  <td class="tx-medium">Changed password</td>
                </tr>

                <tr>
                  <td class="tx-color-03">4</td>
                  <td class="tx-medium">June 15th 2018, 5:34:15 pm</td>
                  <td class="tx-medium">Logged Out</td>
                </tr>
              

              </tbody>
            </table>
          </div><!-- table-responsive -->
        </div><!-- card -->

      </div><!-- col -->
    </div><!-- row -->

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