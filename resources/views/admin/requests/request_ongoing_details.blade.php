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
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.requests_ongoing') }}">Ongoing Requests</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ongoing Request Details</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Job: {{ $requestDetail->job_reference }}</h4><hr>
          <div class="media align-items-center">
            <span class="tx-color-03 d-none d-sm-block">
              {{-- <i data-feather="credit-card" class="wd-60 ht-60"></i> --}}
              <img src="{{ asset('assets/images/default-male-avatar.png') }}" class="avatar rounded-circle" alt="Male Avatar">
            </span>
            <div class="media-body mg-sm-l-20">
              <h4 class="tx-18 tx-sm-20 mg-b-2">{{ $requestDetail->user->fullName->name }}</h4>
              <p class="tx-13 tx-color-03 mg-b-0">{{ $requestDetail->serviceRequestDetail->phone_number }}</p>
            </div>
          </div><!-- media -->
        </div>
      </div>

      <div class="row row-xs">
        <div class="col-lg-12 col-xl-12">
          <div class="card">
            <ul class="nav nav-tabs nav-justified" id="myTab3" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="media-tab3" data-toggle="tab" href="#media3" role="tab" aria-controls="media" aria-selected="false">Job Progress</a>
              </li>
                <li class="nav-item">
                  <a class="nav-link " id="update-tab3" data-toggle="tab" href="#update3" role="tab" aria-controls="update" aria-selected="true">Update Actions</a>
                </li><li class="nav-item">
                  <a class="nav-link" id="description-tab3" data-toggle="tab" href="#description3" role="tab" aria-controls="description" aria-selected="true">Description</a>
                </li>
                
                
              </ul>
              <div class="tab-content bd bd-gray-300 bd-t-0 pd-20" id="myTabContent3">

                <div class="tab-pane fade show active" id="media3" role="tabpanel" aria-labelledby="media-tab3">
                  <h6>JOB Progress</h6>

                  <div class="table-responsive">
                    <table class="table table-hover mg-b-0">
                      <thead class="">
                        <tr>
                          <th class="text-center">#</th>
                          <th>Author</th>
                          <th>Status</th>
                          <th class="text-center">Timestamp</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($serviceRequestProgreses as $progress)
                          <tr>
                            <td class="tx-color-03 tx-center">{{ ++$i }}</td>
                            <td class="tx-medium">{{ $progress->user->fullName->name }}</td>
                            <td class="tx-medium text-success">{{ $progress->serviceRequestStatus->name }}</td>
                            <td class="text-center">{{ Carbon\Carbon::parse($progress->created_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }}</td>
                          </tr>
                        @endforeach
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
                  
                </div>

                <div class="tab-pane fade" id="update3" role="tabpanel" aria-labelledby="update-tab3">
                  <h6>UPDATE ACTION</h6>
                  {{-- {{ dd($requestDetail->rfq()->count()) }} --}}
                  <form method="POST" action="{{ route('admin.request_ongoing_update') }}">
                    @csrf
                    <input type="hidden" value="{{ $requestDetail->user_id }}" name="client_id" required>
                    <input type="hidden" value="{{ $requestDetail->id }}" name="service_request_id" required>
                    
                    <div class="form-row mt-4">
                      <div class="tx-13 mg-b-25">
                        <div id="wizard3">
                          <h3>Project Progress</h3>
                          <section>
                            <p class="mg-b-0">Specify the current progress of the job.</p>
                            <div class="form-row mt-4">
                              <div class="form-group col-md-8">
                                {{-- <label for="inputEmail4">Status Options</label/> --}}
                                <select class="form-control custom-select @error('service_request_status_id') is-invalid @enderror" name="service_request_status_id">
                                    <option value="" selected>Select...</option>
                                    @foreach($serviceRequestStatuses as $status)
                                      <option value="{{ $status->id }}" {{ old('service_request_status_id') == $status->id ? 'selected' : ''}}>{{ $status->name }}</option>
                                    @endforeach
                                </select>
                              @error('service_request_status_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                              </div>
                            </div>
                          </section>
                          {{-- {{ dd($requestDetail->rfq->rfqBatches) }} --}}
                          {{-- This portion will display only if the CSE initially executed a RFQ --}}
                          @if($requestDetail->rfq()->where('status', '0')->count() > 0)

                          <h3>Price Tagging</h3>
                          <section>
                            <p class="mg-b-0">Allocate prices received from the Supplier to generate a Pro forma invoice</p>
                            <small class="text-danger">This portion will display only if the CSE initially executed a RFQ</small>
                            
                            <div class="mt-4 form-row">
                              <div class="form-group col-md-4">
                                <label for="name">Supplier's Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" name="name">
                                @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
        
                              <div class="form-group col-md-4">
                                <label for="devlivery_fee">Delivery Fee</label>
                                <input type="tel" class="form-control amount @error('devlivery_fee') is-invalid @enderror" id="devlivery_fee" name="devlivery_fee" value="{{ old('devlivery_fee') }}">
                                @error('devlivery_fee')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                
                              <div class="form-group col-md-4">
                                <label for="delivery_time">Delivery Time</label>
                                <input type="datetime-local" class="form-control @error('delivery_time') is-invalid @enderror" name="delivery_time" id="delivery_time" value="{{ old('delivery_time') }}">
                                @error('delivery_time')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                            </div>
                            @foreach($requestDetail->rfq->rfqBatches as $batch)
                            <input type="hidden" value="{{ $batch->rfq_id }}" name="rfq_id" required>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                  <label for="component_name">Component Name</label>
                                  <input type="text" class="form-control" id="component_name" name="component_name" value="{{ old('component_name') ?? $batch->component_name }}" readonly>
                                </div>
                  
                                <div class="form-group col-md-3">
                                  <label for="model_number">Model Number</label>
                                  <input type="text" class="form-control" id="model_number" name="model_number" value="{{ old('model_number') ?? $batch->model_number }}" readonly>
                                </div>
                                <div class="form-group col-md-2">
                                  <label for="quantity">Quantity</label>
                                  <input type="number" class="form-control" id="quantity" name="quantity[]" value="{{ old('quantity') ?? $batch->quantity }}" min="{{ $batch->quantity }}" max="{{ $batch->quantity }}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                  <label for="amount">Amount</label>
                                  <input type="tel" class="form-control amount" id="amount" placeholder="" value="{{ old('amount') }}" name="amount[]" autocomplete="off">
                                </div>
                            </div>
                            @endforeach
                          </section>
                          @endif

                          {{-- This portion will display only if the CSE initially executed a RFQ, the Client paid for the components and the Supplier has made the delivery. --}}
                          @if($requestDetail->rfq()->where('status', '2')->count() > 0)
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
                          @endif
                          <h3>New RFQ</h3>
                          <section>
                            <p class="mg-b-0">A request for quotation is a business process in which a company or public entity requests a quote from a supplier for the purchase of specific products or services.</p>
                            <h4 id="section1" class="mt-4 mb-2">Initiate RFQ?</h4>
            
                            <div class="form-row mt-4">
                                <div class="form-group col-md-4">
                                    <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="rfqYes" name="intiate_rfq" value="yes">
                                    <label class="custom-control-label" for="rfqYes">Yes</label><br>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 d-flex align-items-end">
                                    <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="rfqNo" name="intiate_rfq" value="no">
                                    <label class="custom-control-label" for="rfqNo">No</label><br>
                                    </div>
                                </div>
                            </div>
            
                            <div class="d-none d-rfq">
                                <h4 id="section1" class="mt-4 mb-2">Make Request</h4>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                      <label for="component_name">Component Name</label>
                                      <input type="text" class="form-control @error('component_name') is-invalid @enderror" id="component_name" name="component_name[]" value="{{ old('component_name') }}">
                                      @error('component_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                    </div>
                      
                                    <div class="form-group col-md-3">
                                      <label for="model_number">Model Number</label>
                                      <input type="text" class="form-control @error('model_number') is-invalid @enderror" id="model_number" name="model_number[]" placeholder="" value="{{ old('model_number') }}">
                                      @error('model_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                    </div>
            
                                    <div class="form-group col-md-2">
                                      <label for="quantity">Quantity</label>
                                      <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity[]" min="1" pattern="\d*" maxlength="2" value="{{ old('quantity') }}">
                                      @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
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
                                <div class="form-row mt-4 ">
                                    <div class="form-group col-md-4">
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="trfYes" name="intiate_trf" value="yes">
                                        <label class="custom-control-label" for="trfYes">Yes</label><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 d-flex align-items-end">
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="trfNo" name="intiate_trf" value="no">
                                        <label class="custom-control-label" for="trfNo">No</label><br>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="d-none d-trf">
                                    
                                    <h4 id="section1" class="mt-4 mb-2">Make Request</h4>
                                    <div class="form-row tool-request">
                                        <div class="form-group col-md-4">
                                          <label for="tool_id">Equipment/Tools Name</label>
                                          <select class="form-control custom-select @error('tool_id') is-invalid @enderror tool_id" id="tool_id" name="tool_id[]" >
                                              <option value="" selected>Select...</option>
                                              @foreach($tools as $tool)
                                                <option value="{{ $tool->id }}" {{ old('tool_id') == $tool->id ? 'selected' : ''}} data-id="tool_quantity">{{ $tool->name }}</option>
                                              @endforeach
                                          </select>
                                          @error('tool_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror
                                        </div>
                          
                                        <div class="form-group quantity-section col-md-2">
                                          <label for="tool_quantity">Quantity</label>
                                          <input type="number" class="form-control @error('tool_quantity') is-invalid @enderror tool_quantity" name="tool_quantity[]" id="tool_quantity" min="1" pattern="\d*" maxlength="2" value="{{ old('tool_quantity') }}">
                                          @error('tool_quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                          @enderror
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

                    <button type="submit" class="btn btn-primary d-none" id="update-progress">Update Progress</button>

                  </form>
                </div>

                <div class="tab-pane fade" id="description3" role="tabpanel" aria-labelledby="description-tab3">
                  <h6>JOB DESCRIPTION</h6>
                  
                  <div class="row row-xs mt-4">
                    <div class="col-lg-12 col-xl-12">
                      <table class="table table-striped table-sm mg-b-0">
                        <tbody>
                          <tr>
                            <td class="tx-medium">Job Reference</td>
                            <td class="tx-color-03">{{ $requestDetail->job_reference }}</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Service Required</td>
                            <td class="tx-color-03">{{ $requestDetail->service->name }} ({{ $requestDetail->category->name }})</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Scheduled Date & Time</td>
                            <td class="tx-color-03">{{ $requestDetail->serviceRequestDetail->timestamp }}</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Initial Service Charge</td>
                            <td class="tx-color-03">
                              @if(!empty($requestDetail->serviceRequestDetail->discount_service_fee))
                                  ₦{{ number_format($requestDetail->serviceRequestDetail->discount_service_fee) }}
                                  <sup style="font-size: 10px;" class="text-success">Discount</sup>
                              @else
                                  ₦{{ number_format($requestDetail->serviceRequestDetail->initial_service_fee) }}
                              @endif 
                              ({{ $requestDetail->serviceRequestDetail->service_fee_name }})
                            </td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Current Service Charge</td>
                            <td class="tx-color-03">
                              @if(!empty($requestDetail->total_amount))
                                  ₦{{ number_format($requestDetail->total_amount) }}
                              @else
                                  ₦0
                              @endif 
                            </td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Security Code</td>
                            <td class="tx-color-03">{{ $requestDetail->security_code }}</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Supervised By</td>
                            <td class="tx-color-03">@if(!empty($requestDetail->admin)) {{ $requestDetail->admin->first_name.' '.$requestDetail->admin->last_name }} @endif</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">CSE Assigned</td>
                            <td class="tx-color-03">@if(!empty($requestDetail->cse)) {{ $requestDetail->cse->first_name.' '.$requestDetail->cse->last_name }} @endif</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Technician Assigned</td>
                            <td class="tx-color-03">@if(!empty($requestDetail->technician)) {{ $requestDetail->technician->first_name.' '.$requestDetail->technician->last_name }} @endif</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Payment Status</td>
                            <td class="tx-color-03">Paid</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">L.G.A</td>
                            <td class="tx-color-03">{{ $requestDetail->user->client->lga->name }}</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Town/City</td>
                            <td class="tx-color-03">{{ $requestDetail->user->client->town }}</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Request Address</td>
                            <td class="tx-color-03">{{ $requestDetail->serviceRequestDetail->address }}</td>
                          </tr>
                          <tr>
                            <td class="tx-medium">Request Description</td>
                            <td class="tx-color-03">{{ $requestDetail->serviceRequestDetail->description }}</td>
                          </tr>
                        </tbody>
                      </table>

                      @if(!empty($requestDetail->serviceRequestDetail->media_file))
                      <div class="divider-text">Media Files</div>
                        <div class="row">
                          <div class="pd-20 pd-lg-25 pd-xl-30">
                
                            <div class="row row-xs">
                              <div class="col-6 col-sm-6 col-md-6 col-xl mg-t-10 mg-sm-t-0">
                                <div class="card card-file">
                                  {{-- {{ dd(pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION)) }} --}}
                                  

                                  @if(pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'jpg' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'png' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'svg' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'gif' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'jpeg')
                                    @if(!empty($requestDetail->serviceRequestDetail->media_file) && file_exists(public_path().'/assets/service-request-files/'.$requestDetail->serviceRequestDetail->media_file))
                                      <img src="{{ asset('assets/service-request-files/'.$requestDetail->serviceRequestDetail->media_file ) }}" class="img-fit-cover" alt="Responsive image">
                                    @else
                                      <img src="{{ asset('assets/images/no-image-available.png') }}" class="img-fit-cover" alt="Responsive image">
                                    @endif
                                  @elseif(pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'doc' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'docx' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'pdf' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'txt' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'xls' || pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'csv')
                                    <div class="dropdown-file">
                                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                                      <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ $requestDetail->serviceRequestDetail->media_file }}" download class="dropdown-item download"><i data-feather="download"></i>Download</a>
                                      </div>
                                    </div><!-- dropdown -->
                                    <div class="card-file-thumb tx-indigo">
                                      <i class="far fa-file-word"></i>
                                    </div>
                                    <div class="card-body">
                                    <h6><a href="{{ $requestDetail->serviceRequestDetail->media_file }}" download class="link-02">{{ $requestDetail->serviceRequestDetail->media_file }}</a></h6>
                                    </div> 

                                  @elseif(pathInfo($requestDetail->serviceRequestDetail->media_file, PATHINFO_EXTENSION) == 'mp4')
                                    @if(!empty($requestDetail->serviceRequestDetail->media_file) && file_exists(public_path().'/assets/service-request-files/'.$requestDetail->serviceRequestDetail->media_file))
                                      <video controls width="320" height="240" class="img-fit-cover">
                                        <source src="{{ asset('assets/service-request-files/'.$requestDetail->serviceRequestDetail->media_file ) }}" type="video/mp4">
                                      </video>
                                    @endif
                                  @endif
                                </div>
                              </div><!-- col -->
                              
                            </div><!-- row -->
                            
                          </div>
                        </div>
                      @endif
                    </div><!-- df-example -->
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>

@push('scripts')
<script>
  $(function(){
    'use strict'

    $('#wizard3').steps({
      headerTag: 'h3',
      bodyTag: 'section',
      autoFocus: true,
      titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
      loadingTemplate: '<span class="spinner"></span> #text#',
      labels: {
          // current: "current step:",
          // pagination: "Pagination",
          finish: "Update Job Progress",
          // next: "Next",
          // previous: "Previous",
          loading: "Loading ..."
      },
      stepsOrientation: 1,
      // transitionEffect: "fade",
      // transitionEffectSpeed: 200,
      showFinishButtonAlways: false,
      onFinished: function (event, currentIndex) {
        $('#update-progress').trigger('click');
      },
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

    let html = '<div class="form-row remove-rfq-row"><div class="form-group col-md-4"> <label for="component_name">Component Name</label> <input type="text" class="form-control @error('component_name') is-invalid @enderror" id="component_name" name="component_name[]" value="{{ old('component_name') }}"> @error('component_name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror</div><div class="form-group col-md-3"> <label for="model_number">Model Number</label> <input type="text" class="form-control @error('model_number') is-invalid @enderror" id="model_number" name="model_number[]" placeholder="" value="{{ old('model_number') }}"> @error('model_number') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror</div><div class="form-group col-md-2"> <label for="quantity">Quantity</label> <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity[]" placeholder="" value="{{ old('quantity') }}"> @error('quantity') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror</div><div class="form-group col-md-2 mt-1"> <button class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5 mt-4 remove-rfq" type="button"><i class="fas fa-times" class="wd-10 mg-r-5"></i></button></div></div>';

    $('.add-rfq-row').append(html);

  }

  function addTRF(count){

    let html = '<div class="tool-request form-row remove-trf-row"><div class="form-group col-md-4"> <label for="tool_id">Equipment/Tools Name</label> <select class="form-control custom-select @error('tool_id') is-invalid @enderror tool_id" id="tool_id" name="tool_id[]" ><option value="" selected>Select...</option> @foreach($tools as $tool)<option value="{{ $tool->id }}" {{ old('tool_id') == $tool->id ? 'selected' : ''}} data-id="tool_quantity'+count+'">{{ $tool->name }}</option> @endforeach </select> @error('tool_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror</div><div class="form-group quantity-section col-md-2"> <label for="tool_quantity">Quantity</label> <input type="number" class="form-control @error('tool_quantity') is-invalid @enderror tool_quantity" name="tool_quantity[]" id="tool_quantity'+count+'" min="1" pattern="\d*" maxlength="2" value="{{ old('tool_quantity') }}"> @error('tool_quantity') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror</div><div class="form-group col-md-2 mt-1"> <button class="btn btn-sm pd-x-15 btn-danger btn-uppercase mg-l-5 mt-4 remove-trf" type="button"><i class="fas fa-times" class="wd-10 mg-r-5"></i> </button></div></div>';

    $('.add-trf-row').append(html);

  }

  //Get available quantity of a particular tool.
  $(document).on('change', '.tool_id', function () {
      let toolId = $(this).find('option:selected').val();
      let toolName = $(this).children('option:selected').text();
      let quantityName = $(this).children('option:selected').data('id'); 
      
      $.ajax({
          url: "{{ route('available_quantity') }}",
          method: "POST",
          dataType: "JSON",
          data: {"_token": "{{ csrf_token() }}", "tool_id":toolId},
          success: function(data){
              if(data){
                
                  $('#'+quantityName+'').attr({
                    "value": data,
                    "max": data,
                  });
                 
              }else{
                  var message = 'Error occured while trying to get '+ toolName +' available quantity';
                  var type = 'error';
                  displayMessage(message, type);
              }
          },
      })  
  });

</script>
@endpush
@endsection