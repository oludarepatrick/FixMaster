@extends('layouts.dashboard')
@section('title', 'Create New Administrator Account')
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

        <div class="d-md-block">
          <a href="{{ route('admin.list_admin') }}" class="btn btn-primary"><i class="fas fa-users"></i> Admin List</a>
        </div>
      </div>

      @include('layouts.partials._messages')

      <div class="row row-xs">
        <div class="col-lg-12 col-xl-12">
        <form method="POST" action="{{ route('admin.store_admin') }}">
          @csrf
          <div class="col-md-12">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" autocomplete="off">
                    @error('first_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name') }}" autocomplete="off" placeholder="Middle Name">
                </div>
                <div class="form-group col-md-4">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}" autocomplete="off" placeholder="Last Name">
                    @error('last_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="off"  placeholder="Email">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-4">
                <label for="phone_number">Phone Number</label>
                <input type="tel" maxlength="11" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" placeholder="Phone Number" autocomplete="off">
                @error('phone_number')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-4">
                <label for="designation">Designation</label>
                <select class="custom-select @error('designation') is-invalid @enderror" id="designation" name="designation">
                  <option selected value="">Select...</option>
                  <option value="ADMIN_ROLE" {{ old('designation') == 'ADMIN_ROLE' ? 'selected' : ''}}>Administrator</option>
                  <option value="SUPER_ADMIN_ROLE" {{ old('designation') == 'SUPER_ADMIN_ROLE' ? 'selected' : ''}}>Super Admin</option>
                </select>
                @error('designation')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                <small id="passwordHelpBlock" class="form-text text-muted">
                  Password must be 8 characters at least.
                </small>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                @error('confirm_password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
          </div>
          
          <div class="col-md-12 d-none permission">
            {{-- <fieldset class="form-fieldset"> --}}
              <legend>Access & Permissions</legend>
              <p>Check areas to allow Admin Access.</p>
              <div class="form-row">
                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="administrators" name="administrators" class="custom-control-input">
                      <label class="custom-control-label" for="administrators">Administrators</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="clients" name="clients" class="custom-control-input">
                      <label class="custom-control-label" for="clients">Clients</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="cses" name="cses" class="custom-control-input">
                      <label class="custom-control-label" for="cses">CSE's</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox ">
                      <input type="checkbox" id="location_request" name="location_request" class="custom-control-input">
                      <label class="custom-control-label" for="location_request">Location Request</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="payments" name="payments" class="custom-control-input">
                      <label class="custom-control-label" for="payments">Payments</label>
                    </div>
                  </div>

                  {{-- <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="customRadio1" name="customRadio" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio1">Payment Gateway</label>
                    </div>
                  </div> --}}

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="ratings" name="ratings" class="custom-control-input">
                      <label class="custom-control-label" for="ratings">Rating</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="requests" name="requests" class="custom-control-input">
                      <label class="custom-control-label" for="requests">Requests</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="rfqs" name="rfqs" class="custom-control-input">
                      <label class="custom-control-label" for="rfqs">RFQ's</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="service_categories" name="service_categories" class="custom-control-input">
                      <label class="custom-control-label" for="service_categories">Service & Category</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="technicians" name="technicians" class="custom-control-input">
                      <label class="custom-control-label" for="technicians">Technicians</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="tools" name="tools" class="custom-control-input">
                      <label class="custom-control-label" for="tools">Tools</label>
                    </div>
                  </div>

                  <div class="form-group col-md-2">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="utilities" name="utilities" class="custom-control-input">
                      <label class="custom-control-label" for="utilities">Utilities</label>
                    </div>
                  </div>
              </div>
            {{-- </fieldset> --}}
          </div>

          <div class="col-md-12 mt-4">
            <button type="submit" class="btn btn-primary">Create Profile</button>
          </div>

        </form>
      </div>
    </div>
</div>

@section('scripts')
<script>
  $(document).ready(function (){
    $('#designation').change(function () {
        if ($(this).val() == 'SUPER_ADMIN_ROLE') {
            $('.permission').addClass('d-none');    
        }else{
          $('.permission').removeClass('d-none');    
        }
    });
  });
</script>
@endsection
@endsection