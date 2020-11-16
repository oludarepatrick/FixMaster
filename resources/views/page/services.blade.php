@extends('layouts.app')
@section('title', 'All Services')
@section('contents')

<!-- All Services -->
<section class="section">
    <div class="container" style="margin-top: 3rem;">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="section-title mb-4 pb-2">
                <h4 class="title mb-4">All Services</h4>
                <p class="text-muted para-desc mb-0 mx-auto text-center">Start working with <span class="texty font-weight-bold">FixMaster</span> that can provide everything you need to make your life easier and better.</p>
            </div>
        </div>
        <!--end col-->
    </div>
    
    <div class="text-center pt-md-1 mb-4">
        <form class="rounded p-4 mt-4 bg-white">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-4">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control" required placeholder="Keywords">
                    </div>
                </div><!--end col-->
                
                <div class="col-lg-7 col-md-8">
                    <div class="row align-items-center">
                        <div class="col-md-6 mt-4 mt-sm-0">
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

                        <div class="col-md-6 mt-4 mt-sm-0">
                            <input type="submit" id="search" name="search" class="searchbtn btn btn-primary btn-block p" value="Search">
                        </div><!--end col-->
                    </div><!--end row-->
                </div> <!---end col-->
            </div><!--end row-->
        </form>

        <p class="text-muted mb-0 mt-4"><span class="text-dark">Keywords :</span>  Electronics, Generator, Tiling, etc...</p>
        <p class=" mb-0 mt-4"><a href="#requestQuote" data-toggle="modal" class="text-primary">Can't find a Service that matches your need?</a></p>

    </div>

    <div class="col-lg-12 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-7">
                <div class="title-heading">
                    <h4 class="mb-0 serv__1">Electronics</h4>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/comp.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Computers & Laptops</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('page.services_details') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/soundsys.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Sound Systems</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('page.services_details') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/tele.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Television</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('page.services_details') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    </div><!--end col-->
    <div class="col-lg-12 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-7">
                <div class="section-title">
                    <h5 class="mb-0 serv__1 mt-4">Electricals</h5>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/chanover.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Change-Over Units</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('page.services_details') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/fuses.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Fuse Boxes</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('page.services_details') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/inverter.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Inverter</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('page.services_details') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <div class="row">
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/lightss.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Light Fittings</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/sokkets.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Sockets</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/electricals.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Wiring Repair</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    </div><!--end col-->
    <div class="col-lg-12 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-7">
                <div class="section-title">
                    <h5 class="mb-0 serv__1 mt-4">Refrigeration</h5>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/freezers.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Freezers</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/fridge.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Fridge</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/airconditioner.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Air Conditioner</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        
    </div><!--end col-->
    <div class="col-lg-12 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-7">
                <div class="section-title">
                    <h5 class="mb-0 serv__1 mt-4">Plumbing</h5>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/pipes.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Bath-Tubs, Pipes, Kitchen Sink</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.  Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/showers.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Drainage, Shower, Soak-Away</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/taps.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Taps, Toilets, WashHand Basins</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        
    </div><!--end col-->
    <div class="col-lg-12 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-7">
                <div class="section-title">
                    <h5 class="mb-0 serv__1 mt-4">Household Appliances</h5>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/machineee.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Dish & Washing Machine</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/blender.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Kitchen Blender</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.  Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/microvave.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Microwave</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        
    </div><!--end col-->
    <div class="col-lg-12 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-7">
                <div class="section-title">
                    <h5 class="mb-0 serv__1 mt-4">Locks & Security</h5>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/doors.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Doors</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/securt.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Security Equipment</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.  Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/windows.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Windows</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        
    </div><!--end col-->
    <div class="col-lg-12 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-7">
                <div class="section-title">
                    <h5 class="mb-0 serv__1 mt-4">Interior Decoration</h5>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/furniture.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Furniture & Painting</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/frames.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Picture & Framing</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/tiles.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Tiling</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.  Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        
    </div><!--end col-->
    <div class="col-lg-12 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-7">
                <div class="section-title">
                    <h5 class="mb-0 serv__1 mt-4">Mechanical</h5>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/generato.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Generator</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/pumpim.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Pump</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/screp.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Scraper</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        
    </div><!--end col-->
    <div class="col-lg-12 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-7">
                <div class="section-title">
                    <h5 class="mb-0 serv__1 mt-4">Communication</h5>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row mb-5">
            <div class="col-lg-4 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/phones.jpg') }}" alt="null">

                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5 class="serv__2">Mobile Phones</h5>
                        <div class="post-meta d-flex justify-content-between mt-2">
                            {{-- <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias commodi.</p> --}}

                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline-fix btn-block">Request Service</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div><!--end col-->
</div>
</section>
<!-- All Services End -->

<div class="modal fade" id="requestQuote" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg wd-sm-650" role="document">
      <div class="modal-content">
        <div class="modal-body pd-x-25 pd-sm-x-30 pd-t-40 pd-sm-t-20 pd-b-15 pd-sm-b-20">
          <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
          <h5 class="mg-b-2"><strong>Custom Service Quotation</strong></h5>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">First Name</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="First Name">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Last Name</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Last Name">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">E-Mail</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="E-Mail">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Phone Number</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Phone Number">
            </div>
            <div class="col-md-4">
                <div class="form-group position-relative">
                    <label>Date & Time</label>
                    <input name="name" type="datetime-local" class="form-control pl-5"   id="service-date-time">
                </div>
            </div><!--end col-->
            <div class="col-md-4">
                <div class="form-group">
                    <label>L.G.A</label>
                    <select class="custom-select" id="request-sorting">
                        <option>Select...</option>
                        <option value="1">Alimosho</option>
                        <option value="2">Kosofe</option>
                        <option value="2">Mushin</option>
                        <option value="2">Oshodi-Isolo</option>
                        <option value="2">Ojo</option>
                        <option value="2">Badagry</option>
                    </select>
                </div>
            </div><!--end col-->

            <div class="col-md-4">
                <div class="form-group position-relative">
                    <label>Town/City</label>
                    <select class="custom-select" id="request-sorting">
                        <option>Select...</option>
                        <option value="1">Abule Ijesha</option>
                        <option value="2">Bariga</option>
                        <option value="2">Coker</option>
                        <option value="2">Eti Osa</option>
                        <option value="2">Ibeju-Lekki</option>
                    </select>
                </div>
            </div>

          <div class="form-group col-md-6">
            <label for="inputAddress2">Full Address</label>
            <textarea rows="4" class="form-control" id="inputAddress2"></textarea>
          </div>
          <div class="form-group col-md-6">
            <label for="inputAddress2">Request Description</label>
            <textarea rows="4" class="form-control" id="inputAddress2" placeholder="Kindly describe in the details your request"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Send Request</button>

        </div>
        </div><!-- modal-body -->
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->

@endsection