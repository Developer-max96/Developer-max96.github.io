<!DOCTYPE html>
<html>
<head>
	<title>Example mxs-forms</title>
	<!-- подключаем стили mxs-forms -->
	<link rel="stylesheet" type="text/css" href="/mxs-forms/styles_mxs-forms.css">
	<!-- подключаем jquery-->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
	<!-- если нужно сделать всплывающую форму подключаем fancybox-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
	<!-- подключаем скрипты mxs-forms -->
	<script src="/mxs-forms/script_mxs-forms.js"></script>
</head>
<body>

<!-- 
mxs-forms.php - файл с функцией для создания формы, 
my_forms.php - файл в котором содаем свои формы  -->
<?php
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/mxs-forms/mxs-forms.php') && file_exists($_SERVER['DOCUMENT_ROOT'].'/mxs-forms/my_forms.php'))
{
	require($_SERVER['DOCUMENT_ROOT'].'/mxs-forms/mxs-forms.php');
	require($_SERVER['DOCUMENT_ROOT'].'/mxs-forms/my_forms.php');
}
?>

<!-- вызываем созданную в файле my_forms.php форму $form1 -->
<div class="container_mxs-form">
	<h2>Форма тестовая</h2>
	<?php echo create_ms_form($form1);?>
</div>


<!-- всплывающая форма -->
<div class="container_mxs-form hide_form" id="popup_form1">
	<h2>Всплывающая форма тестовая</h2>
	<?php echo create_ms_form($form1);?>
</div>

<style type="text/css">
	.btn_open_form
	{
	margin-top: 15px;
    text-align: center;
    width: 150px;
    height: 40px;
    border-radius: 15px;
    background: green;
    color: white;
    padding: 20px;
	}
	.hide_form
	{
		display: none;
	}
</style>

<br><br>
<a href="#popup_form1" data-fancybox="gallery" class="btn_open_form">Открыть форму</a>

</body>
</html>



