@component('mail::message')
# Introduction


@component('mail::panel')
Name: {{$data['name']}}

E-mail: {{$data['email']}}    
@endcomponent

{{$data['message']}}



@component('mail::button', ['url' => $url])
Button
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
