$(function(){
  $("form[data-action='edit']").on('submit',function(event){
    editEvent(event);
  });
});
  
  
function showModal(idModal, idMessage){
  axios.get(`/messages/data/${idMessage}`)
  .then(function(respond){
    $('#editedMessage').val(respond.data);
    $(`#${idModal}`).modal('show');
  });
}

function closeModal(idModal){
  $(`#${idModal}`).modal('hide');
}

function editEvent(event){
  event.preventDefault();
  $(`#show-message`).modal('hide');
  let form = $(event.target);
  let idMessage = form.attr("data-messagetoedit");
  showModal('edit-confirmation', idMessage);
  let accept = $("#accept-edit");
  accept.click(function(){
    accept.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>');
    accept.attr('disabled','true');
    axios.put(`/messages/${idMessage}` , {
      message : $('#editedMessage').val()
      }).then(function(respond){
      accept.html('YES');
      accept.removeAttr('disabled');
      closeModal('edit-confirmation');
      accept.off('click');
      $(`div[data-idMessage='${idMessage}']`).html(respond.data);
      $(`form[data-messagetoedit=${idMessage}]`).submit(function(e){
        editEvent(e);
      });
      $(`form[data-messagetodelete=${idMessage}]`).submit(function(e){
        deleteEvent(e);
      });
      $(`form[data-messagetoshow=${idMessage}]`).submit(function(e){
        showEvent(e);
      });
    }).catch(function (error) {
      console.log(error);
    }).then(function(){
      alert('The message has been edited');
    });
  });
}