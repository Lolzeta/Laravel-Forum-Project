<div data-idMessage="{{$message->id}}">
    <div class="row justify-content-between">
    <div>
        <u><b>{{$message->user->name}}</b></u>
    </div>
    @auth
    <div>
    <form action="/messages/{{ $message->id }}" data-action="edit" data-messagetoedit="{{$message->id}}" method="post" class="mr-2 float-right">
        @csrf
        @method('put')
    <button title="Edit message" class="btn btn-warning btn-sm" type="submit"><i title="Edit" class="fas fa-pencil-alt" ></i></button>
    </form>


        <form action="/messages/{{ $message->id }}" data-action="delete" data-messagetodelete="{{$message->id}}" method="post" class="mr-2 float-right">
        @csrf
        @method('delete')
        <button title="Delete message" class="btn btn-danger btn-sm" type="submit"><i title="Delete" class="fas fa-trash" ></i></button>
        </form>
    </div>
    @endauth
    </div>
    
    <p>{{$message->message}}</p>
    <hr>
</div>