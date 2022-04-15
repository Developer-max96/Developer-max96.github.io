<?php
require_once('/home/p/pgd0211/testallcorp.evrica.marketing/public_html/system_files/connect_db.php');

class MetaTagsAndH1
{
    public $title;
    public $description;
    public $keywords;
    public $h1;

    public function show_title()
    {
        return $this->title;
    }
    public function show_description()
    {
        return $this->description;
    }
    public function show_keywords()
    {
        return $this->keywords;
    }
    public function show_h1()
    {
        return $this->h1;
    }
}

class Connect_DB
{
    private static $db_hosr=HOST;
    private static $db_user=USER_NAME;
    private static $db_password=DB_PASSWORD;
    private static $db_name=DB_NAME;

    public static function connect_to_db()
    {
        $connect = mysqli_connect(self::$db_hosr, self::$db_user, self::$db_password, self::$db_name);
        return $connect;
    }
}

class OurProjects
{
    public static function GetListProjects($link)
    {
        $show_projects=mysqli_query($link, "SELECT * FROM Sites_for_checking");
        while ($show_projects_res = mysqli_fetch_array($show_projects)) 
        {
            $arr_our_sites[]=$show_projects_res['Site'];
        }
        return $arr_our_sites;
    }
}

class CheckProjects
{
    /*public static function send_headers_socket($url)
    {
        $url_param = parse_url($url);
        
        if($url_param['scheme']=='http') 
            $handle = fsockopen($url_param['host'],80); 
        else

        $fp=fsockopen('ssl://'.$url_param['host'], 443, $errno, $errstr, 30);

        if(!$handle = $fp) return false; 
        
        if(!isset($url_param['path']) || $url_param['path']=='') $url_param['path']='/';

        $headers  = "GET ".$url_param['path']." HTTP/1.1\r\n";
        $headers.= "Host: ".$url_param['host']."\r\n";
        $headers.= "Connection: close\r\n";
        $headers.="\r\n";
        fputs($handle,$headers);
        return $handle;
    }

    public static function get_resp_socket($handle)
    {
        if (!$handle) return false;


        $resp='';
        while (!feof($handle)) {
            $resp.= fgets($handle,128);
        }
        fclose($handle);
        $headers = substr($resp, 0, strpos($resp, "\r\n\r\n"));
        return  explode("\r\n", $headers);
    }*/

    public static function sendUrl($url) 
    {
        // Проверка правильности URL
        if(!filter_var($url, FILTER_VALIDATE_URL)){
          return false;
        }
        // Инициализация cURL
        $curlInit = curl_init($url);
        // Установка параметров запроса
        curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,300);
        curl_setopt($curlInit,CURLOPT_HEADER,true);
        curl_setopt($curlInit,CURLOPT_NOBODY,true);
        curl_setopt($curlInit, CURLOPT_VERBOSE, false);
        curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curlInit, CURLOPT_SSL_VERIFYPEER, false);
        // Получение ответа
        $response = curl_exec($curlInit);
        // закрываем CURL
        curl_close($curlInit);
        return $response ? true : false;
    }

    public static function message_to_telegram($text)
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
    public static function show_date_ending_ssl($url)
    {
        $orignal_parse = parse_url($url, PHP_URL_HOST); 
        $get = stream_context_create(array("ssl" => array("capture_peer_cert" => TRUE, "verify_peer" => false, "verify_peer_name" => false)));
        $read = stream_socket_client("ssl://".$orignal_parse.":443", $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $get);
        $cert = stream_context_get_params($read);
        $certinfo = openssl_x509_parse($cert['options']['ssl']['peer_certificate']);

        $d=date(DATE_RFC2822, $certinfo['validTo_time_t']);
        return date("F d, Y, h:i a", strtotime($d));
    }
    public static function dif_date_in_days($date1, $date2)
    {
        $dif = (strtotime($date1)-strtotime($date2))/86400;//в одних сутках 86400 сек.
        return round($dif, 0, PHP_ROUND_HALF_DOWN);
    }
    public static function declOfNum($number, $titles)
    {
        $cases = array (2, 0, 1, 1, 1, 2);
        return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];
    }
}

?>