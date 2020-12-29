@extends('layouts.dashboard')
@section('title', 'Edit Payment Gateway')
@include('layouts.partials._messages')
@section('content')

<div class="content-body">
    <div class="container pd-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.list_payment_gateway') }}">Payment Gateway List</a></li>
              <li class="breadcrumb-item active" aria-current="page">EDit Payment Gateway</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Editing Paystack Payment Gateway</h4>
        </div>
      </div>

      <div class="row row-xs">
        <div class="col-md-12">
            <form>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" value="Paystack">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Script URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" value="https://js.paystack.co/v1/inline.js">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Public Key</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" value="pk_live_f4afcde02270cd546eb336c1fa28024da716c82d">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Verification URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" value="https://api.paystack.co/transaction/verify/">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Demo Script URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" value="https://js.paystack.co/v1/inline.js">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Demo Public Key</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" value="pk_test_de1419f9b2d039655463bcbb897c2e6c45c79ef8">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Demo Secret Key</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" value="sk_test_d2cf8c867e371a9d7464064b70afe14d0cd75eb6">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Demo Verification URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" value="https://api.paystack.co/transaction/verify/">
                    </div>
                </div>
                <div class="form-group row mg-b-0">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </form>
              
        </div>
      </div>

    </div>
</div>

@endsection