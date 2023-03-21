<?
require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php");
?>
<?
function isUserPassword($userId, $password)
    {
        $userData = \CUser::GetByID($userId)->Fetch();

        return \Bitrix\Main\Security\Password::equals($userData['PASSWORD'], $password);
    }
$request = \Bitrix\Main\Context::getCurrent()->getRequest();

$dbRes = CUser::GetByLogin($request->get("login"));
if($res = $dbRes->Fetch()) {
	if(isUserPassword($res['ID'], $request->get("pass")) == 1 ) echo '{"pass": 1}';
	else echo '{"pass":0}';
} else {
	echo '{"pass":0}';
}
?>
<?
require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/epilog_after.php");
?>