@extends('layouts.dashboard')
@section('title', 'Tools Request')
@include('layouts.partials._messages')
@section('content')

<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tools Request</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Tools Request</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card mg-b-10">
          <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
            <div>
              <h6 class="mg-b-5">Tools requested as of {{ date('M, d Y') }}</h6>
              <p class="tx-13 tx-color-03 mg-b-0">This table displays a list of all FixMaster Tools requested for a job.</p>
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
                  <th>Admin</th>
                  <th>Requested By</th>
                  <th>Status</th>
                  <th>Date Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="tx-color-03 tx-center">1</td>
                  <td class="tx-medium">REF-234094623496</td>
                  <td class="tx-medium">TR-3526ABS638</td>
                  <td class="tx-medium">Femi Joseph</td>
                  <td class="tx-medium">Null</td>
                  <td class="tx-medium">Godfrey Diwa</td>
                  <td class="text-medium text-warning">Pending</td>
                  <td class="text-medium">May 15th 2020</td>
                  <td class=" text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                      <a href="#toolsRequestDetails" data-toggle="modal" class="dropdown-item details text-primary"><i class="far fa-clipboard"></i> Details</a>
                        <a href="" class="dropdown-item details text-success"><i class="fas fa-check"></i> Approve</a>
                        <a href="" class="dropdown-item details text-danger"><i class="fas fa-ban"></i> Decline</a>
                      </div>
                    </div>
                  </td>
                </tr>

                <tr>
                    <td class="tx-color-03 tx-center">2</td>
                    <td class="tx-medium">REF-094009623412</td>
                    <td class="tx-medium">TR-4446ABS094</td>
                    <td class="tx-medium">Mobolaji Adetoun</td>
                    <td class="tx-medium">David Akinsola</td>
                    <td class="tx-medium">Rilwan Bello</td>
                    <td class="text-medium text-success">Approved</td>
                    <td class="text-medium">May 15th 2020</td>
                    <td class=" text-center">
                      <div class="dropdown-file">
                        <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a href="#toolsRequestDetails" data-toggle="modal" class="dropdown-item details text-primary"><i class="far fa-clipboard"></i> Details</a>
                        {{-- <a href="" class="dropdown-item details text-success"><i class="fas fa-check"></i> Approve</a> --}}
                          <a href="" class="dropdown-item details text-danger"><i class="fas fa-ban"></i> Decline</a>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td class="tx-color-03 tx-center">3</td>
                    <td class="tx-medium">REF-237290223123</td>
                    <td class="tx-medium">TR-0936ABS573</td>
                    <td class="tx-medium">William Olukayode</td>
                    <td class="tx-medium">Obuchi Omotosho</td>
                    <td class="tx-medium">Mayowa Olaoye</td>
                    <td class="text-medium text-danger">Declined</td>
                    <td class="text-medium">May 15th 2020</td>
                    <td class=" text-center">
                      <div class="dropdown-file">
                        <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a href="#toolsRequestDetails" data-toggle="modal" class="dropdown-item details text-primary"><i class="far fa-clipboard"></i> Details</a>
                        <a href="" class="dropdown-item details text-success"><i class="fas fa-check"></i> Approve</a>
                          {{-- <a href="" class="dropdown-item details text-danger"><i class="fas fa-ban"></i> Decline</a> --}}
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

  <div class="modal fade" id="toolsRequestDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content tx-14">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel2">REF-234094623496 Tools Request</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-hover mg-b-0" id="basicExample">
                  <thead class="thead-primary">
                    <tr>
                      <th class="text-center">#</th>
                      <th>Equipment/Tools Name</th>
                      <th class="text-center">Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="tx-color-03 tx-center">1</td>
                      <td class="tx-medium">Rake</td>
                      <td class="tx-medium text-center">1</td>
                    </tr>
    
                    <tr>
                        <td class="tx-color-03 tx-center">2</td>
                        <td class="tx-medium">Ladder</td>
                        <td class="tx-medium text-center">1</td>
                    </tr>

                    <tr>
                        <td class="tx-color-03 tx-center">3</td>
                        <td class="tx-medium">Hose</td>
                        <td class="tx-medium text-center">2</td>
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