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
        <h4 class="mg-b-0 tx-spacing--1">RFQ</h4>
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
                  <th>CSE</th>
                  <th>Status</th>
                  <th class="text-center">Total Amount</th>
                  <th>Date Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="tx-color-03 tx-center">1</td>
                  <td class="tx-medium">REF-234094623496</td>
                  <td class="tx-medium">RFQ-3526ABS638</td>
                  <td class="tx-medium">Femi Joseph</td>
                  <td class="tx-medium">Godfrey Diwa</td>
                  <td class="text-medium text-warning">Awaiting total amount</td>
                  <td class="tx-medium text-center">Null</td>
                  <td class="text-medium">May 15th 2020</td>
                  <td class=" text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                      <a href="#rfqDetails" data-toggle="modal" class="dropdown-item details text-primary"><i class="far fa-clipboard"></i> Details</a>
                      </div>
                    </div>
                  </td>
                </tr>

                <tr>
                    <td class="tx-color-03 tx-center">2</td>
                    <td class="tx-medium">REF-094009623412</td>
                    <td class="tx-medium">RFQ-4446ABS094</td>
                    <td class="tx-medium">Mobolaji Adetoun</td>
                    <td class="tx-medium">Rilwan Bello</td>
                    <td class="text-medium text-info">Awaiting Client's payment</td>
                    <td class="tx-medium text-center">₦15,500</td>
                    <td class="text-medium">May 15th 2020</td>
                    <td class=" text-center">
                      <div class="dropdown-file">
                        <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a href="#rfqDetails" data-toggle="modal" class="dropdown-item details text-primary"><i class="far fa-clipboard"></i> Details</a>
                        <a href="" class="dropdown-item details text-success"><i class="fas fa-check"></i> Approve Payment</a>

                        </div>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td class="tx-color-03 tx-center">3</td>
                    <td class="tx-medium">REF-237290223123</td>
                    <td class="tx-medium">RFQ-0936ABS573</td>
                    <td class="tx-medium">William Olukayode</td>
                    <td class="tx-medium">Mayowa Olaoye</td>
                    <td class="text-medium text-success">Payment Received</td>
                    <td class="tx-medium text-center">₦12,750</td>
                    <td class="text-medium">May 15th 2020</td>
                    <td class=" text-center">
                      <div class="dropdown-file">
                        <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a href="#rfqDetails" data-toggle="modal" class="dropdown-item details text-primary"><i class="far fa-clipboard"></i> Details</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                

              </tbody>
            </table>
          </div><!-- table-responsive -->
        </div><!-- card -->

      </div><!-- col -->
    </div><!-- row -->

  </div><!-- container -->

  <div class="modal fade" id="rfqDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content tx-14">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel2">RFQ Details</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>JOB: REF-234094623496 <br>RFQ: RFQ-3526ABS638</h5>
            <div class="table-responsive mt-4">
              <table class="table table-striped table-sm mg-b-0">
                <tbody>
                  <tr>
                    <td class="tx-medium">Supplier's Name</td>
                    <td class="tx-color-03">Goddey Best Electricals Ltd</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">Delivery Fee</td>
                    <td class="tx-color-03">₦1,500</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">Delivery Time</td>
                    <td class="tx-color-03">May 15 2020 16:30pm</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">Approved By</td>
                    <td class="tx-color-03">David Akinsola</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">CSE Acceptance</td>
                    <td class="tx-color-03">Yes, all ordered components were delivered</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">Payment Ref. No</td>
                    <td class="tx-color-03">234092734623496</td>
                  </tr>
                  <tr>
                    <td class="tx-medium">Grand Total</td>
                    <td class="tx-color-03">₦15,500</td>
                  </tr>

                </tbody>
              </table>
            </div>

            <div class="table-responsive mt-4">
                <table class="table table-hover mg-b-0" id="basicExample">
                  <thead class="thead-primary">
                    <tr>
                      <th class="text-center">#</th>
                      <th>Component Name</th>
                      <th>Model Number</th>
                      <th class="text-center">Quantity</th>
                      <th class="text-center">Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="tx-color-03 tx-center">1</td>
                      <td class="tx-medium">Plug</td>
                      <td class="tx-medium">PL-2342</td>
                      <td class="tx-medium text-center">1</td>
                      <td class="tx-medium text-center">₦4000</td>
                    </tr>
    
                    <tr>
                        <td class="tx-color-03 tx-center">2</td>
                        <td class="tx-medium">Carburetor</td>
                        <td class="tx-medium">TX-2342</td>
                        <td class="tx-medium text-center">2</td>
                        <td class="tx-medium text-center">₦10000</td>
                    </tr>

                  </tbody>
                </table>
            </div><!-- table-responsive -->
        </div>
      </div>
    </div>
  </div>

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