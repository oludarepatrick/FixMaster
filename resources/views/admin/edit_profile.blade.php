@extends('layouts.dashboard')
@section('title', 'Edit Profile')
@include('layouts.partials._messages')
@section('content')
<div class="content-body">
    <div class="container pd-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('cse.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Account Settings</h4>
        </div>
      </div>

      <div class="row row-xs">
        <div class="col-lg-12 col-xl-12">
          <div class="card">
            <ul class="nav nav-tabs nav-justified" id="myTab3" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="description-tab3" data-toggle="tab" href="#description3" role="tab" aria-controls="description" aria-selected="true">Update Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="rfq-tab3" data-toggle="tab" href="#rfq3" role="tab" aria-controls="rfq" aria-selected="false">Change Password</a>
                </li>
              </ul>
              <div class="tab-content bd bd-gray-300 bd-t-0 pd-20" id="myTabContent3">
                <div class="tab-pane fade show active" id="description3" role="tabpanel" aria-labelledby="description-tab3">
                  <h6>UPDATE PROFILE</h6>
                  <div class="card-body pd-20 pd-lg-25">
                  <form method="POST" action="{{ route('admin.update_profile') }}">
                    @csrf @method('GET')
                      <div class="d-sm-flex float-left">
                          <div class="mg-sm-r-30">
                              <div class="pos-relative d-inline-block mg-b-20">
                                  <div class="avatar avatar-xxl"><span class="avatar-initial rounded-circle bg-gray-700 tx-normal"><i class="icon ion-md-person"></i></span></div>
                                  {{-- <a href="" class="contact-edit-photo"><i data-feather="edit-2"></i></a> --}}
                              </div>
                          </div><!-- col -->
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-4">
                              <label for="first_name">First Name</label>
                              <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ old('first_name') ?? $firstName }}">
                              @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                          <div class="form-group col-md-4">
                              <label for="middle_name">Middle Name</label>
                              <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name') ?? $middleName }}">
                          </div>
                          <div class="form-group col-md-4">
                              <label for="last_name">Last Name</label>
                              <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') ?? $lastName }}">
                              @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                          <div class="form-group col-md-6">
                              <label for="email">Email</label>
                              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email')?? $email }}">
                              @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                        <div class="form-group col-md-6">
                          <label for="phone_number">Mobile Phone</label>
                          <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" maxlength="11" value="{{ old('phone_number')?? $phoneNumber }}">
                          @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>

                      <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update Profile</button>
                  </form>
                  </div>
                </div>

                <div class="tab-pane fade" id="rfq3" role="tabpanel" aria-labelledby="rfq-tab3">
                  <h6>CHANGE PASSWORD</h6>
                  <p class="mg-b-0 text-danger">In order to change your password, you need to provide the current password.</p>
                  <div class="card-body pd-20 pd-lg-25">
                  <form  method="POST" action="{{ route('admin.update_profile_password') }}">
                    @csrf @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="current_password">Current Password</label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password">
                                @error('current_password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password">
                                @error('new_password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="new_confirm_password">Confirm Password</label>
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="new_confirm_password" name="new_confirm_password">
                                @error('new_confirm_password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </form>
                  </div>
                </div>

          </div>
        </div>
      </div>
    </div>
</div>
@endsection