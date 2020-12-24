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
        <div class="d-md-block">
          <a href="{{ route('admin.requests') }}" class="btn btn-primary"><i data-feather="git-pull-request"></i> New Requests</a>
        </div>
      </div>

      <div class="row row-xs">
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
                <td class="tx-medium">Service Charge</td>
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
                <td class="tx-medium">Security Code</td>
                <td class="tx-color-03">{{ $requestDetail->security_code }}</td>
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
                      <h6><a href="" class="link-02">{{ $requestDetail->serviceRequestDetail->media_file }}</a></h6>
                        {{-- <span>4.1mb</span> --}}
                      </div>
                    </div>
                  </div><!-- col -->
                  {{-- <div class="col-6 col-sm-6 col-md-6 col-xl mg-t-10 mg-xl-t-0">
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
                  </div> --}}
                </div><!-- row -->
                
              </div>
            </div>
          @endif
          <div class="divider-text">Assign CSE & Technician</div>

          <form method="POST" action="{{ route('admin.assign_cse_technician', $requestDetail->id) }}">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>CSE</label>
                <select class="custom-select" name="cse_id" id="cse_id" required>
                  <option value="" selected>Select...</option>
                  @foreach ($cses as $cse)
                  @foreach ($cse->cses as $item)@endforeach
                    <option value="{{ $cse->id }}" title="{{ $cse->cse->lga->name }} => {{ $item->town }}" data-email="{{ $cse->email }}" data-name="{{ $cse->fullName->name }}">{{ $cse->fullName->name }} ({{ $cse->cse->lga->name }} => {{ $item->town }})</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-4">
                <label>Technician</label>
                <select class="custom-select" name="technician_id" id="technician_id" required>
                  <option value="" selected>Select...</option>
                  @foreach ($technicians as $technician)
                  @foreach ($technician->technicians as $item)@endforeach
                    <option value="{{ $technician->id }}" title="{{ $technician->technician->lga->name }} => {{ $item->town }}" data-email="{{ $technician->email }}" data-name="{{ $technician->fullName->name }}">{{ $technician->fullName->name }} ({{ $technician->technician->lga->name }} => {{ $item->town }})</option>
                  @endforeach
                </select>
              </div>
            </div>

            <input type="hidden" class="d-none" value="" name="cse_name" id="cse_name">
            <input type="hidden" class="d-none" value="" name="cse_email" id="cse_email">
            <input type="hidden" class="d-none" value="" name="technician_name" id="technician_name">
            <input type="hidden" class="d-none" value="" name="technician_email" id="technician_email">

            <button type="submit" class="btn btn-primary">Assign</button>
        </form>
        </div>
      </div>
    </div>
</div>

@push('scripts')
    <script>
      
      $(document).ready(function(){

        $(document).on('change','#cse_id',function(){
          let cseName = $(this).children("option:selected").data('name');
          let cseEmail = $(this).children("option:selected").data('email');

          $('#cse_name').val(cseName);
          $('#cse_email').val(cseEmail);
        });

        $(document).on('change','#technician_id',function(){
          let technicianName = $(this).children("option:selected").data('name');
          let technicianEmail = $(this).children("option:selected").data('email');

          $('#technician_name').val(technicianName);
          $('#technician_email').val(technicianEmail);
        });

      });
    </script>
@endpush
@endsection