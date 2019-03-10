@component('mail::message')
# New Community: {{ $community->name }}

{{ $community->description }}
@component('mail::button', ['url' => url('/communities/'. $community->slug)])
Community Info
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
