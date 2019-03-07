<div class="row">
  <div class="form-group col-8">
        <label for="name">Name</label>
        <input type="text" class="form-control {{$errors->has('name')?"is-invalid":""}}" id="name" name="name" placeholder="Introduce the room's name" required value='{{isset($room)?$room->name:old('name')}}'>
        @if($errors->has('name'))
        <div class="invalid-feedback">
          {{$errors->first('name')}}
        </div>
        @endif
  </div>
    <div class="form-group col-4">
    <label for="community">Choose a community</label>
    <select class="form-control {{ $errors->has('community')?"is-invalid":"" }}" id="community" name="community">
      @foreach($communities as $community)
            <option value="{{ $community->id }}"
                @if( !$errors->isEmpty() )
                    {{ $community->id==old('community')?"selected":"" }}
                @elseif( isset($room) )
                    {{ $room->community->id==$community->id?"selected":"" }}
                @endif
            >{{ $community->name }}</option>
        @endforeach
    </select>
  </div>
</div>

<div class="col">
        <div class="form-group">
            @if( isset($room) )
            <img class="img-fluid" src="http://testforums.test/storage/{{ $room->image }}" alt="">
            @endif
            <label for="image">Image</label>
            <input type="file" class="form-control-file mt-1 {{ $errors->has('image')?"is-invalid":"" }}" id="image" name="image">
            @if( $errors->has('image'))
            <div class="invalid-feedback">
                {{ $errors->first('image') }}
            </div>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control {{$errors->has('description')?"is-invalid":""}}" id="description" name="description" rows="3" placeholder="Room Description" required>{{isset($room)?$room->description:old('description')}}</textarea>
        @if($errors->has('description'))
        <div class="invalid-feedback">
          {{$errors->first('description')}}
        </div>
        @endif
    </div>

    <button type="submit" id="saveRoom" class="btn btn-primary">Save Room</button>
</form>