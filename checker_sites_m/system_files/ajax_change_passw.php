<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/system_files/classes.php');

if(!empty($_GET['change_password']))
{
    //подключаемся к базе
    $link=Connect_DB::connect_to_db();

    $change_passw=md5($_GET['change_password']);
    mysqli_query($link, "UPDATE LoginPassword SET PassWord = '$change_passw'");
    echo 'Пароль успешно изменен на '.$_GET['change_password'];
}
else{
    echo 'Введите новый пароль';
}
?>