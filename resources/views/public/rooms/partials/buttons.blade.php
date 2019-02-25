@auth
@can('manipulate',$room)
<a href="/rooms/{{ $room->id }}/edit" class="btn btn-warning btn-sm mr-2 float-right">Edit</a>
<form action="/rooms/{{ $room->id }}" method="post" class="mr-2 float-right">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger btn-sm">Delete Room</button>
</form>
@endcan
@endauth
