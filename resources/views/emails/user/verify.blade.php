@component('mail::message')
{{ $data['desc'] }}
@component('mail::button', ['url' => url('password/reset/'.$data['url'])])
اضغط هنا
@endcomponent

@endcomponent
