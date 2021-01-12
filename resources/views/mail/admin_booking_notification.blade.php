

@component('mail::message')

# Job Details for {{ $data['clientName'] }},

@component('mail::panel')
# {{ $data['clientName'] }} ({{ $data['jobReference'] }})
@endcomponent

## Breadkdown:

@component('mail::table')
| Service                    | Category                    | Service Charge                        |
| -------------------------- |:---------------------------:| -------------------------------------:|
| {{ $data['serviceName'] }} | {{ $data['categoryName'] }} | ₦{{ number_format($data['amount']) }} |
@endcomponent

## CSE Security Code: {{ $data['securityCode'] }}<br>
## Job Reference: {{ $data['jobReference'] }}<br>
## Service: {{ $data['serviceName'] }} ({{ $data['categoryName'] }})<br>
## Service Charge: ₦{{ number_format($data['amount']) }}<br>
## Fee Type: {{ strtoupper($data['serviceFeeName']) }}<br> 
## Date & Time: {{ ($data['timestamp']) }}<br> 

Thanks,<br>
{{ config('app.name') }} Management
<br><br>
284B, Ajose Adeogun Street, Victoria Island, Lagos, Nigeria.
08132863878| info@fixmaster.com.ng
<br>
<img src="https://www.fixmaster.com.ng/wp-content/uploads/2020/11/fix-master-logo-straight.png" width="90" alt="FixMaster Logo">

<br><hr>

@endcomponent


