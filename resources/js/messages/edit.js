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
  let form = $(event.target);
  let idMessage = form.attr("data-messagetoedit");
  showModal('edit-confirmation', idMessage);
  let accept = $("#accept-edit");
  accept.click(function(){
    axios.put(`/messages/${idMessage}` , {
      message : $('#editedMessage').val()
      }).then(function(respond){
      closeModal('edit-confirmation');
      accept.off('click');
      $(`div[data-idMessage='${idMessage}']`).html(respond.data);
      $(`form[data-messagetoedit=${idMessage}]`).submit(function(e){
        editEvent(e);
      });
    });
  });
}