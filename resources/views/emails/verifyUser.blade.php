@component('mail::message')
# Introduction

Welcome to the site {{$user['name']}}.
Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account

@component('mail::button', ['url' => url('users/verify/'.$user->verifyUser->token)])
Activate Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
