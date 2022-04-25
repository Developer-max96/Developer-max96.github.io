<?php
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/MsProgClassPagesUrl.php'))
{
  require_once($_SERVER['DOCUMENT_ROOT'].'/MsProgClassPagesUrl.php');
}

echo ClPagesUrl::GetPageUrlWithoutGetParams();//Выводим url без гет параметров

/*Проверяем есть ли в url указанные символы*/
$my_page = new ClPagesUrl;
$my_page->SetCharsSearchInUrl('test_');

if($my_page->SearchCharsInUrl())
{
  echo 'Chars found!!!';
}

?>

