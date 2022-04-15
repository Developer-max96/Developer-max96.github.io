<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/system_files/classes.php');

if(!empty($_GET['del_all_projects']))
{
    //подключаемся к базе
    $link=Connect_DB::connect_to_db();
    mysqli_query($link, "DELETE FROM Sites_for_checking");
    echo '<span style="color:green; font-size:20px;">Список проектов очищен!</span>';
}

?>