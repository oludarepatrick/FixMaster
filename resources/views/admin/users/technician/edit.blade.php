@extends('layouts.dashboard')
@section('title', 'Edit '. $technician->fullName->name.'\'s Account')
@include('layouts.partials._messages')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/bootstrap-multiselect.css') }}">

<div class="content-body">
    <div class="container pd-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.list_technician') }}">Technician List</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Technician</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Edit {{ $technician->fullName->name }}'s  Account</h4>
        </div>
      </div>
      
      <form method="POST" action="{{ route('admin.update_technician', $technician->technician->user_id) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row row-xs">
          <div class="col-md-12">
            <div class="form-row">
              <div class="form-group col-md-4">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') ?? $technician->technician->first_name }}" placeholder="First Name" autocomplete="off">
                  @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group col-md-4">
                  <label for="middle_name">Middle Name</label>
                  <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name') ?? $technician->technician->middle_name }}" autocomplete="off" placeholder="Middle Name">
              </div>
              <div class="form-group col-md-4">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') ?? $technician->technician->last_name }}" autocomplete="off" placeholder="Last Name">
                  @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-Mail" name="email" id="email" value="{{ old('email') ?? $technician->email }}" required autocomplete="off">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group col-md-3">
                <label for="phone_number">Phone Number</label>
                <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" name="phone_number" id="phone_number" value="{{ old('phone_number') ?? $technician->technician->phone_number }}" maxlength="11" required autocomplete="off">
                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group col-md-3">
                <label for="other_phone_number">Other Phone Number</label>
                <input type="tel" class="form-control @error('other_phone_number') is-invalid @enderror" placeholder="Other Phone Number" name="other_phone_number" id="other_phone_number" value="{{ old('other_phone_number') ?? $technician->technician->other_phone_number }}" maxlength="11" autocomplete="off">
                @error('other_phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group col-md-3">
                <label for="gender">Gender</label>
                <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender" required>
                    <option selected value="">Select...</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : ''}} @if($technician->technician->gender == 'Male') selected @endif>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : ''}} @if($technician->technician->gender == 'Female') selected @endif>Female</option>
                </select>
              </div>
            </div>
            
            <div class="form-row">
              <div class="form-group col-md-3">
                <label>Profile Avatar</label>
                <div class="custom-file">
                  <input type="file" accept="image/*" class="custom-file-input @error('avatar') is-invalid @enderror" name="avatar" id="avatar">
                  <label class="custom-file-label" id="image-name" for="image">Upload New Profile Avatar</label>
                  <input type="hidden" id="old_avatar" name="old_avatar" value="{{ $technician->technician->avatar }}">
                  <small>{{ substr($technician->technician->avatar, 0, 20) }}...jpg</small>
                  @error('avatar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group col-md-3">
                <label>Service Category</label>
                <select class="selectpicker @error('technician_category') is-invalid @enderror" id="technician_category" name="technician_category[]"  multiple="multiple" data-live-search="true">
                  @foreach ($services as $service)
                    <optgroup label="{{ $service->name }}">
                      @foreach($service->categories as $item)
                        <option value="{{ $item->id }}" {{ old('technician_category') == $item->id ? 'selected' : ''}} @foreach($technicianCategories as $technicianCategory) @if($item->id == $technicianCategory->category_id) selected @endif @endforeach>{{ $item->name }}</option>
                      @endforeach
                    </optgroup>
                  @endforeach
                </select>
                @error('technician_category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group col-md-3">
                <label>Bank Name</label>
                <select id="bank_id" name="bank_id" class="custom-select bank_id @error('bank_id') is-invalid @enderror">
                    <option selected value="">Select...</option>
                    @foreach($banks as $bank)
                      <option value="{{ $bank->id }}" {{ old('bank_id') == $bank->id ? 'selected' : ''}} @if($bank->id == $technician->technician->bank_id) selected @endif>{{ $bank->name }}</option>
                    @endforeach
                </select>
                @error('bank_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-3">
                  <label for="account_number">Account Number</label>
                  <input type="tel" class="form-control @error('account_number') is-invalid @enderror" id="account_number" name="account_number" placeholder="Account Number" maxlength="10"  autocomplete="off" value="{{ old('account_number') ?? $technician->technician->account_number }}">
                  @error('account_number')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>State</label>
                <select class="form-control @error('state_id') is-invalid @enderror" name="state_id" id="state_id">
                  <option selected value="">Select...</option>
                  @foreach($states as $state)
                      <option value="{{ $state->id }}" @if($state->id == $technician->technician->state_id) selected @endif>{{ $state->name }}</option>
                  @endforeach
                </select>
                @error('state_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group col-md-4">
                <label>L.G.A</label>
                <select class="form-control @error('lga_id') is-invalid @enderror" name="lga_id" id="lga_id">
                  <option selected value="{{ $technician->technician->lga_id }}">{{ $technician->technician->lga->name }}</option>
                </select>
                @error('lga_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group col-md-4">
                <label>Town/City</label>
                <input type="text" class="form-control @error('town') is-invalid @enderror" placeholder="e.g. CMS, Ikoyi, Egbeda" name="town" id="town" value="{{ old('town') ?? $technician->technician->town }}" required>
                @error('town')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputAddress2">Full Address</label>
                <textarea class="form-control @error('full_address') is-invalid @enderror" rows="3" name="full_address" id="full_address" placeholder="e.g. 284B, Ajose Adeogun Street, Victoria Island, Lagos, Nigeria.">{{ old('full_address') ?? $technician->technician->full_address }}</textarea>
                @error('full_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Profile</button>
          </div>
        </div>
      </form>

    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/dashboard/assets/js/bootstrap-multiselect.js') }}"></script>

<script> 

  $('.selectpicker').selectpicker();

  $(document).ready(function (){

    

    //Append the image name from file options to post cover field
    $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('#image-name').text(fileName);
        });

        // let previousCoverPhoto = $('#old_avatar').val();
        // $('#image-name').text(previousCoverPhoto);
        
    });

    //Get list of L.G.A's in a particular state.
    $('#state_id').on('change',function () {
        let stateId = $('#state_id').find('option:selected').val();
        let stateName = $('#state_id').find('option:selected').text();
        
        $.ajaxSetup({
                headers: {
                    'X-CSRF_TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            url: "{{ route('lga_list') }}",
            method: "POST",
            dataType: "JSON",
            data: {state_id:stateId},
            success: function(data){
                if(data){

                    $('#lga_id').html(data.lgaList);
                }else{
                    var message = 'Error occured while trying to get L.G.A`s in '+ stateName +' state';
                    var type = 'error';
                    displayMessage(message, type);
                }
            },
        })  
    });

  });
</script>

@endpush
@endsection