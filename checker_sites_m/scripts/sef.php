<?if(!isset($_POST['text_in'])):?>
<?header('Content-Type: text/html; charset=utf-8');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SEF GENERATOR</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<style type="text/css">
		label {
		    display: block;
		    margin-bottom: 20px;
		}

		textarea#text_in {
		    min-width: 500px;
		    min-height: 300px;
		}

		div#create {
		    background: green;
		    width: 150px;
		    text-align: center;
		    padding: 10px;
		    margin-top: 20px;
		    color: white;
		    cursor: pointer;
		    border: 1px solid;
		}
		div#create:hover
		{
			opacity: 0.8;
		}
		body * {
		    font-family: 'Open Sans', sans-serif;
		}

		body {
		    padding: 10px;
		}
		table.sef_table {
		    border-collapse: collapse;
		    margin-top: 40px;
		}

		table.sef_table td {
		    border: 1px solid #aaa;
		    padding: 6px;
		}
	</style>
</head>
<body>
	<h1>SEF Generator</h1>
	<label for="text_in">Добавление заголовков (по одному на строку)</label>
	<textarea id="text_in" name="text_in"></textarea>
	<div id="create">Сгенерировать</div>
	<div id="result"></div>
	<script>
	function onAjaxSuccess(data)
	{
		$('#result').html(data);
	}
	$(document).ready(function(){
		$('#create').click(function(){
			let text = $('#text_in').val();
			if(text.length)
			{
			$.post(
			  "sef.php",
			  {
			    text_in: text,
			    
			  },
			  onAjaxSuccess
			);	
			}
		});
	});
	</script>
</body>
</html>
<?else:?>

<?
function translit($value)
{
	$converter = array(
		'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
		'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
		'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
		'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
		'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
		'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
		'э' => 'e',    'ю' => 'yu',   'я' => 'ya', ' '=>'-',','=>'-','('=>'',')'=>'','%'=>'','$'=>'','#'=>'','@'=>'','!'=>'','^'=>'','?'=>'','*'=>'','\\'=>'','/'=>'','.'=>'',
 
		'А' => 'a',    'Б' => 'b',    'В' => 'v',    'Г' => 'g',    'Д' => 'd',
		'Е' => 'e',    'Ё' => 'e',    'Ж' => 'zh',   'З' => 'z',    'И' => 'i',
		'Й' => 'y',    'К' => 'k',    'Л' => 'l',    'М' => 'm',    'Н' => 'n',
		'О' => 'o',    'П' => 'p',    'Р' => 'r',    'С' => 's',    'Т' => 't',
		'У' => 'u',    'Ф' => 'f',    'Х' => 'h',    'Ц' => 'c',    'Ч' => 'ch',
		'Ш' => 'sh',   'Щ' => 'sch',  'Ь' => '',     'Ы' => 'y',    'Ъ' => '',
		'Э' => 'e',    'Ю' => 'yu',   'Я' => 'ya',
	);
		$value = strtr($value, $converter);
		return $value;
	}
	 
?>
<?
$arStr = explode("\n", $_POST['text_in']);
?>
<table class="sef_table">
<?foreach ($arStr as $str_item):?>
	<?if(strlen($str_item)>0):?><tr><td><?=$str_item?></td><td><?=preg_replace('%-{2,}%','-',translit(trim(mb_strtolower($str_item))))?></td></tr><?endif;?>
<?endforeach?>
</table>
<?endif;?>