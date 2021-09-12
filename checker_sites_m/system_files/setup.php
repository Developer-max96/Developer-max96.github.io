<?php

//подключаемся к базе
require_once($_SERVER['DOCUMENT_ROOT'].'/system_files/connect_db.php');

if(mysqli_query($link, "CREATE TABLE LoginPassword (login varchar(50), PassWord varchar(50));"))
{
    mysqli_query($link, "INSERT INTO LoginPassword VALUES('root','202cb962ac59075b964b07152d234b70');");
    echo '<span style="font-size:20px; color:green;">Таблица для логина и пароля создана</span> <br>';
}

if(mysqli_query($link, "CREATE TABLE Sites_for_checking (Site varchar(400), UNIQUE (Site));"))
{
    echo '<span style="font-size:20px; color:green;">Таблица для проектов создана. Установка завершена! <span style="font-weight:bold;">Ваш логин: root Ваш пароль: 123</span> <a href="/">Перейти на Главную</a></span>';
}

?>