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

          <div class="col-md-12">
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
                <select class="custom-select" id="designation">
                  <option selected>Select...</option>
                  <option value="admin">Administrator</option>
                  <option value="super_admin">Super Admin</option>
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
          </div>
          
          <div class="col-md-12 d-none permission">
            <fieldset class="form-fieldset">
              <legend>Access & Permissions</legend>
              <p>Check areas to allow Admin Access.</p>
              <div class="form-row">
                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="customRadio2" name="customRadio" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio2">Administrators</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="customRadio2" name="customRadio" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio2">Clients</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="customRadio2" name="customRadio" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio2">CSE's</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="customRadio2" name="customRadio" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio2">Location Request</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="customRadio1" name="customRadio" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Payments</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="customRadio1" name="customRadio" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Payment Gateway</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="customRadio1" name="customRadio" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Rating</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="customRadio1" name="customRadio" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Requests</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="customRadio1" name="customRadio" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">RFQ's</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="customRadio1" name="customRadio" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Service & Category</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="customRadio1" name="customRadio" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Technicians</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="customRadio1" name="customRadio" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Tools</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="customRadio1" name="customRadio" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Utilities</label>
                    </div>
                  </div>
              </div>
            </fieldset>
          </div>

          <div class="col-md-12 mt-4">
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
      </div>
    </form>

    </div>
</div>

@section('scripts')
<script>
  $(document).ready(function (){
    $('#designation').change(function () {
        if ($(this).val() == 'super_admin') {
            $('.permission').addClass('d-none');    
        }else{
          $('.permission').removeClass('d-none');    
        }
    });
  });
</script>
@endsection
@endsection