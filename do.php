<?php
//переменная с именем файла
$file = 'guestBook.json';

//проверка на существование файла, если нет то создаем пустой файл
if (!file_exists($file)) {
    file_put_contents($file, '');
} else {
//если файл создан, добавляем данные из файла в переменную $json
    $json = file_get_contents($file);
//декодируем json в ассоциативный массив, если успешно, возвращаем массив, если нет, то возвращаем пустой массив
    $comments = json_decode($json, true) ?: [];
}

//получаем данные из нашей формы и присваиваем их переменным
$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];
//получаем дату и время отправки комментария
$dateNow = date('Y-m-d H:i:s');

//записываем все полученнные данные в ассоциативный массив
$newComment = [
    'name' => $name,
    'email' => $email,
    'comment' => $comment,
    'date' => $dateNow
];
//добавляем новый комментарий в массив к остальным комментариям
$comments[] = $newComment;
//кодируем массив в json
$jsonE = json_encode($comments, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
//записываем закодированный массив в файл
file_put_contents($file, $jsonE);

header("Location: index.php");
