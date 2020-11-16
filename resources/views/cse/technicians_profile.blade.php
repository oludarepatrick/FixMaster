@extends('layouts.dashboard')
@section('title', 'Technician Profile')
@include('layouts.partials._messages')
@section('content')
{{-- <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/dashforge.contacts.css') }}"> --}}
<div class="content-body pd-0">
  <div class="contact-wrapper contact-wrapper-two">
  
    <div class="contact-content">
      <div class="contact-content-header">
        <nav class="nav">
          <a href="#contactInformation" class="nav-link active" data-toggle="tab">Contact Info<span>rmation</span></a>
          <a href="#contactLogs" class="nav-link" data-toggle="tab"><span>Service Request History</a>
        </nav>
        {{-- <a href="" id="contactOptions" class="text-secondary mg-l-auto d-xl-none"><i data-feather="more-horizontal"></i></a> --}}
      </div><!-- contact-content-header -->

      <div class="contact-content-body">
        <div class="tab-content">

          <div id="contactInformation" class="tab-pane show active pd-20 pd-xl-25">
            <div class="d-flex align-items-center justify-content-between mg-b-25">
              <h6 class="mg-b-0">Personal Details</h6>
              {{-- <div class="d-flex">
                <a href="#modalEditContact" data-toggle="modal" class="btn btn-sm btn-white d-flex align-items-center mg-r-5"><i data-feather="edit-2"></i><span class="d-none d-sm-inline mg-l-5"> Edit</span></a>
                <a href="#modalDeleteContact" data-toggle="modal" class="btn btn-sm btn-white d-flex align-items-center"><i data-feather="trash"></i><span class="d-none d-sm-inline mg-l-5"> Delete</span></a>
              </div> --}}
            </div>

            <div class="row">
              <div class="col-6 col-sm">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Firstname</label>
                <p class="mg-b-0">Andrew</p>
              </div><!-- col -->
              <div class="col-6 col-sm">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Middlename</label>
                <p class="mg-b-0">Ekene</p>
              </div><!-- col -->
              <div class="col-sm mg-t-20 mg-sm-t-0">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Lastname</label>
                <p class="mg-b-0">Nwankwo</p>
              </div><!-- col -->
            </div><!-- row -->

            <h5 class="mg-t-40 mg-b-20">Contact Details</h5>

            <div class="row row-sm">
              <div class="col-6 col-sm-4">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Email Address</label>
                <p class="tx-primary mg-b-0">andrew.nwankwo@gmail.com</p>
              </div>
              <div class="col-6 col-sm-4">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Mobile Phone</label>
                <p class="tx-primary tx-rubik mg-b-0">(+234) 805 4242 309</p>
              </div>
              <div class="col-6 col-sm-4 mg-t-20 mg-sm-t-0">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Work Phone</label>
                <p class="tx-primary tx-rubik mg-b-0">(+234) 812 0933 092</p>
              </div>
              <div class="col-sm-4 mg-t-20 mg-sm-t-30">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">ID</label>
                <p class="mg-b-0">TECH-2397329759</p>
              </div>
              <div class="col-sm-4 mg-t-20 mg-sm-t-30">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Company</label>
                <p class="mg-b-0">Ludwig Enterprise</p>
              </div>
              <div class="col-sm-4 mg-t-20 mg-sm-t-30">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Job Position</label>
                <p class="mg-b-0">Technician</p>
              </div>
              <div class="col-sm-4 mg-t-20 mg-sm-t-30">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Date Joined</label>
                <p class="mg-b-0">May 15th 2020</p>
              </div>
              <div class="col-sm-4 mg-t-20 mg-sm-t-30">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Home Address</label>
                <p class="mg-b-0">2 Chevron Drive, Lekki Penninsula II 12825, Lekki</p>
              </div>
              <div class="col-sm-4 mg-t-20 mg-sm-t-30">
                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Work Address</label>
                <p class="mg-b-0">8284 Ajose Adeogun Street, Victoria Island, Lagos, Nigeria</p>
              </div>
              <div class="col-sm-12 mg-t-20 mg-sm-t-30">
                  <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Rating</label>
                  <p class="mg-b-0">
                      <div class="pd-t-10 pd-b-15 d-flex align-items-baseline">
                          <h1 class="tx-normal tx-rubik mg-b-0 mg-r-5">3.1</h1>
                          <div class="tx-18">
                            <i class="icon ion-md-star lh-0 tx-orange"></i>
                            <i class="icon ion-md-star lh-0 tx-orange"></i>
                            <i class="icon ion-md-star lh-0 tx-orange"></i>
                            <i class="icon ion-md-star lh-0 tx-gray-300"></i>
                            <i class="icon ion-md-star lh-0 tx-gray-300"></i>
                          </div>
                    </div>
                  </p>
              </div>
            </div><!-- row -->

          </div>

          <div id="contactLogs" class="tab-pane pd-20 pd-xl-25">
            <div class="d-flex align-items-center justify-content-between mg-b-30">
                <div class="col-lg-12 col-xl-12 mg-t-10">
                  <div class="card mg-b-10">
                    <div class="table-responsive">
                      <table class="table table-hover mg-b-0" id="basicExample">
                        <thead class="thead-primary">
                          <tr>
                            <th class="text-center">#</th>
                            <th>Job Ref.</th>
                            <th>Client</th>
                            <th>Assigned Technician</th>
                            <th class="text-center">Amount</th>
                            <th>Status</th>
                            <th class="text-center">Date Completed</th>
                            <th class=" text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="tx-color-03 tx-center">1</td>
                            <td class="tx-medium">REF-234094623496</td>
                            <td class="tx-medium">Femi Joseph</td>
                            <td class="tx-medium">Taofeek Adedokun</td>
                            <td class="text-medium text-center">₦14,000</td>
                            <td class="text-medium text-success">Completed</td>
                            <td class="text-medium">May 15th 2020 at 11:30am</td>
                            <td class=" text-center">
                              <div class="dropdown-file">
                                <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a href="#modalDetails" data-toggle="modal" class="dropdown-item details"><i class="far fa-clipboard"></i> Details</a>
                                </div>
                              </div>
                            </td>
                          </tr>
          
                          <tr>
                            <td class="tx-color-03 tx-center">2</td>
                            <td class="tx-medium">REF-094009623412</td>
                            <td class="tx-medium">Derrick Nnamdi</td>
                            <td class="tx-medium">Andrew Nwankwo</td>
                            <td class="text-medium text-center">₦25,000</td>
                            <td class="text-medium text-success">Completed</td>
                            <td class="text-medium">May 12th 2020 at 8:26pm</td>
                            <td class=" text-center">
                              <div class="dropdown-file">
                                <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a href="#modalDetails" data-toggle="modal" class="dropdown-item details"><i class="far fa-clipboard"></i> Details</a>
                                </div>
                              </div>
                            </td>
                          </tr>
          
                          <tr>
                            <td class="tx-color-03 tx-center">3</td>
                            <td class="tx-medium">REF-237290223123</td>
                            <td class="tx-medium">William Olukayode</td>
                            <td class="tx-medium">Blessing Nnamdi</td>
                            <td class="text-medium text-center">₦12,800</td>
                            <td class="text-medium text-success">Completed</td>
                            <td class="text-medium">May 11th 2020 at 09:12am</td>
                            <td class=" text-center">
                              <div class="dropdown-file">
                                <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a href="#modalDetails" data-toggle="modal" class="dropdown-item details"><i class="far fa-clipboard"></i> Details</a>
                                </div>
                              </div>
                            </td>
                          </tr>
          
                          <tr>
                            <td class="tx-color-03 tx-center">4</td>
                            <td class="tx-medium">REF-234094623496</td>
                            <td class="tx-medium">Mobolaji Adetoun</td>
                            <td class="tx-medium">Andrew Nwankwo</td>
                            <td class="text-medium text-center">₦6,500</td>
                            <td class="text-medium text-success">Completed</td>
                            <td class="text-medium">May 11th 2020 at 8:19am</td>
                            <td class=" text-center">
                              <div class="dropdown-file">
                                <a href="" class="dropdown-link" data-toggle="dropdown"><i data-feather="more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a href="#modalDetails" data-toggle="modal" class="dropdown-item details"><i class="far fa-clipboard"></i> Details</a>
                                </div>
                              </div>
                            </td>
                          </tr>
          
                          
                        </tbody>
                      </table>
                    </div><!-- table-responsive -->
                  </div><!-- card -->
          
                </div><!-- col -->
            </div>
          </div><!-- tab-pane -->
        </div><!-- tab-content -->
      </div><!-- contact-content-body -->

      
    </div><!-- contact-content -->

  </div><!-- contact-wrapper -->
</div>

@endsection