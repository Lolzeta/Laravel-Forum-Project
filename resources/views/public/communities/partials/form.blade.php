
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control {{$errors->has('name')?"is-invalid":""}}" id="name" name="name" placeholder="Introduce the community's name" required value='{{isset($community)?$community->name:old('name')}}'>
    @if($errors->has('name'))
    <div class="invalid-feedback">
        {{$errors->first('name')}}
    </div>
    @endif
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control {{$errors->has('description')?"is-invalid":""}}" id="description" name="description" rows="3" placeholder="Community description" required>{{isset($community)?$community->description:old('description')}}</textarea>
    @if($errors->has('description'))
    <div class="invalid-feedback">
        {{$errors->first('description')}}
    </div>
    @endif
</div>

<button type="submit" id="saveCommunity" class="btn btn-primary">Save Community</button>
</form>