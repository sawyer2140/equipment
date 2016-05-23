<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-5-17
 * Time: 下午1:34
 * To change this template use File | Settings | File Templates.
 */

class users
{
    public $usersId;
    public $loginName;
    public $userName;
    public $count;
    public $user;
    public $startNum;
    public $limitNum;

    public function setCount($count)
    {
        $this->count = $count;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setLimitNum($limitNum)
    {
        $this->limitNum = $limitNum;
    }

    public function getLimitNum()
    {
        return $this->limitNum;
    }

    public function setLoginName($loginName)
    {
        $this->loginName = $loginName;
    }

    public function getLoginName()
    {
        return $this->loginName;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setStartNum($startNum)
    {
        $this->startNum = $startNum;
    }

    public function getStartNum()
    {
        return $this->startNum;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUsersId($usersId)
    {
        $this->usersId = $usersId;
    }

    public function getUsersId()
    {
        return $this->usersId;
    }


}
