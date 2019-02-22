$(function(){
  $("form[data-action='delete']").on('submit',function(event){
    deleteEvent(event);
  });
});

  function deleteEvent(event){
    event.preventDefault();
    let form = $(event.target);
    let idMessage = form.attr("data-messagetodelete");
    showModal('delete-confirmation', idMessage);
    let accept = $("#accept-delete");
    accept.click(function(){
      axios.delete(`/messages/${idMessage}`)
      .then(function(respond){
        closeModal('delete-confirmation');
        accept.off('click');
        $(`div[data-idMessage='${idMessage}']`).remove();
      });
    });
}