$(function(){
    let creation = $('#saveForm');
    creation.submit(function(e){
        e.preventDefault();
        axios.post('/messages/',
          $(this).serialize()
        ).then(function(respond){
            $('#messages').append(respond.data);
            $('#message').val('');
        });
    });
});