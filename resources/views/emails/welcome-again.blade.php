@component('mail::message')
# Introduction

Thanks so much for registering!

@component('mail::button', ['url' => 'https://laracast.com'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
Some Inspirational quote to go here. 
@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent
