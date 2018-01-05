@component('mail::message')
# Introduction

Thanks so much for registering!


@component('mail::button', ['url' => ''])

Start Browsing

@endcomponent


@component('mail::panel', ['url' => 'Https://laracasts.com'])

Now you are signed up to start donating blood! Through this site you can create your own profile, add medical details, view your donor history, book donor sessions and pick your locations. 

@endcomponent


Thanks,<br>

{{ config('app.name') }}

@endcomponent