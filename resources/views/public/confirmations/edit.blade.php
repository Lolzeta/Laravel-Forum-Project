<div class="modal fade" id="edit-confirmation" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">EDITING MESSAGE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <textarea class="form-control {{$errors->has('message')?"is-invalid":""}}" id="editedMessage" name="editedMessage" rows="3" placeholder="You can edit your message" required>{{$message->message}}</textarea>
                @if($errors->has('message'))
                <div class="invalid-feedback">
                {{$errors->first('message')}}
                </div>
                @endif      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                <button type="button" id="accept-edit" class="btn btn-success">YES</button>
            </div>
        </div>
    </div>
</div>