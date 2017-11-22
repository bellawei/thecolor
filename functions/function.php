<?php

// 引入 config 配置文件
require 'config.php';
function my_select($sql)
{
    $link = mysqli_connect(HOSTNAME, USERNAME, USERPASS, DBNAME);
    if ($link==false) {
        die('数据库连接失败,请检查');
    } else {
        $result = mysqli_query($link, $sql);
        $data = array();
        $row = mysqli_fetch_assoc($result);
        while ($row) {
              $data[]=$row;
              $row = mysqli_fetch_assoc($result);
        }
        mysqli_free_result($result);
        mysqli_close($link);
        return $data;
    }
}

  // 增,删,改
function my_execute($sql)
{
    $link = mysqli_connect(HOSTNAME, USERNAME, USERPASS, DBNAME);
    if ($link==false) {
        die('连接失败请检查');
    } else {
        mysqli_query($link, $sql);
        mysqli_close($link);
    }
}

  // 上传成功了 返回true 失败 返回 false
function upload($fileName, $targetPath)
{
    $allowTypes = array('image/png','image/jpeg','image/gif');
    $uploadType = $_FILES[$fileName]['type'];
    if (in_array($uploadType, $allowTypes)) {
        move_uploaded_file($_FILES[$fileName]['tmp_name'], $targetPath);
        return true;
    } else {
      // 不允许 提
        return false;
    }
}

function randomNameWithType($oldName)
{
    $newName ='';
    $newName .=date('Y_m_d_H_i_s_');
    $letter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    for ($i=0; $i<6; $i++) {
        $newName .=$letter[mt_rand(0, 25)];
    }
    $type = strrchr($oldName, '.');
    $newName.=$type;
    return $newName;
}
