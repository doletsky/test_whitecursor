<?
require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php");
?>
<?
function isUserPassword(string $userLogin, string $password)
    {
        $dbUser = \Bitrix\Main\UserTable::getList([
            'select' => ['ID', 'PASSWORD'],
            'filter' => ['LOGIN' => $userLogin ]
        ]);
        if($dbUser->getSelectedRowsCount() == 1){
            $arUser = $dbUser->Fetch();
            return \Bitrix\Main\Security\Password::equals($arUser['PASSWORD'], $password);
        }

    }

$request = \Bitrix\Main\Context::getCurrent()->getRequest();

if(isUserPassword($request->get("login"), $request->get("pass"))) {
    $res["pass"] = 1;
} else {
    $res["pass"] = 0;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($res);
?>
<?
require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/epilog_after.php");
die();
?>