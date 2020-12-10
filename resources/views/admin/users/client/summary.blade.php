@extends('layouts.dashboard')
@section('title', $user->fullName->name.'\'s Summary')
@include('layouts.partials._messages')
@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.list_client') }}">Client List</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $user->fullName->name }}</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-sm-6 col-lg-3">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Requests</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
          <h5 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $totalRequests }}</h5>
          </div>
          
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Completed Requests</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
          <h5 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $completedRequests }}</h5>
          </div>
          
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Cancelled Requests</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
          <h5 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">{{ $cancelledRequests }}</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">E-Wallet</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h5 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">₦54,560.00</h5>
          </div>
        </div>
      </div>
    </div>

    <div class="contact-content-header mt-4">
      <nav class="nav">
        <a href="#contactInformation" class="nav-link active" data-toggle="tab">Contact Info<span>rmation</span></a>
        <a href="#requestsHistory" class="nav-link" data-toggle="tab"><span>Requests History</a>
        <a href="#paymentsHistory" class="nav-link" data-toggle="tab"><span>Payments History</a>
        <a href="#activityLog" class="nav-link" data-toggle="tab"><span>Activity Log</a>
      </nav>
      <a href="" id="contactOptions" class="text-secondary mg-l-auto d-xl-none"><i data-feather="more-horizontal"></i></a>
    </div><!-- contact-content-header -->

    <div class="contact-content-body">
      <div class="tab-content">

        <div id="contactInformation" class="tab-pane show active pd-20 pd-xl-25">
          <div class="d-flex align-items-center justify-content-between mg-b-25">
            <h5 class="mg-b-0">Personal Details</h5>
            <div class="d-flex">
              <div class="avatar avatar-xl"><img src="{{ asset('assets/images/default-male-avatar.png') }}" class="rounded-circle" alt=""></div>
            </div>
          </div>

          <div class="row">
            <div class="col-6 col-sm">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Firstname</label>
            <p class="mg-b-0">{{ $client->first_name }}</p>
            </div><!-- col -->
            <div class="col-6 col-sm">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Middlename</label>
              <p class="mg-b-0">{{ $client->middle_name }}</p>
            </div><!-- col -->
            <div class="col-sm mg-t-20 mg-sm-t-0">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Lastname</label>
              <p class="mg-b-0">{{ $client->last_name }}</p>
            </div><!-- col -->
            <div class="col-sm mg-t-20 mg-sm-t-0">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Gender</label>
              <p class="mg-b-0">{{ $client->gender }}</p>
            </div><!-- col -->
          </div><!-- row -->

          <h5 class="mg-t-40 mg-b-20">Contact Details</h5>

          <div class="row row-sm">
            <div class="col-6 col-sm-4">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Email Address</label>
            <p class="tx-primary mg-b-0">{{ $user->email }}</p>
            </div>
            <div class="col-6 col-sm-4">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Mobile Phone</label>
            <p class="tx-primary tx-rubik mg-b-0">{{ $client->phone_number }}</p>
            </div>
            <div class="col-6 col-sm-4 mg-t-20 mg-sm-t-0">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Occupation</label>
            <p class="tx-primary tx-rubik mg-b-0">{{ $client->profession->name }}</p>
            </div>
            <div class="col-sm-4 mg-t-20 mg-sm-t-30">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">State</label>
            <p class="mg-b-0">{{ $client->state->name }}</p>
            </div>
            <div class="col-sm-4 mg-t-20 mg-sm-t-30">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">L.G.A</label>
            <p class="mg-b-0">{{ $client->lga->name }}</p>
            </div>
            <div class="col-sm-4 mg-t-20 mg-sm-t-30">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Town/City</label>
              <p class="mg-b-0">{{ $client->town }}</p>
            </div>
            <div class="col-sm-6 mg-t-20 mg-sm-t-30">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Home Address</label>
            <p class="mg-b-0">{{ $client->full_address }}</p>
            </div>
            {{-- <div class="col-sm-6 mg-t-20 mg-sm-t-30">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Referral Code</label>
              <p class="mg-b-0">L3I8284AJ</p>
            </div> --}}
           
            
          </div><!-- row -->
        </div>

        <div id="requestsHistory" class="tab-pane pd-20 pd-xl-25">
          {{-- <div class="d-flex align-items-center justify-content-between mg-b-30"> --}}
              <h6 class="tx-15 mg-b-0">Requests History</h6>
              <div class="table-responsive mt-4">
                <table class="table table-hover mg-b-0" id="basicExample">
                  <thead class="thead-primary">
                    <tr>
                      <th class="text-center">#</th>
                      <th>Job Ref.</th>
                      <th>CSE</th>
                      <th>Technician</th>
                      <th class="text-center">Amount</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Date</th>
                      <th class=" text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="tx-color-03 tx-center">1</td>
                      <td class="tx-medium">REF-234094623496</td>
                      <td class="tx-medium">Rilwan Bello</td>
                      <td class="tx-medium">Andrew Nwankwo</td>
                      <td class="text-medium text-center">₦14,000</td>
                      <td class="text-medium text-success text-center">Completed</td>
                      <td class="text-medium">May 15th 2020 at 11:30am</td>
                      <td class=" text-center">
                        <div class="dropdown-file">
                          <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                          <a href="{{ route('cse.request_details') }}" class="dropdown-item details"><i class="far fa-clipboard"></i> Details</a>
                          </div>
                        </div>
                      </td>
                    </tr>
    
                    <tr>
                      <td class="tx-color-03 tx-center">2</td>
                      <td class="tx-medium">REF-094009623412</td>
                      <td class="tx-medium">Godfrey Diwa</td>
                      <td class="tx-medium">Taofeek Adedokun</td>
                      <td class="text-medium text-center">₦25,000</td>
                      <td class="text-medium text-danger text-center">Cancelled</td>
                      <td class="text-medium">May 12th 2020 at 8:26pm</td>
                      <td class=" text-center">
                        <div class="dropdown-file">
                          <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('cse.request_details') }}" class="dropdown-item details"><i class="far fa-clipboard"></i> Details</a>
                          </div>
                        </div>
                      </td>
                    </tr>
    
                  </tbody>
                </table>
              </div><!-- table-responsive -->
          {{-- </div> --}}
        </div><!-- tab-pane -->

        <div id="paymentsHistory" class="tab-pane pd-20 pd-xl-25">
          {{-- <div class="d-flex align-items-center justify-content-between mg-b-30"> --}}
              <h6 class="tx-15 mg-b-0">Payments History</h6>

              <div class="table-responsive mt-4">
                <div class="row mt-1 mb-1 ml-1 mr-1">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sort</label>
                            <select class="custom-select" id="request-sorting">
                                <option value="None">Select...</option>
                                <option value="Date">Date</option>
                                <option value="Month">Month</option>
                                <option value="Date Range">Date Range</option>
                            </select>
                        </div>
                    </div><!--end col-->
        
                    <div class="col-md-4 specific-date d-none">
                        <div class="form-group position-relative">
                            <label>Specify Date <span class="text-danger">*</span></label>
                            <input name="name" id="name" type="date" class="form-control pl-5">
                        </div>
                    </div>
        
                    <div class="col-md-4 sort-by-year d-none">
                        <div class="form-group position-relative">
                            <label>Specify Year <span class="text-danger">*</span></label>
                            <select class="form-control custom-select" id="Sortbylist-Shop">
                                <option>Select...</option>
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                            </select>
                        </div>
                    </div>
        
                    <div class="col-md-4 sort-by-year d-none">
                        <div class="form-group position-relative">
                            <label>Specify Month <span class="text-danger">*</span></label>
                            <select class="form-control custom-select" id="Sortbylist-Shop">
                                <option>Select...</option>
                                <option>January</option>
                                <option>February</option>
                                <option>March</option>
                                <option>April</option>
                                <option>May</option>
                                <option>June</option>
                                <option>July</option>
                                <option>August</option>
                                <option>September</option>
                                <option>October</option>
                                <option>November</option>
                                <option>December</option>
                            </select>
                        </div>
                    </div>
        
                    <div class="col-md-4 date-range d-none">
                        <div class="form-group position-relative">
                            <label>From <span class="text-danger">*</span></label>
                            <input name="name" id="name" type="date" class="form-control pl-5">
                        </div>
                    </div>
        
                    <div class="col-md-4 date-range d-none">
                        <div class="form-group position-relative">
                            <label>To <span class="text-danger">*</span></label>
                            <input name="name" id="name" type="date" class="form-control pl-5">
                        </div>
                    </div>
                  </div>
                <table class="table table-hover mg-b-0" id="basicExample">
                  <thead class="thead-primary">
                    <tr>
                      <th class="text-center">#</th>
                      <th>Payment Type</th>
                      <th>Reference No</th>
                      <th>Amount</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Payment Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="tx-color-03 tx-center">1</td>
                      <td class="tx-medium">Service Payment</td>
                      <td class="tx-medium">234092734623496</td>
                      <td class="tx-medium">₦7,000</td>
                      <td class="text-medium text-success text-center">Paid</td>
                      <td class="text-medium tx-center">Apr 3, 2020, 12:56pm</td>
                    </tr>
    
                    <tr>
                        <td class="tx-color-03 tx-center">2</td>
                        <td class="tx-medium">E-Wallet Credit</td>
                        <td class="tx-medium">4352927346209232</td>
                        <td class="tx-medium">₦4,800</td>
                        <td class="text-medium text-success text-center">Paid</td>
                        <td class="text-medium tx-center">Mar 21, 2020, 3:30pm</td>
                    </tr>
    
                    <tr>
                        <td class="tx-color-03 tx-center">3</td>
                        <td class="tx-medium">E-Wallet Debit (Service Payment)</td>
                        <td class="tx-medium">1234527346092372</td>
                        <td class="tx-medium">₦2,500</td>
                        <td class="text-medium text-success text-center">Paid</td>
                        <td class="text-medium tx-center">Feb 25, 2020, 8:17am</td>
                    </tr>
    
                 
    
                    
                  </tbody>
                </table>
              </div><!-- table-responsive -->

          {{-- </div> --}}
        </div><!-- tab-pane -->

        <div id="activityLog" class="tab-pane pd-20 pd-xl-25">
          {{-- <div class="d-flex align-items-center justify-content-between mg-b-30"> --}}
              <h6 class="tx-15 mg-b-0">Activity Log</h6>
              <div class="table-responsive mt-4">
                <div class="row mt-1 mb-1 ml-1 mr-1">
                  <div class="col-md-3">
                    <div class="form-group">
                        <label>Sort Type</label>
                        <select class="custom-select">
                            <option value="None">Select...</option>
                            <option selected value="Date Range">Others</option>
                            <option value="Date">Payments</option>
                            <option value="Month">Requests</option>
                        </select>
                    </div>
                  </div><!--end col-->
    
    
                  <div class="col-md-3">
                      <div class="form-group">
                          <label>Sort Date</label>
                          <select class="custom-select" id="request-sorting">
                              <option value="None">Select...</option>
                              <option value="Date">Date</option>
                              <option value="Month">Month</option>
                              <option value="Date Range">Date Range</option>
                          </select>
                      </div>
                  </div><!--end col-->
      
                  <div class="col-md-3 specific-date d-none">
                      <div class="form-group position-relative">
                          <label>Specify Date <span class="text-danger">*</span></label>
                          <input name="name" id="name" type="date" class="form-control pl-5">
                      </div>
                  </div>
      
                  <div class="col-md-3 sort-by-year d-none">
                      <div class="form-group position-relative">
                          <label>Specify Year <span class="text-danger">*</span></label>
                          <select class="form-control custom-select" id="Sortbylist-Shop">
                              <option>Select...</option>
                              <option>2018</option>
                              <option>2019</option>
                              <option>2020</option>
                          </select>
                      </div>
                  </div>
      
                  <div class="col-md-3 sort-by-year d-none">
                      <div class="form-group position-relative">
                          <label>Specify Month <span class="text-danger">*</span></label>
                          <select class="form-control custom-select" id="Sortbylist-Shop">
                              <option>Select...</option>
                              <option>January</option>
                              <option>February</option>
                              <option>March</option>
                              <option>April</option>
                              <option>May</option>
                              <option>June</option>
                              <option>July</option>
                              <option>August</option>
                              <option>September</option>
                              <option>October</option>
                              <option>November</option>
                              <option>December</option>
                          </select>
                      </div>
                  </div>
      
                  <div class="col-md-3 date-range d-none">
                      <div class="form-group position-relative">
                          <label>From <span class="text-danger">*</span></label>
                          <input name="name" id="name" type="date" class="form-control pl-5">
                      </div>
                  </div>
      
                  <div class="col-md-3 date-range d-none">
                      <div class="form-group position-relative">
                          <label>To <span class="text-danger">*</span></label>
                          <input name="name" id="name" type="date" class="form-control pl-5">
                      </div>
                  </div>
                </div>
    
                <table class="table table-dashboard mg-b-0" id="basicExample">
                  <thead>
                    <tr>
                      <th width="5%">#</th>
                      <th width="20%">Date Created</th>
                      <th width="75%">Message</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="tx-color-03">1</td>
                      <td class="tx-medium">June 20th 2018, 7:15:29 am</td>
                      <td class="tx-medium">Logged In successfully</td>
                    </tr>
    
                    <tr>
                      <td class="tx-color-03">2</td>
                      <td class="tx-medium">June 18th 2018, 6:18:56 pm</td>
                      <td class="tx-medium">Updated profile</td>
                    </tr>
    
                    <tr>
                      <td class="tx-color-03">3</td>
                      <td class="tx-medium">June 18th 2018, 5:34:15 pm</td>
                      <td class="tx-medium">Changed password</td>
                    </tr>
    
                    <tr>
                      <td class="tx-color-03">4</td>
                      <td class="tx-medium">June 15th 2018, 5:34:15 pm</td>
                      <td class="tx-medium">Logged Out</td>
                    </tr>
                  
    
                  </tbody>
                </table>
              </div><!-- table-responsive -->
          {{-- </div> --}}
        </div><!-- tab-pane -->

      </div><!-- tab-content -->
    </div><!-- contact-content-body -->

</div>

@endsection