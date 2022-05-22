<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/service_check_varvara/class.php');

//Получаем список пректов для проверки
$arr_projects=array(
    'http://site1.ru',
    'http://site1.ru'
);
?>

<?php 
    $count_found_varv=0;
?>
<?php foreach($arr_projects as $site):?>
    <?php if(CheckHeaders::check_web_page_header($site.'varvara.php')==200):?>
      <div class="site">На сайте <?php echo $site; $count_found_varv++;?> обнаружен скрипт varvara.php</div>
    <?php endif;?>
  <?php endforeach;?>

<?php if($count_found_varv==0):?>
      <div class="all_ok site">Все хорошо, на проектах нет скрипта varvara.php!</div>
<?php endif;?>