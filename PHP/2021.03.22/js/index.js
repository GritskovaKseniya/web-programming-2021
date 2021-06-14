window.openModal = (userID) => {
  $.ajax({
    // url: `http://students.yss.su/PSTGU/2019/gritskova/2021/2021.03.22/api/getData.php?id=${userID}`, 
    // строка выше для лабы за 2021,03,22
    // строка ниже для лабы за 2021,03,29
    url: `http://dev.izobretarium.ru:8013/api/getData?id=${userID}`,
    type: 'GET',
    success: (response) => {
      if (!response.error) {
        $('#modal__body')
          .empty()
          .html(response.data)
        $('#modal')
          .removeClass('d-none')
      } 
    },
    error: function () {
      alert("Запусти сервер");
  }

  })
}

window.closeModal = () => {
  $('#modal')
    .addClass('d-none')
}