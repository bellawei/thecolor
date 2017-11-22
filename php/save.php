<?php

require '../functions/function.php';
/*
print_r($_POST);
Array ( 
    [username] => bella
    [score] => 2 
    [title] => 鹰 )*/
// ----------------------保存数据------------------
$userName = $_POST['username'];
$score = $_POST['score'];
$title = $_POST['title'];
$save = "INSERT INTO thecolor02 (username,score,title) VALUES ('$userName','$score','$title')";
my_execute($save);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <script>
        window.location.href="ranking.php"
    </script>  
</body>
</html>
