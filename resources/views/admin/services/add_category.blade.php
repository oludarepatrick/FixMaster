@extends('layouts.dashboard')
@section('title', 'Create New Service Category')
@include('layouts.partials._messages')
@section('content')
<div class="content-body">
    <div class="container pd-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Category</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Create New Category</h4>
        </div>
        <div class="d-md-block">
          <a href="{{ route('admin.list_category') }}" class="btn btn-primary"><i data-feather="aperture"></i> Category List</a>
        </div>
      </div>
    <form method="POST" action="{{ route('admin.store_category') }}" enctype="multipart/form-data">
        @csrf
      <div class="row row-xs">
        <div class="col-md-12">
          <div class="form-row">
              <div class="form-group col-md-3">
                  <label for="name">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{ old('name') }}" autocomplete="off">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group col-md-3">
                <label>Service</label>
                <select class="custom-select @error('service_id') is-invalid @enderror" name="service_id">
                  <option selected value="">Select...</option>
                  @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : ''}}>{{ $service->name }}</option>
                  @endforeach
                </select>
                @error('service_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-3">
                <label>Category Cover Image</label>
                <div class="custom-file">
                  <input type="file" accept="image/*" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="image">
                  <label class="custom-file-label" id="image-name" for="image">Upload Category Image</label>
                  
                </div>
                {{-- <small class="text-danger"> Preferred category cover image size is 350x259.</small> --}}
                @error('image')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group col-md-3">
                <label>Status</label>
                <select class="custom-select @error('is_active') is-invalid @enderror" name="is_active" id="is_active">
                  <option selected value="">Select...</option>
                  <option value="1" {{ old('is_active') == '1' ? 'selected' : ''}}>Active</option>
                  <option value="0" {{ old('is_active') == '0' ? 'selected' : ''}}>Inactive</option>
                </select>
                @error('is_active')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
          </div>
          <div class="divider-text">Fee Structure</div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="standard_fee">Standard Fee</label>
              <input type="tel" class="form-control @error('standard_fee') is-invalid @enderror" name="standard_fee" id="standard_fee" value="{{ old('standard_fee') }}" placeholder="Standard Fee" autocomplete="off" maxlength="11">
              @error('standard_fee')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="urgent_fee">Urgent Fee</label>
              <input type="tel" class="form-control @error('urgent_fee') is-invalid @enderror" name="urgent_fee" id="urgent_fee" value="{{ old('urgent_fee') }}" placeholder="Urgent Fee" autocomplete="off" maxlength="11">
              @error('urgent_fee')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="ooh_fee">OOH(Out of Hours) Fee</label>
              <input type="tel" class="form-control @error('ooh_fee') is-invalid @enderror" name="ooh_fee" id="ooh_fee" value="{{ old('ooh_fee') }}" placeholder="OOH(Out of Hours) Fee" autocomplete="off" maxlength="11">
              @error('ooh_fee')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputEmail4">Description</label>
              <textarea rows="3" class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ old('description') }}</textarea>
              @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </div>
    </form>

    </div>
</div>

@section('scripts')
<script>
  $(document).ready(function (){
    var standard_fee = new Cleave('#standard_fee', {
      numeral: true,
      numeralThousandsGroupStyle: 'thousand'
    });

    var urgent_fee = new Cleave('#urgent_fee', {
      numeral: true,
      numeralThousandsGroupStyle: 'thousand'
    });

    var ooh_fee = new Cleave('#ooh_fee', {
      numeral: true,
      numeralThousandsGroupStyle: 'thousand'
    });

    
  //Append the image name from file options to post cover field
  $(document).ready(function(){
      $('input[type="file"]').change(function(e){
          var fileName = e.target.files[0].name;
          $('#image-name').text(fileName);
      });

      let previousCoverPhoto = $('#old-post-image').val();
      $('$image-name').text(previousCoverPhoto);

  });

  });
</script>

@endsection
@endsection