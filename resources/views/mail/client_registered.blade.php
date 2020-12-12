

@component('mail::message')

Hello, {{ $data['client_name'] }}

# Welcome to FixMaster!

We are very excited to have you on FixMaster. Activate your account to book your first job and have the full experience.

To verify your email, simply click the "Verify E-Mail" button..

@component('mail::button', ['url' => "http://localhost:8000/client-email-verify?token=$data[email_verification_token]" ])
Verify E-Mail
@endcomponent



Thanks,<br>
{{ config('app.name') }} Management
<br><br>
284B, Ajose Adeogun Street, Victoria Island, Lagos, Nigeria.
08132863878| info@fixmaster.com.ng
<br>
<img src="https://fixmaster.com.ng/wp-content/uploads/2020/11/fix-master-logo-straight.png" width="90" alt="FixMaster Logo">

<br><hr>
If you’re having trouble clicking the "Verify E-Mail" button, copy and paste the URL below into your web browser: {{ $token_url }}
@endcomponent


