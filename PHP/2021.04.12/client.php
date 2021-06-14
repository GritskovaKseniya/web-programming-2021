<?php
header("Content-Type: text/html; charset=utf-8");

$address = '151.248.113.144'; //Адрес работы сервера
$port = 8013; //Порт работы сервера

$data = '';

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}


if (isset($_POST) && isset($_POST['number'])) {
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    if ($socket < 0) {
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
        alert("Запусти сервер");
        echo "Ошибка при подключении к сокету";
    } else {
        echo "Подключение к сокету прошло успешно<br>";
    }
    socket_write($socket, $_POST['number'], strlen($_POST['number']));
    $data = socket_read($socket, 1024);

    if (isset($socket)) {
        socket_close($socket);
    }
}

echo $data;
?>