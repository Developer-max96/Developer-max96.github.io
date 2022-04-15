<?php 
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/system_files/functions.php'))
{
    require_once($_SERVER['DOCUMENT_ROOT'].'/system_files/functions.php');
}
?>

<footer>
<div <?if($_SERVER['REQUEST_URI']=='/'):?>class="main_footer"<?endif;?>>
    (c) 2021 Разработчик сервиса Скворцов М.А.
</div>
</footer>
</body>
</html>
