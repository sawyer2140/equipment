<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-3-29
 * Time: 下午6:06
 * To change this template use File | Settings | File Templates.
 */
include_once("../interfaces/mode.php");
include_once("../interfaces/status.php");
include_once("../model/users.php");
include_once("../dao/userDao.php");
include_once("../dao/usersDao.php");

$json = json_decode($_POST["request"]);

switch ($json->mode) {
    case mode::getUsers:
        $result = getUsers($json->datas);
        break;
    case mode::updateUser:
        $result = updateUser($json->datas);
        break;
    case mode::addUser:
        $result = addUser($json->datas);
        break;
}

echo json_encode($result);

function getUsers($jsonUsers)
{
    $users = new users();

    $users->setLoginName($jsonUsers->loginName);
    $users->setUserName($jsonUsers->userName);
    $users->setStartNum($jsonUsers->startNum);
    $users->setLimitNum($jsonUsers->limitNum);

    $usersDao = new usersDao();
    $result = $usersDao->findUsersCount($users);

    if ($result->getStatus() == status::success) {
        $users = $result->getDatas();
    }

    if ($users->getCount() != 0) {
        $result = $usersDao->findUsers($users);
    }

    return $result;
}

function updateUser($jsonUser)
{

    $user = new user();
    $user->setId($jsonUser->id);
    $user->setLoginName($jsonUser->loginName);
    $user->setUserName($jsonUser->userName);
    $user->setIdentity($jsonUser->identity);


    $userDao = new userDao();
    $result = $userDao->update($user);

    if ($result->getStatus() == status::failed) {

        $result->setStatus(status::alreadyExist);

    }

    return $result;

}

function addUser($jsonUser)
{

    $user = new user();
    $user->setLoginName($jsonUser->loginName);
    $user->setUserName($jsonUser->userName);
    $user->setPassword(md5($jsonUser->passWord));
    $user->setIdentity($jsonUser->identity);

    $userDao = new userDao();
    $result = $userDao->add($user);

    if ($result->getStatus() == status::failed) {
        $result->setStatus(status::alreadyExist);
    }

    return $result;


}


    