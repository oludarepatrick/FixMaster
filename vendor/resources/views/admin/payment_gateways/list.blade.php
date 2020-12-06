@extends('layouts.dashboard')
@section('title', 'Franchise List')
@include('layouts.partials._messages')
@section('content')

<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Payment Gateway List</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Payment Gateway List</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card mg-b-10">
          <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
            <div>
              <h6 class="text-danger mg-b-5">Only authorised personnels should be allowed to use the action options on this page</h6>
            </div>
            
          </div><!-- card-header -->
         
          <div class="table-responsive">
            
            <table class="table table-hover mg-b-0" id="basicExample">
              <thead class="thead-primary">
                <tr>
                  <th class="text-center">#</th>
                  <th>Name</th>
                  <th>Date Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="tx-color-03 tx-center">1</td>
                  <td class="tx-medium">Paystack</td>
                  <td class="text-medium">May 15th 2020</td>
                  <td class=" text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                      <a href="#paymentGatewayDetails" data-toggle="modal" class="dropdown-item details text-primary"><i class="far fa-clipboard"></i> Details</a>
                      <a href="{{ route('admin.edit_payment_gateway') }}" class="dropdown-item details text-info"><i class="far fa-edit"></i> Edit</a>
                        <a href="" class="dropdown-item details text-danger"><i class="fas fa-trash"></i> Delete</a>
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

  <div class="modal fade" id="paymentGatewayDetails" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content bd-0 bg-transparent">
        <div class="modal-body pd-0">
          <a href="" role="button" class="close pos-absolute t-15 r-15 z-index-10" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>

          <div class="row no-gutters">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 bg-white rounded-right">
              <div class="ht-100p d-flex flex-column justify-content-center pd-20 pd-sm-30 pd-md-40">
                {{-- <img src="{{ asset('assets/images/cleaning-franchise.png') }}" class="wd-sm-200 rounded float-sm-right" alt=""> --}}

                <h3 class="tx-16 tx-sm-20 tx-md-24 mg-b-15 mg-md-b-20">Paystack</h3>
                <div class="table-responsive">
                  <table class="table table-striped table-sm mg-b-0">
                    <tbody>
                      <tr>
                        <td class="tx-medium">Script URL</td>
                        <td class="tx-color-03">https://js.paystack.co/v1/inline.js</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">Public Key</td>
                        <td class="tx-color-03">pk_live_f4afcde02270cd546eb336c1fa28024da716c82d</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">Verification URL</td>
                        <td class="tx-color-03">https://api.paystack.co/transaction/verify/</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">Demo Script URL</td>
                        <td class="tx-color-03">https://js.paystack.co/v1/inline.js</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">Demo Public Key</td>
                        <td class="tx-color-03">pk_test_de1419f9b2d039655463bcbb897c2e6c45c79ef8</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">Demo Secret Key</td>
                        <td class="tx-color-03">sk_test_d2cf8c867e371a9d7464064b70afe14d0cd75eb6</td>
                      </tr>
                      <tr>
                        <td class="tx-medium">Demo Verification URL</td>
                        <td class="tx-color-03">https://api.paystack.co/transaction/verify/</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- modal-body -->
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->

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