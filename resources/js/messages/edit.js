$(function(){
    let accept = $('#accept-edit');
    accept.click(function(){
      let idMessage = $('#accept-edit').attr('data-messagetoedit')
      axios.put(`/messages/${idMessage}` , {
      message : $('#editedMessage').val()
      }).then(function(respond){
        closeModal('edit-confirmation');
        $(`div[data-idMessage='${idMessage}']`).html(respond.data);
      });
    });
});
  
  
  function closeModal(id){
    $(`#${id}`).modal('hide');
  }
  

// Hacerlo como el delete con form

