@component('mail::message')
# Terima Kasih

Halo {{$tenant -> first_name}},

terima kasih telah memesan kamar melalui ayonginep[dot]com. cek selengkapnya di link di bawah ini.

@component('mail::button', ['url' => 'http://192.168.100.10:8000/api/orders'])
Cek Di Sini
@endcomponent

Thanks,<br><br>
{{ config('app.name') }}
@endcomponent
