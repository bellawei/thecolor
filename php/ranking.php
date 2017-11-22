<?php 
header('content-type:text/html;charset=utf-8');
require '../functions/function.php';

//------------------------取用数据-----------------


$getData = "SELECT * FROM thecolor02 ORDER BY score DESC limit 16";;
$data = my_select($getData);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<link rel="stylesheet" type="text/css" href="css/iconfont/iconfont.css">
<link rel="stylesheet" href="../css/thecolor.css"/>
<body>
    <div class="rankingbox">
    
        <table>
            <caption class="caption">排行榜</caption>
            <thead>
                <td>姓名</td>
                <td>得分</td>
                <td>等级</td>  
            </thead>

            <?php  
            for($i=0;$i<count($data);$i++){ 
    
            ?>
            <tr>
                <td><?php echo $data[$i]['username'] ?></td>
                <td><?php echo $data[$i]['score'] ?></td>
                <td><?php echo $data[$i]['title'] ?></td>
            </tr>

            <?php } ?>
        </table>
        <a href="../index.php"class="backToGame" >返回游戏</a>
    </div>
    
</body>
</html>