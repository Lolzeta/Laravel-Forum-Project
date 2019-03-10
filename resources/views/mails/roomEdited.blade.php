@component('mail::message')
# Room Edited: {{ $room->name }}

{{ $room->description }}
@component('mail::button', ['url' => url('/rooms/'. $room->slug)])
Room Info
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
