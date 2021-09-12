<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/system_files/classes.php');
$SET_METATAGS_AND_H1 = new MetaTagsAndH1;
$SET_METATAGS_AND_H1->title = 'Главная';
$SET_METATAGS_AND_H1->h1 = 'Сервис проверки веб-сайтов';
require($_SERVER['DOCUMENT_ROOT'].'/system_files/header.php');
?>


<div class="form_main_container">
<form method="POST" action="/system_files/entrance.php">
    <label>Введите:</label>
    <div><input type="text" placeholder="Ваш логин" name="login"></div>
    <label>Введите:</label>
    <div><input type="password" placeholder="Ваш пароль" name="password"></div>
    <div><input type="submit" class="btn_main_entrance" value="Войти"></div>
</form>
</div>

<?php require($_SERVER['DOCUMENT_ROOT'].'/system_files/footer.php');?>