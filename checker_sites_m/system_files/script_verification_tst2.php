<?php
$work_time=date('H:i');

if($work_time>='08:00' && $work_time<='22:00')
{
require_once('/home/.../public_html/system_files/classes.php');

// сюда нужно вписать токен вашего telegram бота
define('TELEGRAM_TOKEN', 'токен');
// сюда нужно вписать ваш внутренний айдишник
define('TELEGRAM_CHATID', 'айдишник');

//объявляем подключение к базе
$link=Connect_DB::connect_to_db();


$sites_m=OurProjects::GetListProjects($link);
foreach ($sites_m as $site) 
{
	$check_url = CheckProjects::sendUrl($site);
    if(!$check_url)
    {
        CheckProjects::message_to_telegram("Возможно сайт $site не работает! Или он просто в этот раз загружался немного дольше чем обычно)))");
    }
}
//echo $work_time;
}
?>
