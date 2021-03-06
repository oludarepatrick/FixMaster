@extends('layouts.client')
@section('title', 'Messages')
@section('content')

<div class="col-lg-8 col-12">
    <div class="rounded shadow p-4">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Messages:</h5>
            <a href="javascript:void(0)" data-toggle="modal" data-target="#message-modal" class="btn btn-primary btn-sm"><i data-feather="plus" class="fea icon-sm"></i> Message FixMaster</a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 mt-4 pt-2 text-center">
                <ul class="nav nav-pills nav-justified flex-column flex-sm-row rounded" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link rounded active" id="inbox-tab" data-toggle="pill" href="#inbox" role="tab" aria-controls="inbox" aria-selected="false">
                            <div class="text-center pt-1 pb-1">
                                <h4 class="title font-weight-normal mb-0">Inbox</h4>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->
                    
                    <li class="nav-item">
                        <a class="nav-link rounded" id=sent-tab" data-toggle="pill" href="#sent" role="tab" aria-controls="sent" aria-selected="false">
                            <div class="text-center pt-1 pb-1">
                                <h4 class="title font-weight-normal mb-0">Sent</h4>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->
                </ul><!--end nav pills-->
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="inbox" role="tabpanel" aria-labelledby="inbox-tab">
                <div class="d-flex border-bottom p-3">
                    <a href="javascript:void(0)">
                        <div class="media ml-2">
                            <img src="{{ asset('assets/images/home-fix-logo-colored.png') }}" class="avatar avatar-md-sm rounded-pill shadow" alt="">
                            <div class="content ml-3">
                                <h6 class="text-dark">FixMaster</h6>
                                <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy</p>
                            </div>
                        </div>
                    </a>
                </div> 

                <div class="d-flex border-bottom bg-light p-3">
                    <a href="javascript:void(0)">
                        <div class="media ml-2">
                            <img src="{{ asset('assets/images/default-male-avatar.png') }}" class="avatar avatar-md-sm rounded-pill shadow" alt="">
                            <div class="content ml-3">
                                <h6 class="text-dark">Godfrey Diwa</h6>
                                <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy</p>
                            </div>
                        </div>
                    </a>
                </div> 

                <div class="d-flex border-bottom p-3">
                    <a href="javascript:void(0)">
                        <div class="media ml-2">
                            <img src="{{ asset('assets/images/home-fix-logo-colored.png') }}" class="avatar avatar-md-sm rounded-pill shadow" alt="">
                            <div class="content ml-3">
                                <h6 class="text-dark">FixMaster</h6>
                                <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy</p>
                            </div>
                        </div>
                    </a>
                </div>  

                <div class="d-flex border-bottom bg-light p-3">
                    <a href="javascript:void(0)">
                        <div class="media ml-2">
                            <img src="{{ asset('assets/images/default-male-avatar.png') }}" class="avatar avatar-md-sm rounded-pill shadow" alt="">
                            <div class="content ml-3">
                                <h6 class="text-dark">Rilwan Bello</h6>
                                <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy</p>
                            </div>
                        </div>
                    </a>
                </div> 

                <div class="d-flex border-bottom p-3">
                    <a href="javascript:void(0)">
                        <div class="media ml-2">
                            <img src="{{ asset('assets/images/home-fix-logo-colored.png') }}" class="avatar avatar-md-sm rounded-pill shadow" alt="">
                            <div class="content ml-3">
                                <h6 class="text-dark">FixMaster</h6>
                                <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy</p>
                            </div>
                        </div>
                    </a>
                </div>  

                <div class="d-flex border-bottom bg-light p-3">
                    <a href="javascript:void(0)">
                        <div class="media ml-2">
                            <img src="{{ asset('assets/images/default-female-avatar.png') }}" class="avatar avatar-md-sm rounded-pill shadow" alt="">
                            <div class="content ml-3">
                                <h6 class="text-dark">Mayowa Olaoye</h6>
                                <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy</p>
                            </div>
                        </div>
                    </a>
                </div> 

                <div class="d-flex border-bottom p-3">
                    <a href="javascript:void(0)">
                        <div class="media ml-2">
                            <img src="{{ asset('assets/images/home-fix-logo-colored.png') }}" class="avatar avatar-md-sm rounded-pill shadow" alt="">
                            <div class="content ml-3">
                                <h6 class="text-dark">FixMaster</h6>
                                <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy</p>
                            </div>
                        </div>
                    </a>
                </div> 

                <div class="d-flex border-bottom bg-light p-3">
                    <a href="javascript:void(0)">
                        <div class="media ml-2">
                            <img src="{{ asset('assets/images/default-male-avatar.png') }}" class="avatar avatar-md-sm rounded-pill shadow" alt="">
                            <div class="content ml-3">
                                <h6 class="text-dark">Godfrey Diwa</h6>
                                <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="tab-pane fade show" id="sent" role="tabpanel" aria-labelledby="sent-tab">
                <div class="d-flex border-bottom bg-light p-3">
                    <a href="javascript:void(0)">
                        <div class="media ml-2">
                            <img src="{{ asset('assets/images/default-female-avatar.png') }}" class="avatar avatar-md-sm rounded-pill shadow" alt="">
                            <div class="content ml-3">
                                <h6 class="text-dark">Mayowa Olaoye</h6>
                                <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy</p>
                            </div>
                        </div>
                    </a>
                </div> 

                <div class="d-flex border-bottom p-3">
                    <a href="javascript:void(0)">
                        <div class="media ml-2">
                            <img src="{{ asset('assets/images/home-fix-logo-colored.png') }}" class="avatar avatar-md-sm rounded-pill shadow" alt="">
                            <div class="content ml-3">
                                <h6 class="text-dark">FixMaster</h6>
                                <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy</p>
                            </div>
                        </div>
                    </a>
                </div> 

                <div class="d-flex border-bottom bg-light p-3">
                    <a href="javascript:void(0)">
                        <div class="media ml-2">
                            <img src="{{ asset('assets/images/default-male-avatar.png') }}" class="avatar avatar-md-sm rounded-pill shadow" alt="">
                            <div class="content ml-3">
                                <h6 class="text-dark">Godfrey Diwa</h6>
                                <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div><!--end col-->


<!-- Modal Content Start -->
<div class="modal fade" id="message-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded shadow border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Send Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form class="rounded shadow p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label>Subject <span class="text-danger">*</span></label>
                                <i data-feather="alert-circle" class="fea icon-sm icons"></i>
                                <input name="name" id="name" type="text" class="form-control pl-5">
                            </div>
                        </div><!--end col-->

                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label>Message <span class="text-danger">*</span></label>
                                <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                <textarea name="message" id="message" rows="4" class="form-control pl-5" placeholder="Your message :"></textarea>
                            </div>
                        </div>
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" id="submit" name="send" class="submitBnt btn btn-primary submit-message">Submit</button>
                        </div><!--end col-->
                    </div><!--end row-->

                </form><!--end form-->
            </div>
            
        </div>
    </div>
</div>
<!-- Modal Content End -->

@section('scripts')
<script>
    $(document).ready(function() {

        $(document).on('click', '.submit-message', function(){
            const Toast = swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 8000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
            Toast.fire({
                    icon: 'success',
                    type: 'success',
                    title: 'Message has been sent'
                })
            });

    });
   
</script>
@endsection
@endsection