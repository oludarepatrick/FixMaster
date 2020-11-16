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
      </div>
      <form>
      <div class="row row-xs">
        <div class="col-md-12">
          <div class="form-row">
              <div class="form-group col-md-4">
                  <label for="category_name">Name</label>
                  <input type="text" class="form-control" id="category_name" placeholder="Name">
              </div>
              <div class="form-group col-md-4">
                <label>Service</label>
                <select class="custom-select">
                  <option selected>Select...</option>
                  <option value="1">Communication</option>
                  <option value="2">Electrical</option>
                  <option value="2">Mechanical</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label>Status</label>
                <select class="custom-select">
                  <option selected>Select...</option>
                  <option value="1">Active</option>
                  <option value="2">Inactive</option>
                </select>
              </div>
          </div>
          <div class="divider-text">Fee Structure</div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">Standard Fee</label>
              <input type="email" class="form-control" id="inputEmail4" placeholder="Standard Fee">
            </div>
            <div class="form-group col-md-4">
              <label for="phone_number">Urgent Fee</label>
              <input type="text" class="form-control" id="phone_number" placeholder="Urgent Fee">
            </div>
            <div class="form-group col-md-4">
              <label for="phone_number">OOH(Out of Hours) Fee</label>
              <input type="text" class="form-control" id="phone_number" placeholder="OOH Fee">
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputEmail4">Description</label>
              <textarea rows="3" class="form-control" id="inputAddress2"></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </div>
    </form>

    </div>
</div>
@endsection