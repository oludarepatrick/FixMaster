@extends('layouts.auth')
@section('title', 'Login')
@include('layouts.partials._messages')
@section('content')
<style>
.form-group textarea {
    height: 80px !important;
}
</style>
<section class="bg-home bg-circle-gradiant d-flex align-items-center">
    <div class="bg-overlay bg-overlay-white"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="card login_page shadow rounded border-0">
                    <div class="card-body">
                        <div class="align-items-center text-center justify-content-center">   
                            <img src="{{ asset('assets/images/home-fix-logo.png')}}" class="img-fluid d-block mx-auto" alt="FixMaster Logo" style="width: 15em; height: 15em; margin-top: -100px !important; margin-bottom: -60px !important;">
                        </div>
                        <h4 class="card-title text-center texty">Register</h4>
                        <form class="login-form mt-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group position-relative">
                                        <label>First name <span class="text-danger">*</span></label>
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input type="text" class="form-control pl-5" placeholder="First Name"
                                            name="s" required="">
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-md-4">
                                    <div class="form-group position-relative">
                                        <label>Last name <span class="text-danger">*</span></label>
                                        <i data-feather="user-check" class="fea icon-sm icons"></i>
                                        <input type="text" class="form-control pl-5" placeholder="Last Name"
                                            name="s" required="">
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-md-4">
                                    <div class="form-group position-relative">
                                        <label>E-Mail <span class="text-danger">*</span></label>
                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                        <input type="email" class="form-control pl-5" placeholder="Email"
                                            name="email" required="">
                                    </div>
                                </div>
                                <!--end col-->
                                <!--end col-->
                                <div class="col-md-4">
                                    <div class="form-group position-relative">
                                        <label>Telephone <span class="text-danger">*</span></label>
                                        <i data-feather="phone" class="fea icon-sm icons"></i>
                                        <input type="text" class="form-control pl-5" placeholder="Telephone"
                                            required="">
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-md-4">
                                    <div class="form-group position-relative">
                                        <label>L.G.A <span class="text-danger">*</span></label>
                                        <i data-feather="map" class="fea icon-sm icons"></i>
                                        <select class="form-control pl-5">
                                            <option>Select...</option>
                                            <option value="1">Alimosho</option>
                                            <option value="2">Kosofe</option>
                                            <option value="2">Mushin</option>
                                            <option value="2">Oshodi-Isolo</option>
                                            <option value="2">Ojo</option>
                                            <option value="2">Badagry</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-md-4">
                                    <div class="form-group position-relative">
                                        <label>Town/City <span class="text-danger">*</span></label>
                                        <i data-feather="navigation" class="fea icon-sm icons"></i>
                                        <select class="form-control pl-5">
                                            <option>Select...</option>
                                            <option value="1">Abule Ijesha</option>
                                            <option value="2">Bariga</option>
                                            <option value="2">Coker</option>
                                            <option value="2">Eti Osa</option>
                                            <option value="2">Ibeju-Lekki</option>
                                        </select>
                                    </div>
                                </div>

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

                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Full Address <span class="text-danger">*</span></label>
                                        <i data-feather="map-pin" class="fea icon-sm icons"></i>
                                            <textarea class="form-control pl-5" rows="2"></textarea>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">I Accept <a data-toggle="modal" data-target="#terms" href="javascript:void(0)" class="texty">Terms And Condition</a></label>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-lg-12 mb-0">
                                    <button class="btn btn-primary btn-block">Submit</button>
                                </div>
                                <!--end col-->



                                <div class="mx-auto">
                                    <p class="mb-0 mt-3"><small class="text-dark mr-2">Already have an account?</small>
                                    <a href="{{url('login')}}" class="text-dark font-weight-bold">Login</a>
                                    </p>
                                </div>
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div> <!--end container-->

    <!-- Modal Content Start -->
    <div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content rounded shadow border-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Terms & Conditions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <h5>Service Terms & Conditions</h5>

                </div>
                
            </div>
        </div>
    </div>
    <!-- Modal Content End -->

</section>

@endsection
