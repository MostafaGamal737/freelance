@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('images.logo.png')])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('جميع الحقوق محجوزه.')
@endcomponent
@endslot
@endcomponent
