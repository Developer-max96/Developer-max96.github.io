<?php
//подключаемся к базе
require_once($_SERVER['DOCUMENT_ROOT'].'/system_files/connect_db.php');

if(!empty($_GET['project_name']))
{
    $site=$_GET['project_name'];
    mysqli_query($link, "INSERT INTO `Sites_for_checking` VALUES ('$site')");
    echo '<span style="color:green; font-size:20px;">Проект '.$site.' успешно добавлен!</span>';
}
else{
    echo '<span style="color:red; font-size:20px;">Ошибка! Введите адрес сайта!</span>';
}

?>