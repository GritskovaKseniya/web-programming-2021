<?php
  header("Content-Type: text/html; charset=utf-8");

#  set_time_limit(0); //Скрипт должен работать постоянно
 # ob_implicit_flush(); //Все echo должны сразу же выводиться


  $address = '151.248.113.144'; //Адрес работы сервера
  $port = 9091; //Порт работы сервера



  if (($socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0) {
    //AF_INET - семейство протоколов
    //SOCK_STREAM - тип сокета
    //SOL_TCP - протокол
    echo "Ошибка создания сокета";
  }
  else {
    echo "Сокет создан<br>";
  }


  $result = socket_connect($socket, $address, $port);
  if ($result === false) {
    echo "Ошибка при подключении к сокету";
  } else {
    echo "Подключение к сокету прошло успешно<br>";
  }

  $msg = "qwerty";
  echo "Сообщение серверу: $msg<br>";
  socket_write($socket, $msg, strlen($msg)); //Отправляем серверу сообщение
  $out = socket_read($socket, 1024); //Читаем сообщение от сервера
  echo "Сообщение от сервера: $out.<br>"; //Выводим сообщение от сервера


  $msg = 'blablabla'; 
  echo "Сообщение серверу: $msg<br>";
  socket_write($socket, $msg, strlen($msg));
   $out = socket_read($socket, 1024); //Читаем сообщение от сервера
  echo "Сообщение от сервера: $out.<br>"; //Выводим сообщение от сервера


  //Останавливаем работу с сокетом
  if (isset($socket)) {
    socket_close($socket);
    echo "Сокет успешно закрыт";
  }
?>