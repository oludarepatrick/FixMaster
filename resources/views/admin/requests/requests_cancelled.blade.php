@extends('layouts.dashboard')
@section('title', 'Cancelled Requests')
@include('layouts.partials._messages')
@section('content')

<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('cse.home') }}">Dashboard</a></li>
          {{-- <li class="breadcrumb-item">Requests</li> --}}
            <li class="breadcrumb-item active" aria-current="page">Cancelled Requests</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Cancelled Requests</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card mg-b-10">
          <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
            <div>
              <h6 class="mg-b-5">Your Most Recent Requets</h6>
              <p class="tx-13 tx-color-03 mg-b-0">This table displays a list of <strong>Cancelled Requests</strong> assigned  by FixMaster Admin.</p>
            </div>
            
          </div><!-- card-header -->
          <div class="card-body pd-y-30">
            <div class="d-sm-flex">
              <div class="media">
                <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-danger tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-6">
                  <i data-feather="bar-chart-2"></i>
                </div>
                <div class="media-body">
                  <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8">Total Requests</h6>
                  <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0">{{ $serviceRequests->where('service_request_status_id', '>', '2')->count() }}</h4>
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
                  <th class="text-center">Amount</th>
                  <th>Status</th>
                  <th class="text-center">Date Cancelled</th>
                  <th class=" text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($serviceRequests as $serviceRequest)
                <tr>
                  <td class="tx-color-03 tx-center">{{ ++$i }}</td>
                  <td class="tx-medium">{{ $serviceRequest->job_reference }}</td>
                  <td class="tx-medium">{{ $serviceRequest->user->fullName->name }}</td>
                  <td class="tx-medium">@if(!empty($serviceRequest->admin)) {{ $serviceRequest->admin->first_name.' '.$serviceRequest->admin->last_name }} @endif</td>
                  <td class="tx-medium">@if(!empty($serviceRequest->cse)) {{ $serviceRequest->cse->first_name.' '.$serviceRequest->cse->last_name }} @endif</td>
                  <td class="tx-medium">@if(!empty($serviceRequest->technician)) {{ $serviceRequest->technician->first_name.' '.$serviceRequest->technician->last_name }} @endif</td>
                  <td class="tx-medium text-center">₦{{ number_format($serviceRequest->total_amount) }}</td>
                  <td class="tx-medium tx-center text-success">{{ $serviceRequest->serviceRequestStatus->name }}</td>
                  <td class="tx-medium text-center">{{ $serviceRequest->serviceRequestDetail->timestamp ?? '' }}</td>
                  <td class="text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                      <a href="{{ route('admin.request_ongoing_details', $serviceRequest->id) }}"class="dropdown-item details"><i class="fas fa-clipboard"></i> Details</a>
                      <a href="#" class="dropdown-item details text-danger"><i class="fas fa-undo"></i> Revert to Ongoing</a>
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

    <div class="modal fade" id="modalDetails" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body pd-x-25 pd-sm-x-30 pd-t-40 pd-sm-t-20 pd-b-15 pd-sm-b-20">
            <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
            <h5 class="mg-b-2"><strong>Job Description</strong></h5>

            <div class="row row-sm mt-4 mb-4">
              <div class="col-lg-12 col-xl-12">                
                <table class="table table-striped table-sm mg-b-0">
                  <tbody>
                    <tr>
                      <td class="tx-medium">Client</td>
                      <td class="tx-color-03">Femi Joseph</td>
                    </tr>
                    <tr>
                      <td class="tx-medium">Job Reference</td>
                      <td class="tx-color-03">REF-234094623496</td>
                    </tr>
                    <tr>
                      <td class="tx-medium">Service Required</td>
                      <td class="tx-color-03">Mechanical (Generator)</td>
                    </tr>
                    <tr>
                      <td class="tx-medium">Scheduled Date & Time</td>
                      <td class="tx-color-03">May 15th 2020 at 11:30am</td>
                    </tr>
                    <tr>
                      <td class="tx-medium">Initial Service Charge</td>
                      <td class="tx-color-03">₦14,000 (Urgent Fee)</td>
                    </tr>
                    <tr>
                      <td class="tx-medium">Total Service Charge</td>
                      <td class="tx-color-03">₦14,000 (Urgent Fee)</td>
                    </tr>
                    <tr>
                      <td class="tx-medium">CSE Assigned</td>
                      <td class="tx-color-03">Godfrey Diwa</td>
                    </tr>
                    <tr>
                      <td class="tx-medium">Technician Assigned</td>
                      <td class="tx-color-03">Andrew Nwankwo</td>
                    </tr>
                    <tr>
                      <td class="tx-medium">L.G.A</td>
                      <td class="tx-color-03">Ibeju-Lekki</td>
                    </tr>
                    <tr>
                      <td class="tx-medium">Town/City</td>
                      <td class="tx-color-03">Ibeju-Lekki</td>
                    </tr>
                    <tr>
                      <td class="tx-medium">Request Address</td>
                      <td class="tx-color-03">7, Abagbo Close, Victoria Island, Lagos, Nigeria</td>
                    </tr>
                    <tr>
                      <td class="tx-medium">Request Description</td>
                      <td class="tx-color-03">My generator just stopped working and it's refusing to come on. I need urgent repairs today.</td>
                    </tr>
                    <tr>
                      <td class="tx-medium">Date of Cancellation</td>
                      <td class="tx-color-03">May 15th 2020 at 11:30am</td>
                    </tr>
                    <tr>
                      <td class="tx-medium">Cancelled By</td>
                      <td class="tx-color-03">Femi Joseph</td>
                    </tr>
                    <tr>
                      <td class="tx-medium">Reason</td>
                      <td class="tx-color-03">My generator began working again after manual observance. Thanks.</td>
                    </tr>
                    
                  </tbody>
                </table>

              </div>
            </div>
          </div><!-- modal-body -->
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
    </div><!-- modal -->

  </div><!-- container -->
</div>

@endsection