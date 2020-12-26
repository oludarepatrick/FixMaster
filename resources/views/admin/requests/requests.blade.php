@extends('layouts.dashboard')
@section('title', 'New Requests')
@include('layouts.partials._messages')
@section('content')

<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('cse.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">New Requests</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">New Requests</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card mg-b-10">
          <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
            <div>
              <h6 class="mg-b-5">Your Most Recent Requets</h6>
              <p class="tx-13 tx-color-03 mg-b-0">This table displays a list of <strong>New Requests</strong> assigned  by FixMaster Admin after careful understudy of each request and with assumed initial payments made by the clients.</p>
            </div>
            
          </div><!-- card-header -->
          <div class="card-body pd-y-30">
            <div class="d-sm-flex">
              <div class="media">
                <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-teal tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-6">
                  <i data-feather="bar-chart-2"></i>
                </div>
                <div class="media-body">
                  <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8">Total Requests</h6>
                <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0">{{ $serviceRequests->count() }}</h4>
                </div>
              </div>
              
            </div>
          </div><!-- card-body -->
          <div class="table-responsive">
            <table class="table table-hover mg-b-0" id="basicExample">
              <thead class="thead-primary">
                <tr>
                  <th class="text-center">#</th>
                  <th>Job Ref.</th>
                  <th>Client</th>
                  <th>Phone Number</th>
                  <th class="text-center">Amount</th>
                  <th>Status</th>
                  <th>Scheduled Date</th>
                  <th class=" text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($serviceRequests as $serviceRequest)
                  <tr 
                    @if((\Carbon\Carbon::now() > Carbon\Carbon::parse($serviceRequest->serviceRequestDetail->timestamp, 'UTC')) || (\Carbon\Carbon::now() == Carbon\Carbon::parse($serviceRequest->serviceRequestDetail->timestamp, 'UTC')))
                      class="table-danger"
                    @elseif(\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($serviceRequest->serviceRequestDetail->timestamp, 'UTC')) == 1)
                      class="table-warning"
                    @endif
                  >
                    <td class="tx-color-03 tx-center">{{ ++$i }}</td>
                    <td class="tx-medium">{{ $serviceRequest->job_reference }}</td>
                    <td class="tx-medium">{{ $serviceRequest->user->fullName->name }}</td>
                    <td class="tx-medium">{{ $serviceRequest->serviceRequestDetail->phone_number }}</td>
                    <td class="text-medium text-center">
                      @if(!empty($serviceRequest->serviceRequestDetail->discount_service_fee))
                          ₦{{ number_format($serviceRequest->serviceRequestDetail->discount_service_fee) }}
                          <br><span style="font-size: 10px;" class="text-success">Discount</span>
                      @else
                          ₦{{ number_format($serviceRequest->serviceRequestDetail->initial_service_fee) }}
                      @endif
                    </td>
                    <td class="text-medium text-success">{{ $serviceRequest->serviceRequestStatus->name }}</td>
                    <td class="text-medium">{{ $serviceRequest->serviceRequestDetail->timestamp ?? '' }}</td>
                    <td class=" text-center">
                      <div class="dropdown-file">
                        <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('admin.request_details', $serviceRequest->id) }}" class="dropdown-item details"><i class="far fa-clipboard"></i> Details</a>
                        </div>
                      </div>
                    </td>
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