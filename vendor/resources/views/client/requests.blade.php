@extends('layouts.client')
@section('title', 'Requests')
@section('content')
<div class="col-lg-8 col-12">
    <h5 class="mb-0">Service Request Overview</h5>
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
                    <th class="py-3">Service</th>
                    <th class="py-3">CSE</th>
                    <th class="py-3">Date</th>
                    <th class="py-3">Amount</th>
                    <th class="py-3">Status</th>
                    <th class="py-3">Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Generator</td>
                    <td>Andrew Nwankwo</td>
                    <td>15/05/2020</td>
                    <td class="font-weight-bold">₦14,000</td>
                    <td class="text-warning">Pending</td>
                    <td>
                        <div class="btn-group dropdown-primary mr-2 mt-2">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{ route('client.request_details') }}" class="dropdown-item text-primary"><i data-feather="clipboard" class="fea icon-sm"></i> View Details</a>
                                <a href="{{ route('client.request_details') }}" class="dropdown-item text-info"><i data-feather="edit" class="fea icon-sm"></i> Edit Request</a>
                                <a href="{{ route('client.request_invoice') }}" class="dropdown-item text-success"><i data-feather="file-text" class="fea icon-sm"></i> View Invoice</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0)" class="dropdown-item text-danger cancel_request"><i data-feather="x" class="fea icon-sm"></i> Cancel Request</a>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Security Equipment</td>
                    <td>Bidemi George</td>
                    <td>12/03/2020</td>
                    <td class="font-weight-bold">₦48,740</td>
                    <td class="text-success">Completed</td>
                    <td>
                        <div class="btn-group dropdown-primary mr-2 mt-2">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{ route('client.request_details') }}" class="dropdown-item text-primary"><i data-feather="clipboard" class="fea icon-sm"></i> View Details</a>
                                <a href="{{ route('client.request_invoice') }}" class="dropdown-item text-success"><i data-feather="file-text" class="fea icon-sm"></i> View Invoice</a>
                                {{-- <div class="dropdown-divider"></div>
                                <a href="javascript:void(0)" class="dropdown-item text-danger"><i data-feather="trash-2" class="fea icon-sm"></i> Delete</a> --}}
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>Furniture & Painting</td>
                    <td>Taofeek Adedokun</td>
                    <td>8/03/2020</td>
                    <td class="font-weight-bold">₦22,500</td>
                    <td class="text-danger">Cancelled</td>
                    <td>
                        <div class="btn-group dropdown-primary mr-2 mt-2">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{ route('client.request_details') }}" class="dropdown-item text-primary"><i data-feather="clipboard" class="fea icon-sm"></i> View Details</a>
                                <a href="#" class="dropdown-item text-success"><i data-feather="corner-right-up" class="fea icon-sm"></i> Reactivate</a>
                                {{-- <div class="dropdown-divider"></div>
                                <a href="javascript:void(0)" class="dropdown-item text-danger"><i data-feather="trash-2" class="fea icon-sm"></i> Delete</a> --}}
                            </div>
                        </div>
                    </td>
                </tr>
               
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