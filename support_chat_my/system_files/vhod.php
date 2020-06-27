<?php
session_start();
if(!empty($_POST['chat_name']) && !empty($_POST['password']))
{
	$_SESSION['password'] = $_POST['password'];
	header("Location: /support_chat_my/admin.php");
}
if(!empty($_GET['exit']))
{
	session_unset();//удаляем все переменные сессии
	session_destroy();//удаляем сессию
	header("Location: /support_chat_my/");
}
?>