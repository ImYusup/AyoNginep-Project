@component('mail::message')
# Pesan Pemesanan

Halo {{$landlord -> first_name}},

seseorang telah memesan kamar milikmu, cek selengkapnya di ayonginep[dot]com.


@component('mail::button', ['url' => 'http://192.168.100.10:8000/api/orders'])
Cek Di Sini
@endcomponent


Thanks,<br><br>
{{ config('app.name') }}
@endcomponent
