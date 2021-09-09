<?php

$work_time=date('H:i');

if($work_time>='08:00' && $work_time<='20:00')
{
    
// сюда нужно вписать токен вашего telegram бота
define('TELEGRAM_TOKEN', '1753551935:AAGIQwnbb2PGv8dc4DuL2_t49LT9_uEvmNU');
// сюда нужно вписать ваш внутренний айдишник -483969318
define('TELEGRAM_CHATID', '-483969318');// -483969318


function sendUrl($url) {
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        return false;
    }
    if (function_exists('curl_init')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        if ($response) {
            return $response;
        } else {
            return false;
        }
    } else {
        $content = @file_get_contents($url);
        if ($content === false) {
            return false;
        } else {
            return $content;
        }
    }
}


//подключаемся к базе
require_once($_SERVER['DOCUMENT_ROOT'].'/system_files/connect_db.php');
$query = mysqli_query($link, "SELECT * FROM Sites_for_checking");
while ($result = mysqli_fetch_array($query)) 
	{
        $check_url = sendUrl($result['Site']);
		if(!$check_url)
        {
            //$tbot = file_get_contents("https://api.telegram.org/bot".TELEGRAM_TOKEN."/sendMessage?chat_id=".TELEGRAM_CHATID."&text=".urlencode("Сайт $arr_check_site[$i] недоступен!!!"));
            echo "Сайт $result[Site] недоступен!!!";
        }
    }





}

?>