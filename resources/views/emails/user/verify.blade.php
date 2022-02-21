@component('mail::message')
{{ $data['desc'] }}
@component('mail::button', ['url' => url('password/reset/'.$data['url'])])
استكمل بيناتك
@endcomponent

@endcomponent
