@extends('layouts.dashboard')
@section('title', 'Payments Received')
@include('layouts.partials._messages')
@section('content')

<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('cse.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Payments Received</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Payments Received</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card mg-b-10">
          <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
            <div>
              <h6 class="mg-b-5">Your Most Recent Payments Received</h6>
            <p class="tx-13 tx-color-03 mg-b-0">This table displays a list of <strong>Payments</strong> made by <span>FixMaster</span> Client's as of <strong>{{ date('l jS F Y') }}</strong>.</p>
            </div>
            
          </div><!-- card-header -->
          <div class="card-body pd-y-30">
            <div class="d-sm-flex">
              <div class="media">
                <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-teal tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-6">
                  <i data-feather="bar-chart-2"></i>
                </div>
                <div class="media-body">
                  <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8">Total Payments</h6>
                  <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0">8</h4>
                </div>
              </div>
              
            </div>
          </div><!-- card-body -->
          <div class="table-responsive">
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
            <table class="table table-hover mg-b-0" id="basicExample">
              <thead class="thead-primary">
                <tr>
                  <th class="text-center">#</th>
                  <th>Job Reference</th>
                  <th>Reference No</th>
                  <th>Client Name</th>
                  <th>Payment Method</th>
                  <th>Payment Type</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th class="text-center">Payment Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="tx-color-03 tx-center">1</td>
                  <td class="tx-medium">REF-234094623496</td>
                  <td class="tx-medium">234092734623496</td>
                  <td class="tx-medium">Femi Joseph</td>
                  <td class="tx-medium">Payment Gateway(Paystack)</td>
                  <td class="tx-medium">Credit</td>
                  <td class="tx-medium">₦7,000</td>
                  <td class="text-medium text-success">Paid</td>
                  <td class="text-medium tx-center">Apr 3, 2020, 12:56pm</td>
                </tr>

                <tr>
                    <td class="tx-color-03 tx-center">2</td>
                    <td class="tx-medium">REF-094009623412</td>
                    <td class="tx-medium">4352927346209232</td>
                    <td class="tx-medium">Haruna Ahmadu</td>
                    <td class="tx-medium">Payment Gateway(Flutterwave)</td>
                    <td class="tx-medium">Credit</td>
                    <td class="tx-medium">₦4,800</td>
                    <td class="text-medium text-success">Paid</td>
                    <td class="text-medium tx-center">Mar 21, 2020, 3:30pm</td>
                </tr>

                <tr>
                    <td class="tx-color-03 tx-center">3</td>
                    <td class="tx-medium">REF-237290223123</td>
                    <td class="tx-medium">1234527346092372</td>
                    <td class="tx-medium">Femi Joseph</td>
                    <td class="tx-medium">E-Wallet</td>
                    <td class="tx-medium">Debit</td>
                    <td class="tx-medium">₦2,500</td>
                    <td class="text-medium text-success">Paid</td>
                    <td class="text-medium tx-center">Feb 25, 2020, 8:17am</td>
                </tr>

                <tr>
                  <td class="tx-color-03 tx-center">4</td>
                  <td class="tx-medium">REF-063846273522</td>
                  <td class="tx-medium">0327426348329762</td>
                  <td class="tx-medium">Oluyemi Ayotunde</td>
                  <td class="tx-medium">E-Wallet</td>
                  <td class="tx-medium">Credit</td>
                  <td class="tx-medium">₦7,250</td>
                  <td class="text-medium text-success">Paid</td>
                  <td class="text-medium tx-center">Feb 25, 2020, 8:17am</td>
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