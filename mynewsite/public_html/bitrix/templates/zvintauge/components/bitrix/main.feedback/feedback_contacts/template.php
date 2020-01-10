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

<div id="contact_form">
<form action="<?=POST_FORM_ACTION_URI?>" method="POST" id="ff">
<?=bitrix_sessid_post()?>
	<label class="row">
<div class="col-1-3">
	<div class="wrap-col">
		<input type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" id="name" placeholder="Enter name" required="required">
	</div>
</div>

<div class="col-1-3">
	<div class="wrap-col">
		<input type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>" id="email" placeholder="Enter email" required="required">
	</div>
	</div>
<div class="col-1-3">
	<div class="wrap-col">
		<input type="text" name="user_subject" value="<?=$arResult["AUTHOR_SUBJECT"]?>" id="subject" class="form-control">
	</div>
</div>
	</label>

	<label class="row">
	<div class="wrap-col">
		<textarea name="MESSAGE" id="message" placeholder="Message"><?=$arResult["MESSAGE"]?></textarea>
	</div>
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
	<center><input type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>" class="sendButton"></center>
</form>
</div>