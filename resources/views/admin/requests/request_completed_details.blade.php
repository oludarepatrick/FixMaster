@extends('layouts.dashboard')
@section('title', 'Completed Request Details')
@include('layouts.partials._messages')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/dashforge.filemgr.css') }}">

<div class="content-body">
    <div class="container pd-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.requests_completed') }}">Completed Requests</a></li>
              <li class="breadcrumb-item active" aria-current="page">Completed Request Details</li>
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
                  <a class="nav-link" id="rfq-tab3" data-toggle="tab" href="#rfq3" role="tab" aria-controls="rfq" aria-selected="false">Summary</a>
                </li>
              </ul>
              <div class="tab-content bd bd-gray-300 bd-t-0 pd-20" id="myTabContent3">
                
                <div class="tab-pane fade show active" id="description3" role="tabpanel" aria-labelledby="description-tab3">
                  <h6>JOB DESCRIPTION</h6>
                  
                  <div class="row row-xs mt-4">
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
                            <td class="tx-medium">Initial Service Charge</td>
                            <td class="tx-color-03">₦14,000 (Urgent Fee)</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Final Service Charge</td>
                            <td class="tx-color-03">₦14,000 (Urgent Fee)</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">CSE Assigned</td>
                            <td class="tx-color-03">Godfrey Diwa</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Technician Assigned</td>
                            <td class="tx-color-03">Andrew Nwankwo</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Security Code</td>
                            <td class="tx-color-03">SEC-02IW742BS83</td>
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

                    </div><!-- df-example -->
                  </div>

                </div>

                <div class="tab-pane fade" id="rfq3" role="tabpanel" aria-labelledby="rfq-tab3">
                  <h6>SUMMARY OF SERVICE REQUEST </h6>

                  <h5 class="mt-4">Status Updates </h5>
                  
                  <div class="table-responsive">
                    <table class="table table-hover mg-b-0">
                      <thead class="">
                        <tr>
                          <th class="text-center">#</th>
                          <th>Status</th>
                          <th class="text-center">Timestamp</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="tx-color-03 tx-center">1</td>
                          <td class="tx-medium">On route to Client's house</td>
                          <td class="text-medium tx-center">May 15th 2020 at 11:30am</td>
                        </tr>

                        <tr>
                          <td class="tx-color-03 tx-center">2</td>
                          <td class="tx-medium">Perfoming diagnosis</td>
                          <td class="text-medium tx-center">May 15th 2020 at 12:48pm</td>
                        </tr>

                        <tr>
                          <td class="tx-color-03 tx-center">3</td>
                          <td class="tx-medium">Job completed</td>
                          <td class="text-medium tx-center">May 15th 2020 at 3:17pm</td>
                        </tr>
        
                      </tbody>
                    </table>
                  </div><!-- table-responsive -->

                  <h5 class="mt-4">Tools Request</h5>
                  <div class="table-responsive">
                    <table class="table table-hover mg-b-0">
                      <thead class="">
                        <tr>
                          <th class="text-center">#</th>
                          <th>Equipment/Tools Name</th>
                          <th class="text-center">Quantity</th>
                          <th>Authorised By</th>
                          <th class="text-center">Timestamp</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="tx-color-03 tx-center">1</td>
                          <td class="tx-medium">Ladder</td>
                          <td class="text-medium text-center">2</td>
                          <td class="text-medium">David Akinsola</td>
                          <td class="text-medium tx-center">May 15th 2020 at 11:30am</td>
                        </tr>

                        <tr>
                          <td class="tx-color-03 tx-center">2</td>
                          <td class="tx-medium">Hose</td>
                          <td class="text-medium text-center">2</td>
                          <td class="text-medium">Obuchi Omotosho</td>
                          <td class="text-medium tx-center">May 15th 2020 at 11:30am</td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- table-responsive -->


                  <h5 class="mt-4">Request For Quotation <span class="text-success">(Accepted)</span></h5>
                  <div class="table-responsive">
                    <table class="table table-striped table-sm mg-b-0">
                      <tbody>
                        <tr>
                          <td class="tx-medium">Supplier's Name</td>
                          <td class="tx-color-03">Golden Tribe LTD</td>
                        </tr>
                        <tr>
                          <td class="tx-medium">Delivery Fee</td>
                          <td class="tx-color-03">₦1,500</td>
                        </tr>
                        <tr>
                          <td class="tx-medium">Delivery Time</td>
                          <td class="tx-color-03">May 15th 2020 at 11:30am</td>
                        </tr>
                        <tr>
                          <td class="tx-medium">Accepted By</td>
                          <td class="tx-color-03">Godfrey Diwa</td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-hover mg-b-0 mt-4">
                      <thead class="">
                        <tr>
                          <th class="text-center">#</th>
                          <th>Component Name</th>
                          <th>Model</th>
                          <th class="text-center">Quantity</th>
                          <th class="text-center">Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="tx-color-03 tx-center">1</td>
                          <td class="tx-medium">Plug</td>
                          <td class="text-medium">PL-2342</td>
                          <td class="text-medium text-center">2</td>
                          <td class="text-medium tx-center">₦700</td>
                        </tr>

                        <tr>
                          <td class="tx-color-03 tx-center">2</td>
                          <td class="tx-medium">Carburetor</td>
                          <td class="text-medium">TX-2342</td>
                          <td class="text-medium text-center">1</td>
                          <td class="text-medium tx-center">₦1,200</td>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td class="text-medium tx-center">Total</td>
                          <td class="text-medium tx-center">3</td>
                          <td class="text-medium tx-center">₦1,900</td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- table-responsive -->

                  <h5 class="mt-4">Location Request</h5>
                  <div class="table-responsive">
                    <table class="table table-hover mg-b-0">
                      <thead class="">
                        <tr>
                          <th class="text-center">#</th>
                          <th>Requested By</th>
                          <th>Request Timestamp</th>
                          <th>Recipient</th>
                          <th>Response Timestamp</th>
                          <th>Location</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="tx-color-03 tx-center">1</td>
                          <td class="tx-medium">David Akinsola</td>
                          <td class="text-medium">May 15th 2020 at 11:30am</td>
                          <td class="text-medium">Godfrey Diwa</td>
                          <td class="text-medium">May 15th 2020 at 1:30pm</td>
                          <td class="text-medium">Iyana-Isolo, Oshodi-Isolo, Lagos</td>
                        </tr>

                      </tbody>
                    </table>
                  </div><!-- table-responsive -->
                  
                </div>

              </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection