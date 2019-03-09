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
      accept.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>');
      axios.delete(`/messages/${idMessage}`)
      .then(function(respond){
        accept.html('YES');
        closeModal('delete-confirmation');
        accept.off('click');
        $(`div[data-idMessage='${idMessage}']`).remove();
      }).catch(function (error) {
        console.log(error);
      }).then(function(){
        alert('The message has been deleted');
      });
    });
}