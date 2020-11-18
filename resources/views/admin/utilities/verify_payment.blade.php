@extends('layouts.dashboard')
@section('title', 'Verify Payment')
@include('layouts.partials._messages')
@section('content')
{{-- <link href="{{ asset('assets/dashboard/lib/select2/css/select2.min.css') }}" rel="stylesheet"> --}}
<style>.select2-container .select2-selection--single { height: 38px;}</style>
<div class="content-body">
    <div class="container pd-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Verify Payment</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Verify Payment</h4>
        </div>
      </div>

      <div class="row row-xs">
        <p>This feature allows you approve payment or check payment staus of a Service Request.</p>
          
        <div class="col-12 col-md-12 col-lg-12 col-xs-12">
            <div class="form-row">
                <div class="col-md-4">
                    <label for="password">Job Reference</label>
                    <select class="form-control select2" style="height: 38px !important">
                        <option label="Choose one"></option>
                        <option value="REF-234094623496">REF-234094623496</option>
                        <option value="REF-094009623412">REF-094009623412</option>
                        <option value="REF-237290223123">REF-237290223123</option>
                        <option value="REF-234094623496">REF-234094623496</option>
                    </select>
                </div>
            </div>

        <button type="submit" class="btn btn-primary mt-4 verify-payment">Verify</button>
            
        </div>
      </div>

      <div class="row row-xs d-none payment-table">
        <div class="col-lg-12 col-xl-12 mg-t-10">
          <div class="card mg-b-10">
            <div class="table-responsive">
              <table class="table table-hover mg-b-0">
                <thead class="thead-primary">
                  <tr>
                    <th class="text-center">#</th>
                    <th>Job Ref.</th>
                    <th>Client</th>
                    <th>Phone Number</th>
                    <th class="text-center">Amount</th>
                    <th>Payment Status</th>
                    <th class="text-center">Date</th>
                    <th class=" text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="tx-color-03 tx-center">1</td>
                    <td class="tx-medium">REF-234094623496</td>
                    <td class="tx-medium">Femi Joseph</td>
                    <td class="tx-medium">08125456489</td>
                    <td class="text-medium text-center">₦14,000</td>
                    <td class="text-medium text-danger">Unpaid</td>
                    <td class="text-medium">May 15th 2020 at 11:30am</td>
                    <td class=" text-center">
                      <div class="dropdown-file">
                        <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a href="#addPayment" data-toggle="modal" class="dropdown-item details text-success"><i class="fas fa-check"></i> Mark as Paid</a>
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
    </div>
</div>

<div class="modal fade" id="addPayment" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered wd-sm-650" role="document">
    <div class="modal-content">
      <div class="modal-body pd-x-25 pd-sm-x-30 pd-t-40 pd-sm-t-20 pd-b-15 pd-sm-b-20">
        <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
        <h5 class="mg-b-2"><strong>Payment Description</strong></h5>
        <div class="form-row mt-4">
          <div class="form-group col-md-12">
            <label>Payment Method</label>
            <select class="custom-select">
              <option>Select...</option>
              <option value="2">Bank</option>
              <option value="2">E-Wallet</option>
              <option value="1">Payment Gateway</option>
              <option value="2">USSD</option>
            </select>
          </div>

          <div class="form-group col-md-12">
              <label for="inputEmail4">Short Note</label>
              <textarea rows="3" class="form-control" id="inputAddress2"></textarea>
          </div>
          
        <button type="submit" class="btn btn-primary">Submit</button>

      </div>
      </div><!-- modal-body -->
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->

@section('scripts')
    <script src="{{ asset('assets/dashboard/lib/select2/js/select2.min.js') }}"></script>

    <script>
    $(function(){
        'use strict'

        // Basic with search
        $('.select2').select2({
          placeholder: 'Choose one',
          searchInputPlaceholder: 'Search E-Mails'
        });

        $('.verify-payment').click(function(){
            $('.payment-table').removeClass('d-none');
        });

      });
    </script>
@endsection

@endsection