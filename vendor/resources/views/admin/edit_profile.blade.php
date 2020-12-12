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
                        <div class="d-sm-flex float-left">
                            <div class="mg-sm-r-30">
                                <div class="pos-relative d-inline-block mg-b-20">
                                    <a href="#"><div class="avatar avatar-xxl"><span class="avatar-initial rounded-circle bg-gray-700 tx-normal"><i class="icon ion-md-person"></i></span></div></a>
                                    {{-- <a href="" class="contact-edit-photo"><i data-feather="edit-2"></i></a> --}}
                                </div>
                            </div><!-- col -->
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">First Name</label>
                                <input type="text" class="form-control" id="inputEmail4" value="Charles">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Middle Name</label>
                                <input type="text" class="form-control" id="inputEmail4" value="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Last Name</label>
                                <input type="text" class="form-control" id="inputEmail4" value="Famoriyo">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" value="afrikafrique@gmail.com">
                            </div>
                          <div class="form-group col-md-4">
                            <label for="inputEmail4">Mobile Phone</label>
                            <input type="tel" class="form-control" id="inputEmail4" maxlength="11" value="08054242309">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputEmail4">Work Phone</label>
                            <input type="tel" class="form-control" id="inputEmail4" maxlength="11" value="08120933092">
                          </div>
                          {{-- <div class="form-group col-md-6">
                            <label class="d-block">Upload Company Logo</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Company Logo</label>
                            </div>
                          </div> --}}

                          {{-- <div class="form-group col-md-6">
                            <label for="inputAddress2">Home Address</label>
                            <textarea rows="3" class="form-control" id="inputAddress2"></textarea>
                          </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Work Address</label>
                                <textarea rows="3" class="form-control" id="inputAddress2"></textarea>
                            </div> --}}

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