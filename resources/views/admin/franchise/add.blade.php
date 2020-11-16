@extends('layouts.dashboard')
@section('title', 'Create New Franchise')
@include('layouts.partials._messages')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/bootstrap-multiselect.css') }}">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" /> --}}
<div class="content-body">
    <div class="container pd-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Franchise</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Create New Franchise</h4>
        </div>
      </div>

      <div class="row row-xs">
        <div class="col-md-12">
          <div class="form-row">
              <div class="form-group col-md-4">
                  <label for="first_name">Name</label>
                  <input type="text" class="form-control" id="first_name" placeholder="Name">
              </div>
              <div class="form-group col-md-4">
                  <label for="middle_name">CAC Number</label>
                  <input type="tel" class="form-control" id="middle_name" placeholder="CAC Number">
              </div>
              <div class="form-group col-md-4">
                  <label for="last_name">Date Established</label>
                  <input type="date" class="form-control" id="last_name" placeholder="Date Established" >
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" id="inputEmail4" placeholder="Email" >
            </div>
            <div class="form-group col-md-4">
              <label for="phone_number">Phone Number</label>
              <input type="tel" class="form-control" id="phone_number" placeholder="Phone Number" >
            </div>
            <div class="form-group col-md-4">
              <label for="phone_number">Other Phone Number</label>
              <input type="text" class="form-control" id="phone_number" placeholder="Phone Number">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Status</label>
              <select class="custom-select">
                <option selected>Select...</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select>
            </div>
            <div class="form-group col-md-4">
                <label>Franchise Logo</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Upload Logo</label>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label>Service Category</label>
                <select class=" selectpicker" id="service_categor"  multiple data-live-search="true">
                  <optgroup label="Communication">
                  <option value="1">Mobile Phone</option>
                </optgroup>
                <optgroup label="Mechanical">
                  <option value="2">Generator</option>
                  <option value="2">Pump</option>
                  {{-- <option data-divider="true"></option> --}}
                  </optgroup>
                  <optgroup label="Locks & Security">
                  <option value="2">Door</option>
                  <option value="2">Security Equipment</option>
                  <option value="2">Windows</option>
                </optgroup>
                </select>
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
                <option value="2">Mushin</option>
                <option value="2">Oshodi-Isolo</option>
                <option value="2">Ojo</option>
                <option value="2">Badagry</option>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label>Town/City</label>
              <select class="custom-select">
                <option>Select...</option>
                <option value="1">Abule Ijesha</option>
                <option value="2">Bariga</option>
                <option value="2">Coker</option>
                <option value="2">Eti Osa</option>
                <option value="2">Ibeju-Lekki</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputAddress2">Franchise Description</label>
              <textarea rows="3" class="form-control" id="inputAddress2"></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress2">Full Address</label>
                <textarea rows="3" class="form-control" id="inputAddress2"></textarea>
              </div>
          </div>
          
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </div>

    </div>
</div>

@section('scripts')
<script src="{{ asset('assets/dashboard/assets/js/bootstrap-multiselect.js') }}"></script>

<script> 
    $('.selectpicker').selectpicker();
</script>

@endsection

@endsection