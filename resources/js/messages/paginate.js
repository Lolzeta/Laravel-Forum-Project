document.addEventListener('DOMContentLoaded',function(){
    let id = $("#room").attr('data-id-room');
    let count = 10;
    let execute = true;
    
    $(window).on("scroll", function() {
        let scrollHeight = $(document).height();
        let scrollPosition = $(window).height() + $(window).scrollTop();
        if(execute){
        if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
            $('#spinner_paginate').removeClass('invisible');
            axios.get(`/rooms/paginateMessages/${id}/${count}`)
            .then(function(response){
                
                if(response.data===""){
                    let div = $('<div></div>');
                    div.addClass('alert alert-primary mt-2');
                    div.attr('id','no_replies_alert');
                    div.html('<strong>No more replies</strong>');
                    $('#messages').append(div);
                    execute = false;
                }
                $("#messages").append(response.data);
                $("#messages  form[data-action='delete']").slice(count).submit(function(e){
                    deleteEvent(e);
                });
                $("#messages  form[data-action='edit']").slice(count).submit(function(e){
                    editEvent(e);
                });
                $("#messages  form[data-action='show']").slice(count).submit(function(e){
                    showEvent(e);
                });
                count += 10;
                $('#spinner_paginate').addClass('invisible');
                }).catch(function (error) {
                console.log(error);
              }).then(function(){
                console.log('paginated');
              });
          }
        }
    });
});