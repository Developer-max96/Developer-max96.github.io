<?php
if(!empty($_GET['del_all_projects']))
{
    //подключаемся к базе
    require_once($_SERVER['DOCUMENT_ROOT'].'/system_files/connect_db.php');
    mysqli_query($link, "DELETE FROM Sites_for_checking");
    echo '<span style="color:green; font-size:20px;">Список проектов очищен!</span>';
}

?>