<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section class="content-box box-style-1 box-4">
					<div class="zerogrid" style="width: 100%">
						<div class="wrap-box"><!--Start Box-->
							<?
							$count=0;
							foreach($arResult[ITEMS] as $arItem):
							$count++;
							?>
							<div class="row">
								<article>
									<div class="col-1-2 <?if($count%2==0):?>f-right<?endif;?>">
										<img src="<?=$arItem[PREVIEW_PICTURE][SRC]?>" alt="">
									</div>
									<div class="col-1-2">
										<div class="entry-content t-center">
											<h3><?=$arItem[NAME]?></h3>
											<p><?=$arItem[PREVIEW_TEXT]?></p>
											<a class="button" href="<?=$arItem[DETAIL_PAGE_URL]?>">Read More</a>
										</div>
									</div>
								</article>
							</div>
							<?endforeach;?>
							
						</div>
					</div>
				</section>

