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
          <h4 class="mg-b-0 tx-spacing--1">Job: REF-234094623496</h4><hr>
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
          <div class="card">
            <ul class="nav nav-tabs nav-justified" id="myTab3" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="description-tab3" data-toggle="tab" href="#description3" role="tab" aria-controls="description" aria-selected="true">Description</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="media-tab3" data-toggle="tab" href="#media3" role="tab" aria-controls="media" aria-selected="false">Media Files</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="rfq-tab3" data-toggle="tab" href="#rfq3" role="tab" aria-controls="rfq" aria-selected="false">RFQ</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" id="rfq-tab3" data-toggle="tab" href="#trf3" role="tab" aria-controls="trf" aria-selected="false">Tools Request</a>
                </li>
            </ul>
            
            <div class="tab-content bd bd-gray-300 bd-t-0 pd-20" id="myTabContent3">
              <div class="tab-pane fade show active" id="description3" role="tabpanel" aria-labelledby="description-tab3">
                <h6>JOB DESCRIPTION</h6>
                {{-- <p class="mg-b-0">Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore.</p> --}}

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
                      <div class="activity-icon bg-dark-light tx-dark">
                        <i data-feather="lock"></i>
                      </div>
                      <div class="activity-body">
                        <h5 class="mg-b-2"><strong>Security Code</strong></h5>
                        <h6 class="tx-color-03">SEC-2364984238</h6>
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

              </div>

              <div class="tab-pane fade" id="media3" role="tabpanel" aria-labelledby="media-tab3">
                <h6>MEDIA FILES ATTACHED</h6>

                <div class="row">
                  <div class="pd-20 pd-lg-25 pd-xl-30">
        
                    <div class="row row-xs">
                      <div class="col-6 col-sm-6 col-md-6 col-xl mg-t-10 mg-sm-t-0">
                        <div class="card card-file">
                          <div class="dropdown-file">
                            <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <!-- <a href="#modalViewDetails" data-toggle="modal" class="dropdown-item details"><i data-feather="info"></i>View Details</a>
                              <a href="" class="dropdown-item important"><i data-feather="star"></i>Mark as Important</a>
                              <a href="#modalShare" data-toggle="modal" class="dropdown-item share"><i data-feather="share"></i>Share</a> -->
                              <a href="" class="dropdown-item download"><i data-feather="download"></i>View</a>
                              <!-- <a href="#modalCopy" data-toggle="modal" class="dropdown-item copy"><i data-feather="copy"></i>Copy to</a>
                              <a href="#modalMove" data-toggle="modal" class="dropdown-item move"><i data-feather="folder"></i>Move to</a>
                              <a href="#" class="dropdown-item rename"><i data-feather="edit"></i>Rename</a>
                              <a href="#" class="dropdown-item delete"><i data-feather="trash"></i>Delete</a> -->
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
                              <!-- <a href="#modalViewDetails" data-toggle="modal" class="dropdown-item details"><i data-feather="info"></i>View Details</a>
                              <a href="" class="dropdown-item important"><i data-feather="star"></i>Mark as Important</a>
                              <a href="#modalShare" data-toggle="modal" class="dropdown-item share"><i data-feather="share"></i>Share</a> -->
                              <a href="" class="dropdown-item download"><i data-feather="download"></i>View</a>
                              <!-- <a href="#modalCopy" data-toggle="modal" class="dropdown-item copy"><i data-feather="copy"></i>Copy to</a>
                              <a href="#modalMove" data-toggle="modal" class="dropdown-item move"><i data-feather="folder"></i>Move to</a>
                              <a href="#" class="dropdown-item rename"><i data-feather="edit"></i>Rename</a>
                              <a href="#" class="dropdown-item delete"><i data-feather="trash"></i>Delete</a> -->
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

              </div>

              <div class="tab-pane fade" id="rfq3" role="tabpanel" aria-labelledby="rfq-tab3">
                <h6>REQUEST FOR QUOTATION</h6>
                <p class="mg-b-0">A request for quotation is a business process in which a company or public entity requests a quote from a supplier for the purchase of specific products or services.</p>

                <h4 id="section1" class="mt-4 mb-2">Initiate RFQ?</h4>
                  <div class="form-row mt-4">
                      <div class="form-group col-md-4">
                          <div class="custom-control custom-radio">
                          <input type="radio" class="custom-control-input" id="rfqYes" name="intiate_rfq">
                          <label class="custom-control-label" for="rfqYes">Yes</label><br>
                          </div>
                      </div>
                      <div class="form-group col-md-4 d-flex align-items-end">
                          <div class="custom-control custom-radio">
                          <input type="radio" class="custom-control-input" id="rfqNo" name="intiate_rfq">
                          <label class="custom-control-label" for="rfqNo">No</label><br>
                          </div>
                      </div>
                  </div>

                  <div class="d-none d-rfq">
                      {{-- <div class="d-md-block mb-2 mr-2 float-right">
                          <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" id="add-rfq" type="button"><i data-feather="plus" class="wd-10 mg-r-5" ></i> Add More</button>
                        </div> --}}
                      <h4 id="section1" class="mt-4 mb-2">Make Request</h4>
                      <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="inputEmail4">Component Name</label>
                            <input type="text" class="form-control" id="inputEmail4">
                          </div>
            
                          <div class="form-group col-md-4">
                            <label for="inputPassword4">Model Number</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="">
                          </div>
                          <div class="form-group col-md-2 mt-2">
                              <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5 mt-4 add-rfq" type="button"><i class="fas fa-plus" class="wd-10 mg-r-5" ></i></button>
                          </div>
                      </div>

                      <span class="add-rfq-row"></span>

                      <div class="form-row">
                          <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" type="button"> Submit</button>
                        </div>
                  </div>
              </div>

              <div class="tab-pane fade" id="trf3" role="tabpanel" aria-labelledby="trf-tab3">
                  <h6>TOOLS REQUEST FORM</h6>
                  <p class="mg-b-0">A request form to procure tools and equipments from <span>FixMaster</span> to properly carry out a Service Request.</p>

                  <h4 id="section1" class="mt-4 mb-2">Initiate Tools Request?</h4>
                    <div class="form-row mt-4">
                        <div class="form-group col-md-4">
                            <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="trfYes" name="intiate_trf">
                            <label class="custom-control-label" for="trfYes">Yes</label><br>
                            </div>
                        </div>
                        <div class="form-group col-md-4 d-flex align-items-end">
                            <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="trfNo" name="intiate_trf">
                            <label class="custom-control-label" for="trfNo">No</label><br>
                            </div>
                        </div>
                    </div>

                    <div class="d-none d-trf">
                        {{-- <div class="d-md-block mb-2 mr-2 float-right">
                            <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" id="add-rfq" type="button"><i data-feather="plus" class="wd-10 mg-r-5" ></i> Add More</button>
                          </div> --}}
                        <h4 id="section1" class="mt-4 mb-2">Make Request</h4>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="inputEmail4">Equipment/Tools Name</label>
                              <input type="text" class="form-control" id="inputEmail4">
                            </div>
              
                            <div class="form-group col-md-2">
                              <label for="inputPassword4">Quantity</label>
                              <input type="tel" class="form-control quantity" id="inputPassword4" maxlength="2">
                            </div>
                            <div class="form-group col-md-2 mt-2">
                                <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5 mt-4 add-trf" type="button"><i class="fas fa-plus" class="wd-10 mg-r-5" ></i></button>
                            </div>
                        </div>

                        <span class="add-trf-row"></span>

                        <div class="form-row">
                            <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5" type="button"> Submit</button>
                          </div>
                    </div>
                </div>

            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection