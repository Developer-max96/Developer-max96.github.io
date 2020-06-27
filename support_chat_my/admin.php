<?php 
session_start();
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <title>Панель настроек чат-бота поддержки сайта</title>
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
<div class="header"><h1 class="zagolovok">Панель настроек чат-бота поддержки сайта</h1></div> 
<div><a href="/support_chat_my/system_files/vhod.php?exit=Y" class="exit"><span class="text-exit">Выход</span> </a> </div>
<div><a href="/support_chat_my/history.php" target="blank" class="history_chat">История вопросов и ответов</a></div>
<div class="block_quections" id="block_quections"><!-- Начался блок вопросов -->
<?php
$query = mysqli_query($link, "SELECT * FROM quection_answer");


while ($res = mysqli_fetch_array($query))
{
  echo '
<div class="inline q">
  <div class="otobrazhenie_voprosa_panel"> 
        <p class="text_q_a"> Вопрос № '.$res['id'].' '.$res['quection'].'</p>  </div>
    </div>';

  echo '
<div class="inline">
  <div class="otobrazhenie_voprosa_panel"> 
        <p class="text_q_a">'.$res['answer'].'</p>  </div>
    </div>  <span class="razdel">;</span>  ';
}
?>
 	
</div> <!--Окончился блок вопросов -->

<!-- Начался блок записи вопросов -->
 <div class="block_form_create_quections">
 	<div class="form_create_quections inline">
 	<div class="block_text_panel_preferences"><p class="text_form_panel_preferences">Форма задания дерева вопросов и ответов чат-бота</p></div>
 		<form id="form_create_quections" action="javascript:void(null);">
 			<div class="pole1_create">
 			<div class="inline"><p class="text_on_forms">Введите вопрос:</p></div>
 			<div class="inline"><input type="text" id="create_quection" name="create_quection" class="text_field_form_quections reset"></div>
 			</div>
 			<div class="pole2_create">
 			<div class="inline"><p class="text_on_forms">Введите ответ:</p></div>
 			<div class="inline"><input type="text" id="create_answer" name="create_answer" class="text_field_form_quections reset"></div>
 			</div>
 			<div class="button_create_quection"><input type="button" id="button_create_quection" value="Записать" class="zapisat_vopros"></div>
 		</form>
 	</div>
 	<div class="block_clean_quections inline">
 		<div class="block_text_panel_preferences"><p class="text_form_panel_preferences">Очистить дерево вопросов и ответов чат-бота</p></div>
 	<form id="form_del_all_quections" action="javascript:void(null);">
    <input type="hidden" name="del_all" value="del_all">
 		<div class="block_button_clean1"><input type="submit" id="clean_all" name="clean_all" class="button_clean_quections" value="Очистить все дерево вопросов и ответов"> </div>
  </form>

  <form id="form_del_by_num" action="javascript:void(null);">
    <input type="hidden" name="del_by_num" value="del_by_num">
    <div class="block_button_clean1 inline"><input type="submit" id="del_by_num" name="del_by_num" class="button_clean_quections" value="Удалить"> </div>
    <div class="inline"><input type="text" name="del_s" placeholder="С" class="del_select"></div>
    <div class="inline"><input type="text" name="del_po" placeholder="ПО" class="del_select"></div>
  </form>
 	</div>

<div class="zamena_imeni_i_parola_block">
  <div class="block_text_panel_preferences"><p class="text_form_panel_preferences"> Изменить имя чат-бота и пароль (Можно изменять отдельно, т.е. только имя чат-бота или только пароль)</p></div>
<form id="form_change_pass" action="javascript:void(null);">
<input type="text" id="" name="change_name_chat" class="text_field_form_quections otstup_change" placeholder="изменить имя чат-бота">
<input type="password" id="" name="change_passw" class="text_field_form_quections otstup_change" placeholder="изменить пароль">
<input type="submit" name="change" value="Заменить" class="change" id="change_pass">
</form>
</div>


 </div>
 <!-- Закончился блок записи вопросов -->
<div class="footer"><p class="copyright">(С) Разработчик чат-бота Скворцов  М.</p> </div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>
<script src="/support_chat_my/system_files/script_chat.js"></script>

<?php 
		}
	}
?>
</body>
</html>