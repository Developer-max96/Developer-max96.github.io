<?php
require_once('/home/.../public_html/system_files/classes.php');

// сюда нужно вписать токен вашего telegram бота
define('TELEGRAM_TOKEN', 'токен');
// сюда нужно вписать ваш внутренний айдишник
define('TELEGRAM_CHATID', 'айдишник');


$current_date=date("F d, Y, h:i a", time()+(7 * 24 * 60 * 60));
$current_date_real=date("F d, Y, h:i a");
//объявляем подключение к базе
$link=Connect_DB::connect_to_db();


$arr_projects=OurProjects::GetListProjects($link);
foreach($arr_projects as $arr_project)
{
    if(strtotime($current_date)>=strtotime(CheckProjects::show_date_ending_ssl($arr_project)))
    {
        if(CheckProjects::dif_date_in_days(CheckProjects::show_date_ending_ssl($arr_project), $current_date_real)>0)
        {
            CheckProjects::message_to_telegram('До окончания срока действия ssl-сертификата на '.$arr_project.' '. CheckProjects::declOfNum(CheckProjects::dif_date_in_days(CheckProjects::show_date_ending_ssl($arr_project), $current_date_real), ['день', 'дня', 'дней']).'! Желательно обновить сертификат.');
        }
        else
        {
            CheckProjects::message_to_telegram("SSL сертификат на $arr_project просрочен!!! Срочно обновите сертификат!!!");
        }
        
    } 
}

?>
