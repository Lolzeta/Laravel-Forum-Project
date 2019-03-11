$(function(){
    let creation = $('#saveForm');
    creation.submit(function(e){
        e.preventDefault();
        let button = $('#send_message');
        button.attr('disabled','true');
        button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
        axios.post('/messages/', {
          room_id : $("#room").attr('data-id-room'),  
          message : quill.root.innerHTML
        }).then(function(response){
            button.html('Send message');
            button.removeAttr('disabled');
            $('#no_replies_alert').hide();
            $('#messages').append(response.data);
            $("form[data-action='delete']").last().submit(function(e){
                deleteEvent(e);
            });
            $("form[data-action='edit']").last().submit(function(e){
                editEvent(e);
            });
            $("form[data-action='show']").last().submit(function(e){
                showEvent(e);
            });
            quill.root.innerHTML = "";
        }).catch(function (error) {
            console.log(error);
        }).then(function(){
            alert('The message has been created');
        });
    });
});