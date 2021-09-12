<?php 
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/system_files/classes.php');
$SET_METATAGS_AND_H1 = new MetaTagsAndH1;
$SET_METATAGS_AND_H1->title = 'Административная панель';
$SET_METATAGS_AND_H1->h1 = 'Административная панель';
require($_SERVER['DOCUMENT_ROOT'].'/system_files/header.php');
?>

<?php
//подключаемся к базе
require_once($_SERVER['DOCUMENT_ROOT'].'/system_files/connect_db.php');
$show_err_entrance=0;
//script for entrance begin
$query = mysqli_query($link, "SELECT * FROM LoginPassword");
while ($result = mysqli_fetch_array($query)) 
	{
		if($result['PassWord'] == md5($_SESSION['password']))
		{
            $show_err_entrance=1;
?>

<div class="content_wrapper">
<div class="cont_btn_exit">
    <a href="/system_files/exit.php?EXIT=Y"><div class="btn_exit">Выход</div></a>
</div>

<div class="clr_fix"></div>

<div class="cont_btn_change_passw">
    <a href="/change_password/" target="_blank"><div class="btn_change_passw">Изменить пароль</div></a>
</div>

<div class="clr_fix"></div>

<h2>Наши проекты</h2>
<?php
$show_projects=mysqli_query($link, "SELECT * FROM Sites_for_checking");
while ($show_projects_res = mysqli_fetch_array($show_projects)) 
	{
        echo '<div class="our_proj">'.$show_projects_res['Site'].'</div>';
    }
?>

<br>
<div id="success_add_site"></div>
<div class="form_add_project">
    <form id="form_add_project" action="javascript:void(null);">
        <div><input type="text" name="project_name" placeholder="https://example.ru/"></div>
        <div><input type="submit" value="Добавить новый проект" id="btn_add_project"></div>
    </form>
</div>

<br>
<br>

<div id="success_remove_project"></div>
<div class="form_delete_site">
    <form id="form_delete_project" action="javascript:void(null);">
        <div><input type="text" name="del_project_name" placeholder="https://example.ru/"></div>
        <div><input type="submit" value="Удалить проект" id="btn_del_project"></div>
    </form>
    <br>
    <form id="form_delete_all_project" action="javascript:void(null);">
        <input type="hidden" value="del_all_projects" name="del_all_projects">
        <div><input type="submit" name="del_all_projects" value="Очистить весь список проектов" id="btn_del_all_project"></div>
    </form>
</div>



<?php
        //script for entrance end
        }
  
    }
    if($show_err_entrance!=1)
    {
        echo 'Неверный пароль. <a href="/">Вернуться на Главную</a>';
    }
?>

</div>

<?php 
require($_SERVER['DOCUMENT_ROOT'].'/system_files/footer.php');
?>