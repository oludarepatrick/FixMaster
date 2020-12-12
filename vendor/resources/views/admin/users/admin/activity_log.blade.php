@extends('layouts.dashboard')
@section('title', $fullName.'\'s Summary')
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
            <li class="breadcrumb-item active" aria-current="page">Activity Log</li>
          </ol>
        </nav>
        {{-- <h4 class="mg-b-0 tx-spacing--1">Administrators List</h4> --}}
      </div>
      <div class="d-md-block">
        <a href="{{ route('admin.list_admin') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card mg-b-10">
          <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
            <div>
              <h6 class="mg-b-5">Activity Log</h6>
              <p class="tx-13 tx-color-03 mg-b-0">Use the select dropdowns to sort Activity Logs.</p>
            </div>
            
          </div><!-- card-header -->
         
          <div class="table-responsive">
            <div class="row mt-1 mb-1 ml-1 mr-1">
            <input value="{{ $userId }}" type="hidden" id="user_id">
              <div class="col-md-3">
                <div class="form-group">
                    <label>Sort Type</label>
                    <select class="custom-select" id="activity_log_type">
                        <option selected value="None">Select...</option>
                        <option  value="Others">Others</option>
                        <option value="Payments">Payments</option>
                        <option value="Requests">Requests</option>
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
                          <option>Select...</option>
                          <option value="2018">2018</option>
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                      </select>
                  </div>
              </div>
  
              <div class="col-md-3 sort-by-year d-none" id="sort-by-month">
                  <div class="form-group position-relative">
                      <label>Specify Month <span class="text-danger">*</span></label>
                      <select class="form-control custom-select" id="sort_by_month">
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
              @include('admin.users.admin._activity_log_table')
            </div>
          </div><!-- table-responsive -->
        </div><!-- card -->

      </div><!-- col -->
    </div><!-- row -->

</div>

@section('scripts')
<script>
    $(document).ready(function() {

        $('#sort_by_range').on('change', function (){        
                let option = $("#sort_by_range").find("option:selected").val();

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

                if(option === 'Year'){
                    $('.sort-by-year').removeClass('d-none');
                    $('#sort-by-month, .specific-date, .date-range').addClass('d-none');
                }

                if(option === 'Date Range'){
                    $('.date-range').removeClass('d-none');
                    $('.specific-date, .sort-by-year').addClass('d-none');
                }
        });
    });
   
</script>

<script>
  //SORT ACTIVITY LOG BY TYPE
  $('#activity_log_type').on('change', function (){
    //Get the User ID
    $userId = $('#user_id').val();

    //Get the Activity Log Type
    $type = $("#activity_log_type").find("option:selected").val();

    //Set other related sorting fields so default
    $("#sort_by_range, #sort_by_year, #sort_by_month").prop('selectedIndex', 0);
    $('#specific_date, #date_from, #date_to').val('');

    //Hide other related sorting fields
    $('.specific-date, .sort-by-year, .date-range').addClass('d-none');

    //Assign sorting level
    $sortLevel = 'Level One';

    sortActivityLog($userId, $sortLevel, $type);

  });        

  //SORT ACTIVITY LOG BY SPECIFIC DATE
  $('#specific_date').change(function (){
    //Get the User ID
    $userId = $('#user_id').val();

    //Assign sorting level
    $sortLevel = 'Level Two';

    //Get the Activity Log Type
    $type = $("#activity_log_type").find("option:selected").val();

    //Get specific Activity Log date
    $date = $('#specific_date').val();

    sortActivityLog($userId, $sortLevel, $type, $date);

  });

  //SORT ACTIVITY LOG BY SPECIFIC YEAR 
  $('#sort_by_year').change(function (){
    //Get the User ID
    $userId = $('#user_id').val();

    //Assign sorting level
    $sortLevel = 'Level Three';

    //Get the Activity Log Type
    $type = $("#activity_log_type").find("option:selected").val();

    //Get year to sort activity log
    $year = $('#sort_by_year').find("option:selected").val();

    //Set month to default
    $("#sort_by_month").prop('selectedIndex', 0);

    sortActivityLog($userId, $sortLevel, $type, $date='', $year);

  });

  function sortActivityLog($userId, $sortLevel, $type, $date, $year){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        
    $.ajax({
        url: '{{ route("admin.activity_log_sorting_admin") }}',
        method: 'POST',
        data: {"user": $userId, "sort_level": $sortLevel, "type": $type, "date": $date, "year":$year},
        success: function (data){
            if(data){
              console.log(data);
              //Replace table with new sorted records
              $('#sort_table').html('');                
              $('#sort_table').html(data);

              //Add sorting class for jQuery datatable
              $('#basicExample').addClass('basicExample');

              //Attach JQuery datatable to current sorting
              if($('#basicExample').hasClass('basicExample')){
                jQuerySort();
              }
            }else {
              var message = 'Error occured while trying to sort Activity Log table.';
              var type = 'error';
              displayMessage(message, type);
            }            
        }
    });
  }

  function jQuerySort(){
    $('.basicExample').DataTable({
          'iDisplayLength': 10,
          language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
              }
        });
  }

</script>
@endsection

@endsection