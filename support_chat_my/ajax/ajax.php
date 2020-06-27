<?php
session_start();
if(!empty($_POST['create_quection']) && !empty($_POST['create_answer']))
{
	$quection = $_POST['create_quection'];
	$answer = $_POST['create_answer'];
	//Подключаемся к базе данных
	require($_SERVER['DOCUMENT_ROOT']."/support_chat_my/system_files/connect_db.php");
	mysqli_query($link, "INSERT INTO quection_answer VALUES ('', '$quection', '$answer');");



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
}

if(!empty($_POST['user_messsage']))
{
	$mess = $_POST['user_messsage'];


	if(empty($_SESSION['user_messsage'])){
	$_SESSION['user_messsage'] = array();
	}
	array_push($_SESSION['user_messsage'], $mess);
	$user_message = '';
	foreach($_SESSION['user_messsage'] as $user_mess)
	{
	
		echo '<div class="soobshenie"><span class="text_on_forms">'.$user_mess.'</span></div><br>';
		$user_message = $user_mess;
	}

	//Подключаемся к базе данных
    require($_SERVER['DOCUMENT_ROOT']."/support_chat_my/system_files/connect_db.php");
    $date = date("d.m.Y");

$query = mysqli_query($link, "SELECT * FROM create_chatbot");
	$chat_name = '';
        while ($res = mysqli_fetch_array($query))
        {
            $chat_name = $res[chat_name];
        }


        $query_quections = mysqli_query($link, "SELECT answer FROM quection_answer WHERE quection LIKE '%$user_message%'");
        while ($view_q = mysqli_fetch_array($query_quections))
        {
        	// $chat_q = $view_q['quection'];
        	// $find = preg_match("/[$user_message].*/", $chat_q);
        	// if($find)//$user_message == $view_q['quection']
        	// {
        		 echo "<div class='soobshenie'><span class='text_on_forms'>$chat_name: $view_q[answer]</span></div>";
        		 $save_answer = $view_q[answer];
        		 break;
        	// }
        	// else
        	// {
        	// 	echo "<div class='soobshenie'><span class='text_on_forms'>$chat_name: Извините. Я пока не могу ответить на этот вопрос</span></div>";
        	// 	break;
        	// }
        }

        mysqli_query($link, "INSERT INTO history_chatbot VALUES ('$date', '$mess', '$save_answer');");
	
}

if(!empty($_POST['del_all']))
{	
	//Подключаемся к базе данных
	require($_SERVER['DOCUMENT_ROOT']."/support_chat_my/system_files/connect_db.php");
	mysqli_query($link, "TRUNCATE TABLE quection_answer");
	echo "";
}

if(!empty($_POST['clean_history']))
{
	//Подключаемся к базе данных
	require($_SERVER['DOCUMENT_ROOT']."/support_chat_my/system_files/connect_db.php");
	mysqli_query($link, "TRUNCATE TABLE history_chatbot");
	
	echo '<table class="history_table">
    <tr class="colum_hist">
        <td class="colum_hist"><span class="bold">Дата</span></td>
        <td class="colum_hist"><span class="bold">Вопрос пользователя</span></td>
        <td class="colum_hist"><span class="bold">Ответ чат-бота</span></td>
    </tr>';
	$query_histoty = mysqli_query($link, "SELECT * FROM history_chatbot");
	while ($view_history = mysqli_fetch_array($query_histoty))
	{
	echo '<tr class="colum_hist">'.'<td class="colum_hist">'.$view_history[date_dd_mm_yy].'</td>'.'<td class="colum_hist">'.$view_history[quection].'</td>'.'<td class="colum_hist">'.$view_history[answer].'</td>'.'</tr>';
	}

	echo '</table>';
}

if(!empty($_POST['del_s']) && !empty($_POST['del_po']))
{
	$del_s = $_POST['del_s'];
	$del_po = $_POST['del_po'];
	//Подключаемся к базе данных
	require($_SERVER['DOCUMENT_ROOT']."/support_chat_my/system_files/connect_db.php");
	mysqli_query($link, "DELETE FROM `quection_answer` WHERE `id` BETWEEN '$del_s' AND '$del_po'");

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
}

if(!empty($_POST['change_name_chat']))
{
	$change_name = $_POST['change_name_chat'];
	//Подключаемся к базе данных
	require($_SERVER['DOCUMENT_ROOT']."/support_chat_my/system_files/connect_db.php");
	mysqli_query($link, "UPDATE create_chatbot SET chat_name = '$change_name'");
	echo "Имя чат-бота заменено на $change_name";
}

if(!empty($_POST['change_passw']))
{
	$change_passw = md5($_POST['change_passw']);
	//Подключаемся к базе данных
	require($_SERVER['DOCUMENT_ROOT']."/support_chat_my/system_files/connect_db.php");
	mysqli_query($link, "UPDATE create_chatbot SET password = '$change_passw'");
	echo "Пароль чат-бота заменен";
}
?>
