@include('layouts.partials._client_navbar')
@section('title', 'Invoice')
    
    <!-- Invoice Start -->
    <section class="bg-invoice bg-light">
        <div class="container">
            <div class="row mt-5 pt-4 pt-sm-0 justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow rounded border-0">
                        <div class="card-body">
                            <div class="invoice-top pb-4 border-bottom">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img src="{{ asset('assets/images/home-fix-logo-colored.png') }}" class="l-dark" style="margin-top: -38px !important;" height="140" alt="FixMaster Logo">

                                        <div class="logo-invoice mb-2">Fix<span class="text-primary">Master</span></div>
                                    <a href="{{ route('page.home') }}" class="text-primary h6"><i data-feather="link" class="fea icon-sm text-muted mr-2"></i>www.homefix.ng</a>
                                    </div><!--end col-->

                                    <div class="col-md-4 mt-4 mt-sm-0">
                                        <h5>Address :</h5>
                                        <dl class="row mb-0">
                                            <dt class="col-2 text-muted"><i data-feather="map-pin" class="fea icon-sm"></i></dt>
                                            <dd class="col-10 text-muted">
                                                <a href="#" class="video-play-icon text-muted">
                                                    <p class="mb-0">284 Ajose Adeogun Street, Victoria Island,</p>
                                                    <p class="mb-0">Lagos, Nigeria</p>
                                                </a>
                                            </dd>

                                            <dt class="col-2 text-muted"><i data-feather="mail" class="fea icon-sm"></i></dt>
                                            <dd class="col-10 text-muted">
                                                <a href="mailto:info@fixmaster.com.ng" class="text-muted">info@fixmaster.com.ng</a>
                                            </dd>

                                            <dt class="col-2 text-muted"><i data-feather="phone" class="fea icon-sm"></i></dt>
                                            <dd class="col-10 text-muted">
                                                <a href="tel:+152534-468-854" class="text-muted">(+234) 0813-286-3878</a>
                                            </dd>
                                        </dl>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>

                            <div class="invoice-middle py-4">
                                <h5>Invoice Details :</h5>
                                <div class="row mb-0">
                                    <div class="col-md-8 order-2 order-md-1">
                                        <dl class="row">
                                            <dt class="col-md-3 col-5 font-weight-normal">Invoice No. :</dt>
                                            <dd class="col-md-9 col-7 text-muted">INV-458456251</dd>
                                            
                                            <dt class="col-md-3 col-5 font-weight-normal">Name :</dt>
                                            <dd class="col-md-9 col-7 text-muted">Femi Joseph</dd>
                                            
                                            <dt class="col-md-3 col-5 font-weight-normal">Address :</dt>
                                            <dd class="col-md-9 col-7 text-muted">
                                                <p class="mb-0">7 Abagbo Close, Victoria Island,</p>
                                                <p>Lagos, Nigeria</p>
                                            </dd>
                                            
                                            <dt class="col-md-3 col-5 font-weight-normal">Phone :</dt>
                                            <dd class="col-md-9 col-7 text-muted">08125456489</dd>
                                        </dl>
                                    </div>

                                    <div class="col-md-4 order-md-2 order-1 mt-2 mt-sm-0">
                                        <dl class="row mb-0">
                                            <dt class="col-md-4 col-5 font-weight-normal">Date :</dt>
                                            <dd class="col-md-8 col-7 text-muted">15th May, 2020</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>

                            <div class="invoice-table pb-4">
                                <div class="table-responsive bg-white shadow rounded">
                                    <table class="table mb-0 table-center invoice-tb">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col" class="text-left">No.</th>
                                                <th scope="col" class="text-left">Item</th>
                                                <th scope="col">Rate</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="text-left">1</th>
                                                <td class="text-left">Generator</td>
                                                <td>₦12,500</td>
                                                <td>₦12,500</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-left">2</th>
                                                <td class="text-left">Service Fee</td>
                                                <td>₦1,500</td>
                                                <td>₦1,500</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-left">3</th>
                                                <td class="text-left">External Service Fee incurred</td>
                                                <td>₦0</td>
                                                <td>₦0</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-5 ml-auto">
                                        <ul class="list-unstyled h5 font-weight-normal mt-4 mb-0">
                                            <li class="text-muted d-flex justify-content-between">Subtotal :<span>₦14,000</span></li>
                                            <li class="text-muted d-flex justify-content-between">Taxes :<span> 0</span></li>
                                            <li class="d-flex justify-content-between">Total :<span>₦14,000</span></li>
                                        </ul>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>

                            <div class="invoice-footer border-top pt-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="text-sm-left text-muted text-center">
                                            <h6 class="mb-0">Customer Service : <a href="tel:08132863878" class="text-warning">(+234) 0813-286-3878</a></h6>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="text-sm-right text-muted text-center">
                                        <h6 class="mb-0">&copy {{ date('Y') }} FixMaster. All Rights Reserved. </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Invoice End -->

    <!-- Footer Start -->
    <footer class="footer footer-bar">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="text-sm-left">
                        <p class="mb-0">© {{ date('Y') }} FixMaster. All Rights Reserved.</p>
                    </div>
                </div><!--end col-->
    
                <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <ul class="list-unstyled text-sm-right mb-0">
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/american-ex.png" class="avatar avatar-ex-sm" title="American Express" alt=""></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/discover.png" class="avatar avatar-ex-sm" title="Discover" alt=""></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/master-card.png" class="avatar avatar-ex-sm" title="Master Card" alt=""></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/paypal.png" class="avatar avatar-ex-sm" title="Paypal" alt=""></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/visa.png" class="avatar avatar-ex-sm" title="Visa" alt=""></a></li>
                    </ul>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </footer><!--end footer-->
    <!-- Footer End -->
    
    <!-- Back to top -->
    <a href="#" class="btn btn-icon btn-soft-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
    <!-- Back to top -->

    <!-- javascript -->
    <script src="{{asset('assets/frontend/js/jquery-3.5.1.min.js')}}"></script>
    {{-- <script src="{{asset('assets/client/js/jquery.min.js')}}"></script> --}}
    <script src="{{asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/scrollspy.min.js')}}"></script>
    <!-- SLIDER -->
    <script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/owl.init.js')}}"></script>
    <!-- Icons -->
    <script src="{{asset('assets/frontend/js/feather.min.js')}}"></script>
    <!-- Switcher -->
    <script src="{{asset('assets/frontend/js/switcher.js')}}"></script>
    <!-- Main Js -->
    <script src="{{asset('assets/frontend/js/app.js')}}"></script>
    <!-- scroll -->
    <script src="{{ asset('assets/frontend/js/scroll.js')}}"></script>
    <script src="{{ asset('assets/frontend/js/typed/lib/typed.js')}}"></script>
</body>
</html>