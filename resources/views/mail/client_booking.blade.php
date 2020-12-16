

@component('mail::message')

Hello, {{ $data['clientName'] }}

Thank you for booking your job on FixMaster.

A dedicated Customer Service Executive(CSE) will be assigned to your request and will be in touch with you soon.

## Job Reference: {{ $data['jobReference'] }}<br>
## Service: {{ $data['serviceName'] }} ({{ $data['categoryName'] }})<br>
## CSE Security Code: {{ $data['securityCode'] }}<br>
## Service Charge: ₦{{ number_format($data['amount']) }}<br>
## Fee Type: {{ strtoupper($data['serviceFeeName']) }}<br> 
## Date & Time: {{ ($data['timestamp']) }}<br> 

We thank you for your patronage and look forward to pleasing you with our service quality.


Thanks,<br>
{{ config('app.name') }} Management
<br><br>
284B, Ajose Adeogun Street, Victoria Island, Lagos, Nigeria.
08132863878| info@fixmaster.com.ng
<br>
<img src="https://fixmaster.com.ng/wp-content/uploads/2020/11/fix-master-logo-straight.png" width="90" alt="FixMaster Logo">

<br><hr>

@endcomponent


