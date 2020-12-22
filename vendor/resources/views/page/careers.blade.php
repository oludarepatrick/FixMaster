@extends('layouts.app')
@section('title', 'Join Us')
@section('contents')

<section class="section bg-light">
    <div class="container" style="margin-top: 3rem;">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <h4 class="title mb-4">We are Hiring!</h4>
                    <p class="text-muted para-desc mx-auto mb-0"> <span>FixMaster</span> is always looking for service professionals who are experts in their trade and provide great service to their customers ranging from Customer Service Executives(CSE's) to Technicians to Suppliers. The best home service professionals use <span>FixMaster</span> for the great pay and flexible scheduling.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        {{-- <div class="row">
            <div class="col-md-4 mt-4 pt-2">
                <div class="card features work-process bg-transparent process-arrow border-0 text-center">
                    <div class="icons rounded h1 text-center text-primary px-3">
                        <i class="uil uil-channel-add"></i>
                    </div>

                    <div class="card-body">
                        <h4 class="title text-dark">Customer Service Executive(CSE)</h4>
                        <p class="text-muted mb-0">Brief job description here...</p>
                        <div class="mt-4">
                            <button type="button" class="btn btn-prim mt-2 mr-2 js-scroll-trigger register-cse">Apply</button>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-md-4 mt-md-5 pt-md-3 mt-4 pt-2">
                <div class="card features work-process bg-transparent process-arrow border-0 text-center">
                    <div class="icons rounded h1 text-center text-primary px-3">
                        <i class="uil uil-truck-loading"></i>
                    </div>

                    <div class="card-body">
                        <h4 class="title text-dark">Technicians & Artisans</h4>
                        <p class="text-muted mb-0">Brief job description here...</p>
                        <div class="mt-4">
                            <button type="button" class="btn btn-prim mt-2 mr-2 js-scroll-trigger register-technician">Apply</button>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-md-4 mt-md-5 pt-md-5 mt-4 pt-2">
                <div class="card features work-process bg-transparent d-none-arrow border-0 text-center">
                    <div class="icons rounded h1 text-center text-primary px-3">
                        <i class="uil uil-shopping-cart"></i>
                    </div>

                    <div class="card-body">
                        <h4 class="title text-dark">Suppliers</h4>
                        <p class="text-muted mb-0">Brief job description here...</p>
                        <div class="mt-4">
                            <button type="button" class="btn btn-prim mt-2 mr-2 js-scroll-trigger register-supplier">Apply</button>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row--> --}}

        <div class="row float-center text-center justify-content-center align-items-center mt-100">
            <div class="col-md-4 col-12">
                <div class="features">
                    <div class="icons rounded h1 text-center text-primary px-3 position-relative d-inline-block">
                        <i class="uil uil-channel-add"></i>
                    </div>

                    <div class="content mt-4">
                        <h4 class="title-2">Customer Service Executive(CSE)</h4>
                        <p class="text-muted mb-0">Brief description here...</p>
                        <div class="mt-4">
                            <button type="button" class="btn btn-prim mt-2 mr-2 js-scroll-trigger register-cse">Apply</button>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-md-4 col-12 mt-5 mt-sm-0">
                <div class="features">
                    <div class="icons rounded h1 text-center text-primary px-3 position-relative d-inline-block">
                        <i class="uil uil-truck-loading"></i>
                    </div>

                    <div class="content mt-4">
                        <h4 class="title-2">Technicians & Artisans</h4>
                        <p class="text-muted mb-0">Brief description here...</p>
                        <div class="mt-4">
                            <button type="button" class="btn btn-prim mt-2 mr-2 js-scroll-trigger register-technician">Apply</button>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-md-4 col-12 mt-5 mt-sm-0">
                <div class="features">
                    <div class="icons rounded h1 text-center text-primary px-3 position-relative d-inline-block">
                        <i class="uil uil-shopping-cart"></i>
                    </div>

                    <div class="content mt-4">
                        <h4 class="title-2">Suppliers</h4>
                        <p class="text-muted mb-0">Brief job description here...</p>
                        <div class="mt-4">
                            <button type="button" class="btn btn-prim mt-2 mr-2 js-scroll-trigger register-supplier">Apply</button>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->


    </div><!--end container-->

    <div class="container mt-100 mt-60">
        <div class="row justify-content-center cse-registration d-none down">
            <div class="col-lg-10 col-md-12">
                <div class="card custom-form border-0">
                    <div class="card-body">
                        <h4 class="title mb-4">CSE Application Form</h4>
                        <form class="rounded shadow p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input name="name" id="name" type="text" class="form-control pl-5">
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Last Name <span class="text-danger">*</span></label>
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input name="name" id="name" type="text" class="form-control pl-5">
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Your Email <span class="text-danger">*</span></label>
                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                        <input name="email" id="email" type="tel" class="form-control pl-5">
                                    </div> 
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Phone Number <span class="text-danger">*</span></label>
                                        <i data-feather="phone" class="fea icon-sm icons"></i>
                                        <input name="email" id="email" type="tel" maxlength="11" class="form-control pl-5">
                                    </div> 
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Address <span class="text-danger">*</span></label>
                                        <i data-feather="map-pin" class="fea icon-sm icons"></i>
                                        <textarea name="message" id="message" rows="4" class="form-control pl-5" placeholder="Your residential address :"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Are you 18yrs or above?<span class="text-danger">*</span></label>
                                        <div class="form-row ml-1">
                                            <div class="custom-control custom-radio ">
                                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio3">Yes</label>
                                            </div>
                                        
                                            <div class="custom-control custom-radio ml-4">
                                                <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">No</label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Do you have previous Work Experience?<span class="text-danger">*</span></label>
                                        <div class="form-row ml-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="work_experience_yes" name="work_experience" class="custom-control-input">
                                                <label class="custom-control-label" for="work_experience_yes">Yes</label>
                                            </div>
                                        
                                            <div class="custom-control custom-radio ml-4">
                                                <input type="radio" id="work_experience_no" name="work_experience" class="custom-control-input">
                                                <label class="custom-control-label" for="work_experience_no">No</label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->

                            <div class="row previous-employment d-none">
                                <div class="col-md-4">
                                    <div class="form-group position-relative">
                                        <label>Company Name <span class="text-danger">*</span></label>
                                        <i data-feather="home" class="fea icon-sm icons"></i>
                                        <input name="name" id="name" type="text" class="form-control pl-5">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group position-relative">
                                        <label>Start Date <span class="text-danger">*</span></label>
                                        <i data-feather="calendar" class="fea icon-sm icons"></i>
                                        <input name="name" id="name" type="date" class="form-control pl-5">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group position-relative">
                                        <label>End Date <span class="text-danger">*</span></label>
                                        <i data-feather="calendar" class="fea icon-sm icons"></i>
                                        <input name="name" id="name" type="date" class="form-control pl-5">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group position-relative">
                                        <label></label>
                                        <button type="button" class="form-control pl-5 mt-1 btn btn-icon btn-primary btn-block add-company"><i data-feather="plus" class="icons"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div id="add-companies"></div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Have you been convicted of any crime within the last five years?<span class="text-danger">*</span></label>
                                        <div class="form-row ml-1">
                                            <div class="custom-control custom-radio form-group position-relative">
                                                <input type="radio" id="convicted_yes" name="convicted" class="custom-control-input">
                                                <label class="custom-control-label" for="convicted_yes">Yes</label>
                                            </div>
                                        
                                            <div class="custom-control custom-radio form-group position-relative ml-4">
                                                <input type="radio" id="convicted_no" name="convicted" class="custom-control-input">
                                                <label class="custom-control-label" for="convicted_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>If hired, are you willing to submit to and pass a controlled substance test?<span class="text-danger">*</span></label>
                                        <div class="form-row ml-1">
                                            <div class="custom-control custom-radio form-group position-relative">
                                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio3">Yes</label>
                                            </div>
                                        
                                            <div class="custom-control custom-radio form-group position-relative ml-4">
                                                <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">No</label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div><!--end col-->
                            </div>
                            
                            <div class="row convicted d-none">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Nature of Crime <span class="text-danger">*</span></label>
                                        <i data-feather="hexagon" class="fea icon-sm icons"></i>
                                        <input name="name" id="name" type="text" class="form-control pl-5">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label> Date of Conviction<span class="text-danger">*</span></label>
                                        <i data-feather="calendar" class="fea icon-sm icons"></i>
                                        <input name="namer" id="name" type="date" class="form-control pl-5">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Can you work evenings?<span class="text-danger">*</span></label>
                                        <div class="form-row ml-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio3">Yes</label>
                                            </div>
                                        
                                            <div class="custom-control custom-radio ml-4">
                                                <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Are you available to work overtime?<span class="text-danger">*</span></label>
                                        <div class="form-row ml-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio3">Yes</label>
                                            </div>
                                        
                                            <div class="custom-control custom-radio ml-4">
                                                <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Do you own or have access to a car, bike or van that you can use for transport?<span class="text-danger">*</span></label>
                                        <div class="form-row ml-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio3">Yes</label>
                                            </div>
                                        
                                            <div class="custom-control custom-radio ml-4">
                                                <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>If yes, Which do you own?<span class="text-danger">*</span></label>
                                        <select class="form-control custom-select" id="Sortbylist-Shop">
                                            <option>Select...</option>
                                            <option>Bus</option>
                                            <option>Car</option>
                                            <option>Motorcycle</option>
                                            <option>Van/Pickup Truck</option>
                                        </select>
                                    </div>
                                </div><!--end col-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Do you believe you have what it takes to succeed as a CSE?<span class="text-danger">*</span></label>
                                        <div class="form-row ml-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio3">Yes</label>
                                            </div>
                                        
                                            <div class="custom-control custom-radio ml-4">
                                                <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>If yes, Tell us why<span class="text-danger">*</span></label>
                                        <i data-feather="book" class="fea icon-sm icons"></i>
                                        <textarea name="message" id="message" rows="2" class="form-control pl-5" placeholder=""></textarea>
                                    </div>
                                </div><!--end col-->
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Upload Your Cv(DOC, DOCX or PDF) :</label>
                                            <input type="file" class="form-control-file" id="fileupload">
                                        </div>                                                                            
                                    </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">I Accept <a data-toggle="modal" data-target="#terms" href="javascript:void(0)" class="texty">Terms And Condition</a></label>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Apply Now">
                                </div><!--end col-->
                            </div><!--end row-->

                        </form><!--end form-->
                    </div> 
                </div><!--end custom-form-->
            </div>  
        </div>

        <div class="row justify-content-center technician-registration d-none down-1">
            <div class="col-lg-10 col-md-12">
                <div class="card custom-form border-0">
                    <div class="card-body">
                        <h4 class="title mb-4">Technician/Artisan Application Form</h4>
                        <form class="rounded shadow p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input name="name" id="name" type="text" class="form-control pl-5">
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Last Name <span class="text-danger">*</span></label>
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input name="name" id="name" type="text" class="form-control pl-5">
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Your Email <span class="text-danger">*</span></label>
                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                        <input name="email" id="email" type="tel" class="form-control pl-5">
                                    </div> 
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Phone Number <span class="text-danger">*</span></label>
                                        <i data-feather="phone" class="fea icon-sm icons"></i>
                                        <input name="email" id="email" type="tel" maxlength="11" class="form-control pl-5">
                                    </div> 
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Address <span class="text-danger">*</span></label>
                                        <i data-feather="map-pin" class="fea icon-sm icons"></i>
                                        <textarea name="message" id="message" rows="4" class="form-control pl-5" placeholder="Your residential address :"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group position-relative">
                                        <label>Area of Specialization <span class="text-danger">*</span></label>
                                        <i data-feather="briefcase" class="fea icon-sm icons"></i>
                                        <input name="area_of_specialization" id="area_of_specialization" type="text" class="form-control pl-5">
                                    </div> 
                                </div><!--end col-->

                                <div class="col-md-4">
                                    <div class="form-group position-relative">
                                        <label>Years of Experience <span class="text-danger">*</span></label>
                                        <i data-feather="calendar" class="fea icon-sm icons"></i>
                                        <input name="years_of_experience" id="years_of_experience" type="number" class="form-control pl-5" maxlength="2">
                                    </div> 
                                </div><!--end col-->

                                <div class="col-md-4">
                                    <div class="form-group position-relative">
                                        <label>Highest Education<span class="text-danger">*</span></label>
                                        <select class="form-control custom-select" id="Sortbylist-Shop">
                                            <option>Select...</option>
                                            <option>None</option>
                                            <option>Primary School</option>
                                            <option>Secondary School</option>
                                            <option>Vocational/Technical School</option>
                                            <option>College of Education</option>
                                            <option>Polytechnic</option>
                                            <option>Univeristy</option>
                                        </select>
                                    </div>
                                </div><!--end col-->

                            </div><!--end row-->

                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Apply Now">
                                </div><!--end col-->
                            </div><!--end row-->

                        </form><!--end form-->
                    </div> 
                </div><!--end custom-form-->
            </div>  
        </div>

        <div class="row justify-content-center supplier-registration d-none down-2">
            <div class="col-lg-10 col-md-12">
                <div class="card custom-form border-0">
                    <div class="card-body">
                        <h4 class="title mb-4">Supplier Application Form</h4>
                        <form class="rounded shadow p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input name="name" id="name" type="text" class="form-control pl-5">
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Last Name <span class="text-danger">*</span></label>
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input name="name" id="name" type="text" class="form-control pl-5">
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Your Email <span class="text-danger">*</span></label>
                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                        <input name="email" id="email" type="tel" class="form-control pl-5">
                                    </div> 
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Phone Number <span class="text-danger">*</span></label>
                                        <i data-feather="phone" class="fea icon-sm icons"></i>
                                        <input name="email" id="email" type="tel" maxlength="11" class="form-control pl-5">
                                    </div> 
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Address <span class="text-danger">*</span></label>
                                        <i data-feather="map-pin" class="fea icon-sm icons"></i>
                                        <textarea name="message" id="message" rows="4" class="form-control pl-5" placeholder="Your residential address :"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group position-relative">
                                        <label>Business Name <span class="text-danger">*</span></label>
                                        <i data-feather="briefcase" class="fea icon-sm icons"></i>
                                        <input name="business_name" id="business_name" type="text" class="form-control pl-5">
                                    </div> 
                                </div><!--end col-->

                                <div class="col-md-4">
                                    <div class="form-group position-relative">
                                        <label>Years of Business <span class="text-danger">*</span></label>
                                        <i data-feather="calendar" class="fea icon-sm icons"></i>
                                        <input name="years_of_business" id="years_of_business" type="number" class="form-control pl-5" maxlength="2">
                                    </div> 
                                </div><!--end col-->

                                <div class="col-md-4">
                                    <div class="form-group position-relative">
                                        <label>Highest Education<span class="text-danger">*</span></label>
                                        <select class="form-control custom-select" id="Sortbylist-Shop">
                                            <option>Select...</option>
                                            <option>None</option>
                                            <option>Primary School</option>
                                            <option>Secondary School</option>
                                            <option>Vocational/Technical School</option>
                                            <option>College of Education</option>
                                            <option>Polytechnic</option>
                                            <option>Univeristy</option>
                                        </select>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Business Description <span class="text-danger">*</span></label>
                                        <i data-feather="book-open" class="fea icon-sm icons"></i>
                                        <textarea name="message" id="message" rows="2" class="form-control pl-5"></textarea>
                                    </div>
                                </div>

                            </div><!--end row-->

                            

                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Apply Now">
                                </div><!--end col-->
                            </div><!--end row-->

                        </form><!--end form-->
                    </div> 
                </div><!--end custom-form-->
            </div>  
        </div>

    </div><!--end container-->
</section><!--end section-->

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
                <h5>CSE Application Terms & Conditions</h5>
                <ul class="list-unstyled text-mute">
                    <li><i data-feather="arrow-right" class="fea icon-sm mr-2"></i>I certify that the information contained in this application is true and complete.</li>
                    <li><i data-feather="arrow-right" class="fea icon-sm mr-2"></i>I understand that false information may be grounds for not hiring me or for immediate termination of the contract, if selected.</li>
                    <li><i data-feather="arrow-right" class="fea icon-sm mr-2"></i>I understand that if I am invited for an interview, I will need to bring the printed application form, 2 passport photographs, a formal proof of my identity and proof of my address.</li>
                    <li><i data-feather="arrow-right" class="fea icon-sm mr-2"></i>I understand that I will need to provide at least 1 guarantor who must be between 30 - 70 years old and must be one of the following:</li>
                    <ul class="list-unstyled text-muted">
                        <li class="ml-4"><i data-feather="arrow-right" class="fea icon-sm"></i> Civil Servant e.g., Principals, Teachers, State/Local Government Staff, etc.</li>
                        <li class="ml-4"><i data-feather="arrow-right" class="fea icon-sm"></i> Banker.</li>
                        <li class="ml-4"><i data-feather="arrow-right" class="fea icon-sm"></i> A practising professional such as Lawyer, Doctor, Pilot, Chartered Accountant, 
                            Registered Engineer, etc.</li>
                        <li class="ml-4"><i data-feather="arrow-right" class="fea icon-sm"></i> Lecturer II & above in a reputable Higher Institution.</li>
                        <li class="ml-4"><i data-feather="arrow-right" class="fea icon-sm"></i> An Entrepreneur with a registered business that has been operating for at least 5 years.</li>
                    </ul>

                    <li><i data-feather="arrow-right" class="fea icon-sm mr-2"></i>I authorise <span class="text-primary">FixMaster</span> to verify any or all of the information provided above, using all appropriate means.</li>
                </ul>
            </div>
            
        </div>
    </div>
</div>
<!-- Modal Content End -->

@endsection