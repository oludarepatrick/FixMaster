@extends('layouts.client')
@section('title', 'Settings')
@section('content')
<div class="col-lg-8 col-12">
    <div class="card border-0 rounded shadow">
        <div class="card-body">
            <h5 class="text-md-left text-center">Personal Detail :</h5>

            <div class="mt-3 text-md-left text-center d-sm-flex">
                <img src="{{ asset('assets/images/default-male-avatar.png') }}" class="avatar float-md-left avatar-medium rounded-circle shadow mr-md-4" alt="">
                
                <div class="mt-md-4 mt-3 mt-sm-0">
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm mt-2">Change Picture</a>
                    {{-- <a href="javascript:void(0)" class="btn btn-outline-primary mt-2 ml-2">Delete</a> --}}
                </div>
            </div>

            <form>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group position-relative">
                            <label>First Name</label>
                            <i data-feather="user" class="fea icon-sm icons"></i>
                            <input name="name" id="first" type="text" class="form-control pl-5" placeholder="First Name :">
                        </div>
                    </div><!--end col-->
                    <div class="col-md-6">
                        <div class="form-group position-relative">
                            <label>Last Name</label>
                            <i data-feather="user-check" class="fea icon-sm icons"></i>
                            <input name="name" id="last" type="text" class="form-control pl-5" placeholder="Last Name :">
                        </div>
                    </div><!--end col-->
                    <div class="col-md-4">
                        <div class="form-group position-relative">
                            <label>Your Email</label>
                            <i data-feather="mail" class="fea icon-sm icons"></i>
                            <input name="email" id="email" type="email" class="form-control pl-5" placeholder="Your email :">
                        </div> 
                    </div><!--end col-->
                    <div class="col-md-4">
                        <div class="form-group position-relative">
                            <label>Phone No. :</label>
                            <i data-feather="phone" class="fea icon-sm icons"></i>
                            <input name="number" id="number" type="tel"  maxlength="11" class="form-control pl-5" placeholder="Phone :">
                        </div>
                    </div><!--end col-->
                    <div class="col-md-4">
                        <div class="form-group position-relative">
                            <label>Occupation</label>
                            <i data-feather="bookmark" class="fea icon-sm icons"></i>
                            <input name="name" id="occupation" type="text" class="form-control pl-5" placeholder="Occupation :">
                        </div> 
                    </div><!--end col-->
                    <div class="col-lg-12">
                        <div class="form-group position-relative">
                            <label>Address</label>
                            <i data-feather="map-pin" class="fea icon-sm icons"></i>
                            <textarea name="comments" id="comments" rows="4" class="form-control pl-5" placeholder="Home address :"></textarea>
                        </div>
                    </div>
                </div><!--end row-->
                <div class="row">
                    <div class="col-sm-12">
                        <input type="submit" id="submit" name="send" class="btn btn-primary btn-sm" value="Save Changes">
                    </div><!--end col-->
                </div><!--end row-->
            </form><!--end form-->

            
            <div class="row">
                <div class="col-md-6 mt-4 pt-2">
                    <h5>Card Details :</h5>

                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name of card holder : </label>
                                    <input name="name" id="name" type="text" class="form-control font-weight-bold" required placeholder="Name">
                                </div>
                            </div><!--end col-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Card Number :</label>
                                    <input type="tel" min="0" autocomplete="off" id="cardnumber" maxlength="16" class="form-control font-weight-bold" required placeholder="0000 0000 0000 0000">
                                </div>                                                                               
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expires End :</label>
                                    <input type="tel" min="0" autocomplete="off" id="exdate" class="form-control font-weight-bold" required placeholder="MM/YY" maxlength="2">
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>CVV :</label>
                                    <input type="tel" min="0" autocomplete="off" id="cvv" class="form-control font-weight-bold" required placeholder="CVV" maxlength="3">
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary btn-sm" value="Add Card">
                            </div><!--end col-->
                        </div><!--end row-->
                    </form><!--end form-->
                </div><!--end col-->
                
                <div class="col-md-6 mt-4 pt-2"> 
                    <h5>Change password :</h5>
                    <small class="text-danger">In order to change your password, you need to provide the current password.</small>

                    <form>
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <div class="form-group position-relative">
                                    <label>Old password :</label>
                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                    <input type="password" class="form-control pl-5" placeholder="Old password" required="">
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-12">
                                <div class="form-group position-relative">
                                    <label>New password :</label>
                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                    <input type="password" class="form-control pl-5" placeholder="New password" required="">
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-12">
                                <div class="form-group position-relative">
                                    <label>Re-type New password :</label>
                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                    <input type="password" class="form-control pl-5" placeholder="Re-type New password" required="">
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-12 mt-2 mb-0">
                                <button class="btn btn-primary btn-sm">Save password</button>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div>
</div><!--end col-->
@endsection