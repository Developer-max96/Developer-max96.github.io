<?php 
session_start(); 
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <title>История вопросов и ответов</title>
  <link rel="stylesheet" href="/support_chat_my/system_files/style_chat.css" />
</head>
<body>
<?php
	//Подключаемся к базе данных
require($_SERVER['DOCUMENT_ROOT']."/support_chat_my/system_files/connect_db.php");
$query = mysqli_query($link, "SELECT * FROM create_chatbot");

	while ($result = mysqli_fetch_array($query)) 
	{
		if($result['password'] == md5($_SESSION['password']))
		{
?>
	<div class="header"><h1 class="zagolovok">История вопросов и ответов</h1></div>
	
	<div class="clean_history_chat">	
<form id="form_clean_history" action="javascript:void(null);">
    <input type="hidden" name="clean_history" value="clean_history">
    <div class="block_button_clean1 inline"><input type="submit" id="clean_history" name="clean_his" class="button_clean_quections" value="Очистить историю"> </div>
</form>
	</div>
<div id="table_hist">
<table class="history_table">
    <tr class="colum_hist">
        <td class="colum_hist"><span class="bold">Дата</span></td>
        <td class="colum_hist"><span class="bold">Вопрос пользователя</span></td>
        <td class="colum_hist"><span class="bold">Ответ чат-бота</span></td>
    </tr>
<?php
$query_histoty = mysqli_query($link, "SELECT * FROM history_chatbot");
while ($view_history = mysqli_fetch_array($query_histoty))
{
	echo '<tr class="colum_hist">'.'<td class="colum_hist">'.$view_history[date_dd_mm_yy].'</td>'.'<td class="colum_hist">'.$view_history[quection].'</td>'.'<td class="colum_hist">'.$view_history[answer].'</td>'.'</tr>';

}
?>
</table>
</div>
<div class="footer"><p class="copyright">(С) Разработчик чат-бота Скворцов  М.</p> </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>
<script src="/support_chat_my/system_files/script_chat.js"></script>

<?php
	}
		}
?>
</body>
</html>