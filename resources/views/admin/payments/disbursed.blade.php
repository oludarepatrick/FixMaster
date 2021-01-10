@extends('layouts.dashboard')
@section('title', 'Payments Disbursed')
@include('layouts.partials._messages')
@section('content')

<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('cse.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Payments Disbursed</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Payments Disbursed</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-12 justify-content-center text-center align-items-center">
        <a href="#recordPayment" class="btn btn-primary float-right" data-toggle="modal"><i class="fas fa-plus"></i> Record Payment</a>
      </div>

      <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card mg-b-10">
          <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
            <div>
              <h6 class="mg-b-5">Your Most Recent Payments</h6>
            <p class="tx-13 tx-color-03 mg-b-0">This table displays a list of <strong>Payments</strong> made by <span>FixMaster</span> as of <strong>{{ date('l jS F Y') }}</strong>.</p>
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
                  <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0">{{ $disbursedPayments->count() }}</h4>
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
                  <th>Recorded By</th>
                  <th>Recipient</th>
                  <th>Job Role</th>
                  <th>Amount</th>
                  {{-- <th>Status</th> --}}
                  <th class="text-center">Payment Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach($disbursedPayments as $disbursedPayment)
                  <tr>
                    <td class="tx-color-03 tx-center">{{ ++$i }}</td>
                    <td class="tx-medium">{{ $disbursedPayment->serviceRequest->job_reference }}</td>
                    <td class="tx-medium">{{ $disbursedPayment->payment_reference }}</td>
                    <td class="tx-medium">{{ $disbursedPayment->user->fullName->name }}</td>
                    <td class="tx-medium">{{ $disbursedPayment->recipient->fullName->name }}</td>
                    <td class="tx-medium">
                      @if($disbursedPayment->recipient->designation == '[CSE_ROLE]')
                        CSE
                      @else 
                        Technician
                      @endif
                      
                    </td>
                    <td class="tx-medium">₦{{ number_format($disbursedPayment->amount) }}</td>
                    {{-- <td class="text-medium text-success">Paid</td> --}}
                    <td class="text-medium tx-center">{{ Carbon\Carbon::parse($disbursedPayment->created_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }}</td>
                  </tr>
                @endforeach
                
              </tbody>
            </table>
          </div><!-- table-responsive -->
        </div><!-- card -->

      </div><!-- col -->
    </div><!-- row -->


  </div><!-- container -->
</div>

<div class="modal fade" id="recordPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content tx-14">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Record Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">
        <form method="POST" action="{{ route('admin.record_payments') }}">
          @csrf
          <div class="col-md-12">
            <div class="form-row">
                <div class="form-group col-md-12 remove-class">
                  <label>Ongoing Service Requests</label>
                  <select class="custom-select @error('service_request_id') is-invalid @enderror" id="ongoing_requests" name="service_request_id">
                      <option value="" selected>Select...</option>
                      @foreach ($ongoingServiceRequests as $ongoingServiceRequest)
                          <option value="{{ $ongoingServiceRequest->id }}" {{ old('service_request_id') == $ongoingServiceRequest->id ? 'selected' : ''}} data-url="{{ route('admin.ongoing_service_request_detail', $ongoingServiceRequest->id) }}">{{ $ongoingServiceRequest->job_reference }}</option>
                      @endforeach
                  </select>
                  @error('service_request_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group col-md-6 request-detail" id="request-list"><div id="spinner-icon-request"></div></div>
                
                
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="payment_mode">Payment Mode</label>
                <select class="custom-select @error('payment_mode') is-invalid @enderror" id="payment_mode" name="payment_mode">
                  <option selected value="">Select...</option>
                  <option value="1" {{ old('payment_mode') == '1' ? 'selected' : ''}}>ATM Transfer</option>
                  <option value="2" {{ old('payment_mode') == '2' ? 'selected' : ''}}>Bank Transfer</option>
                  <option value="3" {{ old('payment_mode') == '3' ? 'selected' : ''}}>Internet Banking</option>
                  <option value="4" {{ old('payment_mode') == '4' ? 'selected' : ''}}>USSD Transfer</option>
                </select>
                @error('payment_mode')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group col-md-6">
                  <label for="payment_reference">Reference No.</label>
                  <input type="text" class="form-control @error('payment_reference') is-invalid @enderror" id="payment_reference" name="payment_reference" value="{{ old('amount') }}" autocomplete="off" placeholder="Reference Number">
                  @error('payment_reference')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="amount">Amount</label>
                  <input type="tel" class="form-control amount @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" maxlength="10" autocomplete="off" placeholder="Amount">
                  @error('amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group col-md-6">
                <label for="payment_date">Payment Date</label>
                <input type="date" class="form-control @error('payment_date') is-invalid @enderror" id="payment_date" max="{{ \Carbon\Carbon::now()->isoFormat('MMMM Do YYYY, h:mm') }}" name="payment_date" value="{{ old('payment_date') }}">
                @error('payment_date')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              
            </div>
           
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="comment">Comments (Optional)</label>
                <textarea class="form-control @error('comment') is-invalid @enderror" rows="3" name="comment" id="comment">{{ old('comment') }}</textarea>
                @error('comment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            
          </div>

          <div class="col-md-12 mt-4">
            <button type="submit" class="btn btn-primary">Create</button>
          </div>

        </form>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>

@push('scripts')

<script src="{{ asset('assets/dashboard/assets/js/dashforge.mail.js') }}"></script>

<script>
  $(document).ready(function (){

    //Set Payment max date to Today's date
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    $('#payment_date').attr('max', today);

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