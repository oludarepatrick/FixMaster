@extends('layouts.dashboard')
@section('title', 'Ongoing Request Details')
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
            <li class="breadcrumb-item"><a href="{{ route('cse.requests_ongoing') }}">Ongoing Requests</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ongoing Request Details</li>
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
                  <a class="nav-link active" id="update-tab3" data-toggle="tab" href="#update3" role="tab" aria-controls="update" aria-selected="true">Update Actions</a>
                </li><li class="nav-item">
                  <a class="nav-link" id="description-tab3" data-toggle="tab" href="#description3" role="tab" aria-controls="description" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="media-tab3" data-toggle="tab" href="#media3" role="tab" aria-controls="media" aria-selected="false">Job History</a>
                </li>
                
              </ul>
              <div class="tab-content bd bd-gray-300 bd-t-0 pd-20" id="myTabContent3">
                <div class="tab-pane fade show active" id="update3" role="tabpanel" aria-labelledby="update-tab3">
                  <h6>UPDATE ACTION</h6>

                  <div class="form-row mt-4">
                    <div class="tx-13 mg-b-25">
                      <div id="wizard3">
                        <h3>Project Progress</h3>
                        <section>
                          <p class="mg-b-0">Specify the current progress of the job.</p>
                          <div class="form-row mt-4">
                            <div class="form-group col-md-8">
                              {{-- <label for="inputEmail4">Status Options</label/> --}}
                              <select class="form-control custom-select" id="Sortbylist-Shop">
                                <option>Select...</option>
                                <option>On route to Client's house</option>
                                <option>Perfoming diagnosis</option>
                                <option>Awaiting equipments/tools from Supplier</option>
                                <option>Perfoming repairs</option>
                                <option>Job completed</option>
                            </select>
                            </div>
                          </div>
                        </section>
          
                        <h3>Price Tagging</h3>
                        <section>
                          <p class="mg-b-0">Allocate prices received from the Supplier to generate a Pro forma invoice</p>
                          <small class="text-danger">This portion will display only if the CSE initially executed a RFQ</small>
                          
                          <div class="mt-4 form-row">
                            <div class="form-group col-md-4">
                              <label for="inputPassword4">Supplier's Name</label>
                              <input type="text" class="form-control" id="inputPassword4">
                            </div>
      
                            <div class="form-group col-md-4">
                              <label for="inputEmail4">Delivery Fee</label>
                              <input type="tel" class="form-control amount" id="inputEmail4" >
                            </div>
              
                            <div class="form-group col-md-4">
                              <label for="inputPassword4">Delivery Time</label>
                              <input type="datetime-local" class="form-control" id="inputPassword4">
                            </div>
                          </div>
      
                          <div class="form-row">
                              <div class="form-group col-md-4">
                                <label for="inputEmail4">Component Name</label>
                                <input type="text" class="form-control" id="inputEmail4" value="Plug" readonly>
                              </div>
                
                              <div class="form-group col-md-3">
                                <label for="inputPassword4">Model Number</label>
                                <input type="text" class="form-control" id="inputPassword4" value="PL-2342" readonly>
                              </div>
                              <div class="form-group col-md-2">
                                <label for="inputPassword4">Quantity</label>
                                <input type="number" class="form-control" id="inputPassword4" value="2" placeholder="">
                              </div>
                              <div class="form-group col-md-3">
                                <label for="inputPassword4">Amount</label>
                                <input type="tel" class="form-control amount" id="inputPassword4" placeholder="">
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-4">
                                <label for="inputEmail4">Component Name</label>
                                <input type="text" class="form-control" id="inputEmail4" value="Carburetor" readonly>
                              </div>
                
                              <div class="form-group col-md-3">
                                <label for="inputPassword4">Model Number</label>
                                <input type="text" class="form-control" id="inputPassword4" value="TX-2342" readonly>
                              </div>
                              <div class="form-group col-md-2">
                                <label for="inputPassword4">Quantity</label>
                                <input type="number" class="form-control" id="inputPassword4" value="1" placeholder="">
                              </div>
                              <div class="form-group col-md-3">
                                <label for="inputPassword4">Amount</label>
                                <input type="tel" class="form-control amount" id="inputPassword4" placeholder="">
                              </div>
                          </div>

                        </section>

                        <h3>RFQ Acceptance</h3>
                        <section>
                          <small class="text-danger">This portion will display only if the CSE initially executed a RFQ, the Client paid for the components and the Supplier has made the delivery.</small>

                          <div class="form-row">
                            <div class="form-group col-md-8">
                              <label for="inputEmail4">Select Option</label>
                              <select class="form-control custom-select" id="Sortbylist-Shop">
                                <option>Select...</option>
                                <option>Yes, all ordered components were delivered</option>
                                <option>No, all ordered components were not delivered</option>
                            </select>
                            </div>
                          </div>

                        </section>

                        <h3>New RFQ</h3>
                        <section>
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
                                  <input type="radio" class="custom-control-input" id="rfqNo" name="intiate_rfq" checked>
                                  <label class="custom-control-label" for="rfqNo">No</label><br>
                                  </div>
                              </div>
                          </div>
          
                          <div class="d-none d-rfq">
                              <h4 id="section1" class="mt-4 mb-2">Make Request</h4>
                              <div class="form-row">
                                  <div class="form-group col-md-4">
                                    <label for="inputEmail4">Component Name</label>
                                    <input type="text" class="form-control" id="inputEmail4">
                                  </div>
                    
                                  <div class="form-group col-md-3">
                                    <label for="inputPassword4">Model Number</label>
                                    <input type="text" class="form-control" id="inputPassword4" placeholder="">
                                  </div>
          
                                  <div class="form-group col-md-2">
                                    <label for="inputPassword4">Quantity</label>
                                    <input type="number" class="form-control" id="inputPassword4" placeholder="">
                                  </div>
          
                                  <div class="form-group col-md-1 mt-1">
                                      <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5 mt-4 add-rfq" type="button"><i class="fas fa-plus" class="wd-10 mg-r-5" ></i></button>
                                  </div>
                              </div>
          
                              <span class="add-rfq-row"></span>
          
                          </div>
                        </section>
          
                        <h3>New Tools Request</h3>
                        <section>
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
                                      <input type="radio" class="custom-control-input" id="trfNo" checked name="intiate_trf">
                                      <label class="custom-control-label" for="trfNo">No</label><br>
                                      </div>
                                  </div>
                              </div>
          
                              <div class="d-none d-trf">
                                  
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
                                      <div class="form-group col-md-2 mt-1">
                                          <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5 mt-4 add-trf" type="button"><i class="fas fa-plus" class="wd-10 mg-r-5" ></i></button>
                                      </div>
                                  </div>
          
                                  <span class="add-trf-row"></span>
          
                              </div>
                        </section>
                      </div>
                    </div>
                  </div><!-- df-example -->
                </div>

                <div class="tab-pane fade" id="description3" role="tabpanel" aria-labelledby="description-tab3">
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
                            <td class="tx-medium">Service Charge</td>
                            <td class="tx-color-03">₦14,000 (Urgent Fee)</td>
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

                <div class="tab-pane fade" id="media3" role="tabpanel" aria-labelledby="media-tab3">
                  <h6>JOB HISTORY</h6>

                  <small class="text-danger">This tab displays the RFQ's and Tools requested by the CSE. Other items can be included as defined by FixMaster</small>
                  
                </div>

              </div>
          </div>
        </div>
      </div>
    </div>
</div>

@section('scripts')
<script>
  $(function(){
    'use strict'

    $('#wizard3').steps({
      headerTag: 'h3',
      bodyTag: 'section',
      autoFocus: true,
      titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
      labels: {
          // current: "current step:",
          // pagination: "Pagination",
          finish: "Update Job Progress",
          // next: "Next",
          // previous: "Previous",
          loading: "Loading ..."
      },
      stepsOrientation: 1
    });

    let count = 1;

    //Add and Remove Request for 
    $(document).on('click', '.add-rfq', function(){
        count++;
        addRFQ(count);
    });

    $(document).on('click', '.remove-rfq', function(){
        count--;
        $(this).closest(".remove-rfq-row").remove();
        // $(this).closest('tr').remove();
    });

    //Add and Remove Tools request form
    $(document).on('click', '.add-trf', function(){
        count++;
        addTRF(count);
    });

    $(document).on('click', '.remove-trf', function(){
        count--;
        $(this).closest(".remove-trf-row").remove();
    });

    //Hide and Unhide Work Experience form
    $('#work_experience_yes').change(function () {
        if ($(this).prop('checked')) {
            $('.previous-employment').removeClass('d-none');    
        }
    });

    $('#work_experience_no').change(function () {
        if ($(this).prop('checked')) {
            $('.previous-employment').addClass('d-none');    
        }
    });

    //Hide and Unhide RFQ
    $('#rfqYes').change(function () {
        if ($(this).prop('checked')) {
            $('.d-rfq').removeClass('d-none');    
        }
    });

    $('#rfqNo').change(function () {
        if ($(this).prop('checked')) {
            $('.d-rfq').addClass('d-none');    
        }
    });

    //Hide and Unhide TRF
    $('#trfYes').change(function () {
        if ($(this).prop('checked')) {
            $('.d-trf').removeClass('d-none');    
        }
    });

    $('#trfNo').change(function () {
        if ($(this).prop('checked')) {
            $('.d-trf').addClass('d-none');    
        }
    });

  });

  function addRFQ(count){

    let html = '<div class="form-row remove-rfq-row"><div class="form-group col-md-4"><label for="inputEmail4">Component Name</label> <input type="text" class="form-control" id="inputEmail4" /></div><div class="form-group col-md-3"><label for="inputPassword4">Model Number</label> <input type="text" class="form-control" id="inputPassword4" placeholder="" /></div><div class="form-group col-md-2"><label for="inputPassword4">Quantity</label> <input type="number" class="form-control" id="inputPassword4" placeholder="" /></div><div class="form-group col-md-2 mt-1"> <button class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5 mt-4 remove-rfq" type="button"><i class="fas fa-times" class="wd-10 mg-r-5"></i></button></div></div>';

    $('.add-rfq-row').append(html);

  }

  function addTRF(count){

    let html = '<div class="form-row remove-trf-row"><div class="form-group col-md-4"> <label for="inputEmail4">Equipment/Tools Name</label> <input type="text" class="form-control" id="inputEmail4"></div><div class="form-group col-md-2"> <label for="inputPassword4">Quantity</label> <input type="tel" class="form-control quantity-2" maxlength="2" id="inputPassword4" placeholder=""></div><div class="form-group col-md-2 mt-1"> <button class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5 mt-4 remove-trf" type="button"><i class="fas fa-times" class="wd-10 mg-r-5"></i> </button></div></div>';

    $('.add-trf-row').append(html);

  }
</script>
@endsection
@endsection