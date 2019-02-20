@extends('layouts.app')

@section('title', 'TestForums | {{room->name}}')

@section('content')
    <h2>{{ $room->name }}</h2>
    <h4>{{ $room->user->name}}</h4>
    <p>{{ $room->description }}</p>
    <hr>
    <div id="messages">
    @forelse($room->messages as $message)
    @include('public.messages.show')
    @empty
    <p>No replies</p>
    @endforelse
    </div>
    @auth
    <form action="/messages" id="saveForm" method="post" novalidate>
      @csrf
    <div class="form-group">
        <input type="hidden" name="room_id" id="room_id" value="{{$room->id}}">
        <label for="message">New message</label>
        <textarea class="form-control {{$errors->has('message')?"is-invalid":""}}" id="message" name="message" rows="3" placeholder="You can reply here" required>{{isset($room)?$room->message:old('message')}}</textarea>
        @if($errors->has('message'))
        <div class="invalid-feedback">
          {{$errors->first('message')}}
        </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Send Message</button>
</form>
@include('public.confirmations.delete')
@include('public.confirmations.edit')
@endauth
@endsection
@push('scripts')
<script src="{{ mix('/js/messages/create.js')  }}" defer></script>
<script src="{{ mix('/js/messages/delete.js')  }}" defer></script>
<script src="{{ mix('/js/messages/edit.js')  }}" defer></script>
<script src="{{ mix('/js/messages/paginate.js')  }}" defer></script>
@endpush
