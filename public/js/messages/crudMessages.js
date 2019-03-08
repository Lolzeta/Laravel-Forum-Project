$(function () {
  var creation = $('#saveForm');
  creation.submit(function (e) {
    e.preventDefault();
    axios.post('/messages/', {
      room_id: $("room").attr('data-id-room'),
      message: $('#message').val()
    }).then(function (respond) {
      $('#messages').append(respond.data);
      $('#message').val('');
      $("form[data-action='delete']").last().submit(function (e) {
        deleteEvent(e);
      });
      $("form[data-action='edit']").last().submit(function (e) {
        editEvent(e);
      });
    });
  });
});
document.addEventListener('DOMContentLoaded', function () {
  var id = $("#room").attr('data-id-room');
  var count = 10;
  var ejecutar = true;
  $(window).on("scroll", function () {
    var scrollHeight = $(document).height();
    var scrollPosition = $(window).height() + $(window).scrollTop();

    if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
      axios.get("/rooms/paginateMessages/".concat(id, "/").concat(count)).then(function (response) {
        if (ejecutar) {
          if (response === "") {
            ejecutar = false;
          }

          $("#messages").append(response.data);
          count += 10;
        }
      });
    }
  });
});
$(function () {
  $("form[data-action='delete']").on('submit', function (event) {
    deleteEvent(event);
  });
});

function deleteEvent(event) {
  event.preventDefault();
  var form = $(event.target);
  var idMessage = form.attr("data-messagetodelete");
  showModal('delete-confirmation', idMessage);
  var accept = $("#accept-delete");
  accept.click(function () {
    axios.delete("/messages/".concat(idMessage)).then(function (respond) {
      closeModal('delete-confirmation');
      accept.off('click');
      $("div[data-idMessage='".concat(idMessage, "']")).remove();
    });
  });
}

$(function () {
  $("form[data-action='edit']").on('submit', function (event) {
    editEvent(event);
  });
});

function showModal(idModal, idMessage) {
  axios.get("/messages/data/".concat(idMessage)).then(function (respond) {
    $('#editedMessage').val(respond.data);
    $("#".concat(idModal)).modal('show');
  });
}

function closeModal(idModal) {
  $("#".concat(idModal)).modal('hide');
}

function editEvent(event) {
  event.preventDefault();
  var form = $(event.target);
  var idMessage = form.attr("data-messagetoedit");
  showModal('edit-confirmation', idMessage);
  var accept = $("#accept-edit");
  accept.click(function () {
    axios.put("/messages/".concat(idMessage), {
      message: $('#editedMessage').val()
    }).then(function (respond) {
      closeModal('edit-confirmation');
      accept.off('click');
      $("div[data-idMessage='".concat(idMessage, "']")).html(respond.data);
      $("form[data-messagetoedit=".concat(idMessage, "]")).submit(function (e) {
        editEvent(e);
      });
    });
  });
}
