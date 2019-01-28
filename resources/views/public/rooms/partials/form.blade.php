<div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control {{$errors->has('name')?"is-invalid":""}}" id="name" name="name" placeholder="Introduce the room's name" required value='{{isset($room)?$room->name:old('name')}}'>
        @if($errors->has('name'))
        <div class="invalid-feedback">
          {{$errors->first('name')}}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="creator">Creator</label>
        <input type="text" class="form-control {{$errors->has('creator')?"is-invalid":""}}" id="creator" name="creator" placeholder="Introduce the room creator" required value='{{isset($room)?$room->creator:old('creator')}}'>
        @if($errors->has('creator'))
        <div class="invalid-feedback">
          {{$errors->first('creator')}}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="cathegory">Cathegory</label>
        <input type="text" class="form-control {{$errors->has('cathegory')?"is-invalid":""}}" id="cathegory" name="cathegory" placeholder="Introduce the room's cathegory" required value='{{isset($room)?$room->cathegory:old('cathegory')}}'>
        @if($errors->has('cathegory'))
        <div class="invalid-feedback ">
          {{$errors->first('cathegory')}}
        </div>
        @endif
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

@push('scripts')

<script src="{{ mix('/js/validations/roomValidation.js') }}" defer ></script>

@endpush
