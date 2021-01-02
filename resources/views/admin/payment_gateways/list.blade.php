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
         


          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <form action="{{route('admin.paystack_update')}}" method="post">
                   {{ csrf_field() }}
                  <div class="card-header">
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="card-title">Paystack</div>
                          </div>
                      </div>
                  </div>
                  <div class="card-body pt-5 pb-5">
                    <div class="row">
                      <div class="col-lg-12">
                         {{ csrf_field() }}
          
                        <div class="form-group">
                          <label>Paystack</label>
                          <div class="selectgroup">
                            <label class="selectgroup-item">
                              <input type="radio" name="status" value="1" class="selectgroup-input" {{$paystack->status == 1 ? 'checked' : ''}}>
                              <span class="selectgroup-button">Active</span>
                            </label>
                            <label class="selectgroup-item">
                              <input type="radio" name="status" value="0" class="selectgroup-input" {{$paystack->status == 0 ? 'checked' : ''}}>
                              <span class="selectgroup-button">Deactive</span>
                            </label>
                          </div>
                        </div>
                        @php
                            $paystackInfo = json_decode($paystack->information, true);
                            // dd($paystackInfo);
                        @endphp
                        <div class="form-group">
                          <label>Paystack Public Key</label>
                          <input class="form-control" name="public_key" value="{{$paystackInfo['public_key']}}">
                          @if ($errors->has('public_key'))
                            <p class="mb-0 text-danger">{{$errors->first('public_key')}}</p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label>Paystack Private Key</label>
                          <input class="form-control" name="private_key" value="{{$paystackInfo['private_key']}}">
                          @if ($errors->has('private_key'))
                            <p class="mb-0 text-danger">{{$errors->first('private_key')}}</p>
                          @endif
                        </div>
          
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="form">
                      <div class="form-group from-show-notify row">
                        <div class="col-12 text-center">
                          <button type="submit" id="displayNotif" class="btn btn-success">Update</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          
          
            <div class="col-lg-6">
              <div class="card">
                <form action="{{route('admin.flutter_update')}}" method="post">
                   {{ csrf_field() }}
                  <div class="card-header">
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="card-title">Flutter</div>
                          </div>
                      </div>
                  </div>
                  <div class="card-body pt-5 pb-5">
                    <div class="row">
                      <div class="col-lg-12">
                         {{ csrf_field() }}
                        @php
                            $flutterInfo = json_decode($flutter->information, true);
                            // dd($flutterInfo);
                        @endphp
                        <div class="form-group">
                            <label>Flutter</label>
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <input type="radio" name="status" value="1" class="selectgroup-input" {{$flutter->status == 1 ? 'checked' : ''}}>
                                <span class="selectgroup-button">Active</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="radio" name="status" value="0" class="selectgroup-input" {{$flutter->status == 0 ? 'checked' : ''}}>
                                <span class="selectgroup-button">Deactive</span>
                              </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Flutter public Key</label>
                            <input class="form-control" name="public_key" value="{{$flutterInfo['public_key']}}">
                            @if ($errors->has('key'))
                                <p class="mb-0 text-danger">{{$errors->first('public_key')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Flutter private Key</label>
                            <input class="form-control" name="private_key" value="{{$flutterInfo['private_key']}}">
                            @if ($errors->has('secret'))
                                <p class="mb-0 text-danger">{{$errors->first('private_key')}}</p>
                            @endif
                        </div>
          
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="form">
                      <div class="form-group from-show-notify row">
                        <div class="col-12 text-center">
                          <button type="submit" id="displayNotif" class="btn btn-success">Update</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          
          </div>

          
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