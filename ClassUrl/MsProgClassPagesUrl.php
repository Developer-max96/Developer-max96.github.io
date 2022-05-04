<?php 
class ClPagesUrl
{

   private $url;
   private $check_in_url;

   /*Метод для очистки url от get-параметров*/
   public static function GetPageUrlWithoutGetParams()
   {
        return preg_replace('/\?.*/', '', $_SERVER['REQUEST_URI']);
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