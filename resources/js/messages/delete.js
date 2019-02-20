$(function(){
    $("form[data-action='delete']").on('submit',function(event){
      event.preventDefault();
      showModal('delete-confirmation');
      let form = $(event.target);
      let idMessage = form.attr("data-messagetodelete");
      let accept = $("#accept-delete");
      accept.click(function(){
        axios.delete(`/messages/${idMessage}`)
        .then(function(respond){
          closeModal('delete-confirmation');
          accept.off('click');
          $(`div[data-idMessage='${idMessage}']`).remove();
        });
      });
    });
  });
  
  function showModal(id){
    $(`#${id}`).modal('show');
  }
  
  function closeModal(id){
    $(`#${id}`).modal('hide');
  }
  