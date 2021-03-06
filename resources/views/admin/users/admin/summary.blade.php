@extends('layouts.dashboard')
@section('title', $admin->fullName->name.'\'s Summary')
@include('layouts.partials._messages')
@section('content')
<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.list_admin') }}">Administrators List</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $admin->fullName->name }}</li>
          </ol>
        </nav>
        {{-- <h4 class="mg-b-0 tx-spacing--1">Administrators List</h4> --}}
      </div>
      
      <div class="d-md-block">
        <a href="{{ route('admin.list_admin') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
        <a href="{{ route('admin.edit_admin', $admin->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
        @if($admin->is_active == 0)
          <a href="{{ route('admin.reinstate_admin', $admin->id) }}" class="btn btn-success"><i class="fas fa-undo"></i> Reinstate</a>
        @endif
        <a href="{{ route('admin.delete_admin', $admin->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
      </div>
    </div>

    <div class="row row-xs">
        <div class="col-sm-12 col-lg-12">
          <div class="card mg-b-20 mg-lg-b-25">
            <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
              <h6 class="tx-uppercase tx-semibold mg-b-0">{{ $admin->fullName->name }} Summary</h6>
              <nav class="nav nav-with-icon tx-13">
                <!-- <a href="" class="nav-link"><i data-feather="plus"></i> Add New</a> -->
              </nav>
            </div><!-- card-header -->
            <div class="card-body pd-25">
              <div class="media">
                <div class="pos-relative d-inline-block mg-b-20">
                  <div class="avatar avatar-xxl"><span class="avatar-initial rounded-circle bg-gray-700 tx-normal"><i class="icon ion-md-person"></i></span></div>
                  {{-- <a href="" class="contact-edit-photo"><i data-feather="edit-2"></i></a> --}}
              </div>
                <div class="media-body pd-l-25">
                  {{-- <h5 class="mg-b-5 mb-2">Business Type: Marine Cargo</h5> --}}
                  <div class="table-responsive">
                    <table class="table table-striped table-sm mg-b-0">
                      <tbody>
                        <tr>
                          <td class="tx-medium">Full Name</td>
                        <td class="tx-color-03">{{ $admin->admin->first_name.' '.$admin->admin->middle_name.' '.$admin->admin->last_name }}</td>
                        </tr>
                        <tr>
                          <td class="tx-medium">E-Mail</td>
                        <td class="tx-color-03">{{ $admin->email }}</td>
                        </tr>
                        <tr>
                          <td class="tx-medium">Phone Number</td>
                        <td class="tx-color-03">{{ $admin->admin->phone_number }}</td>
                        </tr>
                        <tr>
                          <td class="tx-medium">Designation</td>
                        <td class="tx-color-03">@if($admin->admin->designation == 'ADMIN_ROLE') Administrator @else Super Administrator @endif</td>
                        </tr>
                        <tr>
                          <td class="tx-medium">Status</td>
                        <td class="tx-color-03">@if($admin->is_active == '1') Active @else Inactive @endif</td>
                        </tr>
                        <tr>
                          <td class="tx-medium">Created By</td>
                          <td class="tx-color-03">{{ $createdBy->find($admin->admin->created_by)->name }}</td>
                        </tr>
                        <tr>
                          <td class="tx-medium">Date Created</td>
                          <td class="tx-color-03">{{ Carbon\Carbon::parse($admin->created_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }} ({{ $admin->created_at->diffForHumans() }})</td>
                        </tr>
                        <tr>
                          <td class="tx-medium">Last Edited</td>
                          <td class="tx-color-03">
                            @if(!empty($admin->updated_at)) {{ Carbon\Carbon::parse($admin->updated_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }} @else Never @endif </td>
                        </tr>
                        <tr>
                          <td class="tx-medium">Requests Supervised</td>
                        <td class="tx-color-03">{{ $admin->admin->requests()->count() }}</td>
                        </tr>
                        <tr>
                          <td class="tx-medium">Payments Disbursed</td>
                          <td class="tx-color-03">{{ $admin->adminDisbursedPayment()->count() }}</td>
                        </tr>
                        <tr>
                          <td class="tx-medium">Messages Sent</td>
                          <td class="tx-color-03">{{ $admin->sentMessages()->count() }}</td>
                        </tr>
                        <tr>
                          <td class="tx-medium">Login Count</td>
                          <td class="tx-color-03">@if(!empty($admin->login_count)) {{ $admin->login_count }} @else 0 @endif</td>
                        </tr>
                        <tr>
                          <td class="tx-medium">Last Seen</td>
                          <td class="tx-color-03">@if(!empty($admin->last_sign_in)) {{ $admin->last_sign_in->diffForHumans() }} @else Never @endif</td>
                        </tr>
                        {{-- <tr>
                          <td class="tx-medium">Loss Date</td>
                          <td class="tx-color-03">March 4 2020</td>
                        </tr>
                        <tr>
                          <td class="tx-medium">Reported Date</td>
                          <td class="tx-color-03">June 28 2020</td>
                        </tr>
                        <tr>
                          <td class="tx-medium">Status</td>
                          <td class="tx-color-03">Ongoing</td>
                        </tr> --}}
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
               
            </div>
          </div><!-- card -->
        </div><!-- col -->

      </div><!-- row -->

    </div>
</div>

@endsection