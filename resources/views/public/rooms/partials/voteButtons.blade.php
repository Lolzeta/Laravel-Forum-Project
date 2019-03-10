@auth
@can('vote',$room)
<div class="d-flex">
    <form action="/rooms/{{ $room->id }}/vote/1" method="get" class="float-right">
    @csrf
    @method('get')
    <button type="submit" class="btn btn-success btn-sm mr-2 float-left"><i class="far fa-thumbs-up"></i></button>
</form>

<form action="/rooms/{{ $room->id }}/vote/-1" method="get" class="float-left">
@csrf
@method('get')
<button type="submit" class="btn btn-danger btn-sm mr-2 float-left"><i class="far fa-thumbs-down"></i></button>
</form>
</div> 
@endcan
@endauth
