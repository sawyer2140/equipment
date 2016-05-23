<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yangYang
 * Date: 12-6-19
 * Time: 下午2:32
 * To change this template use File | Settings | File Templates.
 */
include_once("../interfaces/mode.php");
include_once("../dao/userDao.php");
include_once("../model/user.php");
include_once("../model/result.php");

$json = json_decode($_POST["request"]);

switch ($json->mode) {
    case mode::updatePassword:
        $result = updatePwd($json);
        break;
}

/**
 * @param $json
 * 修改密码
 */
function updatePwd($json)
{

    //用户输入的新的密码信息
    $user = new user();
    $user->setId($json->datas->id);

    //修改结果对象
    $result = new result();
    $userDAO = new userDao();

    //判断用户输入的原始密码是否正确
    $findPwdResult = $userDAO->findPwdByUser($user);

    if ($findPwdResult->getStatus() == status::success) {
        $pwd = $findPwdResult->getDatas()->getPassword();
        //若原始密码输入正确，则进行密码修改
        if ($pwd == md5($json->datas->oldPwd)) {

            $user->setPassword(md5($json->datas->newPwd));
            $result = $userDAO->updatePwd($user);

        }
        else {

            $result->setStatus(status::pwdErr);

        }
    }
    else {
        $result->setStatus(status::pwdErr);
    }
    echo json_encode($result);
}