<div data-idMessage="{{$message->id}}">
 <div class="card rounded-0">
        <div class="card-body rounded-0">
          <div class="row">
            <div class="col-1 d-flex align-items-center justify-content-center">
              <h4>{{$message->votes->sum('valoration')}}</h4>
            </div>

            <div class="col">
            <h6 class="card-subtitle  text-muted">{{ $message->user->name}}</h6>
            <p class="card-text">{{ $message->message }}</p>
            </div>

            <div class="col-2">
            <div>
            
            <form action="/messages/{{ $message->id }}" id="show-form" data-action="show" data-messagetoshow="{{$message->id}}" method="post" class="mr-2 float-right">
                @csrf
                @method('get')
            <button title="Show message" class="btn btn-primary btn-sm" type="submit" id="show-button"><i title="Show message" class="fas fa-eye" ></i></button>
            </form>
            @auth
            @can('manipulate',$message)
            
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
            
            @endcan
            @endauth
            </div>
            </div>
          </div>
        </div>
    </div>
</div>