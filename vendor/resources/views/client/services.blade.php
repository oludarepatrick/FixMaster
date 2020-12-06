@extends('layouts.client')
@section('title', 'Services')
@section('content')

<div class="col-lg-8 col-12">
    <h5 class="mt-4 mb-0">Book a Service</h5>

    <p class="text-muted mb-0 mt-4"><span class="text-dark">Keywords :</span> Electronics, Generator, Tiling, etc...</p>
<p class=" mb-0 mt-4"><a href="{{ route('client.service_custom') }}" class="text-primary">Can't find a Service that matches your need?</a></p>
    <form class="rounded p-4 mt-4 bg-white">
        <div class="row text-left">
            <div class="col-lg-5 col-md-4">
                <div class="form-group mb-0">
                    <input type="text" class="form-control" required="" placeholder="Keywords">
                </div>
            </div><!--end col-->
            
            <div class="col-lg-7 col-md-8">
                <div class="row align-items-center">
                    <div class="col-md-4 mt-4 mt-sm-0">
                        <div class="form-group mb-0">
                            <select class="form-control custom-select">
                                <option selected="">Categories</option>
                                <option value="4">Electronics</option>
                                <option value="1">Electricals</option>
                                <option value="3">Refrigeration</option>
                                <option value="5">Plumbing</option>
                                <option value="5">Locks & Security</option>
                                <option value="5">Interior Decoration</option>
                                <option value="5">Mechanical</option>
                                <option value="5">Communication</option>
                            </select>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-4 mt-4 mt-sm-0">
                        <input type="submit" id="search" name="search" class="searchbtn btn btn-primary btn-block p" value="Search">
                    </div><!--end col-->
                </div><!--end row-->
            </div> <!---end col-->
        </div><!--end row-->
    </form>
    <h5 class="mt-4 mb-0">Electronics</h5>
    <div class="row">
        <div class="col-md-6 mt-4 pt-2">
            <div class="card blog rounded border-0 shadow">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/comp.jpg') }}" class="card-img-top rounded-top" alt="Computers & Laptops">
                <div class="overlay rounded-top bg-dark"></div>
                </div>
                <div class="card-body content">
                    <h5><a href="javascript:void(0)" class="card-title title text-dark">Computers & Laptops</a></h5>
                    <div class="post-meta d-flex justify-content-between mt-3">
                        <a href="{{ route('client.service_quote') }}" class="text-muted readmore">Request Service <i class="mdi mdi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        
        <div class="col-md-6 mt-4 pt-2">
            <div class="card blog rounded border-0 shadow">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/soundsys.jpg') }}" class="card-img-top rounded-top" alt="Sound Systems">
                <div class="overlay rounded-top bg-dark"></div>
                </div>
                <div class="card-body content">
                    <h5><a href="javascript:void(0)" class="card-title title text-dark">Sound Systems</a></h5>
                    <div class="post-meta d-flex justify-content-between mt-3">
                        <a href="{{ route('client.service_quote') }}" class="text-muted readmore">Request Service <i class="mdi mdi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-4 pt-2">
            <div class="card blog rounded border-0 shadow">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/tele.jpg') }}" class="card-img-top rounded-top" alt="Television">
                <div class="overlay rounded-top bg-dark"></div>
                </div>
                <div class="card-body content">
                    <h5><a href="javascript:void(0)" class="card-title title text-dark">Television</a></h5>
                    <div class="post-meta d-flex justify-content-between mt-3">
                        <a href="{{ route('client.service_quote') }}" class="text-muted readmore">Request Service <i class="mdi mdi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div><!--end col-->

        
    </div><!--end row-->

    <h5 class="mt-4 mb-0">Electricals</h5>
    <div class="row">
        <div class="col-md-6 mt-4 pt-2">
            <div class="card blog rounded border-0 shadow">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/chanover.jpg') }}" class="card-img-top rounded-top" alt="Sound Systems">
                <div class="overlay rounded-top bg-dark"></div>
                </div>
                <div class="card-body content">
                    <h5><a href="javascript:void(0)" class="card-title title text-dark">Change-Over Units</a></h5>
                    <div class="post-meta d-flex justify-content-between mt-3">
                        <a href="{{ route('client.service_quote') }}" class="text-muted readmore">Request Service <i class="mdi mdi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-4 pt-2">
            <div class="card blog rounded border-0 shadow">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/fuses.jpg') }}" class="card-img-top rounded-top" alt="Fuse Boxes">
                <div class="overlay rounded-top bg-dark"></div>
                </div>
                <div class="card-body content">
                    <h5><a href="javascript:void(0)" class="card-title title text-dark">Fuse Boxes</a></h5>
                    <div class="post-meta d-flex justify-content-between mt-3">
                        <a href="{{ route('client.service_quote') }}" class="text-muted readmore">Request Service <i class="mdi mdi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        
        <div class="col-md-6 mt-4 pt-2">
            <div class="card blog rounded border-0 shadow">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/inverter.jpg') }}" class="card-img-top rounded-top" alt="Inverter">
                <div class="overlay rounded-top bg-dark"></div>
                </div>
                <div class="card-body content">
                    <h5><a href="javascript:void(0)" class="card-title title text-dark">Inverter</a></h5>
                    <div class="post-meta d-flex justify-content-between mt-3">
                        <a href="{{ route('client.service_quote') }}" class="text-muted readmore">Request Service <i class="mdi mdi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div><!--end col-->

        
    </div><!--end row-->
</div>
@endsection