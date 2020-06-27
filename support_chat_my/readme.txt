
Шаги подключения чата

1) Скопировать в корень сайта (в папку public_html/) папку "support_chat_my";

2) Подключить стили и скрипты (стили в header, скрипты в footer)
Стили: 
<link rel="stylesheet" href="/support_chat_my/system_files/style_chat.css" />
Скрипты: 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>
<script src="/support_chat_my/system_files/script_chat.js"></script>

3) Перейти по пути /public_html/support_chat_my/system_files/ и в файле connect_db.php указать данные для подключения к базе данных


4) Поместить код в header (как правило файл header.php):
<!-- Отображение конопки вызова чат-бота поддержки сайта -->
    <a href="<?php echo $_SERVER['REQUEST_URI'].'#chat'; ?>" class="link_q">
    <div class="but_q">
    <div class="znak_q"><span class="znak_quection">?</span></div>
    <div class="inline"><span class="zadat_v">Задать вопрос</span></div>
    </div>
    </a>


5) Поместить код в footer сайта (как правило файл footer.php): 
<!-- Подключение чат-бота-->
<?php require($_SERVER['DOCUMENT_ROOT']."/support_chat_my/system_files/include_chatbot.php"); ?>

Или

<!-- Подключение чат-бота начало -->
<div class='chat' id='chat'>
	<div class='chat-messages'>
		<div class='chat-messages__content' id='messages_field'>
			<span class="zadat_vopros">Задать вопрос</span>
            <a href="support_chat_my" target="blanck"><span class="nastroit_chat">Настроить чат</span></a>
		</div>
	</div>
<div id="chat_field">
    <div class="massage_field">

    <?php
        //Подключаемся к базе данных
        require($_SERVER['DOCUMENT_ROOT']."/support_chat_my/system_files/connect_db.php");

        $query = mysqli_query($link, "SELECT * FROM create_chatbot");

        $chat_name = '';
        while ($res = mysqli_fetch_array($query))
        {
            $chat_name = $res[chat_name];
           echo "<div class='soobshenie'><span class='text_on_forms'>$chat_name: Здравствуйте!</span></div>";
        }


    ?>

    </div>
	<div class='chat-input'>
		<form id='chat-form' action="javascript:void(null);">
			<input type='text' id='message-text' name="user_messsage" class='chat-form__input reset' placeholder='Введите сообщение'> 
            <input type='submit' class='chat-form__submit' id="send_message" value='Отправить'>
		</form>
	</div>
</div>
</div>
<!-- Подключение чат-бота окончание  -->