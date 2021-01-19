@extends('layouts.dashboard')
@section('title', 'CSE List')
@include('layouts.partials._messages')
@section('content')

<div class="content-body">
  <div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">CSE List</li>
          </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Client Service Executive List</h4>
      </div>
    </div>

    <div class="row row-xs">
      <div class="col-lg-12 col-xl-12 mg-t-10">
        <div class="card mg-b-10">
          <div class="card-header pd-t-20 d-sm-flex align-items-start justify-content-between bd-b-0 pd-b-0">
            <div>
              <h6 class="mg-b-5">CSE's as of {{ date('M, d Y') }}</h6>
              <p class="tx-13 tx-color-03 mg-b-0">This table displays a list of all FixMaster CSE's.</p>
            </div>
            
          </div><!-- card-header -->
         
          <div class="table-responsive">
            
            <table class="table table-hover mg-b-0" id="basicExample">
              <thead class="thead-primary">
                <tr>
                  <th class="text-center">#</th>
                  <th>Full Name</th>
                  <th class="text-center">ID</th>
                  <th>E-Mail</th>
                  <th>Phone Number</th>
                  <th>Gender</th>
                  <th>Status</th>
                  <th class="text-center">Requests Completed</th>
                  <th>Date Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cses as $cse)
                @foreach ($cse->cses as $item)@endforeach
                <tr>
                  <td class="tx-color-03 tx-center">{{ ++$i }}</td>
                  <td class="tx-medium">{{ $cse->fullName->name ?? 'Not found' }}</td>
                  <td class="tx-medium text-center">{{ $item->tag_id }}</td>
                  <td class="tx-medium">{{ $cse->email }}</td>
                  <td class="tx-medium">{{ $item->phone_number }}</td>
                  <td class="tx-medium">{{ $item->gender }}</td>
                  @if($cse->is_active == '1') 
                    <td class="text-medium text-success">Active</td>
                  @else 
                    <td class="text-medium text-danger">Inactive</td>
                  @endif
                  <td class="tx-medium text-center">{{ $cse->cse->requests()->where('service_request_status_id', '3')->count() }}</td>

                  <td class="text-medium">{{ Carbon\Carbon::parse($cse->created_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }}</td>
                  <td class=" text-center">
                    <div class="dropdown-file">
                      <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                      <a href="{{ route('admin.summary_cse', $cse->id) }}" class="dropdown-item details text-primary"><i class="far fa-user"></i> Summary</a>
                      <a href="{{ route('admin.edit_cse', $cse->id) }}" class="dropdown-item details text-info"><i class="far fa-edit"></i> Edit</a>
                      @if($cse->is_active == '1')
                        <a href="{{ route('admin.deactivate_cse', $cse->id) }}" class="dropdown-item details text-warning"><i class="fas fa-ban"></i> Deactivate</a>
                      @else
                        <a href="{{ route('admin.reinstate_cse', $cse->id) }}" class="dropdown-item details text-success"><i class="fas fa-undo"></i> Reinstate</a>
                      @endif
                      <a href="{{ route('admin.delete_cse', $cse->id) }}" class="dropdown-item details text-danger"><i class="fas fa-trash"></i> Delete</a>
                      </div>
                    </div>
                  </td>
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


@section('scripts')
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