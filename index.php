<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?>
<?
$APPLICATION->IncludeComponent(
"bitrix:main.profile",
"",
array(
"USER_PROPERTY_NAME" => "",
"SET_TITLE" => "Y",
"AJAX_MODE" => "N",
"USER_PROPERTY" => array(),
"SEND_INFO" => "Y",
"CHECK_RIGHTS" => "Y",
"AJAX_OPTION_JUMP" => "N",
"AJAX_OPTION_STYLE" => "Y",
"AJAX_OPTION_HISTORY" => "N"
)
);
?>
<?if ($USER->IsAuthorized()):?>
<form action="<?= $APPLICATION->GetCurPage()?>">
	<input type="hidden" name="logout" value="yes" />
	<input type="hidden" name="sessid" value="<?=bitrix_sessid()?>" />
	<input type="submit" name="logout_butt" value="Выйти" />
</form>
<?endif?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>