<?php

define('HOST', 'localhost'); //хост базы данных как правило localhost
define('USER_NAME', 'pgd0211_allcorp'); //имя пользователя базы данных (логин)
define('DB_PASSWORD', 'g*24&Zbn');//пароль базы данных
define('DB_NAME', 'pgd0211_allcorp');//имя базы данных

$link = mysqli_connect(HOST, USER_NAME, DB_PASSWORD, DB_NAME);
?>