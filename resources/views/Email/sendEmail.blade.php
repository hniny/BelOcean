@component('mail::message')
 # Name : {{ $mailData['title'] }} <br>
 # Post Applied For : {{ $mailData['position'] }} 

Application form was attached.

@component('mail::button', ['url' => $mailData['url']])
View Detail
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent