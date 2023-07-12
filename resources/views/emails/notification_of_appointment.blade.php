<x-mail::message>
# Hello, {{ $user }}!
# You have successfully made an appointment! 

<x-mail::panel>
<p>Your appointment's number <b>{{ $number }}</b></p>
<p>For <b>{{ $date }}</b> at <b>{{ $time }}</b> to the {{ $doctor }} in the {{ $office }} office.</p>
<p>We'll expect you at that time.</p>
</x-mail::panel>
 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
