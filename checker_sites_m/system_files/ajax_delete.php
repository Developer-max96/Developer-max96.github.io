<?php
//подключаемся к базе
require_once($_SERVER['DOCUMENT_ROOT'].'/system_files/connect_db.php');

if(!empty($_GET['del_project_name']))
{
    $site_d=$_GET['del_project_name'];
    mysqli_query($link, "DELETE FROM `Sites_for_checking` WHERE `Site`='$site_d'");
    echo '<span style="color:green; font-size:20px;">Проект '.$site_d.' успешно удален!</span>';
}
else
{
    echo '<span style="color:red; font-size:20px;">Ошибка! введите адрес сайта для удаления!</span>';
}

?>