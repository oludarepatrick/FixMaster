@extends('layouts.dashboard')
@section('title', 'Ongoing Requests')
@include('layouts.partials._messages')
@section('content')

<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('cse.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">New Requests</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Ongoing Requests</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card mg-b-10">
          <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
            <div>
              <h6 class="mg-b-5">Your Most Recent Requests</h6>
              <p class="tx-13 tx-color-03 mg-b-0">This table displays a list of <strong>Ongoing Requests</strong> assigned by FixMaster Admin and has been assigned a Technician/Artisan.</p>
            </div>
            
          </div><!-- card-header -->
          <div class="card-body pd-y-30">
            <div class="d-sm-flex">
              <div class="media">
                <div class="wd-40 wd-md-50 ht-40 ht-md-50 bg-primary tx-white mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded op-6">
                  <i data-feather="bar-chart-2"></i>
                </div>
                <div class="media-body">
                  <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-color-03 tx-semibold tx-nowrap mg-b-5 mg-md-b-8">Total Requests</h6>
                  <h4 class="tx-20 tx-sm-18 tx-md-20 tx-normal tx-rubik mg-b-0">4</h4>
                </div>
              </div>
              
            </div>
          </div><!-- card-body -->
          <div class="table-responsive">
            <table class="table table-hover mg-b-0" id="basicExample">
              <thead class="thead-primary">
                <tr>
                  <th class="text-center">#</th>
                  <th>Job Ref.</th>
                  <th>Client</th>
                  <th>Assigned Technician</th>
                  <th class="text-center">Amount</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Date</th>
                  <th class=" text-center">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($userServiceRequests as $userServiceRequest)
                <tr>
                  <td class="tx-color-03 tx-center">{{ ++$i }}</td>
                  <td class="tx-medium">{{ $userServiceRequest->job_reference }}</td>
                  <td>@if(!empty($userServiceRequest->cse_id)) {{ $userServiceRequest->cse->first_name.' '.$userServiceRequest->cse->last_name }} @else Not Assigned @endif</td>
                  <td class="tx-medium">Taofeek Adedokun</td>
                  <td class="text-medium text-center">₦14,000</td>
                  <td class="text-medium tx-center">On route to Client's house</td>
                  <td class="text-medium">May 15th 2020 at 11:30am</td>
                  <td class=" text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                      <a href="{{ route('cse.request_ongoing_details') }}"class="dropdown-item details"><i class="fas fa-bezier-curve"></i> Define Actions</a>
                        <a href="#" class="dropdown-item details text-success"><i class="fas fa-check"></i> Mark as Completed</a>
                      </div>
                    </div>
                  </td>
                </tr>
            @endforeach

              </tbody>
            </table>
          </div><!-- table-responsive -->
        </div><!-- card -->

      </div><!-- col -->
    </div><!-- row -->

    <div class="modal fade" id="modalDetails" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg wd-sm-650" role="document">
        <div class="modal-content">
          <div class="modal-body pd-x-25 pd-sm-x-30 pd-t-40 pd-sm-t-20 pd-b-15 pd-sm-b-20">
            <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
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
            <div class="nav-wrapper mg-b-20 tx-13">
              <div>
                <nav class="nav nav-line tx-medium">
                  <a href="#description" class="nav-link active" data-toggle="tab">Description</a>
                  <a href="#media" class="nav-link" data-toggle="tab">Media</a>
                  <a href="#technician" class="nav-link" data-toggle="tab">Technician</a>
                  <a href="#assign" class="nav-link" data-toggle="tab">Update Action</a>
                </nav>
              </div>
            </div><!-- nav-wrapper -->

            <div class="tab-content">
              <div id="description" class="tab-pane fade active show">                
                <ul class="activity tx-13 mg-b-10">
                  <li class="activity-item">
                    <div class="activity-icon bg-secondary-light tx-secondary">
                      <i data-feather="link"></i>
                    </div>
                    <div class="activity-body">
                      <h5 class="mg-b-2"><strong>Job Reference</strong></h5>
                      <h6 class="tx-color-03">REF-234094623496</h6>
                    </div><!-- activity-body -->
                  </li><!-- activity-item -->
                  <li class="activity-item">
                    <div class="activity-icon bg-primary-light tx-primary">
                      <i data-feather="codepen"></i>
                    </div>
                    <div class="activity-body">
                      <h5 class="mg-b-2"><strong>Service Required</strong></h5>
                      <h6 class="tx-color-03">Mechanical (Generator)</h6>
                    </div><!-- activity-body -->
                  </li><!-- activity-item -->
                  <li class="activity-item">
                    <div class="activity-icon bg-success-light tx-success">
                      <i data-feather="map-pin"></i>
                    </div>
                    <div class="activity-body">
                      <h5 class="mg-b-2"><strong>Request Location</strong></h5>
                      <h6 class="tx-color-03"> 7, Abagbo Close, Victoria Island, Lagos, Nigeria</h6>
                    </div><!-- activity-body -->
                  </li><!-- activity-item -->
                  <li class="activity-item">
                    <div class="activity-icon bg-warning-light tx-orange">
                      <i data-feather="calendar"></i>
                    </div>
                    <div class="activity-body">
                      <h5 class="mg-b-2"><strong>Scheduled Date & Time</strong></h5>
                      <h6 class="tx-color-03"> May 15th 2020 at 11:30am</h6>
                    </div><!-- activity-body -->
                  </li><!-- activity-item -->
                  <li class="activity-item">
                    <div class="activity-icon bg-info-light tx-info">
                      <i data-feather="credit-card"></i>
                    </div>
                    <div class="activity-body">
                      <h5 class="mg-b-2"><strong>Service Charge</strong></h5>
                      <h6 class="tx-color-03"> ₦14,000</h6>
                    </div><!-- activity-body -->
                  </li><!-- activity-item -->
                  <li class="activity-item">
                    <div class="activity-icon bg-pink-light tx-pink">
                      <i data-feather="flag"></i>
                    </div>
                    <div class="activity-body">
                      <h5 class="mg-b-2"><strong>Payment Status</strong></h5>
                      <h6 class="tx-color-03"> Paid</h6>
                    </div><!-- activity-body -->
                  </li><!-- activity-item -->
                  <li class="activity-item">
                    <div class="activity-icon bg-indigo-light tx-indigo">
                      <i data-feather="file"></i>
                    </div>
                    <div class="activity-body">
                      <h5 class="mg-b-2"><strong>Request Description</strong></h5>
                      <h6 class="tx-color-03"> My generator just stopped working and it's refusing to come on. I need urgent repairs today.</h6>
                    </div><!-- activity-body -->
                  </li><!-- activity-item -->
                </ul><!-- activity -->
              </div><!-- tab-pane -->

              <div id="media" class="tab-pane fade">
                <div class="placeholder-media wd-100p wd-sm-55p wd-md-45p">
                  <div class="line"></div>
                  
                </div>
              </div><!-- tab-pane -->

              <div id="technician" class="tab-pane fade">
                <div class="media">
                  <img src="{{ asset('assets/images/default-male-avatar.png') }}" class="wd-200 rounded mg-r-20 align-self-center" alt="">
                  
                  <div class="media-body">
                    <h4 class="tx-18 tx-sm-20 mg-b-2">Taofeek Adedokun</h4>
                    <h6 class="tx-color-03">TECH-23462893</h6>

                    <h5 class="mg-b-2"><strong>Job Security Code</strong></h5>
                    <h6 class="tx-color-03">SEC-2364984238</h6>

                    <h5 class="mg-b-2"><strong>Inital Feedback </strong></h5>
                    <h6 class="tx-color-03">No feedback from the CSE</h6>
                  </div>
                </div>
              </div>

              <div id="assign" class="tab-pane fade">
                <form>
                <div class="row">
                  <div class="col-md-12 col-lg-12 col-12">
                    <div class="form-group col-md-12 col-lg-12">
                      <h5>Security Code</h5>
                      <h6 class="text-muted">SEC-1209328324</h6>
                    </div>
                    <div class="form-group col-md-12 col-lg-12">
                      <label>Assign New Technician</label>
                      <select class="custom-select">
                        <option selected>Select...</option>
                        <option value="1">Andrew Nwankwo</option>
                        <option value="2">Taofeek Adedokun</option>
                        <option value="3">Blessing Nnamdi</option>
                        <option value="3">Bidemi George</option>
                        <option value="3">Isaac Johnson</option>
                      </select>
                    </div>
    
                    <div class="form-group col-md-12 col-lg-12">
                      <label>Additional Feedback</label>
                      <textarea class="form-control" rows="4" placeholder="For Example: Briefly explain if internal or external tools will be used and incurred cost or why there is a need to change the inital assigned Technician" ></textarea>
                    </div> 
                  </div>
                </div>
                
                  <div class="form-group row mg-b-0">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
              </div>
            </div><!-- tab-content -->
          </div><!-- modal-body -->
        </div><!-- modal-content -->
      </div><!-- modal-dialog -->
    </div><!-- modal -->

  </div><!-- container -->
</div>

@endsection