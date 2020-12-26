@extends('layouts.app')
@section('title', 'Home')
@include('layouts.partials._messages')
@section('contents')


<!-- Hero Start -->
    <section class="bg-half-170  d-table w-100 mt-5" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-7">
                    <div class="title-heading mt-4">
                        <h1 class="heading mb-3">Get A <span class="type"></span> <br> <span class="texty"> Client Service
                                Agent</span> </h1>
                        <p class="para-desc text-muted">We assign a dedicated client service to you who ensures your job
                            is completed promptly and professionally</p>
                        <p class="para-desc text-muted">We offer convenient Quality Services. Book a service
                            conveniently from any place at any time.</p>
                        <div class="mt-4">
                            <a href="{{ url('services') }}" class="btn btn-prim mt-2 mr-2 js-scroll-trigger">Book A
                                Service</a>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-5 col-md-5 mt-2 pt-2 mt-sm-0 pt-sm-0 about_image">
                    <img src="{{ asset('assets/images/newest/mech1.jpg') }}" alt="about" class="about_image-1">
                    <img src="{{ asset('assets/images/electrician.jpg') }}" alt="about" class="about_image-2">
                    <img src="{{ asset('assets/images/plumber.jpg') }}" alt="about" class="about_image-3">
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>

    

    <!-- How It Work Start -->
    <section class="section bg-light border-bottom" id="howitworks">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h4 class="title mb-4">How It Works?</h4>
                        <p class="text-muted para-desc mb-0 mx-auto">Start working with <span
                                class="texty font-weight-bold">FixMaster</span> that can provide everything you
                            need to make your life easier and better.</p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
        <div class="container mt-50 mt-60">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <p class="hiws"><span class="texty">FixMaster</span> In Steps</p>
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="media">
                                <i data-feather="hash" class="fea icon-ex-md text-primary mr-2 mt-1"></i>
                                <div class="media-body">
                                    <h5 class="mt-0 texty">Tell us what services you
                                        need</h5>
                                    <p class="answer text-muted mb-0">Answer a few questions to tell us about your
                                        specific requirements..</p>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 col-12">
                            <div class="media">
                                <i data-feather="hash" class="fea icon-ex-md text-primary mr-2 mt-1"></i>
                                <div class="media-body">
                                    <h5 class="mt-0 texty">Get a dedicated clients service
                                        agent</h5>
                                    <p class="answer text-muted mb-0">We assign a dedicated client service agent to
                                        you who ensures your job is completed promptly and professionally.</p>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 col-12">
                            <div class="media">
                                <i data-feather="hash" class="fea icon-ex-md text-primary mr-2 mt-1"></i>
                                <div class="media-body">
                                    <h5 class="mt-0 texty">We Deliver</h5>
                                    <p class="answer text-muted mb-0">We deploy the best professionals to do the
                                        job and provide you with a standard 1 week warranty, which can be extended
                                        to 1 month if requested.</p>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <img src="{{ asset('assets/images/illustrator/faq.svg') }}" alt="">
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->

    </section>
    <!--end section-->
    <!-- How It Work End -->
    <!-- Why FixMaster Starts -->
    <section class="section bg-light" id="whyFixMaster">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h4 class="title mb-4">Why Everyone Loves FixMaster?</h4>
                        <p class="text-muted para-desc mb-0 mx-auto">Everyone Loves<span class="texty font-weight-bold">
                                FixMaster</span> because of these great and oustanding qualities. We deliver the best
                            always!</p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <div class="container pb-5 mb-md-5 mt-4">
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="features text-center">
                        <div class="image position-relative d-inline-block">
                            <img src="images/icon/star.svg" class="avatar avatar-small" alt="">
                        </div>

                        <div class="content mt-4">
                            <h4 class="title-2">Premium Quality Services On Demand</h4>
                            <p class="text-muted mb-0">Place job request conveniently from any place at any convenient
                                time. Find all home services you require in a single app.</p>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-md-4 col-12 mt-5 mt-sm-0">
                    <div class="features text-center">
                        <div class="image position-relative d-inline-block">
                            <img src="images/icon/circular-label-with-certified-stamp.svg" class="avatar avatar-small"
                                alt="">
                        </div>

                        <div class="content mt-4">
                            <h4 class="title-2">Trusted Certified Technicians</h4>
                            <p class="text-muted mb-0">We guarantee quickest services at your doorsteps. Advanced
                                mechanism for you to see and track the technician assigned for
                                the service in real time.</p>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-md-4 col-12 mt-5 mt-sm-0">
                    <div class="features text-center">
                        <div class="image position-relative d-inline-block">
                            <img src="images/icon/ok.svg" class="avatar avatar-small" alt="">
                        </div>

                        <div class="content mt-4">
                            <h4 class="title-2">100% Satisfaction</h4>
                            <p class="text-muted mb-0">If you are not happy with the service, professionals will come
                                back and make amends. Terms and Conditions Apply.</p>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
        <div class="container pb-5 mb-md-5">
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="features text-center">
                        <div class="image position-relative d-inline-block">
                            <img src="images/icon/driller.svg" class="avatar avatar-small" alt="">
                        </div>

                        <div class="content mt-4">
                            <h4 class="title-2">Preventive Maintenance Opportunity</h4>
                            <p class="text-muted mb-0">We offer maintenance services for residential and commercial
                                properties.</p>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-md-4 col-12 mt-5 mt-sm-0">
                    <div class="features text-center">
                        <div class="image position-relative d-inline-block">
                            <img src="images/icon/salary.svg" class="avatar avatar-small" alt="">
                        </div>

                        <div class="content mt-4">
                            <h4 class="title-2">Easy Payment & Transparent Pricing</h4>
                            <p class="text-muted mb-0">Pay Online or Offline whichever is convenient for you after the
                                work is done.</p>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-md-4 col-12 mt-5 mt-sm-0">
                    <div class="features text-center">
                        <div class="image position-relative d-inline-block">
                            <img src="images/icon/delivery-truck.svg" class="avatar avatar-small" alt="">
                        </div>

                        <div class="content mt-4">
                            <h4 class="title-2">Fast & Reliable Service Delivery</h4>
                            <p class="text-muted mb-0">Book a service in less than 60seconds for a time that suits you.
                                Online booking available 24/7.</p>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <section id="requestService">
        <div class="container mt-5 mb-5">
            <p class="serv__1">Request a Service</p>
            <div class="row">
                <div class="col-md-7">
                    <p class="text-muted"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint deleniti cumque
                        fugit modi ad,
                        asperiores facilis quod. Dignissimos praesentium et consequatur doloribus fugit saepe ipsum
                        optio,
                        dolorum sed cupiditate non?</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mt-4 pt-2">
                    <div class="card blog rounded border-0 shadow">
                        <div class="position-relative">
                            <img class="ult1 card-img-top rounded-top" src="{{ asset('assets/images/generato.jpg') }}" alt="Generators">

                            <div class="overlay rounded-top bg-dark"></div>
                        </div>
                        <div class="card-body content">
                            <h5 class="serv__2">Generators</h5>
                            <div class="post-meta d-flex justify-content-between mt-2">
                                <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Alias commodi.</p>

                            </div>
                            <a href="#" class="btn btn-outline-fix btn-block">Request Service</a>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-4 mt-4 pt-2">
                    <div class="card blog rounded border-0 shadow">
                        <div class="position-relative">
                            <img class="ult1 card-img-top rounded-top" src="images/airconditioner.jpg" alt="null">

                            <div class="overlay rounded-top bg-dark"></div>
                        </div>
                        <div class="card-body content">
                            <h5 class="serv__2">Air Conditioners</h5>
                            <div class="post-meta d-flex justify-content-between mt-2">
                                <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Alias commodi.</p>

                            </div>
                            <a href="#" class="btn btn-outline-fix btn-block">Request Service</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 pt-2">
                    <div class="card blog rounded border-0 shadow">
                        <div class="position-relative">
                            <img class="ult1 card-img-top rounded-top" src="images/electricals.jpg" alt="null">

                            <div class="overlay rounded-top bg-dark"></div>
                        </div>
                        <div class="card-body content">
                            <h5 class="serv__2">Electricals</h5>
                            <div class="post-meta d-flex justify-content-between mt-2">
                                <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Alias commodi.</p>

                            </div>
                            <a href="#" class="btn btn-outline-fix btn-block">Request Service</a>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <div class="row mt-3">
                <div class="col-lg-4 mt-4 pt-2">
                    <div class="card blog rounded border-0 shadow">
                        <div class="position-relative">
                            <img class="ult1 card-img-top rounded-top" src="images/plumbing.jpg" alt="null">

                            <div class="overlay rounded-top bg-dark"></div>
                        </div>
                        <div class="card-body content">
                            <h5 class="serv__2">Plumbing</h5>
                            <div class="post-meta d-flex justify-content-between mt-2">
                                <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Alias commodi.</p>

                            </div>
                            <a href="#" class="btn btn-outline-fix btn-block">Request Service</a>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-4 mt-4 pt-2">
                    <div class="card blog rounded border-0 shadow">
                        <div class="position-relative">
                            <img class="ult1 card-img-top rounded-top" src="images/households.jpg" alt="null">

                            <div class="overlay rounded-top bg-dark"></div>
                        </div>
                        <div class="card-body content">
                            <h5 class="serv__2">Household Equipments</h5>
                            <div class="post-meta d-flex justify-content-between mt-2">
                                <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Alias commodi.</p>

                            </div>
                            <a href="#" class="btn btn-outline-fix btn-block">Request Service</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 pt-2">
                    <div class="card blog rounded border-0 shadow">
                        <div class="position-relative">
                            <img class="ult1 card-img-top rounded-top" src="images/gadgets.jpg" alt="null">

                            <div class="overlay rounded-top bg-dark"></div>
                        </div>
                        <div class="card-body content">
                            <h5 class="serv__2">Gadgets</h5>
                            <div class="post-meta d-flex justify-content-between mt-2">
                                <p class="serv__3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Alias commodi.</p>

                            </div>
                            <a href="#" class="btn btn-outline-fix btn-block">Request Service</a>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <p class="text-center mt-4"><a href="{{url('services')}}" class="browse">Browse more services &rarr;</a></p>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-5 pb-2">
                        <h4 class="title mb-4">We are Hiring!</h4>
                        <p class="text-muted para-desc mb-0 mx-auto"><span class="texty font-weight-bold">
                                FixMaster</span> believes in the power of teams and are constantly building them.</p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12 mb-4 pb-2">
                    <div class="card job-box rounded shadow border-0 overflow-hidden">
                        <div class="border-bottom">
                            <div class="position-relative">
                                <img src="images/exec.jpg" class="img-fluid" alt="">
                                <div class="job-overlay bg-white"></div>
                            </div>
                            <h5 class="mb-0 position text-dark">Executive
                                    Application
                                <ul class="list-unstyled h6 mb-0 text-warning">
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                </ul>
                            </h5>
                            <ul class="list-unstyled head mb-0">
                                <li class="badge badge-danger badge-pill">Full-Time</li>
                            </ul>
                        </div>

                        <div class="card-body content position-relative">
                            <div class="firm-logo rounded-circle shadow bg-light text-center">
                                <img src="images/internet-of-things.svg" class="avatar avatar-md-sm" alt="">
                            </div>
                            <ul class="job-facts list-unstyled mt-3">
                                <li class="list-inline-item text-muted"><i data-feather="check"
                                        class="fea icon-sm text-success mr-1"></i> 5 Year Expirence</li>
                                <li class="list-inline-item text-muted"><i data-feather="check"
                                        class="fea icon-sm text-success mr-1"></i> Working Hours- 6hr</li>
                                <li class="list-inline-item text-muted"><i data-feather="check"
                                        class="fea icon-sm text-success mr-1"></i> Information strategy</li>
                            </ul>
                            <a href="{{url('hiring')}}" class="btn btn-outline-fix btn-block">Apply Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 mb-4 pb-2">
                    <div class="card job-box rounded shadow border-0 overflow-hidden">
                        <div class="border-bottom">
                            <div class="position-relative">
                                <img src="images/techy.jpg" class="img-fluid" alt="">
                                <div class="job-overlay bg-white"></div>
                            </div>
                            <h5 class="mb-0 position text-dark">Technician
                                    Application
                                <ul class="list-unstyled h6 mb-0 text-warning">
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>

                                </ul>
                            </h5>
                            <ul class="list-unstyled head mb-0">
                                <li class="badge badge-danger badge-pill">Full-Time</li>
                            </ul>
                        </div>

                        <div class="card-body content position-relative">
                            <div class="firm-logo rounded-circle shadow bg-light text-center">
                                <img src="images/engineer.svg" class="avatar avatar-md-sm" alt="">
                            </div>
                            <ul class="job-facts list-unstyled mt-3">
                                <li class="list-inline-item text-muted"><i data-feather="check"
                                        class="fea icon-sm text-success mr-1"></i> 2 Year Expirence</li>
                                <li class="list-inline-item text-muted"><i data-feather="check"
                                        class="fea icon-sm text-success mr-1"></i> Working Hours- 6hr</li>
                                <li class="list-inline-item text-muted"><i data-feather="check"
                                        class="fea icon-sm text-success mr-1"></i> Information strategy</li>
                            </ul>
                            <a href="{{url('hiring')}}" class="btn btn-outline-fix btn-block">Apply Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 mb-4 pb-2">
                    <div class="card job-box rounded shadow border-0 overflow-hidden">
                        <div class="border-bottom">
                            <div class="position-relative">
                                <img src="images/distro.jpg" class="img-fluid" alt="">
                                <div class="job-overlay bg-white"></div>
                            </div>
                            <h5 class="mb-0 position text-dark">Suppliers
                                    Application
                                <ul class="list-unstyled h6 mb-0 text-warning">
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                    <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>

                                </ul>
                            </h5>
                            <ul class="list-unstyled head mb-0">
                                <li class="badge badge-danger badge-pill">Full-Time</li>
                            </ul>
                        </div>

                        <div class="card-body content position-relative">
                            <div class="firm-logo rounded-circle shadow bg-light text-center">
                                <img src="images/inventory.svg" class="avatar avatar-md-sm" alt="">
                            </div>
                            <ul class="job-facts list-unstyled mt-3">
                                <li class="list-inline-item text-muted"><i data-feather="check"
                                        class="fea icon-sm text-success mr-1"></i> 2 Year Expirence</li>
                                <li class="list-inline-item text-muted"><i data-feather="check"
                                        class="fea icon-sm text-success mr-1"></i> Working Hours- 6hr</li>
                                <li class="list-inline-item text-muted"><i data-feather="check"
                                        class="fea icon-sm text-success mr-1"></i> Information strategy</li>
                            </ul>
                            <a href="{{url('hiring')}}" class="btn btn-outline-fix btn-block">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Testi Start -->
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h4 class="title mb-4">Client Reviews</h4>
                        <p class="text-muted para-desc mx-auto mb-0">See some awesome reviews from our clients. <span
                                class="texty font-weight-bold">FixMaster</span> offers the best services. Dont sleep on
                            us!!!</p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row justify-content-center">
                <div class="col-lg-12 mt-4">
                    <div id="customer-testi" class="owl-carousel owl-theme">
                        <div class="media customer-testi m-2">
                            <img src="images/ifee.jpg" class="avatar avatar-small mr-3 rounded shadow" alt="">
                            <div class="media-body content p-3 shadow rounded bg-white position-relative">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <p class="text-muted mt-2">" It seems that only fragments of the original text remain in
                                    the Lorem Ipsum texts used today. "</p>
                                <h6 class="text-primary">- Thomas Israel <small class="text-muted">C.E.O</small></h6>
                            </div>
                        </div>

                        <div class="media customer-testi m-2">
                            <img src="images/taju.jpg" class="avatar avatar-small mr-3 rounded shadow" alt="">
                            <div class="media-body content p-3 shadow rounded bg-white position-relative">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                </ul>
                                <p class="text-muted mt-2">" One disadvantage of Lorum Ipsum is that in Latin certain
                                    letters appear more frequently than others. "</p>
                                <h6 class="text-primary">- Barbara McIntosh <small class="text-muted">M.D</small></h6>
                            </div>
                        </div>

                        <div class="media customer-testi m-2">
                            <img src="images/ifee.jpg" class="avatar avatar-small mr-3 rounded shadow" alt="">
                            <div class="media-body content p-3 shadow rounded bg-white position-relative">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <p class="text-muted mt-2">" The most well-known dummy text is the 'Lorem Ipsum', which
                                    is said to have originated in the 16th century. "</p>
                                <h6 class="text-primary">- Carl Oliver <small class="text-muted">P.A</small></h6>
                            </div>
                        </div>

                        <div class="media customer-testi m-2">
                            <img src="images/client/04.jpg" class="avatar avatar-small mr-3 rounded shadow" alt="">
                            <div class="media-body content p-3 shadow rounded bg-white position-relative">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <p class="text-muted mt-2">" According to most sources, Lorum Ipsum can be traced back
                                    to a text composed by Cicero. "</p>
                                <h6 class="text-primary">- Christa Smith <small class="text-muted">Manager</small></h6>
                            </div>
                        </div>

                        <div class="media customer-testi m-2">
                            <img src="images/client/05.jpg" class="avatar avatar-small mr-3 rounded shadow" alt="">
                            <div class="media-body content p-3 shadow rounded bg-white position-relative">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <p class="text-muted mt-2">" There is now an abundance of readable dummy texts. These
                                    are usually used when a text is required. "</p>
                                <h6 class="text-primary">- Dean Tolle <small class="text-muted">Developer</small></h6>
                            </div>
                        </div>

                        <div class="media customer-testi m-2">
                            <img src="images/client/06.jpg" class="avatar avatar-small mr-3 rounded shadow" alt="">
                            <div class="media-body content p-3 shadow rounded bg-white position-relative">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <p class="text-muted mt-2">" Thus, Lorem Ipsum has only limited suitability as a visual
                                    filler for German texts. "</p>
                                <h6 class="text-primary">- Jill Webb <small class="text-muted">Designer</small></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!-- Why FixMaster Ends -->



@endsection