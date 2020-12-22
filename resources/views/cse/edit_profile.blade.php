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
                    <form>
                    @csrf @method('GET')
                        <div class="d-sm-flex float-left">
                            <div class="mg-sm-r-30">
                                <div class="pos-relative d-inline-block mg-b-20">
                                    <a href="#">
                                    <div class="avatar avatar-xxl">
                                      <!-- <span class="avatar-initial rounded-circle bg-gray-700 tx-normal">
                                        <i class="icon ion-md-person"></i>
                                      </span> -->

                                      <div class="user-img">
                                        <img class="rounded-circle wh-150p img-fluid image profile_image_preview" src="{{!empty(Auth::check()) ? asset('assets/cse-technician-images/'.$avatar) : asset('assets/admin/img/noimage.jpg')}}" alt="user-image">
                                      </div>
                                      
                                      </div></a>
                                    {{-- <a href="" class="contact-edit-photo"><i data-feather="edit-2"></i></a> --}}
                                </div>
                            </div><!-- col -->
                        </div>
                        <!-- First Name -->
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ old('first_name') ?? $firstName }}">
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                            <!-- Middle Name -->
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Middle Name</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name') ?? $middleName }}">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                            <!-- Last Name -->
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') ?? $lastName }}">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                            <!-- Email -->
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email')?? $email }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                            <!-- Phone Number -->
                            <div class="form-group col-md-4">
                              <label for="inputEmail4">Phone Number</label>
                              <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" maxlength="11" value="{{ old('phone_number')?? $phoneNumber }}">
                              @error('phone_number')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                            <!-- Other Phone Number -->
                            <div class="form-group col-md-4">
                              <label for="inputEmail4">Other Phone Number</label>
                              <input type="tel" class="form-control" id="other_phone_number" maxlength="11" maxlength="11" value="{{ old('other_phone_number')?? $otherPhoneNumber }}">
                            </div>
                            <!-- Profile Avatar -->
                            <div class="form-group col-md-4">
                              <label>Profile Avatar</label>
                              <div class="custom-file">
                                <input type="file" accept="image/*" class="custom-file-input @error('image') is-invalid @enderror" name="avatar" id="avatar">
                                <label class="custom-file-label" id="image-name" for="image">Upload Profile Avatar</label>
                                @error('avatar')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                            </div>
                            <!-- Bank Name -->
                            <div class="form-group col-md-4">
                              <label>Bank Name</label>
                              <select id="bankSelect" name="bank_id" class="custom-select bank_id @error('bank_id') is-invalid @enderror">
                                  
                              <option data-display="Select Bank *" value="">Bank *</option>
                                @foreach($allBanks as $allBank)
                                    <option value="{{$allBank->id}}" selected>{{$allBank->name}} </option>
                                @endforeach
                              </select>
                              @error('bank_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                            <!-- Account Number -->
                            <div class="form-group col-md-4">
                                <label for="account_number">Account Number</label>
                                <input type="text" class="form-control @error('account_number') is-invalid @enderror" id="account_number" name="account_number" placeholder="Account Number" value="{{ old('account_number')?? $accountNumber }}" maxlength="10"  autocomplete="off">
                                @error('account_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                            <!-- State -->
                            <div class="form-group col-md-4">
                              <label>State</label>
                              <select class="form-control @error('state_id') is-invalid @enderror" name="state_id" id="state_id">
                                <!-- <option selected value="">Select...</option> -->
                                
                                <option data-display="Select State *" value="">State *</option>
                                @foreach($allStates as $allState)
                                    <option value="{{$allState->id}}" selected>{{$allState->name}} </option>
                                @endforeach

                              </select>
                              @error('state_id')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                            <!-- L.G.A -->
                            <div class="form-group col-md-4">
                              <label>L.G.A</label>
                              <select class="form-control @error('lga_id') is-invalid @enderror" name="lga_id" id="lga_id">
                              <option data-display="Select LGA *" value="">LGA *</option>
                                @foreach($allLgas as $allLga)
                                    <option value="{{$allLga->id}}" selected>{{$allLga->name}} </option>
                                @endforeach
                              </select>
                              @error('lga_id')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                            <!-- Town/City -->
                            <div class="form-group col-md-4">
                              <label>Town/City</label>
                              <input type="text" class="form-control @error('town') is-invalid @enderror" placeholder="e.g. CMS, Ikoyi, Egbeda" name="town" id="town" value="{{ old('town')?? $town }}" required>
                              @error('town')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                            <!-- Upload Company Logo -->
                          {{-- <div class="form-group col-md-6">
                            <label class="d-block">Upload Company Logo</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Company Logo</label>
                            </div>
                          </div> --}}
                            <!-- Full Address -->
                          <div class="form-group col-md-12">
                            <label for="inputAddress2">Full Address</label> 
                            <textarea rows="3" class="form-control" id="inputAddress2" name="fullAddress">{{ old('full_address')?? $fullAddress }}</textarea>
                          </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                  </div>
                </div>

                <div class="tab-pane fade" id="rfq3" role="tabpanel" aria-labelledby="rfq-tab3">
                  <h6>CHANGE PASSWORD</h6>
                  <p class="mg-b-0 text-danger">In order to change your password, you need to provide the current password.</p>
                  <div class="card-body pd-20 pd-lg-25">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Current Password</label>
                                <input type="password" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">New Password</label>
                                <input type="password" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Confirm Password</label>
                                <input type="password" class="form-control" id="inputEmail4">
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