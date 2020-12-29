@extends('layouts.client')
@section('title', 'Payments')
@section('content')
<div class="col-lg-8 col-12">
    <h5 class="mb-0">Payment History</h5>
    <div class="table-responsive mt-4 bg-white rounded shadow">
        <div class="row mt-1 mb-1 ml-1 mr-1">
            <div class="col-md-4">
                <div class="form-group position-relative">
                    <label>Sort Table</label>
                    <select class="form-control custom-select" id="request-sorting">
                        <option value="None">Select...</option>
                        <option value="Date">Date</option>
                        <option value="Month">Month</option>
                        <option value="Date Range">Date Range</option>
                    </select>
                </div>
            </div><!--end col-->

            <div class="col-md-4 specific-date d-none">
                <div class="form-group position-relative">
                    <label>Specify Date <span class="text-danger">*</span></label>
                    <i data-feather="calendar" class="fea icon-sm icons"></i>
                    <input name="name" id="name" type="date" class="form-control pl-5">
                </div>
            </div>

            <div class="col-md-4 sort-by-year d-none">
                <div class="form-group position-relative">
                    <label>Specify Year <span class="text-danger">*</span></label>
                    <select class="form-control custom-select" id="Sortbylist-Shop">
                        <option>Select...</option>
                        <option>2018</option>
                        <option>2019</option>
                        <option>2020</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 sort-by-year d-none">
                <div class="form-group position-relative">
                    <label>Specify Month <span class="text-danger">*</span></label>
                    <select class="form-control custom-select" id="Sortbylist-Shop">
                        <option>Select...</option>
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4 date-range d-none">
                <div class="form-group position-relative">
                    <label>From <span class="text-danger">*</span></label>
                    <i data-feather="calendar" class="fea icon-sm icons"></i>
                    <input name="name" id="name" type="date" class="form-control pl-5">
                </div>
            </div>

            <div class="col-md-4 date-range d-none">
                <div class="form-group position-relative">
                    <label>To <span class="text-danger">*</span></label>
                    <i data-feather="calendar" class="fea icon-sm icons"></i>
                    <input name="name" id="name" type="date" class="form-control pl-5">
                </div>
            </div>
        </div>
        
        <table class="table table-center table-padding mb-0" id="basicExample">
            <thead>
                <tr>
                    <th class="py-3">#</th>
                    <th class="py-3">Type</th>
                    <th class="py-3">Amount</th>
                    <th class="py-3">Date</th>
                    <th class="py-3">Status</th>
                    <th class="py-3">Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Service Payment</td>
                    <td>15/05/2020</td>
                    <td class="font-weight-bold">₦14,000</td>
                    <td class="text-warning">Pending</td>
                    <td><a class="btn btn-primary popup-modal btn-sm text-danger" href="#payment-modal">Details</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>E-Wallet Credit</td>
                    <td>12/03/2020</td>
                    <td class="font-weight-bold">₦11,450</td>
                    <td class="text-success">Paid</td>
                    <td><a class="btn btn-primary popup-modal btn-sm text-danger" href="#payment-modal">Details</a></td>

                </tr>

                <tr>
                    <td>3</td>
                    <td>E-Wallet Debit (Service Payment)</td>
                    <td>26/02/2020</td>
                    <td class="font-weight-bold">₦7,500</td>
                    <td class="text-success">Paid</td>
                    <td><a class="btn btn-primary popup-modal btn-sm text-danger" href="#payment-modal">Details</a></td>
                </tr>
               
            </tbody>
        </table>

        <div class="example gc3 mb-4">
            <div class="html-code">
        
              <div id="payment-modal" class="mfp-hide white-popup-block">
                <h3>Payment Details</h3>
                
                <p>
                    Depositor Name: <strong>Femi Joseph</strong><br>
                    Payment Mode: <strong>Online Payment</strong><br>
                    Bank Name: <strong>FCMB</strong><br> 
                    Account Name: <strong>FixMaster NG</strong><br> 
                    Account Number: <strong>1234567890</strong><br> 
                    Amount: <strong>₦14,000</strong><br> 
                    Reference No.: <strong>234092734623496</strong><br> 
                    Status: <strong class="text-success">Paid</strong><br> 
                </p>

                <a class="btn btn-primary btn-sm popup-modal-dismiss" href="#">Close</a></p>
              </div>
            </div>
        </div>
    </div>
</div><!--end col-->

@section('scripts')
<script>
    $(document).ready(function() {
        $('#request-sorting').on('change', function (){        
                let option = $("#request-sorting").find("option:selected").val();

                if(option === 'None'){
                    $('.specific-date, .sort-by-year, .date-range').addClass('d-none');
                }

                if(option === 'Date'){
                    $('.specific-date').removeClass('d-none');
                    $('.sort-by-year, .date-range').addClass('d-none');
                }

                if(option === 'Month'){
                    $('.sort-by-year').removeClass('d-none');
                    $('.specific-date, .date-range').addClass('d-none');
                }

                if(option === 'Date Range'){
                    $('.date-range').removeClass('d-none');
                    $('.specific-date, .sort-by-year').addClass('d-none');
                }
        });
    });
</script>

@endsection
@endsection