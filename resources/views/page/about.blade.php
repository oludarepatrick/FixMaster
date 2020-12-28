@extends('layouts.app')
@section('title', 'About Us')
@section('contents')


    <section class="d-table w-100" id="home">
        <div class="container" style="margin-top: 7.5rem;">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7">
                    <div class="title-heading">
                        <h1 class="heading mb-3">Everything you need to know about <span class="texty">FixMaster.</span>
                        </h1>
                        <p class="para-desc text-muted">FixMaster is your best trusted one-call solution for a wide range of home maintenance, servicing and repair needs. Our well-trained &amp; certified uniformed technicians are fully insured professionals with robust experience to provide home services to fully meet your needs with singular objective to make you totally relax while your repair requests are professionally handled.</p> <br>
                        <p class="para-desc text-muted">It offers a convenient, safe, guaranteed solution to all home repairs, servicing and maintenance needs. Request a servive Now!</p>
                        <div class="mt-4">
                        <a href="{{ route('page.services') }}" class="btn btn-prim mt-2 mr-2 js-scroll-trigger">Book A
                                Service</a>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-6 col-md-5 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="text-md-right text-center">
                        <img class="preload-me lazy-load is-loaded"
                            src="{{ asset('assets/images/repair-guy.png') }}" idth="450" height="610" style="will-change: auto;" alt="Repair man" srcset="{{ asset('assets/images/repair-guy.png') }}">
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Showcase Start -->
    <section class="section pt-0 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 pb-2">
                        <h4 class="title mb-4 mt-5"><span class="texty font-weight-bold">FixMaster,</span> We Repair, You Relax!!!</h4>
                        <p class="text-muted para-desc mb-0 mx-auto"><span class="texty font-weight-bold">FixMaster</span> is your best partner for your home mprovement solutions with professionally trusted, knowledgeable, experienced technicians to provide home repairs, maintenance and servicing solutions with a single click at your fingertips.</p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 mt-4 pt-2">
                    <img src="{{ asset('assets/images/plier.jpg') }}" class="img-fluid mx-auto d-block" alt="">
                </div>
                <!--end col-->

                <div class="col-lg-7 col-md-6 mt-4 pt-2">
                    <div class="section-title ml-lg-5">
                        <h4 class="title mb-4">Convenient, Safe, Guaranteed Solution to All Home Repairs, Servicing, etc
                        </h4>
                        <p class="text-muted"><span class="texty font-weight-bold">FixMaster,</span> is a SmartTech
                            company that is positioned to serve millions of
                            customers across Nigeria providing innovative prompt home repair and maintenance services.
                        </p>
                        <ul class="list-unstyled feature-list text-muted">
                            <li><i data-feather="check-circle" class="fea icon-sm text-success2 mr-2"></i>One simple
                                notification provides immediate prompt scheduling</li>
                            <li><i data-feather="check-circle" class="fea icon-sm text-success2 mr-2"></i>Prompt contact by our professional Customer Service Executives</li>
                            <li><i data-feather="check-circle" class="fea icon-sm text-success2 mr-2"></i>On time
                                arrival of our well trained Technicians</li>
                            <li><i data-feather="check-circle" class="fea icon-sm text-success2 mr-2"></i>Optimum
                                Professional Diagnosis of request with the right tools &amp; devices</li>
                            <li><i data-feather="check-circle" class="fea icon-sm text-success2 mr-2"></i>Job is done
                                right the first time</li>
                            <li><i data-feather="check-circle" class="fea icon-sm text-success2 mr-2"></i>Wide variety of repair, maintenance and improvements services</li>
                            <li><i data-feather="check-circle" class="fea icon-sm text-success2 mr-2"></i>Technicians
                                have an average of 5 years’ experience in the trades and are fully insured for your
                                safety</li>
                            <li><i data-feather="check-circle" class="fea icon-sm text-success2 mr-2"></i>Mandatory
                                clean up when we’re done</li>
                            <li><i data-feather="check-circle" class="fea icon-sm text-success2 mr-2"></i>Our quality workmanship is guaranteed</li>
                            <li><i data-feather="check-circle" class="fea icon-sm text-success2 mr-2"></i>Professional Quality of Service feedback evaluation with clients</li>
                        </ul>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Showcase End -->
    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 col-12">
                    <img src="{{ asset('assets/images/phun.jpg') }}" class="img-fluid rounded" alt="">
                </div>
                <!--end col-->

                <div class="col-lg-7 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="section-title ml-lg-4">
                        <h4 class="title mb-4">About Our Image</h4>
                        <p class="text-muted">Our experienced, professional home repair and improvement technicians are skilled craftsmen with an average of 5 years of experience in the trades. We’re so confident in the work we perform that each job we do, whether a repair, installation, assembly or organization task, is backed by our Service Delivery Guarantee (DESIGN IMAGE OF WARRANTY LOGO)</p>
                        <p class="text-muted">You don’t have time to spend on a service that’s less than reliable and dependable, and you shouldn’t let just anyone in your home. When you need professional home repairs, maintenance and servicing done at your home, you can trust and depend on FixMaster to get it done rightwith optimum speed and at your affordable cost.
                        </p>
                        <div class="mt-4">
                            <a href="{{ route('page.services') }}" class="btn btn-prim mt-2 mr-2 js-scroll-trigger">Book A Service</a>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--enc container-->
    </section>


@endsection