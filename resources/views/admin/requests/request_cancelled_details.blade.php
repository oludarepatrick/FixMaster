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
              <li class="breadcrumb-item active" aria-current="page">Cancelled Request Details</li>
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
          <a href="{{ route('admin.requests_cancelled') }}" class="btn btn-primary"><i data-feather="git-pull-request"></i> Cancelled Requests</a>
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

              <tr>
                <td class="tx-medium">Reason for Cancellation</td>
                <td class="tx-color-03">{{ $requestDetail->serviceRequestCancellationReason->reason }}</td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
</div>

@endsection