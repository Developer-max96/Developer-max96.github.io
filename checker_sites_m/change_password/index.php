<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/system_files/classes.php');
$SET_METATAGS_AND_H1 = new MetaTagsAndH1();
$SET_METATAGS_AND_H1->title='Сменить пароль';
$SET_METATAGS_AND_H1->h1='Изменение пароля';
require($_SERVER['DOCUMENT_ROOT'] . '/system_files/header.php');
?>

<?php
//подключаемся к базе
require_once($_SERVER['DOCUMENT_ROOT'].'/system_files/connect_db.php');
//script for entrance begin
$query = mysqli_query($link, "SELECT * FROM LoginPassword");
while ($result = mysqli_fetch_array($query)) 
	{
		if($result['PassWord'] == md5($_SESSION['password']))
		{
?>

<div id="success_change_passw"></div>

<div class="form_main_container">
<form id="form_change_password" action="javascript:void(null);">
    <label>Введите:</label>
    <div><input type="password" placeholder="Ваш новый пароль" name="change_password"></div>
    <div><input type="submit" class="btn_main_entrance" id="btn_change_passw" value="Изменить пароль"></div>
    <p>Вернуться в <a href="/admin/">административную палель</a></p>
</form>
</div>



<?php
//script for entrance end
        }
        else
        {
            echo 'Неверный пароль! Вернуться на <a href="/">Главную</a>';
        }
    }
?>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/system_files/footer.php'); ?>