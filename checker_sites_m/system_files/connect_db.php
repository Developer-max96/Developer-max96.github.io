<?php

define('HOST', 'localhost'); //хост базы данных как правило localhost
define('USER_NAME', 'db_user_name'); //имя пользователя базы данных (логин)
define('DB_PASSWORD', 'db_pasword');//пароль базы данных
define('DB_NAME', 'db_name');//имя базы данных

$link = mysqli_connect(HOST, USER_NAME, DB_PASSWORD, DB_NAME);
?>
