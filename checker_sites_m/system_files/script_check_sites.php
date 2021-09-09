<?php

// сюда нужно вписать токен вашего telegram бота
define('TELEGRAM_TOKEN', '1753551935:AAGIQwnbb2PGv8dc4DuL2_t49LT9_uEvmNU');
// сюда нужно вписать ваш внутренний айдишник -483969318
define('TELEGRAM_CHATID', '-483969318');


$current_date=date("F d, Y, h:i a", time()+(7 * 24 * 60 * 60));

//подключаемся к базе
require_once($_SERVER['DOCUMENT_ROOT'].'/system_files/connect_db.php');

$query = mysqli_query($link, "SELECT * FROM Sites_for_checking");
while ($result = mysqli_fetch_array($query)) 
{
    if(strtotime($current_date)>=strtotime(show_date_ending_ssl($result['Site'])))
    {
        message_to_telegram("Срок действия ssl-сертификата на $result[Site] скоро закончится. Желательно обновить сертификат.");
        //echo "Срок действия ssl-сертификата на $result[Site] скоро закончится. Желательно обновить сертификат.";
    } 
}


function show_date_ending_ssl($url)
{
    $orignal_parse = parse_url($url, PHP_URL_HOST); 
    $get = stream_context_create(array("ssl" => array("capture_peer_cert" => TRUE, "verify_peer" => false, "verify_peer_name" => false)));
    $read = stream_socket_client("ssl://".$orignal_parse.":443", $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $get);
    $cert = stream_context_get_params($read);
    $certinfo = openssl_x509_parse($cert['options']['ssl']['peer_certificate']);

    $d=date(DATE_RFC2822, $certinfo['validTo_time_t']);
    return date("F d, Y, h:i a", strtotime($d));
}

function message_to_telegram($text)
{
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => TELEGRAM_CHATID,
                'text' => $text,
            ),
        )
    );
    curl_exec($ch);
}


?>