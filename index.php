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
$file = 'guestBook.json';
if (filesize($file) > 0)
{
    $json = file_get_contents($file);
    $comments = json_decode($json, true);
    foreach ($comments as $comment)
    {
        echo "<hr>";
        foreach ($comment as $key => $value)
        {
            echo "$key: $value<br>";
        }
        echo "<hr>";
    }
}
?>
</body>
</html>
