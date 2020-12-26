@extends('layouts.app')
@section('contents')
<div class="back-to-home rounded d-none d-sm-block">
        <a href="{{url('/')}}" class="btn btn-icon btn-soft-primary1"><i data-feather="home" class="icons"></i></a>
    </div>

    <!-- Hero Start -->
    <section class="bg-home d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                
                <div class="col-lg-7 col-md-6 mt-2 pt-2 mt-sm-0 pt-sm-0 about_image">
                    <img src="images/regim2.jpg" alt="about" class="about_image-4">
                    <img src="images/electrician.jpg" alt="about" class="about_image-5">
                    <img src="images/plumber.jpg" alt="about" class="about_image-6">
                </div>
                <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card login_page shadow rounded border-0">
                        <div class="card-body">
                            <h4 class="card-title text-center texty">Register</h4>
                            <form class="login-form mt-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>First name <span class="text-danger">*</span></label>
                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                            <input type="text" class="form-control pl-5" placeholder="First Name"
                                                name="s" required="">
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Last name <span class="text-danger">*</span></label>
                                            <i data-feather="user-check" class="fea icon-sm icons"></i>
                                            <input type="text" class="form-control pl-5" placeholder="Last Name"
                                                name="s" required="">
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Your Email <span class="text-danger">*</span></label>
                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                            <input type="email" class="form-control pl-5" placeholder="Email"
                                                name="email" required="">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <!--end col-->
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Telephone<span class="text-danger">*</span></label>
                                            <i data-feather="phone" class="fea icon-sm icons"></i>
                                            <input type="text" class="form-control pl-5" placeholder="Telephone"
                                                required="">
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Password <span class="text-danger">*</span></label>
                                            <i data-feather="key" class="fea icon-sm icons"></i>
                                            <input type="password" class="form-control pl-5" placeholder="Password"
                                                required="">
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Confirm Password <span class="text-danger">*</span></label>
                                            <i data-feather="key" class="fea icon-sm icons"></i>
                                            <input type="password" class="form-control pl-5"
                                                placeholder="Confirm Password" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>State Of Residence <span class="text-danger">*</span></label>
                                            <i data-feather="map" class="fea icon-sm icons"></i>
                                            <select class="form-control pl-5">
                                                <option>Lagos</option>
                                                <option>Ogun</option>
                                                <option>Osun</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Area Of Residence<span class="text-danger">*</span></label>
                                            <i data-feather="navigation" class="fea icon-sm icons"></i>
                                            <select class="form-control pl-5">
                                                <option>Select your area</option>
                                                <option value="">Ifo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group position-relative">
                                            <label>Address<span class="text-danger">*</span></label>
                                            <i data-feather="map-pin" class="fea icon-sm icons"></i>
                                            <input type="text" class="form-control pl-5" placeholder="Full Address"
                                                required="">
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">I Accept <a
                                                        href="#" class="texty">Terms And Condition</a></label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-md-12">
                                        <button class="btn btn-prim btn-block">Register</button>
                                    </div>
                                    <!--end col-->



                                    <div class="mx-auto">
                                        <p class="mb-0 mt-3"><small class="text-dark mr-2">Already have an account
                                                ?</small>
                                            <a href="{{url('login')}}" class="text-dark font-weight-bold">Submit</a>
                                        </p>
                                    </div>
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    
@endsection