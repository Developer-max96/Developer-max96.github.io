<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section class="content-box box-style-1 box-2">
					<div class="zerogrid">
						<div class="wrap-box"><!--Start Box-->
							<div class="row">
								<?foreach($arResult[ITEMS] as $arItem):?>
								<div class="col-1-3">
									<div class="wrap-col">
										<article>
											<div class="post-thumbnail-wrap">
												<a href="<?=$arItem[DETAIL_PAGE_URL]?>" class="portfolio-box">
													<img src="<?=CFile::GetPath($arItem[PROPERTIES][IMG_NEWS_MAIN1][VALUE])?>" alt="">
													<div class="portfolio-box-second">
														<img src="<?=CFile::GetPath($arItem[PROPERTIES][IMG_NEWS_MAIN2][VALUE])?>" alt="">
													</div>
												</a>
											</div>
											<div class="entry-header ">
												<h3 class="entry-title"><?=$arItem[NAME]?></h3>
											<div class="l-tags">
												<?
												if($arItem["PROPERTIES"]["TAG_NEWS1"]["~VALUE"])
												{
													echo $arItem["PROPERTIES"]["TAG_NEWS1"]["~VALUE"]." / ";
												}
												?> 
												<?
												if($arItem["PROPERTIES"]["TAG_NEWS2"]["~VALUE"])
												{
													echo $arItem["PROPERTIES"]["TAG_NEWS2"]["~VALUE"];
												}
												?>	
											</div>
											</div>
										</article>
									</div>
								</div>
								<?endforeach;?>
									</div>
								</div>
							</div>
						
				</section>

