@extends('layouts.app')
@section('title', 'Contact Us')
@section('contents')
<style>
    .shadow {
        -webkit-box-shadow: 0 0 3px rgba(233, 125, 31, 1) !important;
        box-shadow: 0 0 3px rgba(233, 125, 31, 1) !important;
    }
</style>
<section class="section">
    <div class="container" style="margin-top: 3rem;">
    <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Contact Us</h4>
                    <p class="text-muted para-desc mb-0 mx-auto">Start working with <span class="texty font-weight-bold">FixMaster</span> that can provide everything you need to make your life easier and better.</p>
                </div>
            </div>
            <!--end col-->
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0 order-2 order-md-1">
                <div class="card custom-form rounded shadow border-0">
                    <div class="card-body">
                        <div id="message"></div>
                        <form method="post" action="" name="contact-form" id="contact-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group position-relative">
                                        <label>Your Name <span class="text-danger">*</span></label>
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input name="name" id="name" type="text" class="form-control pl-5" placeholder="Full Name :">
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-6">
                                    <div class="form-group position-relative">
                                        <label>Your Email <span class="text-danger">*</span></label>
                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                        <input name="email" id="email" type="email" class="form-control pl-5" placeholder="E-Mail Address :">
                                    </div> 
                                </div><!--end col-->
                                <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <label>Subject Category <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select">
                                            <option selected="">Select Category</option>
                                            <option value="">Complaint</option>
                                            <option value="">Inquiry</option>
                                            <option value="">Support</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <label>Message</label>
                                        <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                        <textarea name="message" id="message" rows="4" class="form-control pl-5" placeholder="Your Message :"></textarea>
                                    </div>
                                </div>
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <input type="submit" id="submit" name="send" class="submitBnt btn btn-prim btn-block" value="Send Message">
                                    <div id="simple-msg"></div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form--> 
                    </div>
                </div><!--end custom-form-->
            </div><!--end col-->

            <div class="col-lg-6 col-md-6 order-1 order-md-2">
                <div class="title-heading ml-lg-4">
                <h4 class="mb-4">Contact Details</h4>
                    <div class="media contact-detail align-items-center mt-3">
                        <div class="icon">
                            <i data-feather="mail" class="fea icon-m-md text-dark mr-3"></i>
                        </div>
                        <div class="media-body content">
                            <h4 class="title font-weight-bold mb-0">Email</h4>
                            <a href="mailto:info@FixMaster.ng" class="texty">info@FixMaster.ng</a>
                        </div>
                    </div>
                    
                    <div class="media contact-detail align-items-center mt-3">
                        <div class="icon">
                            <i data-feather="phone" class="fea icon-m-md text-dark mr-3"></i>
                        </div>
                        <div class="media-body content">
                            <h4 class="title font-weight-bold mb-0">Phone</h4>
                            <a href="tel:+2348132863878" class="texty">(+234) 0813-286-3878</a>
                        </div>
                    </div>
                    
                    <div class="media contact-detail align-items-center mt-3">
                        <div class="icon">
                            <i data-feather="map-pin" class="fea icon-m-md text-dark mr-3"></i>
                        </div>
                        <div class="media-body content">
                            <h4 class="title font-weight-bold mb-0">Location</h4>
                            <p class="texty">284 Ajose Adeogun Street, Victoria Island, Lagos, Nigeria.</p>
                            
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->


@endsection