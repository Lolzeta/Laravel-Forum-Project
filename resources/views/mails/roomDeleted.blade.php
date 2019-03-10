@component('mail::message')
# Room Deleted: {{ $room->name }}

{{ $room->description }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
