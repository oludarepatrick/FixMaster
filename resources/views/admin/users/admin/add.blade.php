@extends('layouts.dashboard')
@section('title', 'Create New Administrator Account')
@include('layouts.partials._messages')
@section('content')

<div class="content-body">
    <div class="container pd-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Administrator</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Create New Administrator</h4>
        </div>
      </div>
      <form>
      <div class="row row-xs">
        {{-- <div class="col-lg-12 col-xl-12"> --}}

          <div class="col-md-8">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" placeholder="First Name">
                </div>
                <div class="form-group col-md-4">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" class="form-control" id="middle_name" placeholder="Middle Name">
                </div>
                <div class="form-group col-md-4">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" placeholder="Last Name">
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
              </div>
              <div class="form-group col-md-4">
                <label for="phone_number">Phone Number</label>
                <input type="password" class="form-control" id="phone_number" placeholder="Phone Number">
              </div>
              <div class="form-group col-md-4">
                <label>Designation</label>
                <select class="custom-select">
                  <option selected>Select...</option>
                  <option value="1">Administrator</option>
                  <option value="2">Super Admin</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
              </div>
              <div class="form-group col-md-6">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password">
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
          
          <div class="col-md-4">
            <fieldset class="form-fieldset">
              <legend>Permissions</legend>
              <p>Check areas to allow Admin Access.</p>
              <div class="form-row">
                  <div class="custom-control custom-checkbox ">
                    <input type="checkbox" id="customRadio2" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">Clients</label>
                  </div>

                  <div class="custom-control custom-checkbox" style="margin-left: 4.15rem !important;">
                    <input type="checkbox" id="customRadio1" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">Technicians</label>
                  </div>
              </div>

              <div class="form-row">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" id="customRadio1" name="customRadio" class="custom-control-input">
                  <label class="custom-control-label" for="customRadio1">Administrator</label>
                </div>
                
                <div class="ml-4 custom-control custom-checkbox">
                  <input type="checkbox" id="customRadio2" name="customRadio" class="custom-control-input">
                  <label class="custom-control-label" for="customRadio2">CSE's</label>
                </div>
              </div>

              <div class="form-row">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" id="customRadio1" name="customRadio" class="custom-control-input">
                  <label class="custom-control-label" for="customRadio1">Requests</label>
                </div>
                <div class="custom-control custom-checkbox" style="margin-left: 3.15rem !important;">
                  <input type="checkbox" id="customRadio2" name="customRadio" class="custom-control-input">
                  <label class="custom-control-label" for="customRadio2">Payments</label>
                </div>

                
              </div>
            </fieldset>
          </div>
      </div>
    </form>

    </div>
</div>
@endsection