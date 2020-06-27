<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
if(strlen($arResult["OK_MESSAGE"]) > 0)
{
	?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
}
?>
							
							<div class="zerogrid">
							<div class="comments-are">
									<div id="comment">
										<h3>Leave a Reply</h3>
										<span>Your email address will not be published. Required fields are marked </span>
						<form action="<?=POST_FORM_ACTION_URI?>" method="POST" id="comment_form">
						<?=bitrix_sessid_post()?>

								<label>
								<span>Comment:</span>
								<textarea id="message" name="MESSAGE"><?=$arResult["MESSAGE"]?></textarea>
								</label>
							
								<label>
								<span>Name:</span>
								<input type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" id="name" required>
								</label>

							
								<label>
								<span>Email:</span>
								<input id="email" required type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>">
								</label>
								

							<?if($arParams["USE_CAPTCHA"] == "Y"):?>
							<div class="mf-captcha">
								<div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
								<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
								<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
								<div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
								<input type="text" name="captcha_word" size="30" maxlength="50" value="">
							</div>
							<?endif;?>
							<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
							<center><input class="sendButton" type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>"></center>
						</form>
						</div>
						</div>
						</div>