@extends('layouts.client')
@section('title', 'Home')
@section('content')
<div class="col-lg-8 col-12">
    <div class="border-bottom pb-4 row">
        {{-- <h5>Femi Joseph</h5>
        <p class="text-muted mb-0">I have started my career as a trainee and prove my self and achieve all the milestone with good guidance and reach up to the project manager. In this journey, I understand all the procedure which make me a good developer, team leader, and a project manager.</p>--}}
        <div class="col-md-4 mt-4">
            <div class="media key-feature align-items-center p-3 rounded shadow mt-4">
                <img src="{{ asset('assets/images/job/Circleci.svg') }}" class="avatar avatar-ex-sm" alt="">
                <div class="media-body content ml-3">
                    <h4 class="title mb-0">Service Requests</h4>
                    <p class="text-muted mb-0">12 </p>
                    {{-- <p class="text-muted mb-0"><a href="javascript:void(0)" class="text-primary">CircleCi</a> @London, UK</p>     --}}
                </div>
            </div>

        </div>

        <div class="col-md-4 mt-4">
            <div class="media key-feature align-items-center p-3 rounded shadow mt-4">
                <img src="{{ asset('assets/images/job/Circleci.svg') }}" class="avatar avatar-ex-sm" alt="">
                <div class="media-body content ml-3">
                    <h4 class="title mb-0">Completed</h4>
                    <p class="text-muted mb-0">9</p>
                    {{-- <p class="text-muted mb-0"><a href="javascript:void(0)" class="text-primary">CircleCi</a> @London, UK</p>     --}}
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-4">
            <div class="media key-feature align-items-center p-3 rounded shadow mt-4">
                <img src="{{ asset('assets/images/job/Circleci.svg') }}" class="avatar avatar-ex-sm" alt="">
                <div class="media-body content ml-3">
                    <h4 class="title mb-0">Pending</h4>
                    <p class="text-muted mb-0">3</p>
                    {{-- <p class="text-muted mb-0"><a href="javascript:void(0)" class="text-primary">CircleCi</a> @London, UK</p>     --}}
                </div>
            </div>
        </div>
    </div> 
    
    <div class="border-bottom pb-4">
        <div class="row">
            <div class="col-md-6 mt-4">
                <h5>Personal Details :</h5>
                <div class="mt-4">
                    <div class="media align-items-center">
                        <i data-feather="mail" class="fea icon-ex-md text-muted mr-3"></i>
                        <div class="media-body">
                            <h6 class="text-primary mb-0">Email :</h6>
                            <a href="javascript:void(0)" class="text-muted">femijoseph0203@mail.com</a>
                        </div>
                    </div>
                    <div class="media align-items-center mt-3">
                        <i data-feather="bookmark" class="fea icon-ex-md text-muted mr-3"></i>
                        <div class="media-body">
                            <h6 class="text-primary mb-0">Phone No :</h6>
                            <a href="javascript:void(0)" class="text-muted">08125456489</a>
                        </div>
                    </div>
                    <div class="media align-items-center mt-3">
                        <i data-feather="phone" class="fea icon-ex-md text-muted mr-3"></i>
                        <div class="media-body">
                            <h6 class="text-primary mb-0">Occupation :</h6>
                            <a href="javascript:void(0)" class="text-muted">Accountant</a>
                        </div>
                    </div>
                    <div class="media align-items-center mt-3">
                        <i data-feather="map-pin" class="fea icon-ex-md text-muted mr-3"></i>
                        <div class="media-body">
                            <h6 class="text-primary mb-0">L.G.A :</h6>
                            <p class="text-muted mb-0">Alimosho</p>
                        </div>
                    </div>

                    <div class="media align-items-center mt-3">
                        <i data-feather="map-pin" class="fea icon-ex-md text-muted mr-3"></i>
                        <div class="media-body">
                            <h6 class="text-primary mb-0">Town/City :</h6>
                            <p class="text-muted mb-0">Egbeda</p>
                        </div>
                    </div>
                    <div class="media align-items-center mt-3">
                        <i data-feather="map-pin" class="fea icon-ex-md text-muted mr-3"></i>
                        <div class="media-body">
                            <h6 class="text-primary mb-0">Full Address :</h6>
                            <a href="javascript:void(0)" class="text-muted">7 Abagbo Close, Victoria Island, Lagos, Nigeria</a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-6 mt-4 pt-2 pt-sm-0">
                <h5>Recent Requests :</h5>

                <div class="media key-feature align-items-center p-3 rounded shadow mt-4">
                    <img src="images/job/Circleci.svg" class="avatar avatar-ex-sm" alt="">
                    <div class="media-body content ml-3">
                        <h4 class="title mb-0">Generator</h4>
                        <p class="text-muted mb-0"><span {{ route('client.services_details') }}">Amount:</span> ₦14,000</p>
                        <p class="mb-0"><a href="javascript:void(0)" style="color: #161c2d">CSE: <span class="text-muted">Godfrey Diwa</span></a></p>    
                        <p class="mb-0">Status: <span class="text-success">Completed</span></p>    
                    </div>
                </div>

                <div class="media key-feature align-items-center p-3 rounded shadow mt-4">
                    <img src="images/job/Codepen.svg" class="avatar avatar-ex-sm" alt="">
                    <div class="media-body content ml-3">
                        <h4 class="title mb-0">Security Equipment</h4>
                        <p class="text-muted mb-0"><span {{ route('client.services_details') }}">Amount:</span> ₦48,740</p>
                        <p class="mb-0"><a href="javascript:void(0)" style="color: #161c2d">CSE: <span class="text-muted">Rilwan Bello</span></a></p>    
                        <p class="mb-0">Status: <span class="text-warning">Pending</span></p>    

                    </div>
                </div>

                <div class="media key-feature align-items-center p-3 rounded shadow mt-4">
                    <img src="images/job/Gitlab.svg" class="avatar avatar-ex-sm" alt="">
                    <div class="media-body content ml-3">
                        <h4 class="title mb-0">Furniture & Painting</h4>
                        <p class="text-muted mb-0"><span {{ route('client.services_details') }}">Amount:</span> ₦22,500</p>
                        <p class="mb-0"><a href="javascript:void(0)" style="color: #161c2d">CSE: <span class="text-muted">Mayowa Olaoye</span></a></p>    
                        <p class="mb-0">Status: <span class="text-danger">Cancelled</span></p>    

                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>

    <h5 class="mt-4 mb-0">Popular Requests :</h5>
    <div class="row">
        <div class="col-md-4 mt-4 pt-2">
            <div class="card blog rounded border-0 shadow">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/generato.jpg') }}" class="card-img-top rounded-top" alt="...">
                <div class="overlay rounded-top bg-dark"></div>
                </div>
                <div class="card-body content">
                    <h5><a href="javascript:void(0)" class="card-title title text-dark">Generator</a></h5>
                    <div class="post-meta d-flex justify-content-between mt-3">
                        {{-- <ul class="list-unstyled mb-0">
                            <li class="list-inline-item mr-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                        </ul> --}}
                        <a href="{{ route('client.services_details') }}" class="text-muted readmore">Request Service <i class="mdi mdi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="author">
                    <small class="text-light date"><i class="mdi mdi-calendar"></i> Last 7 Days Request: 18</small><br>
                    <small class="text-light date"><i class="mdi mdi-credit-card"></i> Basic Price: ₦4,000</small>

                </div>
            </div>
        </div><!--end col-->
        
        <div class="col-md-4 mt-4 pt-2">
            <div class="card blog rounded border-0 shadow">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/machineee.jpg') }}" class="card-img-top rounded-top" alt="...">
                <div class="overlay rounded-top bg-dark"></div>
                </div>
                <div class="card-body content">
                    <h5><a href="javascript:void(0)" class="card-title title text-dark">Television</a></h5>
                    <div class="post-meta d-flex justify-content-between mt-3">
                        {{-- <ul class="list-unstyled mb-0">
                            <li class="list-inline-item mr-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                        </ul> --}}
                        <a href="{{ route('client.services_details') }}" class="text-muted readmore">Request Service <i class="mdi mdi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="author">
                    {{-- <small class="text-light user d-block"><i class="mdi mdi-account"></i> Calvin Carlo</small> --}}
                    <small class="text-light date"><i class="mdi mdi-calendar"></i> Last 7 Days Request: 16</small><br>
                    <small class="text-light date"><i class="mdi mdi-credit-card"></i> Basic Price: ₦7,500</small>

                </div>
            </div>
        </div><!--end col-->

        <div class="col-md-4 mt-4 pt-2">
            <div class="card blog rounded border-0 shadow">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/inverter.jpg') }}" class="card-img-top rounded-top" alt="...">
                <div class="overlay rounded-top bg-dark"></div>
                </div>
                <div class="card-body content">
                    <h5><a href="javascript:void(0)" class="card-title title text-dark">inverter</a></h5>
                    <div class="post-meta d-flex justify-content-between mt-3">
                        {{-- <ul class="list-unstyled mb-0">
                            <li class="list-inline-item mr-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                        </ul> --}}
                        <a href="{{ route('client.services_details') }}" class="text-muted readmore">Request Service <i class="mdi mdi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="author">
                    {{-- <small class="text-light user d-block"><i class="mdi mdi-account"></i> Calvin Carlo</small> --}}
                    <small class="text-light date"><i class="mdi mdi-calendar"></i> Last 7 Days Request: 12</small><br>
                    <small class="text-light date"><i class="mdi mdi-credit-card"></i> Basic Price: ₦3,200</small>
                </div>
            </div>
        </div><!--end col-->

        {{-- <div class="col-12 mt-4 pt-2">
        <a href="{{ route('client.services') }}" class="btn btn-primary">See More <i class="mdi mdi-chevron-right"></i></a>
        </div><!--end col--> --}}
    </div><!--end row-->
</div><!--end col-->
@endsection