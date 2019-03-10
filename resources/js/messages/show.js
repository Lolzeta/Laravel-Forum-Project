$(function(){
    $("form[data-action='show']").on('submit',function(event){
        showEvent(event);
      });
    });
    function showEvent(e){
        e.preventDefault();
        let form = $(e.target);
        let idMessage = form.attr("data-messagetoshow");
        let button = $(`button[data-showbuttontospinner=${idMessage}]`);
        button.attr('disabled','true');
        button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>');
        axios.get(`/messages/${idMessage}`)
        .then(function(response){
            button.html('<i title="Show message" class="fas fa-eye" >');
            button.removeAttr('disabled');
            $('#show-modal-body').empty();
            $('#show-modal-body').append(response.data);
            $(`#show-message`).modal('show');
            $(`form[data-messagetoedit=${idMessage}]`).submit(function(e){
                editEvent(e);
            });
            $(`form[data-messagetodelete=${idMessage}]`).submit(function(e){
                deleteEvent(e);
            });
        }).catch(function (error) {
            console.log(error);
        }).then(function(){
            alert('The message has been showed');
        });
    }