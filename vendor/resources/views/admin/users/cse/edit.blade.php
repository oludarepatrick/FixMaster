@extends('layouts.dashboard')
@section('title', 'Edit CSE Account')
@include('layouts.partials._messages')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/bootstrap-multiselect.css') }}">

<div class="content-body">
    <div class="container pd-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.list_cse') }}">CSE List</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit CSE</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Edit Godfrey Diwa's  Account</h4>
        </div>
      </div>
      <form>
      <div class="row row-xs">
        <div class="col-md-12">
          <div class="form-row">
              <div class="form-group col-md-4">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" id="first_name" value="Godfrey" placeholder="First Name">
              </div>
              <div class="form-group col-md-4">
                  <label for="middle_name">Middle Name</label>
                  <input type="text" class="form-control" id="middle_name" value="Alfred" placeholder="Middle Name">
              </div>
              <div class="form-group col-md-4">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" id="last_name" value="Diwa" placeholder="Last Name">
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" id="inputEmail4" value="hostdiwa@gmail.com" placeholder="Email">
            </div>
            <div class="form-group col-md-4">
              <label for="phone_number">Phone Number</label>
              <input type="text" class="form-control" id="phone_number" value="08054242309" placeholder="Phone Number">
            </div>
            <div class="form-group col-md-4">
              <label for="phone_number">Other Phone Number</label>
              <input type="text" class="form-control" id="phone_number" placeholder="Phone Number">
            </div>
          </div>
          <div class="form-row">
            {{-- <div class="form-group col-md-3">
              <label>Franchise</label>
              <select class="custom-select">
                <option >Select...</option>
                <option selected value="1">Franchise 1</option>
                <option value="2">Franchise 2</option>
                <option value="2">Franchise 2</option>
              </select>
            </div> --}}
            <div class="form-group col-md-4">
              <label>Status</label>
              <select class="custom-select">
                <option >Select...</option>
                <option selected value="1">Active</option>
                <option value="2">Inactive</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Profile Avatar</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Upload Profile Avatar</label>
              </div>
            </div>
            <div class="form-group col-md-4">
              <label>Service Category</label>
              <select class=" selectpicker" id="service_categor"  multiple data-live-search="true">
                <optgroup label="Communication">
                <option selected value="1">Mobile Phone</option>
              </optgroup>
              <optgroup label="Mechanical">
                <option value="2">Generator</option>
                <option value="2">Pump</option>
                {{-- <option data-divider="true"></option> --}}
                </optgroup>
                <optgroup label="Locks & Security">
                <option selected value="2">Door</option>
                <option value="2">Security Equipment</option>
                <option selected value="2">Windows</option>
              </optgroup>
              </select>
            </div>
          </div>
          <div class="form-row">
            
            <div class="form-group col-md-6">
              <label>Bank Name</label>
              <select id="bank_name" name="bank_name" class="custom-select bank_name">
                <option selected>Select...</option>
                <option value="044">Access Bank</option>
                <option value="401">ASO Savings and Loans</option>
                <option value="023">CitiBank</option>
                <option value="551">Covenant Microfinance Bank</option>
                <option value="063">Diamond Bank</option>
                <option selected value="050">Ecobank Plc</option>
                <option value="084">Enterprise Bank</option>
                <option value="070">Fidelity Bank</option>
                <option value="318">Fidelity Mobile</option>
                <option value="011">First Bank of Nigeria</option>
                <option value="214">First City Monument Bank</option>
                <option value="601">FSDH Merchant Bank</option>
                <option value="058">GTBank Plc</option>
                <option value="030">Heritage</option>
                <option value="301">JAIZ Bank</option>
                <option value="082">Keystone Bank</option>
                <option value="526">Parallex Microfinance Bank</option>
                <option value="101">Providus Bank</option>
                <option value="076">Skye Bank</option>
                <option value="221">Stanbic IBTC Bank</option>
                <option value="068">Standard Chartered Bank</option>
                <option value="232">Sterling Bank</option>
                <option value="100">SunTrust Bank</option>
                <option value="032">Union Bank</option>
                <option value="033">United Bank for Africa</option>
                <option value="215">Unity Bank</option>
                <option value="035">Wema Bank</option>
                <option value="057">Zenith Bank</option>
              </select>
            </div>
            <div class="form-group col-md-6">
                <label for="first_name">Account Number</label>
                <input type="text" class="form-control" id="first_name" value="0123456789" placeholder="Account Number">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>State</label>
              <select class="custom-select" disabled>
                <option>Select...</option>
                <option selected value="1">Lagos</option>
                <option value="2">Inactive</option>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label>L.G.A</label>
              <select class="custom-select">
                <option>Select...</option>
                <option value="1">Alimosho</option>
                <option value="2">Kosofe</option>
                <option selected value="2">Mushin</option>
                <option value="2">Oshodi-Isolo</option>
                <option value="2">Ojo</option>
                <option value="2">Badagry</option>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label>Town/City</label>
              <select class="custom-select">
                <option>Select...</option>
                <option selected value="1">Abule Ijesha</option>
                <option value="2">Bariga</option>
                <option value="2">Coker</option>
                <option value="2">Eti Osa</option>
                <option value="2">Ibeju-Lekki</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputAddress2">Full Address</label>
              <textarea rows="3" class="form-control" id="inputAddress2"></textarea>
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>

    </div>
</div>

@section('scripts')
<script src="{{ asset('assets/dashboard/assets/js/bootstrap-multiselect.js') }}"></script>
<script> 

$('.selectpicker').selectpicker();
</script>

@endsection
@endsection