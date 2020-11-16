 @extends('layouts.app')
@section('contents')
  <div class="back-to-home rounded d-none d-sm-block">
        <a href="{{url('/')}}" class="btn btn-icon btn-soft-primary1"><i data-feather="home" class="icons"></i></a>
    </div>

    <!-- Hero Start -->
    <section class="cover-user bg-white">
        <div class="container-fluid px-0">
            <div class="row no-gutters position-relative">
                <div class="col-lg-4 cover-my-30 order-2">
                    <div class="cover-user-img d-flex align-items-center">
                        <div class="row">
                            <div class="col-12">
                                <div class="card login-page border-0" style="z-index: 1">
                                    <div class="card-body p-0">
                                        <h4 class="card-title text-center texty">Login</h4>  
                                        <form class="login-form mt-4">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group position-relative">
                                                        <label>Your Email <span class="text-danger">*</span></label>
                                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                                        <input type="email" class="form-control pl-5" placeholder="Email" name="email" required="">
                                                    </div>
                                                </div><!--end col-->
    
                                                <div class="col-lg-12">
                                                    <div class="form-group position-relative">
                                                        <label>Password <span class="text-danger">*</span></label>
                                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                                        <input type="password" class="form-control pl-5" placeholder="Password" required="">
                                                    </div>
                                                </div><!--end col-->
    
                                                <div class="col-lg-12">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                <label class="custom-control-label" for="customCheck1">Remember me</label>
                                                            </div>
                                                        </div>
                                                        <p class="forgot-pass mb-0"><a href="forgotPass.html" class="text-dark font-weight-bold">Forgot password ?</a></p>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-lg-12 mb-0">
                                                    <button class="btn btn-prim btn-block">Login</button>
                                                </div><!--end col-->

                                                <div class="col-12 text-center">
                                                    <p class="mb-0 mt-5"><small class="text-dark mr-2">Don't have an account ?</small> <a href="{{url('register')}}" class="text-dark font-weight-bold">Sign Up</a></p>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div> <!-- end about detail -->
                </div> <!-- end col -->    

                <div class="col-lg-8 offset-lg-4 padding-less img order-1" style="background-image:url('images/royco.jpg')" data-jarallax='{"speed": 0.5}'></div><!-- end col -->    
            </div><!--end row-->
        </div><!--end container fluid-->
    </section><!--end section-->
    <!-- Hero End -->

@endsection