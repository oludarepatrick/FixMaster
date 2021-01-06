@extends('layouts.dashboard')
@section('title', 'RFQ')
@include('layouts.partials._messages')
@section('content')

<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">RFQ</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Request for Quotation(RFQ) </h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card mg-b-10">
          <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
            <div>
              <h6 class="mg-b-5">RFQ's as of {{ date('M, d Y') }}</h6>
              <p class="tx-13 tx-color-03 mg-b-0">This table displays a list of all FixMaster RFQ's initiated by CSE's.</p>
            </div>
            
          </div><!-- card-header -->
         
          <div class="table-responsive">
            
            <table class="table table-hover mg-b-0" id="basicExample">
              <thead class="thead-primary">
                <tr>
                  <th class="text-center">#</th>
                  <th>Job Ref.</th>
                  <th>Batch Number</th>
                  <th>Client</th>
                  <th>Issued By</th>
                  <th>Status</th>
                  <th class="text-center">Total Amount</th>
                  <th>Date Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              {{-- Status: 0 => Awaiting total amount, 1 => Awaiting Client's payment, 2 => Payment received --}}
              <tbody>
                @foreach ($rfqs as $rfq)
                <tr>
                  <td class="tx-color-03 tx-center">{{ ++$i }}</td>
                  <td class="tx-medium">{{ $rfq->serviceRequest->job_reference }}</td>
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
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="#rfqDetails" data-toggle="modal" class="dropdown-item details text-primary" title="View {{ $rfq->batch_number}} details" data-batch-number="{{ $rfq->batch_number}}" data-url="{{ route('admin.rfq_details', $rfq->id) }}" id="rfq-details"><i class="far fa-clipboard"></i> Details</a>
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

  <div class="modal fade" id="rfqDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content tx-14">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel2">RFQ Details</h6>
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

</div>


@push('scripts')
<script>
  $(document).ready(function() {
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

    $('.close').click(function (){
      $(".modal-backdrop").remove();
    });

  });
</script>
@endpush

@endsection