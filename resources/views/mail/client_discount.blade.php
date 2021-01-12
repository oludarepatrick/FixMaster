

@component('mail::message')

Hello, {{ $data['clientName'] }}

# Congratulations! You have just earned a 5% discount on your first job booking

We are very excited you joined the most compelling community of FixMaster satisfied customers! As you already know, excellent quality service, rewards, and savings have always been a vital part of FixMaster's success.

Having said so, we constantly cater to our customer's best interests in terms of choice, quality, affordability, and unmatchable service!

For registering with FixMaster, you have been rewarded with a discount on your first job booking which entitles you to a 5% discount off your booking fee.

## PLEASE NOTE THAT THIS DISCOUNT IS ONLY APPLICABLE FOR YOUR FIRST JOB BOOKING.

Should you require further assistance, please do not hesitate to contact us immediately on ## 08132863878. We are here to serve you; 24-hours, 7 days a week.


Yours Faithfully,<br>
{{ config('app.name') }} Management
<br><br>
284B, Ajose Adeogun Street, Victoria Island, Lagos, Nigeria.
08132863878| info@fixmaster.com.ng
<br>
<img src="https://www.fixmaster.com.ng/wp-content/uploads/2020/11/fix-master-logo-straight.png" width="90" alt="FixMaster Logo">

<br><hr>

@endcomponent


