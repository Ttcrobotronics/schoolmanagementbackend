@component('mail::message')
Hello {{$user->name}},
<p>we understand it happens</p>
@component('mail::button',['url'=>url('reset/'.$user->remember_token)])
Reset your password
@endcomponent
<p>in case you have any ishue recovering your password. please contact us.</p>
thanks,<br>
{{config('app.name')}}
@endcomponent