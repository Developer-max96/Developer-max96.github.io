<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <title>Создайте имя чат-бота и пароль</title>
  <link rel="stylesheet" href="/support_chat_my/system_files/style_chat.css" />
</head>
<body>
 <div class="header"><h1 class="zagolovok">Создайте имя чат-бота и пароль</h1></div> 
 
 <div class="block_forms">
 	<form method="post" action="/support_chat_my/registratsia.php">
	<div class="forma_vhoda_block_pole1">
		<div class="inline"><p class="text_on_forms">Создайте имя чат-бота:</p></div>
		<div class="inline"><input type="text" name="create_chat_name" class="input_text"></div>
	</div>
	<div class="forma_vhoda_block_pole2">
		<div class="inline"><p class="text_on_forms">Создайте пароль:</p></div>
		<div class="inline forma_vhoda_otstup_pole2"><input type="password" name="create_password" class="input_text"></div>
	</div>
	<div class="block_button">
		<input type="submit" value="Создать чат-бот" id="button_on_forms">
	</div>
	</form>
	<div class="block_back_panel_nastroek"><a class="back_panel_nastroek" href="/support_chat_my/">Вернуться к форме входа в панель настроек</a></div>
</div>

<?php
//Подключаемся к базе данных
require($_SERVER['DOCUMENT_ROOT']."/support_chat_my/system_files/connect_db.php");
//Создаем таблицу содержащую имя и пароль чат-бота
mysqli_query($link, "CREATE TABLE create_chatbot (chat_name varchar (50), password varchar (50));");

//создаем таблицу для дерева вопросов и ответов
mysqli_query($link, "CREATE TABLE quection_answer (
    id int NOT NULL AUTO_INCREMENT, 
    quection varchar (5000), 
    answer varchar (5000),
    PRIMARY KEY(id));");

//Создаем таблицу для хранения истории вопросов и ответов
mysqli_query($link, "CREATE TABLE history_chatbot (date_dd_mm_yy varchar (10), quection varchar (5000), answer varchar (5000));");

//считаем количество записей в таблице create_chatbot, т.е. количество созданных чатботов
$select = mysqli_query($link, "SELECT COUNT(*) FROM create_chatbot");
$checK_count_chat = "";
while($result = mysqli_fetch_array($select))
{
	if($result['COUNT(*)'] == '0')
	{
		$checK_count_chat = "one_chat";
	}
	
}
//если отправлена форма создания имени и пароля чат-бота и количество чатботов не превышает 1 , записываем имя и пароль в базу данных
if($checK_count_chat == "one_chat")
{
	if(!empty($_POST['create_chat_name']) && !empty($_POST['create_password']))
	{
		$create_name = $_POST['create_chat_name'];
		$create_pass = md5($_POST['create_password']);
		mysqli_query($link, "INSERT INTO create_chatbot VALUES('$create_name','$create_pass');");
		echo '<script> alert("Вы успешно создали чат-бот. Имя чат-бота: '.$create_name.' Пароль: '.$_POST['create_password'].'")</script>';
	}
}
else
{
	echo '<script> alert("Чатбот уже создан")</script>';
}
?>

<div class="footer"><p class="copyright">(С) Разработчик чат-бота Скворцов  М.</p> </div>
</body>
</html>