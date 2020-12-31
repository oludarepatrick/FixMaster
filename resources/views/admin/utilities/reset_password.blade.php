@extends('layouts.dashboard')
@section('title', 'Reset Password')
@include('layouts.partials._messages')
@section('content')
{{-- <link href="{{ asset('assets/dashboard/lib/select2/css/select2.min.css') }}" rel="stylesheet"> --}}
<style>.select2-container .select2-selection--single { height: 38px;}</style>
<div class="content-body">
    <div class="container pd-x-0">
      <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
            </ol>
          </nav>
          <h4 class="mg-b-0 tx-spacing--1">Reset Password</h4>
        </div>
      </div>

      <div class="row row-xs">
        <p>This feature allows you reset any users password seasmlessly.</p>
          
        <div class="col-12 col-md-12 col-lg-12 col-xs-12">
          <form method="POST" action="{{ route('admin.utility_save_password') }}">
            @csrf
            <div class="form-row">
                <div class="col-md-4">
                    <label for="password">E-Mail Address</label>
                    <select class="form-control select2 @error('email') is-invalid @enderror" style="height: 38px !important" name="email" id="email">
                        <option label="Choose one"></option>
                        @foreach($emails as $email)
                          <option value="{{ $email->email }}" {{ old('email') == $email->email ? 'selected' : ''}}>{{ $email->email }}</option>
                        @endforeach
                    </select>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" autocomplete="off">
                    <small id="passwordHelpBlock" class="form-text text-muted">
                      Password must be 8 characters at least.
                    </small>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password" placeholder="Confirm Password" autocomplete="off">
                    @error('confirm_password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Reset Password</button>
          </form>
        </div>
      </div>
    </div>
</div>

@section('scripts')
    <script src="{{ asset('assets/dashboard/lib/select2/js/select2.min.js') }}"></script>

    <script>
    $(function(){
        'use strict'

        // Basic with search
        $('.select2').select2({
          placeholder: 'Choose one',
          searchInputPlaceholder: 'Search E-Mails'
        });

      });
    </script>
@endsection

@endsection