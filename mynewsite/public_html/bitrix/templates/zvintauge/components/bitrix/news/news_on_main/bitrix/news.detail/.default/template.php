<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$_SESSION[NEWS_PAGE_URL]='http://'.$_SERVER['SERVER_NAME'].$arResult[DETAIL_PAGE_URL];?>
<div id="main-content">
					<div class="wrap-content">
						<div class="row">
							<article class="single-post zerogrid">
								<div class="row wrap-post"><!--Start Box-->
									<div class="entry-header">
										<span class="time">Дата публикации <?=$arResult[DATE_ACTIVE_FROM]?> </span>
										<h2 class="entry-title"><a href="#"><?=$arResult[PREVIEW_TEXT]?></a></h2>
<span class="cat-links">
	<?
if($arResult['PROPERTIES']['TAG_NEWS_DETAIL1']['~VALUE'])
	{
		echo $arResult['PROPERTIES']['TAG_NEWS_DETAIL1']['~VALUE'].",";
	}
	?> 
<?
if($arResult['PROPERTIES']['TAG_NEWS_DETAIL1']['~VALUE'])
	{
		echo $arResult['PROPERTIES']['TAG_NEWS_DETAIL2']['~VALUE'];
	}
?> 
</span>
									</div>
									<div class="post-thumbnail-wrap">
										<img src="<?=$arResult[DETAIL_PICTURE][SRC]?>">
									</div>
									<div class="entry-content">
									<?=$arResult[DETAIL_TEXT]?>
									</div>
								</div>
							</article>

						</div>
					</div>
				</div>
				
