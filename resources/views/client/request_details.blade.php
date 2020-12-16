@extends('layouts.client')
@section('title', 'Request Details')
@section('content')

<div class="col-lg-8 col-12">
    <div class="ml-lg-4">

        <h5 class="mt-4">Service Request: {{ $requestDetail->job_reference }}  </h5>
        <div class="border-bottom pb-4 row">
            <div class="col-md-6">
                <div class="media key-feature align-items-center p-3 rounded shadow mt-4">
                    <img src="{{ asset('assets/images/job/Eslint.svg') }}" class="avatar avatar-ex-sm" alt="">
                    <div class="media-body content ml-3">
                        <h4 class="title mb-0">Service</h4>
                        <p class="text-muted mb-0">{{ $requestDetail->service->name }} </p>
                    </div>
                </div>
    
            </div>
    
            <div class="col-md-6">
                <div class="media key-feature align-items-center p-3 rounded shadow mt-4">
                    <img src="{{ asset('assets/images/job/Gradle.svg') }}" class="avatar avatar-ex-sm" alt="">
                    <div class="media-body content ml-3">
                        <h4 class="title mb-0">Category</h4>
                        <p class="text-muted mb-0">{{ $requestDetail->category->name }}</p>
                    </div>
                </div>
            </div>
        </div> 


        @if(!empty($requestDetail->cse_id))
            <h5 class="mt-4">CSE Assigned</h5>
            <div class="col-lg-12 col-12 mt-4">
                <div class="card rounded bg-light overflow-hidden border-0 m-2">
                    <div class="row align-items-center no-gutters">
                        <div class="col-md-5">
                            {{-- <img src="{{ asset('assets/images/default-male-avatar.png') }}" class="img-fluid" alt=""> --}}
                            @if(!empty($requestDetail->cse->avatar) && file_exists(public_path().'/assets/cse-technician-images/'.$requestDetail->cse->avatar))
                                <img src="{{ asset('assets/cse-technician-images/'.$requestDetail->cse->avatar) }}" class="img-fluid" alt="" />
                            @else
                                @if($requestDetail->cse->gender == 'Male')
                                    <img src="{{ asset('assets/images/default-male-avatar.png') }}" alt="Default male profile avatar" class="avatar avatar-large rounded-circle shadow d-block mx-auto" />
                                @else
                                    <img src="{{ asset('assets/images/default-female-avatar.png') }}" alt="Default female profile avatar" class="avatar avatar-large rounded-circle shadow d-block mx-auto" />
                                @endif
                            @endif

                        </div><!--end col-->

                        <div class="col-md-7">
                            <div class="card-body customer-testi">
                                <h6 class="text-primary font-weight-bold">{{ $requestDetail->cse->first_name.' '.$requestDetail->cse->last_name }} <small class="text-muted d-block">CSE | FixMaster</small></h6>
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <p class="h6 mb-0">Security Code</p>
                                <p class="text-muted mb-0 font-weight-bold">{{ $requestDetail->security_code }}</p>
                                <div class="mt-4">
                                {{-- <a href="{{ route('client.technician_profile') }}" class="btn btn-sm btn-outline-primary">View Profile</a> --}}
                                <a href="#technician-modal" class="btn btn-sm btn-outline-primary popup-modal">View Profile</a>
                                <a href="#" data-toggle="modal" data-target="#message-modal" class="btn btn-sm btn-primary">Send Message </a>
                                
                                </div>
                            </div>
                            
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div>
        @endif

        <h5 class="mt-4">Location & Time</h5>
        <p style="font-size: 10px;" class="text-muted">Location and appointemnt time as specified by you.</p>
        <ul class="list-unstyled">
            <li class="text-muted"><i data-feather="map-pin" class="fea icon-sm text-primary mr-2"></i>{{ $requestDetail->serviceRequestDetail->address }}</li>
            <li class="text-muted"><i data-feather="calendar" class="fea icon-sm text-primary mr-2"></i>{{ $requestDetail->serviceRequestDetail->timestamp }}</li>
        </ul>

        <h5 class="mt-4">Service Charge (Urgent):</h5>
        <ul class="list-unstyled">
            <li class="text-muted"><i data-feather="arrow-right" class="fea icon-sm text-primary mr-2"></i>
            @if(!empty($requestDetail->serviceRequestDetail->discount_service_fee))
                ₦{{ number_format($requestDetail->serviceRequestDetail->discount_service_fee) }}
                <sup style="font-size: 10px;" class="text-success">Discount</sup>
            @else
                ₦{{ number_format($requestDetail->serviceRequestDetail->initial_service_fee) }}
            @endif
            </li>
        </ul>

        <h5 class="mt-4">Status</h5>
        <ul class="list-unstyled">
            @if($requestDetail->client_project_status == 'Pending')
                <li class="text-warning"><i data-feather="arrow-right" class="fea icon-sm text-primary mr-2"></i>Pending</li>
            @elseif($requestDetail->client_project_status == 'Ongoing')
                <li class="text-info"><i data-feather="arrow-right" class="fea icon-sm text-primary mr-2"></i>Ongoing</li>
            @elseif($requestDetail->client_project_status == 'Completed')
                <li class="text-success"><i data-feather="arrow-right" class="fea icon-sm text-primary mr-2"></i>Completed</li>
            @elseif($requestDetail->client_project_status == 'Cancelled')
                <li class="text-danger"><i data-feather="arrow-right" class="fea icon-sm text-primary mr-2"></i>Cancelled</li>
            @endif
        </ul>


        <h5 class="mt-4">Payment Method</h5>
        <ul class="list-unstyled">
            <li class="text-muted"><i data-feather="arrow-right" class="fea icon-sm text-primary mr-2"></i>Payment Method: {{ $requestDetail->serviceRequestDetail->payment_method }} </li> 
            {{-- <li class="text-muted"><i data-feather="arrow-right" class="fea icon-sm text-primary mr-2"></i>Payment Gateway: PayStack <img src="{{ asset('assets/images/payments/payment/master-card.jpg') }}" class="img-fluid avatar avatar-small mx-2 rounded-circle shadow"></li>  --}}
        </ul>
        
        <h5>Request Description</h5>
        <ul class="list-unstyled">
            <li class="text-muted"><i data-feather="arrow-right" class="fea icon-sm text-primary mr-2"></i> {{ $requestDetail->serviceRequestDetail->description }}.</li>
        </ul>
    </div>
</div><!--end col-->


@if(!empty($requestDetail->cse_id))
<div class="example gc3 mb-4">
    <div class="html-code">
      <div id="technician-modal" class="mfp-hide white-popup-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="card shadow border-0">
                            <div class="text-center py-5 border-bottom rounded-top">
                                {{-- <img src="{{ asset('assets/images/default-male-avatar.png') }}" class="avatar avatar-medium mx-auto rounded-circle shadow d-block" alt=""> --}}
                                @if(!empty($requestDetail->cse->avatar) && file_exists(public_path().'/assets/cse-technician-images/'.$requestDetail->cse->avatar))
                                <img src="{{ asset('assets/cse-technician-images/'.$requestDetail->cse->avatar) }}" class="avatar avatar-large rounded-circle shadow d-block mx-auto" alt="" />
                                @else
                                    @if($requestDetail->cse->gender == 'Male')
                                        <img src="{{ asset('assets/images/default-male-avatar.png') }}" alt="Default male profile avatar" class="avatar avatar-large rounded-circle shadow d-block mx-auto" />
                                    @else
                                        <img src="{{ asset('assets/images/default-female-avatar.png') }}" alt="Default female profile avatar" class="avatar avatar-large rounded-circle shadow d-block mx-auto" />
                                    @endif
                                @endif
                            <h5 class="mt-3 mb-0">{{ $requestDetail->cse->first_name.' '.$requestDetail->cse->last_name }}</h5>
                                <p class="text-muted mb-0">CSE | FixMaster</p>
                            </div>                               
                            <div class="card-body">
                                <h5 class="card-title">Personal Details :</h5>
                                                                    
                                <ul class="list-unstyled">
                                <li class="h6"><i data-feather="activity" class="fea icon-sm text-warning mr-2"></i><span class="text-muted">Completed Jobs :</span> {{ $requestDetail->cse->requests()->where('client_project_status', 'Completed')->count() }}</li>
                                    {{-- <li class="h6"><i data-feather="gift" class="fea icon-sm text-warning mr-2"></i><span class="text-muted">D.O.B. :</span> 11th Jun, 1986</li> --}}
                                <li class="h6"><i data-feather="map-pin" class="fea icon-sm text-warning mr-2"></i><span class="text-muted">State :</span> {{ $requestDetail->cse->state->name }}</li>
                                <li class="h6"><i data-feather="map-pin" class="fea icon-sm text-warning mr-2"></i><span class="text-muted">Town/City :</span> {{ $requestDetail->cse->town }}</li>
                                <li class="h6"><i data-feather="home" class="fea icon-sm text-warning mr-2"></i><span class="text-muted">Address :</span> {{ $requestDetail->cse->full_address }}</li>
                                
                                    {{-- <li class="h6"><i data-feather="server" class="fea icon-sm text-warning mr-2"></i><span class="text-muted">Postal Code :</span> 521452</li> --}}
                                <li class="h6"><i data-feather="phone" class="fea icon-sm text-warning mr-2"></i><span class="text-muted">Mobile :</span> {{ $requestDetail->cse->phone_number }}</li>
                                </ul>

                                {{-- <h5 class="card-title">About Me :</h5>
                                <p class="text-muted"> I'm an experienced Technician with over 3 years of experience...</p> --}}
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--enn row-->
        
                <a class="btn btn-primary btn-sm popup-modal-dismiss mt-2" href="#">Close</a></p>

            </div><!--end container-->
      </div>
    </div>
</div>
@endif
<!-- Modal Content Start -->
<div class="modal fade" id="message-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded shadow border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Send Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form class="rounded shadow p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label>Subject <span class="text-danger">*</span></label>
                                <i data-feather="alert-circle" class="fea icon-sm icons"></i>
                                <input name="name" id="name" type="text" class="form-control pl-5">
                            </div>
                        </div><!--end col-->

                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label>Address <span class="text-danger">*</span></label>
                                <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                <textarea name="message" id="message" rows="4" class="form-control pl-5" placeholder="Your message :"></textarea>
                            </div>
                        </div>
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" id="submit" name="send" class="submitBnt btn btn-primary submit-message">Submit</button>
                        </div><!--end col-->
                    </div><!--end row-->

                </form><!--end form-->
            </div>
            
        </div>
    </div>
</div>
<!-- Modal Content End -->

@section('scripts')

<script>
    $(document).ready(function() {

        $(document).on('click', '.submit-message', function(){
            const Toast = swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 8000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
            Toast.fire({
                    icon: 'success',
                    type: 'success',
                    title: 'Message has been sent'
                })
            });

    });
   
</script>
@endsection

@endsection