const sendData = () => {
    const data = $('#number')['0'].value
    $.ajax({
      url: 'http://students.yss.su/PSTGU/2019/gritskova/2021/2021.04.12/client.php',
      type: 'POST',
      data: {
        number: data
      },
      success: (resp) => {
        $('#data')
          .empty()
          .html(resp)
      }
    })
  }