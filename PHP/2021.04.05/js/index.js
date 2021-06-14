window.openModal = (userID) => {
  let socket = new WebSocket("ws://151.248.113.144:8013");
  socket.onopen = () => {
    socket.send(userID);
  }

  socket.onmessage = function(event) {
    $('#modal__body')
      .empty()
      .html(event.data)
    $('#modal')
      .removeClass('d-none')
    socket.close()
  }


  socket.onerror = function() {
    alert("Ошибка загрузки данных." + "\n" + "Запусти сервер.");
  }
}

window.closeModal = () => {
  $('#modal')
    .addClass('d-none')
}



