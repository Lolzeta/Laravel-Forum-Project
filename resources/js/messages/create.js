$(function(){
    let creation = $('#saveForm');
    creation.submit(function(e){
        e.preventDefault();
        axios.post('/messages/',
          $(this).serialize()
        ).then(function(respond){
            $('#messages').append(respond.data);
            $('#message').val('');
            $("form[data-action='delete']").last().submit(function(e){
                deleteEvent(e);
            });
            $("form[data-action='edit']").last().submit(function(e){
                editEvent(e);
            });
        });
    });
});