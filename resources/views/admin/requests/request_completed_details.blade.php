@extends('layouts.dashboard')
@section('title', 'Completed Request Details')
@include('layouts.partials._messages')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/dashforge.filemgr.css') }}">

<div class="content-body">
    <div class="container pd-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.requests_completed') }}">Completed Requests</a></li>
              <li class="breadcrumb-item active" aria-current="page">Completed Request Details</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Job: {{ $requestDetail->job_reference }}</h4><hr>
          <div class="media align-items-center">
            <span class="tx-color-03 d-none d-sm-block">
              {{-- <i data-feather="credit-card" class="wd-60 ht-60"></i> --}}
              <img src="{{ asset('assets/images/default-male-avatar.png') }}" class="avatar rounded-circle" alt="Male Avatar">
            </span>
            <div class="media-body mg-sm-l-20">
              <h4 class="tx-18 tx-sm-20 mg-b-2">{{ $requestDetail->user->fullName->name }}</h4>
              <p class="tx-13 tx-color-03 mg-b-0">{{ $requestDetail->serviceRequestDetail->phone_number }}</p>
            </div>
          </div><!-- media -->
        </div>
      </div>

      <div class="row row-xs">
        <div class="col-lg-12 col-xl-12">
          <div class="card">
            <ul class="nav nav-tabs nav-justified" id="myTab3" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="media-tab3" data-toggle="tab" href="#media3" role="tab" aria-controls="media" aria-selected="false">Service Request Summary</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="description-tab3" data-toggle="tab" href="#description3" role="tab" aria-controls="description" aria-selected="true">Description</a>
              </li>
            </ul>
              <div class="tab-content bd bd-gray-300 bd-t-0 pd-20" id="myTabContent3">

                <div class="tab-pane fade show active" id="media3" role="tabpanel" aria-labelledby="media-tab3">
                  <h5 class="mt-4 text-primary">Service Request Progress</h5>
                  <div class="table-responsive mb-4">
                    <table class="table table-hover mg-b-0">
                      <thead class="">
                        <tr>
                          <th class="text-center">#</th>
                          <th>Author</th>
                          <th>Status</th>
                          <th class="text-center">Timestamp</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($serviceRequestProgreses as $progress)
                          <tr>
                            <td class="tx-color-03 tx-center">{{ ++$i }}</td>
                            <td class="tx-medium">{{ $progress->user->fullName->name }}</td>
                            <td class="tx-medium text-success">{{ $progress->serviceRequestStatus->name }}</td>
                            <td class="text-center">{{ Carbon\Carbon::parse($progress->created_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div><!-- table-responsive -->

                  <h5 class="mt-4 text-primary">Tool Requests</h5>
                  <div class="table-responsive mb-4">
                    <table class="table table-hover mg-b-0">
                      <thead class="">
                        <tr>
                          <th class="text-center">#</th>
                          <th>Batch Number</th>
                          <th>Client</th>
                          <th>Approved By</th>
                          <th>Requested By</th>
                          <th>Status</th>
                          <th>Date Requested</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($requestDetail->toolRequests as $toolRequest)
                        <?php  $z = 0; ?>
                        <tr>
                          <td class="tx-color-03 tx-center">{{ ++$z }}</td>
                          <td class="tx-medium">{{ $toolRequest->batch_number }}</td>
                          <td class="tx-medium">{{ $toolRequest->serviceRequest->user->fullName->name }}</td>
                          <td class="tx-medium">{{ $toolRequest->approver->fullName->name ?? 'Null' }}</td>
                          <td class="tx-medium">{{ $toolRequest->requester->fullName->name }}</td>
                          @if($toolRequest->status == 'Pending')
                            <td class="text-medium text-warning">Pending</td>
                          @elseif($toolRequest->status == 'Approved')
                            <td class="text-medium text-success">Approved</td>
                          @else
                            <td class="text-medium text-danger">Declined</td>
                          @endif
                          <td class="text-medium">{{ Carbon\Carbon::parse($toolRequest->created_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }}</td>
                          <td class=" text-center">
                            <a href="#toolsRequestDetails" data-toggle="modal" class="btn btn-sm btn-primary" title="View {{ $toolRequest->batch_number}} details" data-batch-number="{{ $toolRequest->batch_number}}" data-url="{{ route('admin.tool_request_details', $toolRequest->id) }}" id="tool-request-details">Details</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div><!-- table-responsive -->


                  <h5 class="mt-4 text-primary">Request For Quotation</h5>
                  <div class="table-responsive">
                  
                    <table class="table table-hover mg-b-0 mt-4">
                      <thead class="">
                        <tr>
                          <th class="text-center">#</th>
                          <th>Batch Number</th>
                          <th>Client</th>
                          <th>Issued By</th>
                          <th>Status</th>
                          <th class="text-center">Total Amount</th>
                          <th>Date Created</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($requestDetail->rfqs as $rfq )
                        <?php  $y = 0; ?>
                        <tr>
                          <td class="tx-color-03 tx-center">{{ ++$y }}</td>
                          <td class="tx-medium">{{ $rfq->batch_number }}</td>
                          <td class="tx-medium">{{ $rfq->issuer->fullName->name }}</td>
                          <td class="tx-medium">{{ $rfq->client->fullName->name }}</td>
                          @if($rfq->status == 0)
                            <td class="text-medium text-warning">Awaiting total amount</td>
                          @elseif($rfq->status == 1)
                            <td class="text-medium text-info">Awaiting Client's payment</td>
                          @else
                            <td class="text-medium text-success">Payment received</td>
                          @endif
                          <td class="tx-medium text-center">₦{{ number_format($rfq->total_amount) ?? 'Null'}}</td>
                          <td class="text-medium">{{ Carbon\Carbon::parse($rfq->created_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }}</td>
                          <td class=" text-center">
                            <a href="#rfqDetails" data-toggle="modal" class="btn btn-sm btn-primary" title="View {{ $rfq->batch_number}} details" data-batch-number="{{ $rfq->batch_number}}" data-url="{{ route('admin.rfq_details', $rfq->id) }}" id="rfq-details"></i> Details</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div><!-- table-responsive -->
                </div>

                <div class="tab-pane fade" id="description3" role="tabpanel" aria-labelledby="description-tab3">
                  <h6>SERVICE REQUEST DESCRIPTION</h6>
                  <div class="row row-xs mt-4">
                    <div class="col-lg-12 col-xl-12">
                      <table class="table table-striped table-sm mg-b-0">
                        <tbody>
                          <tr>
                            <td class="tx-medium">Job Reference</td>
                            <td class="tx-color-03">{{ $requestDetail->job_reference }}</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Service Required</td>
                            <td class="tx-color-03">{{ $requestDetail->service->name }} ({{ $requestDetail->category->name }})</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Scheduled Date & Time</td>
                            <td class="tx-color-03">{{ $requestDetail->serviceRequestDetail->timestamp }}</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Initial Service Charge</td>
                            <td class="tx-color-03">
                              @if(!empty($requestDetail->serviceRequestDetail->discount_service_fee))
                                  ₦{{ number_format($requestDetail->serviceRequestDetail->discount_service_fee) }}
                                  <sup style="font-size: 10px;" class="text-success">Discount</sup>
                              @else
                                  ₦{{ number_format($requestDetail->serviceRequestDetail->initial_service_fee) }}
                              @endif 
                              ({{ $requestDetail->serviceRequestDetail->service_fee_name }})
                            </td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Current Service Charge</td>
                            <td class="tx-color-03">
                              @if(!empty($requestDetail->total_amount))
                                  ₦{{ number_format($requestDetail->total_amount) }}
                              @else
                                  ₦0
                              @endif 
                            </td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Security Code</td>
                            <td class="tx-color-03">{{ $requestDetail->security_code }}</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Supervised By</td>
                            <td class="tx-color-03">@if(!empty($requestDetail->admin)) {{ $requestDetail->admin->first_name.' '.$requestDetail->admin->last_name }} @endif</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">CSE Assigned</td>
                            <td class="tx-color-03">@if(!empty($requestDetail->cse)) {{ $requestDetail->cse->first_name.' '.$requestDetail->cse->last_name }} @endif</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Technician Assigned</td>
                            <td class="tx-color-03">@if(!empty($requestDetail->technician)) {{ $requestDetail->technician->first_name.' '.$requestDetail->technician->last_name }} @endif</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Payment Status</td>
                            <td class="tx-color-03">Paid</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">L.G.A</td>
                            <td class="tx-color-03">{{ $requestDetail->user->client->lga->name }}</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Town/City</td>
                            <td class="tx-color-03">{{ $requestDetail->user->client->town }}</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Request Address</td>
                            <td class="tx-color-03">{{ $requestDetail->serviceRequestDetail->address }}</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Request Description</td>
                            <td class="tx-color-03">{{ $requestDetail->serviceRequestDetail->description }}</td>
                          </tr>
                        </tbody>
                      </table>

                      @if(!empty($requestDetail->serviceRequestDetail->media_file))
                      <div class="divider-text">Media Files</div>
                        <div class="row">
                          <div class="pd-20 pd-lg-25 pd-xl-30">
                
                            <div class="row row-xs">
                              <div class="col-6 col-sm-6 col-md-6 col-xl mg-t-10 mg-sm-t-0">
                                <div class="card card-file">
                                  {{-- {{ dd(pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION)) }} --}}
                                  

                                  @if(pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'jpg' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'png' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'svg' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'gif' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'jpeg')
                                    @if(!empty($requestDetail->serviceRequestDetail->media_file) && file_exists(public_path().'/assets/service-request-files/'.$requestDetail->serviceRequestDetail->media_file))
                                      <img src="{{ asset('assets/service-request-files/'.$requestDetail->serviceRequestDetail->media_file ) }}" class="img-fit-cover" alt="Responsive image">
                                    @else
                                      <img src="{{ asset('assets/images/no-image-available.png') }}" class="img-fit-cover" alt="Responsive image">
                                    @endif
                                  @elseif(pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'doc' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'docx' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'pdf' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'txt' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'xls' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'csv')
                                    <div class="dropdown-file">
                                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ $requestDetail->serviceRequestDetail->media_file }}" download class="dropdown-item download"><i data-feather="download"></i>Download</a>
                                      </div>
                                    </div><!-- dropdown -->
                                    <div class="card-file-thumb tx-indigo">
                                      <i class="far fa-file-word"></i>
                                    </div>
                                    <div class="card-body">
                                    <h6><a href="{{ $requestDetail->serviceRequestDetail->media_file }}" download class="link-02">{{ $requestDetail->serviceRequestDetail->media_file }}</a></h6>
                                    </div> 

                                  @elseif(pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'mp4')
                                    @if(!empty($requestDetail->serviceRequestDetail->media_file) && file_exists(public_path().'/assets/service-request-files/'.$requestDetail->serviceRequestDetail->media_file))
                                      <video controls width="320" height="240" class="img-fit-cover">
                                        <source src="{{ asset('assets/service-request-files/'.$requestDetail->serviceRequestDetail->media_file ) }}" type="video/mp4">
                                      </video>
                                    @endif
                                  @endif
                                </div>
                              </div><!-- col -->
                              
                            </div><!-- row -->
                            
                          </div>
                        </div>
                      @endif
                    </div><!-- df-example -->
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="toolsRequestDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content tx-14">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel2">Tools Request</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">
        <!-- Modal displays here -->
        <div id="spinner-icon"></div>
    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="rfqDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content tx-14">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel2">RFQ Details</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body-rfq-details">
          <!-- Modal displays here -->
          <div id="spinner-icon"></div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  $(function(){
    'use strict'

    $(document).on('click', '#tool-request-details', function(event) {
      event.preventDefault();
      let route = $(this).attr('data-url');
      let batchNumber = $(this).attr('data-batch-number');
      
      $.ajax({
          url: route,
          beforeSend: function() {
            $("#spinner-icon").html('<div class="d-flex justify-content-center mt-4 mb-4"><span class="loadingspinner"></span></div>');
          },
          // return the result
          success: function(result) {
              $('#modal-body').modal("show");
              $('#modal-body').html('');
              $('#modal-body').html(result).show();
          },
          complete: function() {
              $("#spinner-icon").hide();
          },
          error: function(jqXHR, testStatus, error) {
              var message = error+ ' An error occured while trying to retireve '+ batchNumber +'  details.';
              var type = 'error';
              displayMessage(message, type);
              $("#spinner-icon").hide();
          },
          timeout: 8000
      })
    });

    $(document).on('click', '#rfq-details', function(event) {
      event.preventDefault();
      let route = $(this).attr('data-url');
      let batchNumber = $(this).attr('data-batch-number');
      
      $.ajax({
          url: route,
          beforeSend: function() {
            $("#spinner-icon").html('<div class="d-flex justify-content-center mt-4 mb-4"><span class="loadingspinner"></span></div>');
          },
          // return the result
          success: function(result) {
              $('#modal-body-rfq-details').modal("show");
              $('#modal-body-rfq-details').html('');
              $('#modal-body-rfq-details').html(result).show();
          },
          complete: function() {
              $("#spinner-icon").hide();
          },
          error: function(jqXHR, testStatus, error) {
              var message = error+ ' An error occured while trying to retireve '+ batchNumber +'  details.';
              var type = 'error';
              displayMessage(message, type);
              $("#spinner-icon").hide();
          },
          timeout: 8000
      })
    });

    $('.close').click(function (){
      $(".modal-backdrop").remove();
    });

  });

</script>
@endpush

@endsection