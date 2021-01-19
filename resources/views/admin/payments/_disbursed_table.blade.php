
<div class="d-flex ml-4"><h4 class="text-success">{{ $message }}</h4></div>
<table class="table table-hover mg-b-0" id="basicExample">
  <thead class="thead-primary">
    <tr>
      <th class="text-center">#</th>
      <th>Job Reference</th>
      <th>Reference No</th>
      <th>Recorded By</th>
      <th>Recipient</th>
      <th>Job Role</th>
      <th>Amount</th>
      {{-- <th>Status</th> --}}
      <th class="text-center">Payment Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach($disbursedPayments as $disbursedPayment)
      <tr>
        <td class="tx-color-03 tx-center">{{ ++$i }}</td>
        <td class="tx-medium">{{ $disbursedPayment->serviceRequest->job_reference }}</td>
        <td class="tx-medium">{{ $disbursedPayment->payment_reference }}</td>
        <td class="tx-medium">{{ $disbursedPayment->user->fullName->name }}</td>
        <td class="tx-medium">{{ $disbursedPayment->recipient->fullName->name }}</td>
        <td class="tx-medium">
          @if($disbursedPayment->recipient->designation == '[CSE_ROLE]')
            CSE
          @else 
            Technician
          @endif
          
        </td>
        <td class="tx-medium">₦{{ number_format($disbursedPayment->amount) }}</td>
        {{-- <td class="text-medium text-success">Paid</td> --}}
        <td class="text-medium tx-center">{{ Carbon\Carbon::parse($disbursedPayment->created_at, 'UTC')->isoFormat('MMMM Do YYYY, h:mm:ssa') }}</td>
      </tr>
    @endforeach
    
  </tbody>
</table>