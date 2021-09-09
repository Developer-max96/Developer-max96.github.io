<?php
session_start();
if(!empty($_GET['EXIT']))
{
    unset($_SESSION['password']);
	session_destroy();//удаляем сессию
	header("Location: / ", true, 301);
}

?>