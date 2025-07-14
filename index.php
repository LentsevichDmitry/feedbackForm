<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guest book</title>
</head>
<body>
<form action="do.php" method="post">
    <label for="name">Name</label>
    <br>
    <input type="text" name="name" id="name" required>
    <br>
    <label for="email">Email</label>
    <br>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="comment">Comment</label>
    <br>
    <textarea name="comment" id="comment" cols="50" rows="10" required></textarea>
    <br>
    <button type="submit">Submit</button>
</form>
<?php
//создание переменной с именем файла
$file = 'guestBook.json';
//проверка пустой ли файл
if (filesize($file) > 0)
{
    //получаем все данные из файла в массив json
    $json = file_get_contents($file);
    //декодируем данные в ассоциативный массив
    $comments = json_decode($json, true);
    //перебераем многомерный массив
    foreach ($comments as $comment)
    {
        //разделение каждого комментария линией с помощью html-тега <hr>
        echo "<hr>";
        /*перебераем каждый вложенный массив и разбиваем его по ключ => значение и выводим на экран
        в виде комментариев с именем, почтой и самим комментарием*/
        foreach ($comment as $key => $value)
        {
            echo "$key: $value<br>";
        }
        //разделение каждого комментария линией с помощью html-тега <hr>
        echo "<hr>";
    }
}
?>
</body>
</html>
