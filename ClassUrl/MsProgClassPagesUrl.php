<?php 
class ClPagesUrl
{
   private static $url_with_get_p;
   private $url;
   private $check_in_url;

   /*Метод для очистки url от get-параметров*/
   public static function GetPageUrlWithoutGetParams()
   {
        self::$url_with_get_p=$_SERVER['REQUEST_URI'];

		self::$url_with_get_p=preg_replace('/\?.*/','', self::$url_with_get_p);

        return self::$url_with_get_p;
   }

   /*Поиск симолов в url*/
   public function SetCharsSearchInUrl($chars)
   {
       $this->$check_in_url = $chars;
   }
   public function SearchCharsInUrl()
   {
        $this->url=$_SERVER['REQUEST_URI'];
        if(strstr($this->url, $this->$check_in_url))
        {
            return true;
        }
    
   }
   
}

?>