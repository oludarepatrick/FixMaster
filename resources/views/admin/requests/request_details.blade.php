@extends('layouts.dashboard')
@section('title', 'New Request Details')
@include('layouts.partials._messages')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/dashforge.filemgr.css') }}">

<div class="content-body">
    <div class="container pd-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('cse.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cse.requests') }}">New Requests</a></li>
              <li class="breadcrumb-item active" aria-current="page">New Request Details</li>
            </ol>
          </nav>
          <div class="media align-items-center">
            <span class="tx-color-03 d-none d-sm-block">
              {{-- <i data-feather="credit-card" class="wd-60 ht-60"></i> --}}
              <img src="{{ asset('assets/images/default-male-avatar.png') }}" class="avatar rounded-circle" alt="Male Avatar">
            </span>
            <div class="media-body mg-sm-l-20">
              <h4 class="tx-18 tx-sm-20 mg-b-2">Femi Joseph</h4>
              <p class="tx-13 tx-color-03 mg-b-0">08125456489</p>
            </div>
          </div><!-- media -->
        </div>
      </div>

      <div class="row row-xs">
        <div class="col-lg-12 col-xl-12">
          <table class="table table-striped table-sm mg-b-0">
            <tbody>
              <tr>
                <td class="tx-medium">Job Reference</td>
                <td class="tx-color-03">REF-234094623496</td>
              </tr>
              <tr>
                <td class="tx-medium">Service Required</td>
                <td class="tx-color-03">Mechanical (Generator)</td>
              </tr>
              <tr>
                <td class="tx-medium">Scheduled Date & Time</td>
                <td class="tx-color-03">May 15th 2020 at 11:30am</td>
              </tr>
              <tr>
                <td class="tx-medium">Service Charge</td>
                <td class="tx-color-03">₦14,000 (Urgent Fee)</td>
              </tr>
              <tr>
                <td class="tx-medium">Payment Status</td>
                <td class="tx-color-03">Paid</td>
              </tr>
              <tr>
                <td class="tx-medium">L.G.A</td>
                <td class="tx-color-03">Ibeju-Lekki</td>
              </tr>
              <tr>
                <td class="tx-medium">Town/City</td>
                <td class="tx-color-03">Ibeju-Lekki</td>
              </tr>
              <tr>
                <td class="tx-medium">Request Address</td>
                <td class="tx-color-03">7, Abagbo Close, Victoria Island, Lagos, Nigeria</td>
              </tr>
              <tr>
                <td class="tx-medium">Request Description</td>
                <td class="tx-color-03">My generator just stopped working and it's refusing to come on. I need urgent repairs today.</td>
              </tr>
            </tbody>
          </table>
          <div class="divider-text">Media Files</div>

          <div class="row">
            <div class="pd-20 pd-lg-25 pd-xl-30">
  
              <div class="row row-xs">
                <div class="col-6 col-sm-6 col-md-6 col-xl mg-t-10 mg-sm-t-0">
                  <div class="card card-file">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="" class="dropdown-item download"><i data-feather="download"></i>View</a>
                      </div>
                    </div><!-- dropdown -->
                    <div class="card-file-thumb tx-indigo">
                      <i class="far fa-file-image"></i>
                    </div>
                    <div class="card-body">
                      <h6><a href="" class="link-02">IMG_063037.jpg</a></h6>
                      <span>4.1mb</span>
                    </div>
                  </div>
                </div><!-- col -->
                <div class="col-6 col-sm-6 col-md-6 col-xl mg-t-10 mg-xl-t-0">
                  <div class="card card-file">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="" class="dropdown-item download"><i data-feather="download"></i>View</a>
                      </div>
                    </div><!-- dropdown -->
                    <div class="card-file-thumb tx-primary">
                      <i class="far fa-file-video"></i>
                    </div>
                    <div class="card-body">
                      <h6><a href="" class="link-02">VID_063037.mp4</a></h6>
                      <span>12mb</span>
                    </div>
                  </div>
                </div><!-- col -->
              </div><!-- row -->
              
            </div>
          </div>

          <div class="divider-text">Assign CSE & Technician</div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label>CSE</label>
              <select class="custom-select">
                <option selected>Select...</option>
                <option value="1">Godfrey Diwa</option>
                <option value="2">Rilwan Bello</option>
                <option value="2">Mayowa Olaoye</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Technician</label>
              <select class="custom-select">
                <option selected>Select...</option>
                <option value="1">Andrew Nwankwo</option>
                <option value="2">Taofeek Adedokun</option>
                <option value="2">Blessing Nnamdi</option>
              </select>
            </div>
        </div>
        </div>
      </div>
    </div>
</div>
@endsection