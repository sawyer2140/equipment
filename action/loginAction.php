<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-5-28
 * Time: 下午3:31
 * To change this template use File | Settings | File Templates.
 */
include_once("../interfaces/mode.php");
include_once("../dao/userDao.php");
include_once("../model/user.php");
include_once("../model/result.php");

$json = json_decode($_POST['request']);

$user = new user();
$user->setLoginName($json->datas->loginName);
$user->setPassword(md5($json->datas->password));

switch ($json->mode) {

    case mode::login:
        $result = login($user, $json->datas->verifyCode);
        break;
}

echo json_encode($result);

function login($user, $code)
{
    $result = new result();

    if ($_SESSION['verifyCode'] != $code){

        $result->setStatus(status::codeErr);

    } else {

        $userDao = new userDao();
        $result = $userDao->login($user);

    }

    return $result;
}


