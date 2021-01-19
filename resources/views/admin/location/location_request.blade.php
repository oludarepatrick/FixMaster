@extends('layouts.dashboard')
@section('title', 'Location Request')
@include('layouts.partials._messages')
@section('content')
<style>
  .select2-container .select2-selection--single { 
    height: 38px;
  }
  .select2-container {
    width: 100% !important;
  }
</style>

<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('cse.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Location Request</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Location Request</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-12 justify-content-center text-center align-items-center">
        <a href="#locationRequest" class="btn btn-primary float-right" data-toggle="modal"><i class="fas fa-plus"></i> Request</a>
      </div>

      <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card mg-b-10">
          <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
            <div>
              <h6 class="mg-b-5">Your Most Recent Requests</h6>
            {{-- <p class="tx-13 tx-color-03 mg-b-0">This table displays a list of Location Requests made by <span>You</span> to a Technician paired with on a job as of <strong>{{ date('l jS F Y') }}</strong>.</p> --}}
            </div>
            
          </div><!-- card-header -->
          
          <div class="table-responsive">
           
            <table class="table table-hover mg-b-0" id="basicExample">
              <thead class="thead-primary">
                <tr>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Job Ref.</th>
                    <th>Requested By</th>
                    <th>Request Timestamp</th>
                    <th>Recipient</th>
                    <th>Response Timestamp</th>
                    <th>Location</th>
                    <th class=" text-center">Action</th>
                  </tr>
                </tr>
              </thead>
              <tbody>
                @foreach ($locationRequest as $item) 
                <tr>
                  <td class="tx-color-03 tx-center">2</td>
                  <td class="tx-medium">{{$item->job_reference}}</td>
                  <td class="tx-medium">David Akinsola</td>
                  <td class="text-medium">May 15th 2020 at 11:30am</td>
                  <td class="tx-medium">Godfrey Diwa</td>
                  <td class="text-medium"></td>
                  <td class="text-medium"></td>
                  <td class=" text-center"><a href="#" title="Show location" class="btn btn-success btn-sm"><i class="
                    fas fa-map-marker-alt"></i></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-responsive -->
        </div><!-- card -->

      </div><!-- col -->
    </div><!-- row -->


  </div><!-- container -->
</div>

 @include('admin.location.modal.locationModal')

@section('scripts')
<script src="{{ asset('assets/dashboard/lib/select2/js/select2.min.js') }}"></script>

<script>
$(function(){
    'use strict'

    // Basic with search
    $('.select2').select2({
      placeholder: 'Choose one',
      searchInputPlaceholder: 'Search Job Reference'
    });

  });
</script>

<script>
    $(document).ready(function() {

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