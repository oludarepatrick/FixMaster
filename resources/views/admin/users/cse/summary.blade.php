@extends('layouts.dashboard')
@section('title', 'Godfrey Diwa\'s Summary')
@include('layouts.partials._messages')
@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.list_cse') }}">CSE List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Godfrey Diwa</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-sm-6 col-lg-4">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Requests</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h5 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">6</h5>
          </div>
          
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Completed Requests</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h5 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">4</h5>
          </div>
          
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="card card-body">
          <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Cancelled Requests</h6>
          <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h5 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">2</h5>
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

          <div class="row row-sm">
            <div class="col-6 col-sm">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Firstname</label>
              <p class="mg-b-0">Godfrey</p>
            </div><!-- col -->
            <div class="col-6 col-sm">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Middlename</label>
              <p class="mg-b-0">Panshak</p>
            </div><!-- col -->
            <div class="col-6 col-sm">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Lastname</label>
              <p class="mg-b-0">Diwa</p>
            </div><!-- col -->
          </div><!-- row -->

          <div class="row row-sm">
            <div class="col-6 col-sm mg-t-20">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Rating</label>
              <h4 class="tx-normal tx-rubik mg-b-0 mg-r-5">4.2</h4>
              <div class="tx-18">
                <i class="icon ion-md-star lh-0 tx-orange"></i>
                <i class="icon ion-md-star lh-0 tx-orange"></i>
                <i class="icon ion-md-star lh-0 tx-orange"></i>
                <i class="icon ion-md-star lh-0 tx-orange"></i>
                <i class="icon ion-md-star lh-0 tx-gray-300"></i>
              </div>
            </div>
            {{-- <div class="col-6 col-sm mg-t-20">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Franchise</label>
              <p class="tx-primary tx-rubik mg-b-0">Demo Franchise</p>
            </div> --}}
            <div class="col-6 col-sm mg-t-20">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">ID</label>
              <p class="tx-primary tx-rubik mg-b-0">CSE-23804223</p>
            </div>
          </div>

          <h5 class="mg-t-40 mg-b-20">Contact Details</h5>

          <div class="row row-sm">
            <div class="col-6 col-sm mg-t-20">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Phone Number</label>
              <p class="tx-primary tx-rubik mg-b-0">08034516890</p>
            </div>
            <div class="col-6 col-sm mg-t-20">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Other Phone Number</label>
              <p class="tx-primary tx-rubik mg-b-0"></p>
            </div>
            <div class="col-6 col-sm mg-t-20">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Email Address</label>
              <p class="tx-primary mg-b-0">hostdiwa@gmail.com</p>
            </div>
          </div>

          <div class="row row-sm">
            <div class="col-6 col-sm mg-t-20">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">State</label>
              <p class="mg-b-0">Lagos</p>
            </div>
            <div class="col-6 col-sm mg-t-20">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">L.G.A</label>
              <p class="mg-b-0">Mushin</p>
            </div>
            <div class="col-6 col-sm mg-t-20">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Town/City</label>
              <p class="mg-b-0">Ibeju-Lekki</p>
            </div>
            <div class="col-6 col-sm mg-t-20">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Full Address</label>
              <p class="mg-b-0">2 Chevron Drive, Lekki Penninsula II 12825, Lekki</p>
            </div>
          </div><!-- row -->

          <h5 class="mg-t-40 mg-b-20">Bank Details</h5>
          <div class="row row-sm">
            <div class="col-6 col-sm">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Bank Name</label>
              <p class="tx-primary mg-b-0">Ecobank Plc</p>
            </div>
            <div class="col-6 col-sm">
              <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Account Number</label>
              <p class="tx-primary tx-rubik mg-b-0">0123456789</p>
            </div>
          </div>
          
          <h5 class="mg-t-40 mg-b-20">Other Details</h5>
          <div class="table-responsive">
            <table class="table table-striped table-sm mg-b-0">
              <tbody>
                <tr>
                  <td class="tx-medium">Service Category</td>
                  <td class="tx-color-03">Mobile Phone, Light Fittings, Wiring Repair, Computer</td>
                </tr>
                <tr>
                  <td class="tx-medium">Status</td>
                  <td class="tx-color-03">Active</td>
                </tr>
                <tr>
                  <td class="tx-medium">Date Created</td>
                  <td class="tx-color-03">May 15 2020</td>
                </tr>
                <tr>
                  <td class="tx-medium">Requests Completed</td>
                  <td class="tx-color-03">4</td>
                </tr>
                <tr>
                  <td class="tx-medium">Payments Received</td>
                  <td class="tx-color-03">8</td>
                </tr>
                <tr>
                  <td class="tx-medium">Messages Sent</td>
                  <td class="tx-color-03">12</td>
                </tr>
                <tr>
                  <td class="tx-medium">Login Count</td>
                  <td class="tx-color-03">23</td>
                </tr>
                <tr>
                  <td class="tx-medium">Last Seen</td>
                  <td class="tx-color-03">2 Days ago</td>
                </tr>
                <tr>
                  <td class="tx-medium">Tools Requested</td>
                  <td class="tx-color-03">3</td>
                </tr>
                
              </tbody>
            </table>
          </div>
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
                      <th>Client</th>
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
                      <td class="tx-medium">Femi Joseph</td>
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
                      <td class="tx-medium">Mobolaji Adetoun</td>
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
                      <th>Job Ref.</th>
                      <th>Reference No</th>
                      <th>Amount</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Payment Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="tx-color-03 tx-center">1</td>
                      <td class="tx-medium">REF-234094623496</td>
                      <td class="tx-medium">234092734623496</td>
                      <td class="tx-medium">₦7,000</td>
                      <td class="text-medium text-success text-center">Paid</td>
                      <td class="text-medium tx-center">Apr 3, 2020, 12:56pm</td>
                    </tr>
    
                    <tr>
                        <td class="tx-color-03 tx-center">2</td>
                        <td class="tx-medium">REF-094009623412</td>
                        <td class="tx-medium">4352927346209232</td>
                        <td class="tx-medium">₦4,800</td>
                        <td class="text-medium text-success text-center">Paid</td>
                        <td class="text-medium tx-center">Mar 21, 2020, 3:30pm</td>
                    </tr>
    
                    <tr>
                        <td class="tx-color-03 tx-center">3</td>
                        <td class="tx-medium">REF-237290223123</td>
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