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
                <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0">{{ $receivedPayments->count() }}</h4>
                </div>
              </div>

              <div class="media mg-t-20 mg-sm-t-0 mg-sm-l-15 mg-md-l-40">
                <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-pink tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-5">
                  <i data-feather="bar-chart-2"></i>
                </div>
                <div class="media-body">
                  <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold mg-b-5 mg-md-b-8"> Total Amount</h6>
                  <h4 class="tx-20 tx-sm-18 tx-md-24 tx-normal tx-rubik mg-b-0">₦{{ number_format($totalAmounts) }}</h4>
                </div>
              </div>
              
            </div>
          </div><!-- card-body -->
          <div class="table-responsive">
            <div class="row mt-1 mb-1 ml-1 mr-1">
              {{-- <input value="{{ $userId }}" type="hidden" id="user_id"> --}}
              <input value="{{ route("admin.recieved_payments_sorting") }}" type="hidden" id="route">
              <div class="col-md-4">
                  <div class="form-group">
                      <label>Sort Type</label>
                      <select class="custom-select" id="sort_by_range">
                          <option value="None">Select...</option>
                          <option value="Date">Date</option>
                          <option value="Month">Month</option>
                          <option value="Year">Year</option>
                          <option value="Date Range">Date Range</option>
                      </select>
                  </div>
              </div><!--end col-->
  
              <div class="col-md-3 specific-date d-none">
                  <div class="form-group position-relative">
                      <label>Specify Date <span class="text-danger">*</span></label>
                      <input name="name" id="specific_date" type="date" class="form-control pl-5">
                  </div>
              </div>
  
              <div class="col-md-3 sort-by-year d-none">
                  <div class="form-group position-relative">
                      <label>Specify Year <span class="text-danger">*</span></label>
                      <select class="form-control custom-select" id="sort_by_year">
                          <option value="">Select...</option>
                          @foreach ($years as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
  
              <div class="col-md-4 sort-by-year d-none" id="sort-by-month">
                <div class="form-group position-relative">
                    <label>Specify Month <span class="text-danger">*</span></label>
                    <select class="form-control custom-select" id="sort_by_month">
                        <option value="">Select...</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                </div>
              </div>
  
              <div class="col-md-3 date-range d-none">
                  <div class="form-group position-relative">
                      <label>From <span class="text-danger">*</span></label>
                      <input name="name" id="date_from" type="date" class="form-control pl-5">
                  </div>
              </div>
  
              <div class="col-md-3 date-range d-none">
                  <div class="form-group position-relative">
                      <label>To <span class="text-danger">*</span></label>
                      <input name="name" id="date_to" type="date" class="form-control pl-5">
                  </div>
              </div>
            </div>
            <div id="sort_table">
              @include('admin.payments._received_table')
            </div>
          </div><!-- table-responsive -->
        </div><!-- card -->

      </div><!-- col -->
    </div><!-- row -->


  </div><!-- container -->
</div>

@push('scripts')

<script src="{{ asset('assets/dashboard/assets/js/payments-sorting.js') }}"></script>

<script>
  $(document).ready(function (){

    //Set Payment max date to Today's date
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    $('#payment_date, #date_to, #date_from, #specific_date').attr('max', today);

    //Get list of users by a particular service request reference
    $(document).on('change', '#ongoing_requests', function () {

        let user = $(this).find('option:selected').text();
        let route = $(this).find('option:selected').data('url');

        $.ajaxSetup({
            headers: {
                'X-CSRF_TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: route,
            beforeSend: function() {
                $("#spinner-icon-admin").html('<div class="d-flex justify-content-center mt-4 mb-4" style="margin-left: 40px !important"><span class="loadingspinner"></span></div>');
            },
            // return the result
            success: function(result) {
                $('.remove-class').removeClass('col-md-12');
                $('.remove-class').addClass('col-md-6');
                $('#request-list').html('');
                $('#request-list').html(result);
            },
            complete: function() {
                $("#spinner-icon").hide();
            },
            error: function(jqXHR, testStatus, error) {
                var message = error+ ' An error occured while trying to retireve '+ user +' detail.';
                var type = 'error';
                displayMessage(message, type);
                $("#spinner-icon-admin").hide();
            },
            timeout: 8000
        })  
    });

  });
</script>

@endpush

@endsection