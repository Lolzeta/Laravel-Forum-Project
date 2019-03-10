@component('mail::message')
# Community Deleted: {{ $community->name }}

{{ $community->description }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
