@extends('layouts.app')
@section('title', 'FAQ')
@section('contents')
{{-- <link href="{{ asset('assets/client/css/style.css') }}" rel="stylesheet" type="text/css" id="theme-opt" /> --}}
<style>
.shadow {
    -webkit-box-shadow: 0 0 3px rgba(233, 125, 31, 1) !important;
    box-shadow: 0 0 3px rgba(233, 125, 31, 1) !important;
}
.bg-light {
    background-color: #e97d1f14 !important;
}
</style>
 <!-- Start Section -->
 <section class="section">
            <div class="container" style="margin-top: 3rem;">
                <div class="row justify-content-center mb-4">
                    <div class="col-12 text-center">
                        <div class="section-title mb-4 pb-2">
                            <h4 class="title mb-4">Frequently Asked Questions</h4>
                            <p class="text-muted para-desc mb-0 mx-auto">Start working with <span class="texty font-weight-bold">FixMaster</span> that can provide everything you need to make your life easier and better.</p>
                        </div>
                    </div>
                    <!--end col-->
                </div>

                <div class="row justify-content-center" style="margin-top: 5rem;">
                    <div class="col-lg-4 col-md-5 col-12 d-none d-md-block">
                        <div class="rounded shadow p-4 sticky-bar">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#tech" class="mouse-down h6 text-dark">General Questions</a></li>
                                <li class="mt-4"><a href="#general" class="mouse-down h6 text-dark">Payments Questions</a></li>
                                <li class="mt-4"><a href="#payment" class="mouse-down h6 text-dark">Security Questions</a></li>
                                <li class="mt-4"><a href="#support" class="mouse-down h6 text-dark">Account & Profile Questions</a></li>
                            </ul>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-8 col-md-7 col-12">
                        <div class="section-title" id="tech">
                            <h4>General Questions</h4>
                        </div>
                        <div class="faq-content mt-4 pt-2">
                            <div class="accordion" id="accordionExampleone">
                                <div class="card border-0 rounded mb-2">
                                        <a data-toggle="collapse" href="#collapsethree" class="faq position-relative collapsed" aria-expanded="true" aria-controls="collapsethree">
                                            <div class="card-header border-0 bg-light p-3 pr-5" id="headingthree">
                                                <h6 class="title mb-0"> What is FixMaster? </h6>
                                            </div>
                                        </a>
                                        <div id="collapsethree" class="collapse" aria-labelledby="headingthree" data-parent="#accordionExampleone">
                                            <div class="card-body px-2 py-4">
                                                <p class="text-muted mb-0 faq-ans">FixMaster is your best trusted one-call solution for a wide range of home maintenance, servicing and repair needs. Our well-trained & certified uniformed technicians are fully insured professionals with robust experience to provide home services to fully meet your needs with singular objective to make you totally relax while your repair requests are professionally handled.</p>
                                            </div>
                                        </div>
                                </div>

                                <div class="card border-0 rounded mb-2">
                                    <a data-toggle="collapse" href="#collapseone" class="faq position-relative collapsed" aria-expanded="false" aria-controls="collapseone">
                                        <div class="card-header border-0 bg-light p-3 pr-5" id="headingfifone">
                                            <h6 class="title mb-0"> Will I need tools or will my CSE bring them?</h6>
                                        </div>
                                    </a>
                                    <div id="collapseone" class="collapse" aria-labelledby="headingfifone" data-parent="#accordionExampleone">
                                        <div class="card-body px-2 py-4">
                                            <p class="text-muted mb-0 faq-ans">CSE's always come prepared with the proper tools and supplies to get your job done right. However, it's always a good idea to be as clear and descriptive in your job description to ensure that nothing important is missed or forgotten!</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-0 rounded mb-2">
                                    <a data-toggle="collapse" href="#collapsetwo" class="faq position-relative collapsed" aria-expanded="false" aria-controls="collapsetwo">
                                        <div class="card-header border-0 bg-light p-3 pr-5" id="headingtwo">
                                            <h6 class="title mb-0"> When should I expect my CSE to get in touch with me?</h6>
                                        </div>
                                    </a>
                                    <div id="collapsetwo" class="collapse" aria-labelledby="headingtwo" data-parent="#accordionExampleone">
                                        <div class="card-body px-2 py-4">
                                            <p class="text-muted mb-0 faq-ans">After your booking is confirmed, <span class="text-primary">FixMaster</span> will send you confirmation emails and messages about your booking and CSE. You can contact your CSE at any time with questions or concerns you might have.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-0 rounded mb-2">
                                    <a data-toggle="collapse" href="#collapsefour" class="faq position-relative collapsed" aria-expanded="false" aria-controls="collapsefour">
                                        <div class="card-header border-0 bg-light p-3 pr-5" id="headingfour">
                                            <h6 class="title mb-0"> When is the Service Fee charged? </h6>
                                        </div>
                                    </a>
                                    <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordionExampleone">
                                        <div class="card-body px-2 py-4">
                                            <p class="text-muted mb-0 faq-ans">FixMaster undertakes both the situation assessment and repair services for both domestic and Corporate clients at a fee payable at the point of request. With the problem identified and quote provided, the customer is required to make full payment for the replacement parts and service charge prior to the commencement of the repair. All services are insured with full money back guarantee.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section-title mt-5" id="general">
                            <h4>Payment Questions</h4>
                        </div>

                        <div class="faq-content mt-4 pt-3">
                            <div class="accordion" id="accordionExampletwo">
                                <div class="card border-0 rounded mb-2">
                                    <a data-toggle="collapse" href="#collapsefive" class="faq position-relative collapsed" aria-expanded="true" aria-controls="collapsefive">
                                        <div class="card-header border-0 bg-light p-3 pr-5" id="headingfive">
                                            <h6 class="title mb-0">How do I make Payment? </h6>
                                        </div>
                                    </a>
                                    <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordionExampletwo">
                                        <div class="card-body px-2 py-4">
                                            <p class="text-muted mb-0 faq-ans">All financial transactions by the Client are undertaking via a secure online platform accessed via the FixMaster user account. At no point in the process is the Client to paid cash to the vendor or suppliers for either service provided, or parts replaced. Payments of Vendors and Suppliers claims are effected at the completion of the task/order in accord with the agreed financial settlement schedule..</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section-title mt-5" id="payment">
                            <h4>Security Questions</h4>
                        </div>

                        <div class="faq-content mt-4 pt-3">
                            <div class="accordion" id="accordionExamplethree">
                                <div class="card border-0 rounded mb-2">
                                    <a data-toggle="collapse" href="#collapseten" class="faq position-relative collapsed" aria-expanded="true" aria-controls="collapseten">
                                        <div class="card-header border-0 bg-light p-3 pr-5" id="headingten">
                                            <h6 class="title mb-0"> Identifying a legit <span class="text-primary">FixMaster</span> CSE </h6>
                                        </div>
                                    </a>
                                    <div id="collapseten" class="collapse" aria-labelledby="headingten" data-parent="#accordionExamplethree">
                                        <div class="card-body px-2 py-4">
                                            <p class="text-muted mb-0 faq-ans"><span class="text-primary">FixMaster</span> CSE's assigned to a service request must carry Identification Cards with their name, picture and recruitment number clearly displaced. Clients are to ensure the information on the card matches the exact details shared by Security Code generated at the point of request for Service Request.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-0 rounded mb-2">
                                    <a data-toggle="collapse" href="#collapseeleven" class="faq position-relative collapsed" aria-expanded="false" aria-controls="collapseeleven">
                                        <div class="card-header border-0 bg-light p-3 pr-5" id="headingeleven">
                                            <h6 class="title mb-0"> Your Safety is our concern</h6>
                                        </div>
                                    </a>
                                    <div id="collapseeleven" class="collapse" aria-labelledby="headingeleven" data-parent="#accordionExamplethree">
                                        <div class="card-body px-2 py-4">
                                            <p class="text-muted mb-0 faq-ans">FixMaster considers the safety of the Clients as its topmost priority. To this end, Clients are advised to transact only with assigned CSE's whose details has been shared with the client. At no point should cash be given to any CSE for services provided or goods replaced. To ensure safety of life and property: only goods from pre-qualified suppliers will be installed by the CSE.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="section-title mt-5" id="support">
                            <h4>Account & Profile Questions</h4>
                        </div>

                        <div class="faq-content mt-4 pt-3">
                            <div class="accordion" id="accordionExamplefour">
                                <div class="card border-0 rounded mb-2">
                                    <a data-toggle="collapse" href="#collapsefifthenn" class="faq position-relative collapsed" aria-expanded="true" aria-controls="collapsefifthenn">
                                        <div class="card-header border-0 bg-light p-3 pr-5" id="headingfiftheen">
                                            <h6 class="title mb-0"> How To Register? </h6>
                                        </div>
                                    </a>
                                    <div id="collapsefifthenn" class="collapse" aria-labelledby="headingfiftheen" data-parent="#accordionExamplefour">
                                        <div class="card-body px-2 py-4">
                                            <p class="text-muted mb-0 faq-ans">Clients in need of a professional Technicians/Artisans are to click on the “Register” button on the Get Started dropdown option on the navigation bar to fill-in the Registration form. Suppliers/Technicians/Artisans are required to click on the “Join Us” button at the navigation bar and fill-in the Registration form.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-0 rounded mb-2">
                                    <a data-toggle="collapse" href="#collapsesixteen" class="faq position-relative collapsed" aria-expanded="false" aria-controls="collapsesixteen">
                                        <div class="card-header border-0 bg-light p-3 pr-5" id="headingsixteen">
                                            <h6 class="title mb-0"> How do I update my Account Information? </h6>
                                        </div>
                                    </a>
                                    <div id="collapsesixteen" class="collapse" aria-labelledby="headingsixteen" data-parent="#accordionExamplefour">
                                        <div class="card-body px-2 py-4">
                                            <p class="text-muted mb-0 faq-ans">Anyworkman account holders can edit and update settings only when he/she is logged into the account. By clicking on the Login button on the Get Started dropdown option on the navigation bar, the user account setting can be accessed and edited.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-0 rounded mb-2">
                                    <a data-toggle="collapse" href="#collapseseventeen" class="faq position-relative collapsed" aria-expanded="false" aria-controls="collapseseventeen">
                                        <div class="card-header border-0 bg-light p-3 pr-5" id="headingseventeen">
                                            <h6 class="title mb-0"> I forgot my password, how do I reset it? </h6>
                                        </div>
                                    </a>
                                    <div id="collapseseventeen" class="collapse" aria-labelledby="headingseventeen" data-parent="#accordionExamplefour">
                                        <div class="card-body px-2 py-4">
                                            <p class="text-muted mb-0 faq-ans">Account login detail/credential can be recovered by clicking on the “forgot your password?” button found at the bottom of the login dialogue box. By clicking on this button, the email that was registered by the user would be required to complete the process.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container justify-content-center mt-100 mt-60">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="media align-items-center shadow rounded p-4 features">
                            <div class="icons m-0 rounded h2 text-primary text-center px-3">
                                <i class="uil uil-envelope-check"></i>
                            </div>
                            <div class="content ml-4">
                                <h5 class="mb-1"><a href="javascript:void(0)" class="text-dark">Want To Ask Specific Question?</a></h5>
                                <p class="text-muted mb-0">This is required when your concern is not yet available in this FAQ section.</p>
                                <div class="mt-2">
                                    <a href="{{ route('page.contact') }}" class="btn btn-sm btn-soft-primary">Send</a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End Section -->

@endsection