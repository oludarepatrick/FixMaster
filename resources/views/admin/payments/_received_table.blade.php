
<div class="d-flex ml-4"><h4 class="text-success">{{ $message }}</h4></div>
<table class="table table-hover mg-b-0" id="basicExample">
    <thead class="thead-primary">
      <tr>
        <th class="text-center">#</th>
        <th>Job Reference</th>
        <th>Reference No</th>
        <th>Client Name</th>
        <th>Payment Method</th>
        <th>Payment Type</th>
        <th>Amount</th>
        {{-- <th>Status</th> --}}
        <th class="text-center">Payment Date</th>
      </tr>
    </thead>
    <tbody>
      @foreach($receivedPayments as $receivedPayment)
      <tr>
        <td class="tx-color-03 tx-center">{{ ++$i }}</td>
      <td class="tx-medium">{{ $receivedPayment->serviceRequest->job_reference }}</td>
      <td class="tx-medium">{{ $receivedPayment->payment_reference }}</td>
        <td class="tx-medium">{{ $receivedPayment->user->fullName->name }}</td>
        <td class="tx-medium">{{ $receivedPayment->payment_method }}</td>
        <td class="tx-medium">Credit</td>
        <td class="tx-medium">₦{{ number_format($receivedPayment->amount) }}</td>
        {{-- <td class="text-medium text-success">Paid</td> --}}
        <td class="text-medium tx-center">{{ Carbon\Carbon::parse($receivedPayment->created_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>