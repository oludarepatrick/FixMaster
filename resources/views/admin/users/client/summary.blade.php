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

      <div class="d-md-block">
        <a href="{{ route('admin.list_client') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
        @if($user->is_active == 0)
          <a href="{{ route('admin.reinstate_client', $user->id) }}" class="btn btn-success"><i class="fas fa-undo"></i> Reinstate</a>
        @endif
        <a href="{{ route('admin.delete_client', $user->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
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
          <h5 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">₦@if(!empty($client->user->wallet->balance)) {{ number_format($client->user->wallet->balance) }} @else 0 @endif </h5>
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

            <div class="d-flex">
              <div class="avatar avatar-xxl">
                {{-- <img src="{{ asset('assets/images/default-male-avatar.png') }}" class="rounded-circle" alt=""> --}}
                @if(!empty($client->avatar) && file_exists(public_path().'/assets/client-avatars/'.$client->avatar))
                    <img src="{{ asset('assets/client-avatars/'.$client->avatar) }}" class="rounded-circle" alt="" />
                @else
                    @if($client->gender == 'Male')
                        <img src="{{ asset('assets/images/default-male-avatar.png') }}" alt="Default male profile avatar" class="avatar avatar-large rounded-circle shadow d-block mx-auto" />
                    @else
                        <img src="{{ asset('assets/images/default-female-avatar.png') }}" alt="Default female profile avatar" class="avatar avatar-large rounded-circle shadow d-block mx-auto" />
                    @endif
                @endif
              </div>
            </div>
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
                <table class="table table-hover mg-b-0" id="requestExample">
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
                    @foreach($user->requests as $request)
                      @if(!empty($request->serviceRequestDetail->discount_service_fee))
                        {{$totalFee += $request->serviceRequestDetail->discount_service_fee}}
                      @else
                        {{$totalFee += $request->serviceRequestDetail->initial_service_fee}}
                      @endif
                    <tr>
                      <td class="tx-color-03 tx-center">{{ ++$i }}</td>
                      <td class="tx-medium">{{ $request->job_reference }}</td>
                        <td class="tx-medium">{{ $request->user->fullName->name ?? '' }}</td>
                        <td class="tx-medium">{{ $request->technician->user->fullName->name ?? '' }}</td>
                      <td class="tx-medium text-center">
                        @if(!empty($request->serviceRequestDetail->discount_service_fee))
                            ₦{{ number_format($request->serviceRequestDetail->discount_service_fee) }}
                            <br>
                            <small style="font-size: 10px;" class="text-success">Discount</small>
                        @else
                            ₦{{ number_format($request->serviceRequestDetail->initial_service_fee) }}
                        @endif
                      </td>
                      @if($request->client_project_status == 'Pending')
                          <td class="text-medium text-warning text-center">Pending</td>
                      @elseif($request->client_project_status == 'Ongoing')
                          <td class="text-medium text-info text-center">Ongoing</td>
                      @elseif($request->client_project_status == 'Completed')
                          <td class="text-medium text-success text-center">Completed</td>
                      @elseif($request->client_project_status == 'Cancelled')
                          <td class="text-medium text-danger text-center">Cancelled</td>
                      @endif
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
                    @endforeach
                    <tr>
                      <td class="text-center" colspan="4">Total</td>
                      <td class="text-center tx-medium">₦{{ number_format($totalFee) }}</td>
                      <td></td>
                      <td></td>
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
                <table class="table table-hover mg-b-0" id="paymentExample">
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
                <input value="{{ $userId }}" type="hidden" id="user_id">
                <input value="{{ route("admin.activity_log_sorting_client") }}" type="hidden" id="route">
               
                  <div class="col-md-3">
                    <div class="form-group">
                        <label>Sort Type</label>
                        <select class="custom-select" id="activity_log_type">
                            <option selected value="None">Select...</option>
                              <option value="Errors">Errors</option>
                              <option value="Login">Login</option>
                              <option value="Logout">Logout</option>
                              <option value="Others">Others</option>
                              <option value="Payments">Payments</option>
                              <option value="Profile">Profile</option>
                              <option value="Requests">Requests</option>
                              <option value="Unauthorized">Unauthorized</option>
                        </select>
                    </div>
                  </div><!--end col-->
    
    
                  <div class="col-md-3">
                      <div class="form-group">
                          <label>Sort Date</label>
                          <select class="custom-select" id="sort_by_range">
                              <option value="None">Select...</option>
                              <option value="Date">Date</option>
                              <option value="Month">Month</option>
                              <option value="Year">Year</option>
                              <option value="Date Range">Date Range</option>
                          </select>
                      </div>
                  </div><!--end col-->
      
                  <div class="col-md-3 specific-date d-none">
                      <div class="form-group position-relative">
                          <label>Specify Date <span class="text-danger">*</span></label>
                          <input name="name" id="specific_date" type="date" class="form-control pl-5">
                      </div>
                  </div>
      
                  <div class="col-md-3 sort-by-year d-none">
                      <div class="form-group position-relative">
                          <label>Specify Year <span class="text-danger">*</span></label>
                          <select class="form-control custom-select" id="sort_by_year">
                              <option value="">Select...</option>
                              @foreach ($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
      
                  <div class="col-md-3 sort-by-year d-none" id="sort-by-month">
                      <div class="form-group position-relative">
                          <label>Specify Month <span class="text-danger">*</span></label>
                          <select class="form-control custom-select" id="sort_by_month">
                              <option value="">Select...</option>
                              <option value="January">January</option>
                              <option value="February">February</option>
                              <option value="March">March</option>
                              <option value="April">April</option>
                              <option value="May">May</option>
                              <option value="June">June</option>
                              <option value="July">July</option>
                              <option value="August">August</option>
                              <option value="September">September</option>
                              <option value="October">October</option>
                              <option value="November">November</option>
                              <option value="December">December</option>
                          </select>
                      </div>
                  </div>
      
                  <div class="col-md-3 date-range d-none">
                      <div class="form-group position-relative">
                          <label>From <span class="text-danger">*</span></label>
                          <input name="name" id="date_from" type="date" class="form-control pl-5">
                      </div>
                  </div>
      
                  <div class="col-md-3 date-range d-none">
                      <div class="form-group position-relative">
                          <label>To <span class="text-danger">*</span></label>
                          <input name="name" id="date_to" type="date" class="form-control pl-5">
                      </div>
                  </div>
                </div>
    
                <div id="sort_table">
                  @include('admin.users.client._activity_log_table')
                </div>
              </div><!-- table-responsive -->
          {{-- </div> --}}
        </div><!-- tab-pane -->

      </div><!-- tab-content -->
    </div><!-- contact-content-body -->

</div>

@section('scripts')
<script src="{{ asset('assets/dashboard/assets/js/client-activity-log-sorting.js') }}"></script>
@endsection

@endsection