<?php 
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/system_files/classes.php');
$SET_METATAGS_AND_H1 = new MetaTagsAndH1;
$SET_METATAGS_AND_H1->title = 'Административная панель';
$SET_METATAGS_AND_H1->h1 = 'Административная панель';
require($_SERVER['DOCUMENT_ROOT'].'/system_files/header.php');
?>

<?php
//объявляем подключение к базе
$link=Connect_DB::connect_to_db();
//script for entrance begin
$show_err_entrance=0;
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
$current_date=date("F d, Y, h:i a");
$alarm_class='';
$arr_projects=OurProjects::GetListProjects($link);
foreach($arr_projects as $arr_project)
{
    if(CheckProjects::dif_date_in_days(CheckProjects::show_date_ending_ssl($arr_project), $current_date)<14)
    {
        $alarm_class='alarm';
    }
    else
    {
        $alarm_class='';
    }
    echo '<div class="our_proj">'.'<a href="'.$arr_project.'" target="_blank">'.$arr_project.'</a> <span class="'.$alarm_class.'">До окончания ssl сертификата '.CheckProjects::declOfNum(CheckProjects::dif_date_in_days(CheckProjects::show_date_ending_ssl($arr_project), $current_date), ['день', 'дня', 'дней']).'</span></div>';
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
        }
  
    }
    if($show_err_entrance!=1)
    {
        echo 'Неверный пароль. <a href="/">Вернуться на Главную</a>';
    }
//script for entrance end
?>

</div>

<?php 
require($_SERVER['DOCUMENT_ROOT'].'/system_files/footer.php');
?>