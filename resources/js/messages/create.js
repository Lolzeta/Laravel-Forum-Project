$(function(){
    let creation = $('#saveForm');
    creation.submit(function(e){
        e.preventDefault();
        let button = $('#send_message');
        button.attr('disabled');
        button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
        axios.post('/messages/', {
          room_id : $("#room").attr('data-id-room'),  
          message : $('#message').val()
        }).then(function(respond){
            button.html('Send message');
            button.removeAttr('disabled');
            $('#no_replies_alert').hide();
            $('#messages').append(respond.data);
            $('#message').val('');
            $("form[data-action='delete']").last().submit(function(e){
                deleteEvent(e);
            });
            $("form[data-action='edit']").last().submit(function(e){
                editEvent(e);
            });
        }).catch(function (error) {
            console.log(error);
        }).then(function(){
            alert('The message has been created');
        });
    });
});