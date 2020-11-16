@extends('layouts.app')
@section('title', 'Service Details')
@section('contents')
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
<style>
.rating-container {
  /* width: 400px; */
  margin: 0 auto;
  margin-bottom: 3em;
  /* background-color: #EFEFEF; */
  padding: 4px;
}

.inner {
  padding: 1em;
  background-color: white;
  overflow: hidden;
  position: relative;
  -webkit-border-radius: 4px; 
  -moz-border-radius: 4px; 
  border-radius: 4px; 
  margin-left: -10px;
}

.rating {
  float: left;
  width: 45%;
  margin-right: 5%;
  text-align: center;
}

.rating-num {
  color: #333333;
  font-size: 72px;
  font-weight: 100;
  line-height: 1em; 
}

.rating-stars {
  font-size: 20px;
  color: #E3E3E3;
  margin-bottom: .5em;
}
.rating-stars .active {
  color: #737373;
}

.rating-users {
  font-size: 14px;
}

.histo {
  float: left;
  width: 50%;
  font-size: 13px;
}

.histo-star {
  float: left;
  padding: 3px;

}

.histo-rate {
  width: 100%;
  display: block;
  clear: both;
}

.bar-block {
  margin-left: 5px;
  color: black;
  display: block;
  float: left;
  width: 75%;
  position: relative;
}

.bar {
  padding: 4px;
  display: block;
  border-radius: 3px;
}

#bar-five {
  width: 0;
  background-color: #9FC05A;
}

#bar-four {
  width: 0;
  background-color: #ADD633;
}

#bar-three {
  width: 0;
  background-color: #FFD834;
}

#bar-two {
  width: 0;
  background-color: #FFB234;
}

#bar-one {
  width: 0;
  background-color: #FF8B5A;
}

</style>
<section class="section">
    <div class="container" style="margin-top: 3rem;">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="title-heading ml-lg-4 mb-4">
                    <h4 class="title mb-4">Service Details</h4>
                    <p class="text-muted para-desc mb-0 mx-auto">Start working with <span class="texty font-weight-bold">FixMaster</span> that can provide everything you need to make your life easier and better.</p>
                </div>
            </div>
            <!--end col-->
        </div>
        <div class="row mt-4">
            <div class="col-md-5">
                <img src="{{ asset('assets/images/comp.jpg') }}" class="img-fluid rounded" alt="">

                <div class="mt-4 pt-2">
                    <a href="{{ route('login') }}}" class="btn btn-primary">Request Service</a>
                </div>
            </div><!--end col-->

            <div class="col-md-7 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="section-title ml-md-4">
                    <h4 class="title">Computers & Laptops</h4>
                    
                    <h5 class="mt-4 py-2">Description :</h5>
                    <p class="text-muted">With <span>FixMaster</span> you don't have to run to the repair shop every time your PC ends up with a fault, we have a host of tech support we provide. Maybe you need to upgrade your operating system, or install new software, protect against viruses. We do all that!</p>
                
                    <div class="rating-container">
                        <div class="inner">
                            <div class="rating">
                                <span class="rating-num">4.0</span>
                                <div class="rating-stars">
                                    <span><i class="active icon-star text-warning"></i></span>
                                    <span><i class="active icon-star text-warning"></i></span>
                                    <span><i class="active icon-star text-warning"></i></span>
                                    <span><i class="active icon-star text-warning"></i></span>
                                    <span><i class="icon-star"></i></span>
                                </div>
                                <div class="rating-users"><i class="icon-user"></i> 1,014,004 total</div>
                            </div>
                    
                            <div class="histo">
                                <div class="five histo-rate">
                                    <span class="histo-star"> <i class="active icon-star text-warning"></i> 5 </span>
                                    <span class="bar-block">
                                        <span id="bar-five" class="bar"> <span>566,784</span>&nbsp; </span>
                                    </span>
                                </div>
                    
                                <div class="four histo-rate">
                                    <span class="histo-star"> <i class="active icon-star text-warning"></i> 4 </span>
                                    <span class="bar-block">
                                        <span id="bar-four" class="bar"> <span>171,298</span>&nbsp; </span>
                                    </span>
                                </div>
                    
                                <div class="three histo-rate">
                                    <span class="histo-star"> <i class="active icon-star text-warning"></i> 3 </span>
                                    <span class="bar-block">
                                        <span id="bar-three" class="bar"> <span>94,940</span>&nbsp; </span>
                                    </span>
                                </div>
                    
                                <div class="two histo-rate">
                                    <span class="histo-star"> <i class="active icon-star text-warning"></i> 2 </span>
                                    <span class="bar-block">
                                        <span id="bar-two" class="bar"> <span>44,525</span>&nbsp; </span>
                                    </span>
                                </div>
                    
                                <div class="one histo-rate">
                                    <span class="histo-star"> <i class="active icon-star text-warning"></i> 1 </span>
                                    <span class="bar-block">
                                        <span id="bar-one" class="bar"> <span>3,457</span>&nbsp; </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="customer-testi" class="owl-carousel owl-theme">
                        <div class="media customer-testi m-2">
                            <img src="{{ asset('assets/images/taju.jpg') }}" class="avatar avatar-small mr-3 rounded shadow" alt="Tajudeen Tijani">
                            <div class="media-body content p-3 shadow rounded bg-white position-relative">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <p class="text-muted mt-2">Hi, i am Tajudeen from Aba. My employers used FixMaster for the company”s outdoor advertising project based on my recommendation and they more than delivered. They handled the metal fabrication, hoisting and went on to offer a discount on the banner itself. Now that is what i call service delivery. I wouldn”t hesitate to recommend FixMaster.</p>
                                <h6 class="text-primary">- Tajudeen Tijani <small class="text-muted">C.E.O</small></h6>
                            </div>
                        </div>
    
                        <div class="media customer-testi m-2">
                            <img src="{{ asset('assets/images/ifee.jpg') }}" class="avatar avatar-small mr-3 rounded shadow" alt="Ifeoluwa Ajenifuja">
                            <div class="media-body content p-3 shadow rounded bg-white position-relative">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                </ul>
                                <p class="text-muted mt-2">The service is top class. I recommend them if you want to beef up your home, office or company security with top class surveillance systems, electric gates etc. They are the solution to your security problems.</p>
                                <h6 class="text-primary">- Ifeoluwa Ajenifuja <small class="text-muted">M.D</small></h6>
                            </div>
                        </div>
                    </div>


                    
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>
</section>


@section('scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}

<script>
    $(document).ready(function() {
        $('.bar span').hide();
        $('#bar-five').animate({
            width: '90%'}, 1000);
        $('#bar-four').animate({
            width: '75%'}, 1000);
        $('#bar-three').animate({
            width: '50%'}, 1000);
        $('#bar-two').animate({
            width: '30%'}, 1000);
        $('#bar-one').animate({
            width: '19%'}, 1000);
        
        setTimeout(function() {
            $('.bar span').fadeIn('slow');
        }, 1000);

    });
   
</script>
@endsection

@endsection