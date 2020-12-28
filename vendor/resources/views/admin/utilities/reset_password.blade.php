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
            <div class="form-row">
                <div class="col-md-4">
                    <label for="password">E-Mail Address</label>
                    <select class="form-control select2" style="height: 38px !important">
                        <option label="Choose one"></option>
                        <option value="akinsola.olufemi@yahoo.com">akinsola.olufemi@yahoo.com</option>
                        <option value="duruobuchi@gmail.com">duruobuchi@gmail.com</option>
                        <option value="noemial2@email.com">noemial2@email.com</option>
                        <option value="hostdiwa@gmail.com">hostdiwa@gmail.com</option>
                        <option value="angelanuoluwa@gmail.com">angelanuoluwa@gmail.com</option>
                        <option value="mayowabenedict@gmail.com">mayowabenedict@gmail.com</option>
                        <option value="akhmadharuna@gmail.com">akhmadharuna@gmail.com</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group col-md-4">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                </div>
            </div>
        <button type="submit" class="btn btn-primary">Reset Password</button>
            
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