document.addEventListener('DOMContentLoaded',function(){
    let id = $("#room").attr('data-id-room');
    let count = 10;
    let ejecutar = true;
    
    $(window).on("scroll", function() {
        let scrollHeight = $(document).height();
        let scrollPosition = $(window).height() + $(window).scrollTop();
        if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
            axios.get(`/rooms/paginateMessages/${id}/${count}`)
            .then(function(response){
                if(ejecutar){
                if(response===""){
                    ejecutar = false;
                }
                $("#messages").append(response.data);
                count += 10;
            }
            });
        }
    });
});