<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <title>Вход в панель настроек чат-бота поддержки сайта</title>
  <link rel="stylesheet" href="/support_chat_my/system_files/style_chat.css" />
</head>
<body>
 <div class="header"><h1 class="zagolovok">Вход в панель настроек чат-бота поддержки сайта</h1></div> 
 <div>
 <p class="proizv_text">Если вы еще не создали имя чат-бота и пароль для входа в панель настроек, нажимте <a href="/support_chat_my/registratsia.php">Здесь</a></p>
 </div>
 <div class="block_forms">
 	<form method="post" action="/support_chat_my/system_files/vhod.php">
	<div class="forma_vhoda_block_pole1">
		<div class="inline"><p class="text_on_forms">Введите имя чат-бота:</p></div>
		<div class="inline"><input type="text" name="chat_name" class="input_text"></div>
	</div>
	<div class="forma_vhoda_block_pole2">
		<div class="inline"><p class="text_on_forms">Введите пароль:</p></div>
		<div class="inline forma_vhoda_otstup_pole2"><input type="password" name="password" class="input_text"></div>
	</div>
	<div class="block_button">
		<input type="submit" value="Войти" id="button_on_forms">
	</div>
	<div class="block_back_site">
	<a href="/" class="back_to_my_site">Вернуться обратно на сайт</a>
	</div>
	</form>
</div>

<div class="footer"><p class="copyright">(С) Разработчик чат-бота Скворцов  М.</p> </div>
</body>
</html>