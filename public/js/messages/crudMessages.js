$(function () {
  var creation = $('#saveForm');
  creation.submit(function (e) {
    e.preventDefault();
    var button = $('#send_message');
    button.attr('disabled');
    button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
    axios.post('/messages/', {
      room_id: $("#room").attr('data-id-room'),
      message: $('#message').val()
    }).then(function (respond) {
      button.html('Send message');
      button.removeAttr('disabled');
      $('#no_replies_alert').hide();
      $('#messages').append(respond.data);
      $('#message').val('');
      $("form[data-action='delete']").last().submit(function (e) {
        deleteEvent(e);
      });
      $("form[data-action='edit']").last().submit(function (e) {
        editEvent(e);
      });
    }).catch(function (error) {
      console.log(error);
    }).then(function () {
      alert('The message has been created');
    });
  });
});
document.addEventListener('DOMContentLoaded', function () {
  var id = $("#room").attr('data-id-room');
  var count = 10;
  var execute = true;
  $(window).on("scroll", function () {
    var scrollHeight = $(document).height();
    var scrollPosition = $(window).height() + $(window).scrollTop();

    if (execute) {
      if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
        $('#spinner_paginate').removeClass('invisible');
        axios.get("/rooms/paginateMessages/".concat(id, "/").concat(count)).then(function (response) {
          if (response.data === "") {
            var div = $('<div></div>');
            div.addClass('alert alert-primary mt-2');
            div.attr('id', 'no_replies_alert');
            div.html('<strong>No more replies</strong>');
            $('#messages').append(div);
            execute = false;
          }

          $("#messages").append(response.data);
          count += 10;
          $('#spinner_paginate').addClass('invisible');
        }).catch(function (error) {
          console.log(error);
        }).then(function () {
          console.log('paginated');
        });
      }
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
    accept.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>');
    axios.delete("/messages/".concat(idMessage)).then(function (respond) {
      accept.html('YES');
      closeModal('delete-confirmation');
      accept.off('click');
      $("div[data-idMessage='".concat(idMessage, "']")).remove();
    }).catch(function (error) {
      console.log(error);
    }).then(function () {
      alert('The message has been deleted');
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
    accept.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>');
    axios.put("/messages/".concat(idMessage), {
      message: $('#editedMessage').val()
    }).then(function (respond) {
      accept.html('YES');
      closeModal('edit-confirmation');
      accept.off('click');
      $("div[data-idMessage='".concat(idMessage, "']")).html(respond.data);
      $("form[data-messagetoedit=".concat(idMessage, "]")).submit(function (e) {
        editEvent(e);
      });
      $("form[data-messagetodelete=".concat(idMessage, "]")).submit(function (e) {
        deleteEvent(e);
      });
    }).catch(function (error) {
      console.log(error);
    }).then(function () {
      alert('The message has been edited');
    });
  });
}

$(function () {
  var show = $('#show-form');
  show.submit(function (e) {
    e.preventDefault();
    var form = $(event.target);
    var idMessage = form.attr("data-messagetoshow");
    var button = $('#show-button');
    button.attr('disabled');
    button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>');
    axios.get("/messages/".concat(idMessage)).then(function (response) {
      button.html('<i title="Show message" class="fas fa-eye" >');
      button.removeAttr('disabled');
      $('#show-modal-body').append(response.data);
      $("#show-message").modal('show');
      $("form[data-messagetoedit=".concat(idMessage, "]")).submit(function (e) {
        editEvent(e);
      });
      $("form[data-messagetodelete=".concat(idMessage, "]")).submit(function (e) {
        deleteEvent(e);
      });
    }).catch(function (error) {
      console.log(error);
    }).then(function () {
      alert('The message has been showed');
    });
  });
});
