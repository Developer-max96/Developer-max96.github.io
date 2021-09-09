<?php
session_start();
if(!empty($_POST['login']) && !empty($_POST['password']))
{
    $_SESSION['login']=$_POST['login'];
    $_SESSION['password']=$_POST['password'];
    header("Location: /admin/", true, 301);
}
else{
    echo 'Не введены Логин и пароль!!! <a href="/">Вернуться на Главную</a>';
}
?>