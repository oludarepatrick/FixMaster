@extends('layouts.client')
@section('title', 'Requests')
@section('content')
<div class="col-lg-8 col-12">
    <h5 class="mb-0 mt-4">Service Request Overview</h5>
    <div class="table-responsive mt-4 bg-white rounded shadow">
        <div class="row mt-1 mb-1 ml-1 mr-1">
                <div class="col-md-4">
                    <div class="form-group position-relative">
                        <label>Sort Table</label>
                        <select class="form-control custom-select" id="request-sorting">
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
                        <i data-feather="calendar" class="fea icon-sm icons"></i>
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
                        <i data-feather="calendar" class="fea icon-sm icons"></i>
                        <input name="name" id="name" type="date" class="form-control pl-5">
                    </div>
                </div>

                <div class="col-md-4 date-range d-none">
                    <div class="form-group position-relative">
                        <label>To <span class="text-danger">*</span></label>
                        <i data-feather="calendar" class="fea icon-sm icons"></i>
                        <input name="name" id="name" type="date" class="form-control pl-5">
                    </div>
                </div>
        </div>

        <table class="table table-center table-padding mb-0" id="basicExample">
            <thead>
                <tr>
                    <th class="py-3">#</th>
                    <th class="py-3">Service Ref.</th>
                    <th class="py-3">CSE</th>
                    <th class="py-3">Scheduled Date</th>
                    <th class="py-3">Amount</th>
                    <th class="py-3">Fee Type</th>
                    <th class="py-3">Status</th>
                    <th class="py-3">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($userServiceRequests as $userServiceRequest)
                {{-- {{ dd($userServiceRequest->serviceRequestDetail->timestamp) }} --}}
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td>{{ $userServiceRequest->job_reference }}</td>
                        <td>{{ $createdBy->find($userServiceRequest->cse_id)->name ?? 'Not Assigned' }}</td>
                        <td>{{ $userServiceRequest->serviceRequestDetail->timestamp ?? '' }}</td>
                        <td class="font-weight-bold text-center">
                            @if(!empty($userServiceRequest->serviceRequestDetail->discount_service_fee))
                                ₦{{ number_format($userServiceRequest->serviceRequestDetail->discount_service_fee) }}
                                <sup style="font-size: 10px;" class="text-success">Discount</sup>
                            @else
                                ₦{{ number_format($userServiceRequest->serviceRequestDetail->initial_service_fee) }}
                            @endif
                        </td>
                        @if($userServiceRequest->client_project_status == 'Pending')
                            <td class="text-warning">Pending</td>
                        @elseif($userServiceRequest->client_project_status == 'Ongoing')
                            <td class="text-info">Ongoing</td>
                        @elseif($userServiceRequest->client_project_status == 'Completed')
                            <td class="text-success">Completed</td>
                        @elseif($userServiceRequest->client_project_status == 'Cancelled')
                            <td class="text-danger">Cancelled</td>
                        @endif
                        <td>{{ $userServiceRequest->serviceRequestDetail->service_fee_name }}</td>
                        <td>
                            
                            <div class="btn-group dropdown-primary mr-2 mt-2">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('client.request_details', $userServiceRequest->id) }}" class="dropdown-item text-primary"><i data-feather="clipboard" class="fea icon-sm"></i> View Details</a>
                                    @if($userServiceRequest->client_project_status == 'Pending')
                                        <a href="#" class="dropdown-item text-info"><i data-feather="edit" class="fea icon-sm"></i> Edit Request</a>
                                    @endif
                                    <a href="{{ route('client.request_invoice') }}" class="dropdown-item text-success"><i data-feather="file-text" class="fea icon-sm"></i> View Invoice</a>
                                    @if($userServiceRequest->client_project_status != 'Completed')
                                        <div class="dropdown-divider"></div>
                                        @if($userServiceRequest->client_project_status != 'Cancelled')
                                            <a href="javascript:void(0)" class="dropdown-item text-danger cancel_request"><i data-feather="x" class="fea icon-sm"></i> Cancel Request</a>
                                        @else
                                            <a href="javascript:void(0)" class="dropdown-item text-success cancel_request"><i data-feather="corner-up-left" class="fea icon-sm"></i> Reinstate Request</a>
                                        @endif
                                    @endif

                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div><!--end col-->

@section('scripts')
<script>
    $(document).ready(function() {

        $(document).on('click', '.cancel_request', function(){
            Swal.fire({
                title: 'Are you sure you want to cancel your request?',
                // text: "You won't be able to revert this!",
                // icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!',
                imageUrl: '{{ asset("assets/images/home-fix-logo.png") }}',
                imageWidth: 100,
                imageHeight: 'auto',
                imageAlt: 'FixMaster Logo'

            }).then((result) => {
                
                if (result.value) {
            (async () => {
                const { value: text } = await Swal.fire({
                    input: 'textarea',
                    inputLabel: 'Why do you want to cancel your request?',
                    inputPlaceholder: 'Type your reason here...',
                    inputAttributes: {
                        'aria-label': 'Type your reason here'
                    },
                    showCancelButton: true
                    })

                    if (text) {
                        // Swal.fire(text)
                        Swal.fire(
                            'Cancelled!',
                            'Your request has been cancelled.',
                            'success'
                        )
                    }else{
                        Swal.fire(
                            'Cancelled!',
                            'You need to state a reason.',
                            'error'
                        )
                    }
                })()
                } 
            });
        });

        $('#request-sorting').on('change', function (){        
                let option = $("#request-sorting").find("option:selected").val();

                if(option === 'None'){
                    $('.specific-date, .sort-by-year, .date-range').addClass('d-none');
                }

                if(option === 'Date'){
                    $('.specific-date').removeClass('d-none');
                    $('.sort-by-year, .date-range').addClass('d-none');
                }

                if(option === 'Month'){
                    $('.sort-by-year').removeClass('d-none');
                    $('.specific-date, .date-range').addClass('d-none');
                }

                if(option === 'Date Range'){
                    $('.date-range').removeClass('d-none');
                    $('.specific-date, .sort-by-year').addClass('d-none');
                }
        });
    });
   
</script>
@endsection

@endsection