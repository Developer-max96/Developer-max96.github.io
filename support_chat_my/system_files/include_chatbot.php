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