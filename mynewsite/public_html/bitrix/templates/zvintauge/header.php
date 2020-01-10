<?session_start();?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<?$APPLICATION->ShowHead();?>
    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title><?$APPLICATION->ShowTitle();?></title>
	
	<meta name="author" content="https://www.zerotheme.com">
	
    <!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
	================================================== -->
  	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/zerogrid.css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/style.css">
	
	<!-- Custom Fonts -->
    <link href="<?=SITE_TEMPLATE_PATH?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/menu.css">
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/custom.css">
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery1111.min.js" type="text/javascript"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/script.js"></script>
	
	<!-- Owl Carousel Assets -->
    <link href="<?=SITE_TEMPLATE_PATH?>/owl-carousel/owl.carousel.css" rel="stylesheet">
	
	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/Items/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
		<script src="<?=SITE_TEMPLATE_PATH?>/js/html5.js"></script>
		<script src="<?=SITE_TEMPLATE_PATH?>/js/css3-mediaqueries.js"></script>
	<![endif]-->
	
</head>

<body class="home-page">
<?$APPLICATION->ShowPanel();?>
	<div class="wrap-body">
		<header class="">
			<div class="logo">
				<a href="/">zVintauge</a>
				<span>Collectible Vintage & Antique Photos</span>
			</div>
			<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"header_menu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "sub_menu",
		"DELAY" => "N",
		"MAX_LEVEL" => "3",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => "header_menu"
	),
	false
);?>

		</header>
		<!--////////////////////////////////////Container-->
		<section id="container">
			<div class="wrap-container">