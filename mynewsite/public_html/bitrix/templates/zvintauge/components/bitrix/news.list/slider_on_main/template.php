<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="owl-slide" class="owl-carousel">
	<?foreach($arResult['ITEMS'] as $arItem):?>
				<div class="item">
					<img src="<?=$arItem[PREVIEW_PICTURE][SRC]?>" />
				</div>
	<?endforeach;?>
			</div>

